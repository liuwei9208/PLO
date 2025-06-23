<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use App\Models\Member;
use App\Models\Point;
use App\Models\History;


class MemberController extends Controller
{
    public function update(Request $request): JsonResponse
    {
      // dd($request->all());
      Log::info($request->all());
      $history = History::find($request->input('id'));
      $history->course_name = $request->input('course_name') ?? '';
      $history->price = $request->input('price') ?? 0;
      $point = Point::where('history_id', $request->input('id'))->where('type', 3)->first();
      Point::insert([
          'user_id' => $history->user_id,
          'history_id' => $request->input('id'),
          'office_id' => $history->office_id,
          'type' => 3,
          'point' => $request->input('point') ?? 0,
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      Point::insert([
        'user_id' => $history->user_id,
        'history_id' => $request->input('id'),
        'office_id' => $history->office_id,
        'type' => 5,
        'point' => $request->input('point_use') ?? 0,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      // $point->point = $request->input('point') ?? 0;
      // $point->point_use = $request->input('point_use') ?? 0;
      // $point->save();
      $history->save();
      // $point = Point::where('history_id', $request->input('id'))->where('type', 3)->update([
      //   'point' => $request->input('point') ?? 0
      // ]);
      // $point = Point::where('history_id', $request->input('id'))->where('type', 5)->update([
      //   'point' => $request->input('point_use') ?? 0
      // ]);

      return response()->json([
        'message' => '更新しました'
      ]);

    }
}
