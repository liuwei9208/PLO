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
use App\Models\CourseGroup;
use App\Models\Course;
use App\Models\Extend;
use App\Models\Option;
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

        // There is no direct strtofloat in PHP, but you can convert a string to float using (float) or floatval().
        // Example:
        // $floatValue = (float) $stringValue;
        $course_id = $request->input('course') == '' ? null :  $request->input('course');
        $extend_id = $request->input('extend') == '' ? null :  $request->input('extend');
        $option1_id = $request->input('option1') == '' ? null :  $request->input('option1');
        $option2_id = $request->input('option2') == '' ? null :  $request->input('option2');
        $option3_id = $request->input('option3') == '' ? null :  $request->input('option3');
        $option4_id = $request->input('option4') == '' ? null :  $request->input('option4');
        $option5_id = $request->input('option5') == '' ? null :  $request->input('option5');
        $appointment_id = $request->input('appointmentID') == '' ? null :  $request->input('appointmentID');
        $appointment_type = $request->input('appointmentType') == '' ? null :  $request->input('appointmentType');
        Log::info($request->input('course'));
        Log::info($course_id);
        Log::info($request->input('option2'));
        Log::info($option2_id);
        $course_price = is_numeric($request->input('course_price')) ? floatval($request->input('course_price')) : 0;
        $extend_price = is_numeric($request->input('extend_price')) ? floatval($request->input('extend_price')) : 0;
        $option1_price = is_numeric($request->input('option1_price')) ? floatval($request->input('option1_price')) : 0;
        $option2_price = is_numeric($request->input('option2_price')) ? floatval($request->input('option2_price')) : 0;
        $option3_price = is_numeric($request->input('option3_price')) ? floatval($request->input('option3_price')) : 0;
        $option4_price = is_numeric($request->input('option4_price')) ? floatval($request->input('option4_price')) : 0;
        $option5_price = is_numeric($request->input('option5_price')) ? floatval($request->input('option5_price')) : 0;
        $appointment_price = is_numeric($request->input('appointmentPrice')) ? floatval($request->input('appointmentPrice')) : 0;

        $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $shop_manager->id)->get();
        $shop_id = $shop_user[0]->shop_id;
        $history = new History();
        $history->user_id = $request->input('member_id');
        $history->name = '来店';
        $history->office_id = 1;
        $history->shop_id = $shop_id;
        $history->cast_id = $request->input('cast') ?: null;
        $history->course_id = $course_id;
        $history->course_price = $course_price;
        $history->price_new = is_numeric($request->input('price')) ? floatval($request->input('price')) : 0;
        $history->extend_id = $extend_id;
        $history->extend_price = $extend_price;
        $history->option1_id = $option1_id;
        $history->option1_price = $option1_price;
        $history->option2_id = $option2_id;
        $history->option2_price = $option2_price;
        $history->option3_id = $option3_id;
        $history->option3_price = $option3_price;
        $history->option4_id = $option4_id;
        $history->option4_price = $option4_price;
        $history->option5_id = $option5_id;
        $history->option5_price = $option5_price;
        $history->memo = $request->input('memo') ?? '';
        $history->appoint_id = $appointment_id;
        $history->appoint_type = $appointment_type;
        $history->appoint_price = $appointment_price;
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
        $courses = CourseGroup::all();
        $casts = Cast::where('shop_id', $shop_id)->where('is_public', 1)->get();
        $options = Option::all();
        $extends = Extend::all();

        return response()->json([
          'courses' => $courses,
          'casts' => $casts,
          'options' => $options,
          'extends' => $extends,
        ]);
    }
}
