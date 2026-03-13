<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Mail\RecruitThankYouMail;
use App\Mail\RecruitNotificationMail;
use App\Models\RecruitApplication;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RecruitController extends Controller
{
    private const SHOP_LABELS = [
        'shizuku' => '雫',
        'miyabi' => '雅',
        'pussycat' => 'プッシーキャット',
        'en' => '艶',
        'siroganeze' => 'シロガネーゼ',
        'lovestory' => 'ラブストーリー',
    ];

    private const EXPERIENCE_LABELS = [
        'yes' => 'あり',
        'no' => 'なし',
        'working' => '働いている',
    ];

    private const SUBJECT_LABELS = [
        'trial' => '体験入店希望',
        'join' => '入店希望',
        'inquiry' => 'お問い合わせ',
    ];

    public function showMale(): View
    {
        return view('public.recruit.male');
    }

    public function showFemale(): View
    {
        return view('public.recruit.female');
    }

    public function confirmForm(Request $request)
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

        $data = [
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
            'privacy' => $validated['privacy'] ?? null,
        ];

        $request->session()->put('recruit_confirm', $data);

        $shopLabel = self::SHOP_LABELS[$data['shop']] ?? $data['shop'];
        $experienceLabel = self::EXPERIENCE_LABELS[$data['experience'] ?? ''] ?? $data['experience'] ?? '';
        $subjectLabel = self::SUBJECT_LABELS[$data['subject'] ?? ''] ?? $data['subject'] ?? '';

        return view('public.recruit.confirm', [
            'type' => $type,
            'data' => $data,
            'shopLabel' => $shopLabel,
            'experienceLabel' => $experienceLabel,
            'subjectLabel' => $subjectLabel,
        ]);
    }

    public function submitForm(Request $request)
    {
        $data = $request->session()->get('recruit_confirm');

        if (!$data || !in_array($data['type'] ?? '', ['male', 'female'])) {
            return redirect()->route('public.recruit.male')
                ->with('error', 'セッションが切れました。最初から入力し直してください。');
        }

        $validated = $data;

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
            'privacy_agreed' => (bool) ($data['privacy'] ?? false),
            'meta' => [
                'ip' => $request->ip(),
                'user_agent' => (string) $request->userAgent(),
            ],
            'status' => 'new',
        ]);

        $request->session()->forget('recruit_confirm');

        try {
            Mail::to($validated['email'])->send(new RecruitThankYouMail($validated['name']));
        } catch (\Throwable $e) {
            Log::error('Failed to send recruit thank-you mail', [
                'email' => $validated['email'],
                'type' => $validated['type'],
                'message' => $e->getMessage(),
            ]);
        }

        $shop = Shop::where('slug', $validated['shop'])->first();
        $notificationEmail = $shop?->email ?? config('mail.from.address', 'info@plo-group.jp');

        if (filter_var($notificationEmail, FILTER_VALIDATE_EMAIL)) {
            try {
                Mail::to($notificationEmail)->send(new RecruitNotificationMail($application));
            } catch (\Throwable $e) {
                Log::error('Failed to send recruit notification mail', [
                    'application_id' => $application->id,
                    'email' => $notificationEmail,
                    'message' => $e->getMessage(),
                ]);
            }
        }

        return redirect()->route('public.recruit.complete');
    }

    public function showComplete(): View
    {
        return view('public.recruit.complete');
    }
}
