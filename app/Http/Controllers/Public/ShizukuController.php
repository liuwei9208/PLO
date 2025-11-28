<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShizukuController extends Controller
{
    public function showHome(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.home');
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
        return view('public.shop.' . $shop . '.castlist');
    }

    public function showSchedule(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.schedule');
    }

    public function showNewcast(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.newcast');
    }

    public function showNews(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.news');
    }
}
