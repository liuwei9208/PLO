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
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
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
        $public = $request->input('public') ? (int) $request->input('public') : true;
        $attendances = Attendance::where('is_public', $public)
        ->whereRaw('DATE(start_datetime) <= ?', [$day])
        ->whereRaw('DATE(end_datetime) >= ?', [$day])
        ->get();

        $reservations = Reservation::whereIn('attendance_id', $attendances->pluck('id'))
        ->get();
        // dd(compact('casts', 'attendances', 'reservations'));
        return view('admin.schedule.index',[
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
            'casts' => $casts,
            'attendances' => $attendances,
            'reservations' => $reservations,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'pages' => $pages,
        ]);
    }
    public function showCastsSchedule(Request $request): JsonResponse
    {
        if ( !$request->expectsJson() ){
            abort(404);
        }
        // $date = $request->input('date');
        // $page = $request->input('page');
        // $limit = $request->input('limit');
        // $skip = $request->input('skip');
        // $pages = $request->input('pages');
        // $total = $request->input('total');
        // dd(compact('date', 'page', 'limit', 'skip', 'pages', 'total'));
        // dd($request);
        $query = Cast::where('is_public', true);
        if ( $request->input('castName') ){
            $query->where('name', 'like', '%' . $request->input('castName') . '%');
        }
        if ( $request->input('shop') ){
            $shop = $request->input('shop');
            if ( $shop != ""){
                $query->whereHas('shop', function ($query) use ($shop) {
                    $query->where('slug', $shop);
                });
    
            }
        }

        $total = $query->count();
        $page = $request->input('page') ? (int) $request->input('page') : 1;
        $limit = $request->input('limit') ? (int) $request->input('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);
        $casts = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        $date = $request->input('date') ? Carbon::parse($request->input('date'))->toDateString() : Carbon::today()->toDateString();
        // Log::info($request->input('date'));
        // Log::info($date);
        $attendances = Attendance::where('is_public', true)
        ->whereRaw('DATE(start_datetime) <= ?', [$date])
        ->whereRaw('DATE(end_datetime) >= ?', [$date])
        ->get();

        $reservations = Reservation::whereIn('attendance_id', $attendances->pluck('id'))
        ->get();

        return response()->json([
            'casts' => $casts,
            'attendances' => $attendances,
            'reservations' => $reservations,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'pages' => $pages,
            'total' => $total,
            'date' => $date,
            'status' => 'success',
        ]);
    }

    public function updateAttendanceTime(Request $request): JsonResponse
    {
        if ( !$request->expectsJson() ){
            abort(404);
        }
        Log::info($request->all());
        $attendance_id = $request->input('attendance_id');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
        $cast_id = $request->input('cast_id');
        $attendance_public = $request->input('attendance_public');

        $date = $request->input('date');
        $start_date = Carbon::createFromDate($date);
        $end_date = Carbon::createFromDate($date);
        $startTime_a = $start_date->setTimeFromTimeString($startTime);
        $endTime_b = $end_date->setTimeFromTimeString($endTime);
        Log::info($startTime_a);
        Log::info($endTime_b);
        if ($attendance_id == "" && $attendance_id == null){
            // $attendance = Attendance::where('cast_id', $cast_id)
            //     ->where('start_datetime >= ', $startTime_a->toDateString())
            //     ->where('end_datetime <= ', $endTime_b->toDateString())
            //     ->get();
            // if ($attendance->count() > 0){
            //     return response()->json(['status' => 'error', 'message' => 'すでに出勤時間が登録されています']);
            // }

            $attendance = new Attendance();
            $attendance->cast_id = $cast_id;
            $attendance->start_datetime = Carbon::parse($startTime_a);
            $attendance->end_datetime = Carbon::parse($endTime_b);
            $attendance->is_public = $attendance_public;
            $attendance->save();
        }else{
            $attendance = Attendance::find($attendance_id);
            $attendance->cast_id = $cast_id;
            $attendance->start_datetime = Carbon::parse($startTime_a);
            $attendance->end_datetime = Carbon::parse($endTime_b);
            $attendance->is_public = $attendance_public;
            $attendance->save();
        }
        return response()->json(['status' => 'success', 'attendance_id' => $attendance->id]);
    }
}