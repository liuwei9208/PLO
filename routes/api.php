<?php

use App\Http\Controllers\Public\TouchVipDiaryController;
use App\Http\Controllers\Api\ScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MemberController;
// use App\Http\Controllers\Admin\ScheduleController as NormalSchedule;

Route::get('/diary/{cast_id}', [TouchVipDiaryController::class, 'get']);

Route::post('/casts-schedule', [ScheduleController::class, 'getCastsSchedule']);
Route::post('/casts-schedule-shop', [ScheduleController::class, 'getCastsScheduleShop']);
Route::post('/diary-detail', [ScheduleController::class, 'getDiaryDetail']);
// スケジュール関連のAPIルート
Route::middleware('auth:sanctum')->prefix('schedule')->group(function () {
    Route::post('/', [ScheduleController::class, 'showCastsSchedule']);
    Route::post('/updateattendance', [ScheduleController::class, 'updateAttendanceTime']);
    Route::post('/updatereservation', [ScheduleController::class, 'updateReservationTime']);
    Route::post('/deletereservation', [ScheduleController::class, 'deleteReservationTime']);
});

Route::middleware('auth:sanctum')->prefix('member')->group(function () {
    Route::post('/update', [MemberController::class, 'update']);
});
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
