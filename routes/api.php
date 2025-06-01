<?php

use App\Http\Controllers\Public\TouchVipDiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/diary/{cast_id}', [TouchVipDiaryController::class, 'get']);
