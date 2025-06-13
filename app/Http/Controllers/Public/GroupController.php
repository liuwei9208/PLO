<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Pickup;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Personality;
use App\Models\Style;
use App\Models\Option;
use App\Models\Event;
use App\Models\Banner;
use App\Models\News;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class GroupController extends Controller
{
    /**
     * Display the group home page.
     */
    public function showHome(Request $request): View
    {
        $cast_query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
        $newfaces_this_week = $cast_query
            ->where('created_at', '>=', Carbon::now()->subWeek(2))
            ->inRandomOrder()
            ->get();
        $newfaces_this_month = $cast_query
            ->where('created_at', '>=', Carbon::now()->subMonth(1))
            // ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->inRandomOrder()
            ->get();
        $events = Event::where('published_status', 1)
            ->where('shop_id', Shop::where('slug', 'headquarter')->first()->id)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orderBy('published_at', 'desc')
            ->get();
        $banners = Banner::where('is_public', 1)->where('shop_id',Shop::where('slug', 'headquarter')->first()->id)->orderBy('updated_at', 'desc')->get();

        $news = News::where('published_status', 1)
            ->orWhere(function($query) {
                $query->where('published_status', 2)
                    ->where('published_at', '<=', Carbon::now());
            })
            ->orderBy('published_at', 'desc')
            ->get();

        return view('public.group.home', [
            'pickups' => Pickup::inRandomOrder()->limit(9)->get(),
            'newfaces_this_week' => $newfaces_this_week,
            'newfaces_this_month' => $newfaces_this_month,
            'events' => $events,
            'banners' => $banners,
            'news' => $news,
        ]);
    }

    public function showShop(Request $request): View
    {
        return view('public.group.shop', [
            'pickups' => Pickup::inRandomOrder()->get(),
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
        ]);
    }

    public function showSchedule(Request $request): View
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
        Log::info($days);
        // $attendances = Attendance::whereIn('date', $days)->get();
        // $token =Auth::user()->createToken('schedule')->plainTextToken;
        $casts = Attendance::leftJoin('casts', 'attendances.cast_id', '=', 'casts.id')
        ->leftJoin('shops', 'casts.shop_id', '=', 'shops.id')
        ->where('casts.is_public', 1)
        ->where('attendances.is_public', 1)
        ->whereRaw('DATE(attendances.start_datetime) = CURDATE()')
        ->selectRaw("
            attendances.id as attendance_id,
            DATE_FORMAT(attendances.start_datetime, '%y:%m:%d') as start_datetime,
            DATE_FORMAT(attendances.end_datetime, '%y:%m:%d') as end_datetime,
            casts.name as cast_name,
            casts.id as cast_id,
            casts.shop_id as shop_id,
            casts.gallery_1 as gallery_1,
            casts.age as age,
            casts.height as height,
            casts.bust as bust,
            casts.waist as waist,
            casts.hip as hip,
            casts.appeal_point as personality,
            shops.name as shop_name,
            shops.slug as shop_slug
            ") // 必要に応じて
        ->get();
        // dd($casts);
        return view('public.group.schedule', [
            'days' => $days,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get(),
            'casts' => $casts,
        ]);
    }

    public function showEvent(Request $request): View
    {
        $events = Event::where('published_status', 1)
        ->where('shop_id', Shop::where('slug', 'headquarter')->first()->id)
        ->orWhere(function($query) {
            $query->where('published_status', 2)
                ->where('published_at', '<=', Carbon::now());
        })
        ->orderBy('published_at', 'desc')
        ->get();
        return view('public.group.event', [
            'events' => $events,
        ]);
    }
    public function showEventDetail(Request $request, string $id): View
    {
        $event = Event::find($id);
        return view('public.group.eventDetail', [
            'event' => $event,
        ]);
    }
    public function showSearch(Request $request): View
    {
        $personalities = Personality::where('is_public', true)->get();
        $styles = Style::where('is_public', true)->get();
        $options = Option::where('is_public', true)->get();
        return view('public.group.search', [
            'personalities' => $personalities,
            'styles' => $styles,
            'options' => $options,
        ]);
    }

    public function showPickup(Request $request): View
    {
        $pickups = Pickup::with('cast')->whereHas('cast', function ($query) {
            $query->where('is_public', true);
        })->get();

        return view('public.group.pickup', [
            'pickups' => $pickups,
        ]);
}

    public function showPrivacyPolicy(Request $request): View
    {
        return view('public.group.privacy-policy', [
        ]);
    }
    public function showPersonalPolicy(Request $request): View
    {
        return view('public.group.personal-policy', [
        ]);
    }
    public function showNewcomer(Request $request): View
    {
        $cast_query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->whereNot('slug', 'headquarter')->first()->id);
        $newcomers = $cast_query
            ->where('created_at', '>=', Carbon::now()->subWeek(2))
            ->inRandomOrder()
            ->paginate($request->header('User-Agent') && preg_match('/(iPhone|iPod|Android.*Mobile|Windows Phone)/', $request->header('User-Agent')) ? 6 : 9)
            ->onEachSide(0)
            ->withPath('newcomer');

        return view('public.group.newcomer', [
            'newcomers' => $newcomers,
        ]);
    }
}
