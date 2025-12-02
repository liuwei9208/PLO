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

    public function showNewsDetail(Request $request, string $shop, $id): View
    {
        // For now, we'll use mock data. In production, you'd fetch from database
        $news = [
            'id' => $id,
            'title' => 'タイトルタイトルタイトルタイトルタイ',
            'date' => 'カテゴリ名 | 00.00.00',
            'image' => 'assets/img/shops/' . $shop . '/news-card-image' . $id . '.png',
            'content' => '本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文',
        ];
        
        // Mock previous and next news (in production, fetch from database)
        $prevNews = $id > 1 ? [
            'id' => $id - 1,
            'title' => '前の記事のタイトル',
        ] : null;
        
        $nextNews = $id < 4 ? [
            'id' => $id + 1,
            'title' => '次の記事のタイトル',
        ] : null;
        
        return view('public.shop.' . $shop . '.news-detail', [
            'news' => $news,
            'prevNews' => $prevNews,
            'nextNews' => $nextNews,
            'shop' => $shop,
        ]);
    }

    public function showEvent(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.event');
    }

    public function showEventDetail(Request $request, string $shop, $id): View
    {
        // For now, we'll use mock data. In production, you'd fetch from database
        $event = [
            'id' => $id,
            'title' => 'イベントタイトルイベントタイトルイベントタイトル',
            'image' => 'assets/img/shops/' . $shop . '/event-card-' . $id . '.png',
            'content' => '本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文',
        ];
        
        // Mock previous and next event (in production, fetch from database)
        $prevEvent = $id > 1 ? [
            'id' => $id - 1,
            'title' => '前のイベントのタイトル',
        ] : null;
        
        $nextEvent = $id < 4 ? [
            'id' => $id + 1,
            'title' => '次のイベントのタイトル',
        ] : null;
        
        return view('public.shop.' . $shop . '.event-detail', [
            'event' => $event,
            'prevEvent' => $prevEvent,
            'nextEvent' => $nextEvent,
            'shop' => $shop,
        ]);
    }

    public function showRanking(Request $request): View
    {
        $shop = $request->route('shop', 'shizuku');
        return view('public.shop.' . $shop . '.ranking');
    }
}
