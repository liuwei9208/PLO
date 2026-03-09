<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\RecruitApplication;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RecruitController extends Controller
{
    private const RECRUIT_NOTIFICATION_EMAIL = 'info@applink.co.jp';

    public function showMale(): View
    {
        return view('public.recruit.male');
    }

    public function showFemale(): View
    {
        return view('public.recruit.female');
    }

    public function showConfirmation(): View
    {
        return view('public.recruit.confirmation');
    }

    public function submitForm(Request $request)
    {
        $type = (string) $request->input('type');

        $rules = [
            'type' => ['required', Rule::in(['male', 'female'])],
            'shop' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'nullable|string|max:50',
            'experience' => 'nullable|string|max:255',
            'inquiry' => 'required|string|max:5000',
            'furigana' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'privacy' => 'nullable',
        ];

        if ($type === 'male') {
            $rules['furigana'] = 'required|string|max:255';
        }

        if ($type === 'female') {
            $rules['email'] = 'required|email|max:255|confirmed';
            $rules['subject'] = 'required|string|max:255';
            $rules['privacy'] = 'required|accepted';
        }

        $validated = $request->validate($rules);

        $application = RecruitApplication::create([
            'type' => $validated['type'],
            'shop' => $validated['shop'],
            'name' => $validated['name'],
            'furigana' => $validated['furigana'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'age' => $validated['age'] ?? null,
            'experience' => $validated['experience'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'inquiry' => $validated['inquiry'],
            'privacy_agreed' => (bool) ($validated['privacy'] ?? false),
            'meta' => [
                'ip' => $request->ip(),
                'user_agent' => (string) $request->userAgent(),
            ],
            'status' => 'new',
        ]);

        // Lấy shop theo slug user chọn
        $shop = Shop::query()
            ->select('id', 'slug', 'email', 'name')
            ->where('slug', (string) $validated['shop'])
            ->first();

        // Render HTML mail (KHÔNG escape)
        $notificationSubject = sprintf('Recruit application submitted (%s)', $validated['type']);
        $notificationBody = view('emails.recruit.notification', [
            'application' => $application,
        ])->render();

        try {
            if (!$shop) {
                throw new \RuntimeException('Shop not found');
            }

            self::sendMail(
                shop: $shop,
                to: self::RECRUIT_NOTIFICATION_EMAIL,
                subject: $notificationSubject,
                htmlBody: $notificationBody
            );
        } catch (\Throwable $e) {
            Log::error('Failed to send recruit notification mail', [
                'notification_email' => self::RECRUIT_NOTIFICATION_EMAIL,
                'application_id' => $application->id,
                'type' => $validated['type'],
                'shop' => $validated['shop'],
                'message' => $e->getMessage(),
            ]);
        }

        $thankYouBody = view('emails.recruit.thank-you')->render();

        try {
            if (!$shop) {
                throw new \RuntimeException('Shop not found');
            }

            self::sendMail(
                shop: $shop,
                to: (string) $validated['email'],
                subject: '応募受付が完了しました。',
                htmlBody: $thankYouBody
            );
        } catch (\Throwable $e) {
            Log::error('Failed to send recruit thank-you mail', [
                'email' => $validated['email'],
                'application_id' => $application->id,
                'type' => $validated['type'],
                'shop' => $validated['shop'],
                'message' => $e->getMessage(),
            ]);
        }

        return redirect()
            ->route('public.recruit.confirmation')
            ->with('success', 'お問い合わせありがとうございます。担当者よりご連絡いたします。');
    }

    /**
     * Gửi mail bằng mailbox theo SHOP đang chọn.
     * - SMTP username: lấy từ cast thuộc shop (diary_email_to)
     * - SMTP password: lấy từ .env theo slug
     * - Ép From/Sender trùng SMTP username để tránh 550 5.7.1
     */
    private static function sendMail(Shop $shop, string $to, string $subject, string $htmlBody): void
    {
        // 1) Tìm mailbox gửi: lấy 1 cast thuộc shop (tuỳ bạn chọn cast nào làm mailbox)
        $cast = Cast::query()
            ->select('id', 'shop_id', 'diary_email_to') // ✅ bỏ slug
            ->where('shop_id', $shop->id)
            ->orderBy('id')
            ->first();

        if (!$cast || !is_string($cast->diary_email_to) || trim($cast->diary_email_to) === '') {
            throw new \RuntimeException('Missing cast mailbox (diary_email_to) for this shop');
        }

        $smtpUsername = trim((string) $cast->diary_email_to);

        // 2) Lấy password theo slug (slug của shop hoặc cast — tuỳ hệ thống bạn)
        // Ở đây dùng shop->slug (hợp logic submit theo shop)
        $smtpPassword = self::resolvePasswordBySlug((string) $shop->slug);
        if ($smtpPassword === null) {
            throw new \RuntimeException('Missing SMTP password for shop slug: ' . $shop->slug);
        }

        // 3) Set SMTP config runtime
        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.transport' => 'smtp',
            'mail.mailers.smtp.host' => "plo-group.sakura.ne.jp",
            'mail.mailers.smtp.port' => 587,
            'mail.mailers.smtp.encryption' => 'tls',
            'mail.mailers.smtp.username' => "noreply@plo-group.jp",
            'mail.mailers.smtp.password' => "iD&BKX6z%Zdb",
            'mail.from.address' => "noreply@plo-group.jp",
            'mail.from.name' => (string) ($shop->name ?? 'No-Reply'),
        ]);

        // Clear cache mailer để nhận config mới
        app('mail.manager')->forgetMailers();

        // 4) Gửi mail, ép From + Sender trùng username (tránh 550 5.7.1)
        Mail::html($htmlBody, function ($message) use ($to, $subject, $smtpUsername, $shop): void {
            $fromName = (string) ($shop->name ?? 'No-Reply');

            $message->from($smtpUsername, $fromName);
            $message->sender($smtpUsername);
            $message->to($to)->subject($subject);
        });
    }

    /**
     * Map slug -> env password key
     * Trả về null nếu không có/không hợp lệ.
     */
    private static function resolvePasswordBySlug(string $slug): ?string
    {
        $key = match ($slug) {
            'touchvip'   => 'MAIL_TOUCHVIP',
            'shizuku'    => 'MAIL_SHIZUKU',
            'miyabi'     => 'MAIL_MIYABI',
            'pussycat'   => 'MAIL_PUSSYCAT',
            'en'         => 'MAIL_EN',
            'siroganeze' => 'MAIL_SHIROGANEZE',
            'lovestory'  => 'MAIL_LOVESTORY',
            default      => null,
        };

        if (!$key) {
            return null;
        }

        $val = env($key);

        if (!is_string($val)) {
            return null;
        }

        $val = trim($val);
        if ($val === '' || strtolower($val) === 'null') {
            return null;
        }

        return $val;
    }
}
