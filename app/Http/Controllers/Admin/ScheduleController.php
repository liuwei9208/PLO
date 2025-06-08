<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Option;
use App\Models\Personality;
use App\Models\Shop;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Question;
use App\Models\Qa;

class ScheduleController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.schedule.index');
    }
}