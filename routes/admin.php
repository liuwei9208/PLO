<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CastController;
use App\Http\Controllers\Admin\TouchVipCastController;
use App\Http\Controllers\Admin\PickupController;
use App\Http\Controllers\Admin\DiaryController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PersonalityController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RankingController;
use App\Http\Controllers\Admin\QaController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WorkController;

Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth', 'role:admin|shop'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'show'])
        ->name('home');

    /**
     * Touch VIP cast
     *
     * @see \App\Http\Controllers\Admin\TouchVipCastController
     */
    Route::prefix('touchvip-cast')->name('touchvip-cast.')->group(function () {
        Route::get('/', [TouchVipCastController::class, 'index'])->name('index');
        Route::get('add', [TouchVipCastController::class, 'create'])->name('create');
        Route::post('add', [TouchVipCastController::class, 'store']);
        Route::get('{id}', [TouchVipCastController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [TouchVipCastController::class, 'update']);
        Route::delete('{id}', [TouchVipCastController::class, 'destroy']);
    });

    /**
     * Cast
     *
     * @see \App\Http\Controllers\Admin\CastController
     */
    Route::prefix('cast')->name('cast.')->group(function () {
        Route::get('/', [CastController::class, 'index'])->name('index');
        Route::get('/sort', [CastController::class, 'sortindex'])->name('sortindex');
        Route::get('add', [CastController::class, 'create'])->name('create');
        Route::post('add', [CastController::class, 'store']);
        Route::get('{id}', [CastController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [CastController::class, 'update']);
        Route::delete('{id}', [CastController::class, 'destroy']);
    });

    /**
     * Member
     *
     * @see \App\Http\Controllers\Admin\CastController
     */
    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('index');
        Route::get('add', [MemberController::class, 'create'])->name('create');
        Route::post('add', [MemberController::class, 'store']);
        Route::get('{id}', [MemberController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        // Route::put('{id}', [MemberController::class, 'update']);
        Route::delete('{id}', [MemberController::class, 'destroy']);
        Route::get('qrcode', [MemberController::class, 'qrcodeRead'])->name('qrcode');
        Route::get('qrresult', [MemberController::class, 'qrResult'])->name('qrresult');
    });
    /**
     * Visit
     *
     * @see \App\Http\Controllers\Admin\CastController
     */
    Route::prefix('visit')->name('visit.')->group(function () {
        Route::get('/', [VisitController::class, 'index'])->name('index');
        Route::get('add', [VisitController::class, 'create'])->name('create');
        Route::post('add', [VisitController::class, 'store']);
        Route::get('{id}', [VisitController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [VisitController::class, 'update']);
        Route::delete('{id}', [VisitController::class, 'destroy']);
    });
    /**
     * Pickup
     *
     * @see \App\Http\Controllers\Admin\PickupController
     */
    Route::prefix('pickup')->name('pickup.')->group(function () {
        Route::get('/', [PickupController::class, 'index'])->name('index');
        Route::get('{id}', [PickupController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [PickupController::class, 'update']);
    });

    /**
     * Diary
     *
     * @see \App\Http\Controllers\Admin\DiaryController
     */
    Route::prefix('diary')->name('diary.')->group(function () {
        Route::get('/', [DiaryController::class, 'index'])->name('index');
        Route::get('{id}', [DiaryController::class, 'show'])->name('detail');
        Route::delete('{id}', [DiaryController::class, 'destroy']);
        Route::put('{id}/publish', [DiaryController::class, 'publish']);
        Route::put('{id}/unpublish', [DiaryController::class, 'unpublish']);
    });

    /**
     * Shop master
     *
     * @see \App\Http\Controllers\Admin\ShopController
     */
    Route::prefix('shop')->name('shop.')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('{id}', [ShopController::class, 'show'])->name('detail');
        Route::put('{id}', [ShopController::class, 'update']);
    });

    /**
     * Option master
     *
     * @see \App\Http\Controllers\Admin\OptionController
     */
    Route::prefix('option')->name('option.')->group(function () {
        Route::get('/', [OptionController::class, 'index'])->name('index');
        Route::get('add', [OptionController::class, 'create'])->name('create');
        Route::post('add', [OptionController::class, 'store']);
        Route::get('{id}', [OptionController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [OptionController::class, 'update']);
        Route::delete('{id}', [OptionController::class, 'destroy']);
    });

    /**
     * Personality master
     *
     * @see \App\Http\Controllers\Admin\PersonalityController
     */
    Route::prefix('personality')->name('personality.')->group(function () {
        Route::get('/', [PersonalityController::class, 'index'])->name('index');
        Route::get('add', [PersonalityController::class, 'create'])->name('create');
        Route::post('add', [PersonalityController::class, 'store']);
        Route::get('{id}', [PersonalityController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [PersonalityController::class, 'update']);
        Route::delete('{id}', [PersonalityController::class, 'destroy']);
    });

    /**
     * Style master
     *
     * @see \App\Http\Controllers\Admin\StyleController
     */
    Route::prefix('style')->name('style.')->group(function () {
        Route::get('/', [StyleController::class, 'index'])->name('index');
        Route::get('add', [StyleController::class, 'create'])->name('create');
        Route::post('add', [StyleController::class, 'store']);
        Route::get('{id}', [StyleController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [StyleController::class, 'update']);
        Route::delete('{id}', [StyleController::class, 'destroy']);
    });
   /**
     * Raniking
     *
     * @see \App\Http\Controllers\Admin\RankingController
     */
    Route::prefix('ranking')->name('ranking.')->group(function () {
        Route::get('/', [RankingController::class, 'index'])->name('index');
        Route::get('{id}', [RankingController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [RankingController::class, 'update']);
    });

    /**
     * Q&A
     *
     * @see \App\Http\Controllers\Admin\QaController
     */
    Route::prefix('qa')->name('qa.')->group(function () {
        Route::get('/', [QaController::class, 'index'])->name('index');
        Route::get('add', [QaController::class, 'create'])->name('create');
        Route::post('add', [QaController::class, 'store']);
        Route::get('{id}', [QaController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [QaController::class, 'update']);
        Route::delete('{id}', [QaController::class, 'destroy']);
    });
    /**
     * Event
     *
     * @see \App\Http\Controllers\Admin\EventController
     */
    Route::prefix('event')->name('event.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('add', [EventController::class, 'create'])->name('create');
        Route::post('add', [EventController::class, 'store']);
        Route::get('{id}', [EventController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [EventController::class, 'update']);
        Route::delete('{id}', [EventController::class, 'destroy']);
    });
        /**
     * Banner master
     *
     * @see \App\Http\Controllers\Admin\BannerController
     */
    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('add', [BannerController::class, 'create'])->name('create');
        Route::post('add', [BannerController::class, 'store']);
        Route::get('{id}', [BannerController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [BannerController::class, 'update']);
        Route::delete('{id}', [BannerController::class, 'destroy']);
    });


    /**
     * News
     *
     * @see \App\Http\Controllers\Admin\EventController
     */
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('add', [NewsController::class, 'create'])->name('create');
        Route::post('add', [NewsController::class, 'store']);
        Route::get('{id}', [NewsController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [NewsController::class, 'update']);
        Route::delete('{id}', [NewsController::class, 'destroy']);
    });
    Route::prefix('schedule')->name('schedule.')->group(function () {
        Route::get('/', [ScheduleController::class, 'index'])->name('index');
        Route::post('/', [ScheduleController::class, 'showCastsSchedule']);
        Route::post('/updateattendance', [ScheduleController::class, 'updateAttendanceTime']);
        Route::post('/updatereservation', [ScheduleController::class, 'updateReservationTime']);
        Route::post('/deletereservation', [ScheduleController::class, 'deleteReservationTime']);
    });
    Route::prefix('work')->name('work.')->group(function () {
        Route::get('/', [WorkController::class, 'index'])->name('index');
    });

    Route::prefix('fee')->name('fee.')->group(function () {
        Route::get('/', [FeeController::class, 'index'])->name('index');
        Route::get('{id}', [FeeController::class, 'show'])->where('id', '[0-9]+')->name('detail');
        Route::put('{id}', [FeeController::class, 'update']);
    });

        /**
     * Video
     *
     * @see \App\Http\Controllers\Admin\VideoController
     */
    Route::prefix('video')->name('video.')->group(function () {
        Route::get('/', [VideoController::class, 'index'])->name('index');
        Route::get('{id}', [VideoController::class, 'show'])->name('detail');
        Route::put('{id}/publish', [VideoController::class, 'publish']);
        Route::put('{id}/unpublish', [VideoController::class, 'unpublish']);
    });
});
