<?php

use App\Http\Controllers\Public\GroupController;
use App\Http\Controllers\Public\ShopController;
use App\Http\Controllers\Public\TouchVipDiaryController;
use App\Http\Middleware\PublicAvailable;
use Illuminate\Support\Facades\Route;

Route::middleware([PublicAvailable::class])->name('public.')->group(function () {

    /**
     * Group routes
     *
     * @see \App\Http\Controllers\Public\GroupController
     */
    Route::prefix('/')->name('group.')->group(function () {
        Route::get('/', [GroupController::class, 'showHome'])->name('home');
        Route::get('shop', [GroupController::class, 'showShop'])->name('shop');
        Route::get('schedule', [GroupController::class, 'showSchedule'])->name('schedule');
        Route::get('event', [GroupController::class, 'showEvent'])->name('event');
        Route::get('event/{id}', [GroupController::class, 'showEventDetail'])->name('event.detail');
        Route::get('search', [GroupController::class, 'showSearch'])->name('search');
        Route::post('search', [GroupController::class, 'searchResult']);
        Route::get('searchResult', [GroupController::class, 'searchResult'])->name('searchResult');
        Route::post('searchResult', [GroupController::class, 'searchResult'])->name('searchResult.post');
        Route::get('pickup', [GroupController::class, 'showPickup'])->name('pickup');
        Route::get('privacy-policy', [GroupController::class, 'showPrivacyPolicy'])->name('privacy-policy');
        Route::get('personal-policy', [GroupController::class, 'showPersonalPolicy'])->name('personal-policy');
        Route::get('newcomer', [GroupController::class, 'showNewcomer'])->name('newcomer');
    });

    /**
     * Shop routes
     *
     * @see \App\Http\Controllers\Public\ShopController
     */
    $shop_list = ['shizuku', 'miyabi', 'pussycat', 'en', 'shiroganeze', 'lovestory'];
    // $shop_list = ['shizuku', 'miyabi', 'pussycat', 'en', 'shiroganeze', 'lovestory'];
    Route::prefix('{shop}')->name('shop.')->whereIn('shop', $shop_list)->group(function () {
        Route::get('/', [ShopController::class, 'showHome'])->name('home');
        Route::get('cast/{id}', [ShopController::class, 'showCastProfile'])->name('cast.profile');
        Route::get('ranking', [ShopController::class, 'showRanking'])->name('ranking');
        Route::get('event', [ShopController::class, 'showEvent'])->name('event');
        Route::get('event/{id}', [ShopController::class, 'showEventDetail'])->name('event.detail');
        Route::get('about', [ShopController::class, 'showAbout'])->name('about');
        Route::get('fee', [ShopController::class, 'showFee'])->name('fee');
        Route::get('diary', [ShopController::class, 'showDiary'])->name('diary');
        Route::get('schedule', [ShopController::class, 'showSchedule'])->name('schedule');
        Route::get('newcomer', [ShopController::class, 'showNewcomer'])->name('newcomer');
        Route::get('castlist', [ShopController::class, 'showCastlist'])->name('castlist');
    });
});

/**
 * Touch VIP diary
 *
 * @see \App\Http\Controllers\Public\TouchVipDiaryController
 */
Route::prefix('touchvip/diary')->name('touchvip.diary.')->group(function () {
    Route::get('{slug}', [TouchVipDiaryController::class, 'show'])->name('detail');
    Route::get('{cast_id}/{month}', [TouchVipDiaryController::class, 'index'])->name('index');
});
