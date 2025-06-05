<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Ranking;
use App\Models\Diary;
use App\Models\Qa;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display the shop home page.
     */
    public function showHome(Request $request, string $shop): View
    {
        return view('public.shop.home', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'todayCasts' => Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->get(),
        ]);
    }

    public function showCastProfile(Request $request, string $shop, string $id): View
    {
        $cast = Cast::where('id', $id)->where('is_public', 1)->with('styles')->with('personalities')->with('options')->firstOrFail();
        $gallerys = [];
        $gallery_index = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($cast['gallery_'. ($i + 1)] !== null && $cast['gallery_'. ($i + 1)] !== '') {
                if (Storage::disk('public')->exists($cast['gallery_'. ($i + 1)])) {
                    $gallerys[$gallery_index] = $cast['gallery_'. ($i + 1)];
                    $gallery_index++;
                }
                
            }
        }
        // $diarys = Diary::where('cast_id', $cast->id)->where('is_public', 1)->orderBy('created_at', 'desc')->get();
        $diarys = Diary::where('cast_id', '28')->where('is_public', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $qas = Qa::where('cast_id', $cast->id)->where('question_id', '!=', null)->with('question')->orderBy('rank', 'asc')->get();
        $personalities = [];
        $styles = [];
        $options = [];
        foreach ($cast->personalities as $personality) {
            $personalities[] = $personality->name;
        }
        $personalities = implode(', ', $personalities);
        foreach ($cast->styles as $style) {
            $styles[] = $style->name;
        }
        $styles = implode(', ', $styles);
        foreach ($cast->options as $option) {
            $options[] = $option->name;
        }
        $options = implode(', ', $options);
        return view('public.shop.cast.profile', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'cast' => $cast,
            'gallerys' => $gallerys,
            'diarys' => $diarys,
            'qas' => $qas,
            'personalities' => $personalities,
            'styles' => $styles,
            'options' => $options,
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
