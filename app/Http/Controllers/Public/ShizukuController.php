<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Cast;
use App\Models\Shop;
use App\Models\Ranking;
use App\Models\Diary;
use App\Models\Qa;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Attendance;
use App\Models\Reservation;
use App\Models\Video;
use App\Models\Review;
use App\Models\History;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use App\Models\CourseGroup;
use App\Models\Appoint;
use App\Models\Extend;
use App\Models\OptionRS;
use App\Models\Pickup;
use App\Models\Rank;

class ShizukuController extends Controller
{
    public function showHome(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');

        $events = Event::where('published_status', 1)
            ->orWhere(function ($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orWhere('published_status', 4)
            ->where('shop_id', Shop::where('slug', $shop)->first()->id)
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
                'casts.appeal_point as appeal_point',
                'casts.created_at as created_at',
                'attendances.start_datetime as start_datetime',
                'attendances.end_datetime as end_datetime',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
            ]) // 必要に応じて明示的に
            ->get();
        Log::info($todayCasts);
        $shop_id = Shop::where('slug', $shop)->first()->id;
        $pickups = Pickup::leftJoin('casts', 'casts.id', '=', 'pickups.cast_id')
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', $shop_id)
            ->select([
                'casts.id as id',
                'casts.name as name',
                'casts.age as age',
                'casts.gallery_1 as gallery_1',
            ])
            ->limit(2)
            ->get();
        // dd($shop_id);
        $diaries = Diary::leftJoin('casts', 'diaries.cast_id', '=', 'casts.id')
            ->where('diaries.is_public', 1)
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', $shop_id)
            ->select([
                'diaries.id',
                'diaries.subject',
                'diaries.created_at',
                'casts.name as cast_name',
                'casts.shop_id',
                'diaries.photo',
            ])
            ->orderBy('diaries.created_at', 'desc') // ここを明示
            ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 6 : 4)
            ->get();
        $new_girls = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('joined_at', '>=', Carbon::now()->subWeek(2))
            ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 4)
            ->get();
        if ($new_girls) {
            $new_girls = $new_girls->map(function ($new_girl) {
                $sql = "SELECT group_concat(personalities.name) AS personality FROM `" . env('DB_DATABASE') . "`.cast_personality
    LEFT JOIN `" . env('DB_DATABASE') . "`.personalities
    ON cast_personality.personality_id = personalities.id
    WHERE cast_personality.cast_id = $new_girl->id;
    ";
                // dd($sql);
                $results = DB::select($sql);
                // dd($results[0]->personality);
                $new_girl->pointpersonality = $results[0]->personality;
                $sql = "SELECT GROUP_CONCAT(styles.name) AS style FROM `" . env('DB_DATABASE') . "`.cast_style
    LEFT JOIN `" . env('DB_DATABASE') . "`.styles
    ON cast_style.style_id = styles.id
    WHERE cast_style.cast_id = $new_girl->id;";
                $results = DB::select($sql);
                // dd($results[0]->style);
                $new_girl->style = $results[0]->style;
                // $new_girl->appeal_pointpersonality = $new_girl->appeal_point ?? '';
                return $new_girl;
            });
        }
        // dd($new_girls);
        $new_girls_month = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('created_at', '>=', Carbon::now()->subMonth(1))
            ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 3)
            ->get();

        $castlist = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
            ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
            // ->leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
            ->where('casts.is_public', 1)
            ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
            // ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
            ->inRandomOrder()
            ->select([
                'casts.id as id',
                'casts.name as name',
                'casts.age as age',
                'casts.height as height',
                'casts.bust as bust',
                'casts.waist as waist',
                'casts.hip as hip',
                'casts.gallery_1 as gallery_1',
                'casts.appeal_point as appeal_point',
                'casts.created_at as created_at',
                // 'attendances.start_datetime as start_datetime',
                // 'attendances.end_datetime as end_datetime',
                'shops.slug as shop_slug',
                'shops.name as shop_name',
            ])
            ->limit(20)
            ->get();

        if ($castlist) {
            $castlist = $castlist->map(function ($cast) {
                $cast->start_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->where('start_datetime', '<=', Carbon::now()->toDateString())->where('end_datetime', '>=', Carbon::now()->toDateString())->first()->start_datetime ?? '';
                $cast->end_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->where('start_datetime', '<=', Carbon::now()->toDateString())->where('end_datetime', '>=', Carbon::now()->toDateString())->first()->end_datetime ?? '';
                return $cast;
            });
        }

        $news = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('published_status', 1)
            ->orWhere(function ($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', now());
            })
            ->inRandomOrder()
            // ->limit(4)
            ->orderBy('published_at', 'desc')
            ->get();
        $rank_id = Rank::where('is_public', 1)->orderBy('id', 'asc')->first()->id;
        $rankings = Ranking::leftJoin('casts', 'casts.id', '=', 'rankings.cast_id')
            ->where('rankings.shop_id', $shop_id)
            ->where('rankings.rank_id', $rank_id)
            ->select([
                'casts.gallery_1 as cast_gallery_1',
            ])
            ->orderBy('rankings.rank', 'asc')
            ->limit(2)
            ->get();
        // dd($rankings);
        // dd($banners);
        // dd($news);
        return view('public.shop.' . $shop . '.home', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'todayCasts' => $todayCasts,
            'events' => $events,
            'banners' => $banners,
            'diaries' => $diaries,
            'new_girls' => $new_girls,
            'new_girls_month' => $new_girls_month,
            'castlist' => $castlist,
            'news' => $news,
            'pickups' => $pickups,
            'rankings' => $rankings,
        ]);
    }

    public function showSystem(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.system');
    }

    public function showProfile(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.profile');
    }

    public function showCastlist(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $castlist = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
        // ->leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->where('casts.is_public', 1)
        ->where('casts.shop_id', Shop::where('slug', $shop)->first()->id)
        // ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
        ->inRandomOrder()
        ->select([
            'casts.id as id',
            'casts.name as name',
            'casts.age as age',
            'casts.height as height',
            'casts.bust as bust',
            'casts.waist as waist',
            'casts.hip as hip',
            'casts.gallery_1 as gallery_1',
            'casts.appeal_point as appeal_point',
            'casts.created_at as created_at',
            // 'attendances.start_datetime as start_datetime',
            // 'attendances.end_datetime as end_datetime',
            'shops.slug as shop_slug',
            'shops.name as shop_name',
        ])
        // ->limit(20)
        ->get();

        if ($castlist) {
            $castlist = $castlist->map(function ($cast) {
                $cast->start_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->where('start_datetime', '<=', Carbon::now()->toDateString())->where('end_datetime', '>=', Carbon::now()->toDateString())->first()->start_datetime ?? '';
                $cast->end_datetime = Attendance::where('cast_id', $cast->id)->where('is_public', 1)->where('start_datetime', '<=', Carbon::now()->toDateString())->where('end_datetime', '>=', Carbon::now()->toDateString())->first()->end_datetime ?? '';
                return $cast;
            });
        }
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        // dd($banners);
        return view('public.shop.' . $shop . '.castlist', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'castlist' => $castlist,
            'banners' => $banners,
        ]);
    }

    public function showSchedule(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');

        $request_date = $request->get('date');
        if ($request_date) {
            $request_date = Carbon::now()->format('Y').'-'.Carbon::parse($request_date)->format('m-d');
        } else {
            $request_date = Carbon::now()->format('Y-m-d');
        }
        Carbon::setLocale('ja');
        $days = array();
        for ($i = 0; $i < 6; $i++) {
            // $date = Carbon::now()->addDays($i)->format('Y-m-d');
            // $weekDay = Carbon::now()->addDays($i)->format('m/d').'('.Carbon::now()->addDays($i)->getTranslatedMinDayName().')';
            $weekDay = Carbon::now()->addDays($i)->format('m/d');
            $days[$i] = $weekDay ;
        }

        $todayCasts = Cast::leftJoin('shops', 'shops.id', '=', 'casts.shop_id')
        ->leftJoin('attendances', 'attendances.cast_id', '=', 'casts.id')
        ->where('casts.is_public', 1)
        ->where('shops.slug', 'like', $shop)
        ->whereRaw('DATE(attendances.start_datetime) = ?', [$request_date])
        ->select([
            'casts.id as id',
            'casts.name as name',
            'casts.age as age',
            'casts.height as height',
            'casts.bust as bust',
            'casts.waist as waist',
            'casts.hip as hip',
            'casts.gallery_1 as gallery_1',
            'casts.appeal_point as appeal_point',
            'casts.created_at as created_at',
            'attendances.start_datetime as start_datetime',
            'attendances.end_datetime as end_datetime',
            'shops.slug as shop_slug',
            'shops.name as shop_name',
        ]) // 必要に応じて明示的に
        ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        return view('public.shop.' . $shop . '.schedule', [
            'banners' => $banners,
            'days' => $days,
            'todayCasts' => $todayCasts,
            'shop' => Shop::where('slug', $shop)->get()->first(),
        ]);
    }

    public function showNewcast(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');

                $new_girls = Cast::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('joined_at', '>=', Carbon::now()->subWeek(2))
            // ->limit($request->header('User-Agent') && preg_match('/mobile/i', $request->header('User-Agent')) ? 4 : 4)
            ->get();
        if ($new_girls) {
            $new_girls = $new_girls->map(function ($new_girl) {
                $sql = "SELECT group_concat(personalities.name) AS personality FROM `" . env('DB_DATABASE') . "`.cast_personality
    LEFT JOIN `" . env('DB_DATABASE') . "`.personalities
    ON cast_personality.personality_id = personalities.id
    WHERE cast_personality.cast_id = $new_girl->id;
    ";
                // dd($sql);
                $results = DB::select($sql);
                // dd($results[0]->personality);
                $new_girl->pointpersonality = $results[0]->personality;
                $sql = "SELECT GROUP_CONCAT(styles.name) AS style FROM `" . env('DB_DATABASE') . "`.cast_style
    LEFT JOIN `" . env('DB_DATABASE') . "`.styles
    ON cast_style.style_id = styles.id
    WHERE cast_style.cast_id = $new_girl->id;";
                $results = DB::select($sql);
                // dd($results[0]->style);
                $new_girl->style = $results[0]->style;
                // $new_girl->appeal_pointpersonality = $new_girl->appeal_point ?? '';
                return $new_girl;
            });
        }

        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();

        return view('public.shop.' . $shop . '.newcast', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'new_girls' => $new_girls,
            'banners' => $banners,
        ]);
    }

    public function showNews(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $news = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
            ->where('published_status', 1)
            ->orWhere(function ($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', now());
            })
            ->inRandomOrder()
            ->orderBy('published_at', 'desc')
            ->get();
        return view('public.shop.' . $shop . '.news', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'banners' => $banners,
            'news' => $news,
        ]);
    }

    public function showNewsDetail(Request $request, string $shop, $id): View
    {
        // For now, we'll use mock data. In production, you'd fetch from database
        // $news = [
        //     'id' => $id,
        //     'title' => 'タイトルタイトルタイトルタイトルタイ',
        //     'date' => 'カテゴリ名 | 00.00.00',
        //     'image' => 'assets/img/shops/' . $shop . '/news-card-image' . $id . '.png',
        //     'content' => '本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文',
        // ];

        // // Mock previous and next news (in production, fetch from database)
        // $prevNews = $id > 1 ? [
        //     'id' => $id - 1,
        //     'title' => '前の記事のタイトル',
        // ] : null;

        // $nextNews = $id < 4 ? [
        //     'id' => $id + 1,
        //     'title' => '次の記事のタイトル',
        // ] : null;

        $news = News::find($id);
        $prevNews = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('published_status', 1)
        ->orWhere(function ($query) {
            $query->where('published_status', 2)
                ->where('published_at', '<=', now());
        })
        ->where('id', '<', $id)
        ->orderBy('id', 'desc')
        ->first();
        $nextNews = News::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where('published_status', 1)
        ->orWhere(function ($query) {
            $query->where('published_status', 2)
                ->where('published_at', '<=', now());
        })
        ->where('id', '>', $id)
        ->orderBy('id', 'asc')
        ->first();
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();

        return view('public.shop.' . $shop . '.news-detail', [
            'news' => $news,
            'prevNews' => $prevNews,
            'nextNews' => $nextNews,
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'banners' => $banners,
        ]);
    }

    public function showEvent(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        $events = Event::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where(function($query) {
            $query->where('published_status', 1)
                ->orWhere('published_status',4)
                ->orWhere(function($query) {
                    $query->where('published_status', 2)
                        ->where('published_at', '<=', Carbon::now());
                });
        })
        ->orderBy('published_at', 'desc')
        ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        return view('public.shop.' . $shop . '.event', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'events' => $events,
            'banners' => $banners,
        ]);
    }

    public function showEventDetail(Request $request, string $shop, $id): View
    {
        // For now, we'll use mock data. In production, you'd fetch from database
        // $event = [
        //     'id' => $id,
        //     'title' => 'イベントタイトルイベントタイトルイベントタイトル',
        //     'image' => 'assets/img/shops/' . $shop . '/event-card-' . $id . '.png',
        //     'content' => '本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文',
        // ];

        // // Mock previous and next event (in production, fetch from database)
        // $prevEvent = $id > 1 ? [
        //     'id' => $id - 1,
        //     'title' => '前のイベントのタイトル',
        // ] : null;

        // $nextEvent = $id < 4 ? [
        //     'id' => $id + 1,
        //     'title' => '次のイベントのタイトル',
        // ] : null;

        $event = Event::find($id);
        $banners = Banner::where('is_public', 1)->where('shop_id', Shop::where('slug', $shop)->first()->id)->orderBy('updated_at', 'desc')->get();
        $prevEvent = Event::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where(function($query) {
            $query->where('published_status', 1)
                ->orWhere('published_status',4)
                ->orWhere(function($query) {
                    $query->where('published_status', 2)
                        ->where('published_at', '<=', Carbon::now());
                });
        })
        ->where('id', '<', $id)
        ->orderBy('id', 'desc')
        ->first();
        // where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextEvent = Event::where('shop_id', Shop::where('slug', $shop)->first()->id)
        ->where(function($query) {
            $query->where('published_status', 1)
                ->orWhere('published_status',4)
                ->orWhere(function($query) {
                    $query->where('published_status', 2)
                        ->where('published_at', '<=', Carbon::now());
                });
        })
        ->where('id', '>', $id)
        ->orderBy('id', 'asc')
        ->first();
        return view('public.shop.' . $shop . '.event-detail', [
            'shop' => Shop::where('slug', $shop)->get()->first(),
            'event' => $event,
            'prevEvent' => $prevEvent,
            'nextEvent' => $nextEvent,
            'banners' => $banners,
        ]);
    }

    public function showRanking(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.ranking');
    }

    public function showPhotoDiary(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.photo-diary');
    }

    public function showReview(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.review');
    }

    public function showAccess(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.access');
    }

    public function showShopList(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.shop-list');
    }
}
