<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display the shop home page.
     */
    public function showHome(Request $request, string $shop): View
    {
        return view('public.shop.home', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'todayCasts' => Cast::where('shop_id', Shop::where('slug', $shop)->first()->id)->get(),
        ]);
    }

    public function showCastProfile(Request $request, string $shop, string $id): View
    {
        return view('public.shop.cast.profile', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'cast' => Cast::findOrFail($id),
        ]);
    }

    public function showRanking(Request $request, string $shop): View
    {
        return view('public.shop.ranking', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }
}
