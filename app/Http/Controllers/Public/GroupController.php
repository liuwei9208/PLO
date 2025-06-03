<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Pickup;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            ->where('created_at', '>=', Carbon::now()->subMonth(30))
            // ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->inRandomOrder()
            ->get();

        return view('public.group.home', [
            'pickups' => Pickup::inRandomOrder()->get(),
            'newfaces_this_week' => $newfaces_this_week,
            'newfaces_this_month' => $newfaces_this_month,
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
        return view('public.group.event', [
        ]);
    }

    public function showSearch(Request $request): View
    {
        return view('public.group.search', [
        ]);
    }

    public function showPickup(Request $request): View
    {
        return view('public.group.pickup', [
        ]);
    }

    public function showPrivacyPolicy(Request $request): View
    {
        return view('public.group.privacy-policy', [
        ]);
    }

    public function showNewcomer(Request $request): View
    {
        return view('public.group.newcomer', [
        ]);
    }
}
