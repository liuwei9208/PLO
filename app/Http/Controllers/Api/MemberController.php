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
use App\Models\Course;
use Illuminate\Support\Facades\DB;
class MemberController extends Controller
{
    public function update(Request $request): JsonResponse
    {
      // dd($request->all());
      Log::info($request->all());
      $price = is_numeric($request->input('price')) ? $request->input('price') : 0;
      $point_value = is_numeric($request->input('point')) ? $request->input('point') : 0;
      $point_use_value = is_numeric($request->input('point_use')) ? $request->input('point_use') : 0;
      $history = History::find($request->input('id'));
    //   $history->course_id = $request->input('course') ?? '';
    //   $history->cast_id = $request->input('cast_id') ?? '';
      $history->price = $price;
      $point = Point::where('history_id', $request->input('id'))->where('type', 3)->first();
      $point_use = Point::where('history_id', $request->input('id'))->where('type', 5)->first();
      Log::info($point);
      if ( $point ){
        Point::where('id',$point->id)->update(['point' => $point_value]);
      }else{
        Point::insert([
          'user_id' => $history->user_id,
          'history_id' => $request->input('id'),
          'office_id' => $history->office_id,
          'shop_id' => $history->shop_id,
          'type' => 3,
          'point' => $point_value,
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      }
      Log::info($point_use);
      if ($point_use){
        Point::where('id',$point_use->id)->update(['point' => $point_use_value]);
      }else{
        Point::insert([
          'user_id' => $history->user_id,
          'history_id' => $request->input('id'),
          'office_id' => $history->office_id,
          'shop_id' => $history->shop_id,
          'type' => 5,
          'point' => $point_use_value,
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      }
    //   Point::insert([
    //       'user_id' => $history->user_id,
    //       'history_id' => $request->input('id'),
    //       'office_id' => $history->office_id,
    //       'type' => 3,
    //       'point' => $point,
    //       'created_at' => now(),
    //       'updated_at' => now(),
    //     ]);
    //   Point::insert([
    //     'user_id' => $history->user_id,
    //     'history_id' => $request->input('id'),
    //     'office_id' => $history->office_id,
    //     'type' => 5,
    //     'point' => $point_use,
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //   ]);
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

    public function qrupdate(Request $request): JsonResponse
    {
      // dd($request->input('extension_name'));
      // $history = History::where('user_id', $request->input('member_id'))->max('created_at');
      // if (!$history) {
        $shop_manager = Auth::user();

        $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $shop_manager->id)->get();
        $shop_id = $shop_user[0]->shop_id;
        $history = new History();
        $history->user_id = $request->input('member_id');
        $history->name = '来店';
        $history->office_id = 1;
        $history->shop_id = $shop_id;
        $history->cast_id = $request->input('cast') ?: 'null';
        $history->course_id = $request->input('course') ?: 'null';
        $history->price = is_numeric($request->input('price')) ? $request->input('price') : 0;
        $history->extension_name = $request->input('extension_name') ?? '';
        $history->memo = $request->input('memo') ?? '';
        // $history->created_at = $history;
        $history->save();
        // dd($history);
      // }else{
      //   $history = History::where('user_id', $request->input('member_id'))->where('created_at', $history)->first();
      //   $history->course_name = $request->input('course') ?? '';
      //   $history->price = $request->input('price') ?? 0;
      //   $history->cast_id = $request->input('cast') ?? 0;
      //   $history->extension_name = $request->input('extension_name') ?? '';
      //   $history->memo = $request->input('memo') ?? '';
      //   $history->save();

      // }
      Point::insert([
        'user_id' => $history->user_id,
        'history_id' => $history->id,
        'office_id' => $history->office_id,
        'shop_id' => $shop_id,
        'type' => 3,
        'point' => is_numeric($request->input('point')) ? $request->input('point') : 0,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      Point::insert([
        'user_id' => $history->user_id,
        'history_id' => $history->id,
        'office_id' => $history->office_id,
        'shop_id' => $shop_id,
        'type' => 5,
        'point' => is_numeric($request->input('point_use')) ? $request->input('point_use') : 0,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      return response()->json([
        'message' => '更新しました'
      ]);
    }
    public function getValues(Request $request){
        $shop_id = $request->input('shop_id');
        $courses = Course::where('shop_id', $shop_id)->get();
        $casts = Cast::where('shop_id', $shop_id)->where('is_public', 1)->get();
        return response()->json([
          'courses' => $courses,
          'casts' => $casts,
        ]);
    }
}
