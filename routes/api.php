<?php

use App\Http\Controllers\Public\TouchVipDiaryController;
use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/diary/{cast_id}', [TouchVipDiaryController::class, 'get']);

// スケジュール関連のAPIルート
Route::prefix('schedule')->group(function () {
    Route::post('/', [ScheduleController::class, 'showCastsSchedule']);
    Route::post('/updateattendance', [ScheduleController::class, 'updateAttendanceTime']);
    Route::post('/updatereservation', [ScheduleController::class, 'updateReservationTime']);
    Route::post('/deletereservation', [ScheduleController::class, 'deleteReservationTime']);
});
