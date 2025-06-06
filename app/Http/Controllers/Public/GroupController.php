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
class GroupController extends Controller
{
    /**
     * Display the group home page.
     */
    public function showHome(Request $request): View
    {
        $cast_query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id);
        $newfaces_this_week = $cast_query
            ->where('created_at', '>=', Carbon::now()->subWeek(2))
            ->inRandomOrder()
            ->get();
        $newfaces_this_month = $cast_query
            ->where('created_at', '>=', Carbon::now()->subMonth(1))
            // ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->inRandomOrder()
            ->get();
        $events = Event::where('is_public', 1)->orderBy('published_at', 'desc')->get();
        $banners = Banner::where('is_public', 1)->orderBy('updated_at', 'desc')->get();
        return view('public.group.home', [
            'pickups' => Pickup::inRandomOrder()->limit(9)->get(),
            'newfaces_this_week' => $newfaces_this_week,
            'newfaces_this_month' => $newfaces_this_month,
            'events' => $events,
            'banners' => $banners,
        ]);
    }

    public function showShop(Request $request): View
    {
        return view('public.group.shop', [
            'pickups' => Pickup::inRandomOrder()->get(),
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('id', 'asc')->get(),
        ]);
    }

    public function showSchedule(Request $request): View
    {
        return view('public.group.schedule', [
        ]);
    }

    public function showEvent(Request $request): View
    {
        $events = Event::where('is_public', 1)->orderBy('published_at', 'desc')->get();
        return view('public.group.event', [
            'events' => $events,
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
        $cast_query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id);
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
