<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Ranking;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Rank;
use App\Models\ShopRank;

class RankingController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::guard('web')->user();
        $query = Ranking::query();
        $ranks = Rank::orderBy('id', 'asc')->get();

        $shop_id = 0;
        if ($user->hasRole('admin')) {
            if ($request->has('shop')) {
                $shop_id = Shop::where('slug', $request->shop)->first()->id;
                $query->where('shop_id', Shop::where('slug', $request->shop)->first()->id);
            }else{
                $shop_id = Shop::where('slug', 'shizuku')->first()->id;
                $query->where('shop_id', Shop::where('slug', 'shizuku')->first()->id);
            }
        }else{
            $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->first();
            $shop_id = $shop_user->shop_id;
            $query->where('shop_id', $shop_id);
        }
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get();
        // return view('admin.ranking.index', [
        //     'shops' => $shops,
        // ]);

        $shop = Shop::findOrFail($shop_id);
        $shopRanks = $shop->shopRanks()->get();
        $rankByPosition = $shopRanks->keyBy('position');

        return view('admin.ranking.detail', [
            'ranks' => $ranks,
            'shops' => $shops,
            'shop' => $shop,
            'rankByPosition' => $rankByPosition,
            'casts' => Cast::where('shop_id', $shop_id)->where('is_public', 1)->get(),
            'rankings' => $query->orderBy('rank_id', 'asc')->orderBy('rank', 'asc')->get(),
        ]);

    }

    public function show(Request $request, string $id): View
    {
        $ranks = Rank::orderBy('id', 'asc')->get();
        $shops = Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get();
        $shop = Shop::findOrFail($id);
        $shopRanks = $shop->shopRanks()->get();
        $rankByPosition = $shopRanks->keyBy('position');

        return view('admin.ranking.detail', [
            'ranks' => $ranks,
            'shop' => $shop,
            'rankByPosition' => $rankByPosition,
            'casts' => Cast::where('shop_id', $id)->where('is_public', 1)->get(),
            'rankings' => Ranking::where('shop_id', $id)->get(),
            'shops' => $shops,
        ]);
    }

    /**
     * Update the specified ranking.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $rankings_req = $request->input('rank', []);
        $shopRankCategories = $request->input('shop_rank_category', []);

        foreach ($rankings_req as $rank_id => $rankings) {
            $nonNullRankings = array_filter($rankings, function($value) {
                return $value !== null && $value !== '';
            });
            $uniqueRankings = array_unique($nonNullRankings);
            if (count($uniqueRankings) !== count($nonNullRankings)) {
                $duplicateCastIDs = array_unique(array_diff_assoc($nonNullRankings, $uniqueRankings));
                $duplicateCastNames = array_map(function($value) {
                    return Cast::find($value)->name;
                }, $duplicateCastIDs);
                return redirect()->back()->withInput()->withErrors(['error' => '同じランキングで同じキャストは選べません。キャスト名: ' . implode(', ', $duplicateCastNames)]);
            }
        }

        $shop = Shop::findOrFail($id);
        ShopRank::where('shop_id', $id)->delete();

        for ($position = 1; $position <= 5; $position++) {
            $rankId = $shopRankCategories[$position] ?? '';
            if (is_numeric($rankId) && $rankId !== '') {
                ShopRank::create([
                    'shop_id' => $id,
                    'position' => $position,
                    'rank_id' => $rankId,
                ]);
            }
        }

        Ranking::where('shop_id', $id)->delete();

        foreach ($rankings_req as $rank_id => $rankings) {
            $rankings = array_slice($rankings, 0, 7, true);
            foreach ($rankings as $pos => $cast_id) {
                if ((int) $pos > 7) {
                    continue;
                }
                if (is_numeric($cast_id) && $cast_id !== '') {
                    Ranking::create([
                        'shop_id' => $id,
                        'cast_id' => $cast_id,
                        'rank' => (int) $pos,
                        'rank_id' => $rank_id,
                    ]);
                }
            }
        }

        return redirect('/admin/ranking/' . $id)->with('success', 'ランキングを更新しました。');
    }
}