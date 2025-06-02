<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ranking;

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
        $shop = Shop::where('slug', $shop)->get()->first();

        $rankings = Ranking::where('rankings.shop_id', $shop->id)
            ->join('casts', 'rankings.cast_id', '=', 'casts.id')
            ->where('casts.shop_id', $shop->id)
            ->select('rankings.*', 'casts.*')
            ->orderBy('rankings.rank', 'asc')
            ->get();
        // dd($rankings);
        return view('public.shop.ranking', [
            'shop' => $shop,
            'rankings' => $rankings,
        ]);
    }
}
