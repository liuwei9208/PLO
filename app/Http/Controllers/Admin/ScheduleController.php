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
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Reservation;

class ScheduleController extends Controller
{
    const DEFAULT_LIMIT = 30;
    public function index(Request $request): View
    {
        $query = Cast::where('is_public', true);

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);
        $casts = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        $day = $request->query('day') ? (int) $request->query('day') : Carbon::today()->toDateString();

        $attendances = Attendance::where('is_public', true)
        ->whereRaw('DATE(start_datetime) <= ?', [$day])
        ->whereRaw('DATE(end_datetime) >= ?', [$day])
        ->get();

        $reservations = Reservation::whereIn('attendance_id', $attendances->pluck('id'))
        ->get();
        // dd(compact('casts', 'attendances', 'reservations'));
        return view('admin.schedule.index', compact('casts', 'attendances', 'reservations', 'page', 'limit', 'skip', 'total', 'pages'));
    }
}