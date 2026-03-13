<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainVisualImage;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MainVisualController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $user = Auth::guard('web')->user();
        $shops = Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get();

        if ($user->hasRole('admin')) {
            $shopSlug = $request->query('shop', $shops->first()?->slug);
            $shop = Shop::where('slug', $shopSlug)->firstOrFail();
        } else {
            $shopUser = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->first();
            $shop = Shop::findOrFail($shopUser->shop_id);
        }

        $images = MainVisualImage::where('shop_id', $shop->id)->orderBy('sort_order')->get();
        $slots = collect();
        for ($i = 1; $i <= 5; $i++) {
            $slots->push($images->firstWhere('sort_order', $i) ?? new MainVisualImage([
                'shop_id' => $shop->id,
                'sort_order' => $i,
                'image_path' => null,
                'link_url' => null,
            ]));
        }

        return view('admin.main-visual.edit', [
            'shop' => $shop,
            'shops' => $shops,
            'slots' => $slots,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::guard('web')->user();
        $shops = Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get();

        if ($user->hasRole('admin')) {
            $shop = Shop::where('slug', $request->shop)->firstOrFail();
        } else {
            $shopUser = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->first();
            $shop = Shop::findOrFail($shopUser->shop_id);
        }

        $image1 = $request->file('image_1') ?? $request->input('path_1');
        if (!$image1 && !$request->input('path_1')) {
            return redirect()->back()->withInput()->withErrors(['image_1' => '画像1は必須です。']);
        }

        for ($i = 1; $i <= 5; $i++) {
            $file = $request->file("image_{$i}");
            $pathInput = $request->input("path_{$i}");
            $linkUrl = $request->input("link_url_{$i}");

            $record = MainVisualImage::firstOrNew([
                'shop_id' => $shop->id,
                'sort_order' => $i,
            ]);

            if ($file) {
                if ($record->image_path) {
                    Storage::disk('public')->delete($record->image_path);
                }
                $record->image_path = $file->store("main_visual/{$shop->id}", 'public');
            } elseif ($pathInput) {
                $record->image_path = $pathInput;
            } elseif ($i === 1) {
                return redirect()->back()->withInput()->withErrors(['image_1' => '画像1は必須です。']);
            }

            $record->link_url = $linkUrl ?: null;
            $record->shop_id = $shop->id;
            $record->sort_order = $i;
            $record->save();
        }

        return redirect()->route('admin.main-visual.index', ['shop' => $shop->slug])
            ->with('success', 'メインビジュアルを保存しました。');
    }

    public function destroyImage(Request $request, int $id): RedirectResponse
    {
        $record = MainVisualImage::findOrFail($id);
        if ($record->sort_order === 1) {
            return redirect()->back()->withErrors(['error' => '画像1は削除できません。']);
        }
        if ($record->image_path) {
            Storage::disk('public')->delete($record->image_path);
        }
        $record->image_path = null;
        $record->link_url = null;
        $record->save();
        return redirect()->back()->with('success', '画像を削除しました。');
    }
}
