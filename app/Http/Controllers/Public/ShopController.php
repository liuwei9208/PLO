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
use App\Models\Event;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    /**
     * Display the shop home page.
     */
    public function showHome(Request $request, string $shop): View
    {
        $events = Event::where('published_status', 1)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orderBy('published_at', 'desc')
            ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        Log::info("todayCasts");

        $todayCasts = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
            ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
            ->where('casts.is_public', 1)
            ->where('shops.slug', 'like', $shop)
            ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
            ->select([
                'casts.id as id',
                'casts.name as name', 
                'casts.age as age', 
                'casts.height as height', 
                'casts.bust as bust', 
                'casts.waist as waist', 
                'casts.hip as hip', 
                'casts.gallery_1 as gallery_1', 
                'attendances.start_datetime as start_datetime', 
                'attendances.end_datetime as end_datetime',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
                ]) // 必要に応じて明示的に
            ->get();
        Log::info($todayCasts);
            
        $diaries = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
            ->orderBy('diaries.updated_at', 'desc') // ここを明示
            ->select([
                'diaries.subject',
                'diaries.updated_at',
                'casts.name',
                'diaries.photo',
            ])
            ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 6 : 4)
            ->get();
        
        $new_girls = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('created_at', '>=', Carbon::now()->subWeek(2))
        ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 3)
        ->get();
        $new_girls_month = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('created_at', '>=', Carbon::now()->subMonth(1))
        ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 3)
        ->get();
        // dd($diaries);
        return view('public.shop.home', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            // 'todayCasts' => Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->get(),
            'todayCasts' => $todayCasts,
            'events' => $events,
            'banners' => $banners,
            'diaries' => $diaries,
            'new_girls' => $new_girls,
            'new_girls_month' => $new_girls_month,
        ]);
    }

    public function showCastProfile(Request $request, string $shop, string $id): View
    {
        $cast = Cast::where('id', $id)->where('is_public', 1)->with('styles')->with('personalities')->with('options')->firstOrFail();
        $gallerys = [];
        $gallery_index = 0;
        // dd($cast);
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
    
    public function showEvent(Request $request, string $shop): View
    {
        // $events = Event::where('published_status', 1)
        //     ->where('shop_id', Shop::where('slug', $shop)->first()->id)
        //     ->orWhere(function($query) {
        //         $query->where('published_status', 2)
        //             ->where('published_at', '<=', Carbon::now());
        //     })  
        //     ->orderBy('published_at', 'desc')
        //     ->get();
        $events = Event::where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where(function($query) {
                $query->where('published_status', 1)
                    ->orWhere(function($query) {
                        $query->where('published_status', 2)
                            ->where('published_at', '<=', Carbon::now());
                    });
            })
            ->orderBy('published_at', 'desc')
            ->get();
        return view('public.shop.event', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'events' => $events,
        ]);
    }

    public function showEventDetail(Request $request, string $shop, string $id): View
    {
        $event = Event::find($id);
        return view('public.shop.eventDetail', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'event' => $event,
        ]);
    }   

    public function showAbout(Request $request, string $shop): View
    {
        return view('public.shop.about', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }

    public function showFee(Request $request, string $shop): View
    {
        return view('public.shop.fee', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }

    public function showSchedule(Request $request, string $shop): View
    {
        Carbon::setLocale('ja');
        $today = Carbon::now()->format('Y-m-d');
        $days = array();
        $weekDay = Carbon::now()->format('m/d').'('.Carbon::now()->getTranslatedMinDayName().')';
        $days[0] = ['date'=>$today,'weekDay'=>$weekDay];
        for ($i = 1; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i)->format('Y-m-d');
            $weekDay = Carbon::now()->addDays($i)->format('m/d').'('.Carbon::now()->addDays($i)->getTranslatedMinDayName().')';
            $days[$i] = ['date'=>$date,'weekDay'=>$weekDay] ;
        }
        return view('public.shop.schedule', [
            'days' => $days,
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }

    public function showNewcomer(Request $request, string $shop): View
    {
        // $newcomers = Cast::leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        //         ->where('shops.slug', '!=', 'touchvip')
        //         ->where('shops.slug', '!=', 'headquarter')
        //         ->where('casts.is_public', 1)
        //         ->where('casts.created_at', '>=', Carbon::now()->subMonth(1))
        //         ->inRandomOrder()
        //         ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
        //         ->onEachSide(0)
        //         ->withPath('newcomer')
        //         ->selectRaw('casts.*',
        //         'shops.name as shop_name',
        //         'shops.slug as shop_slug',
        //         'shops.id as shop_id'
        //         );
                
        //  dd($newcomers);   
        $cast_query = Cast::where('shop_id', Shop::where('slug', $shop)->first()->id);
        $newcomers = $cast_query
            ->where('created_at', '>=', Carbon::now()->subMonth(1))
            ->where('is_public', 1)
            ->inRandomOrder()
            ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
            ->onEachSide(0)
            ->withPath('newcomer');
    
        return view('public.shop.newcomer', [
            'newcomers' => $newcomers,
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }
}