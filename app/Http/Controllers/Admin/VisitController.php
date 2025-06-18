<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\HistoryResource;

class VisitController extends Controller{
    const DEFAULT_LIMIT = 30;
    public function index(Request $request): View{
    
    // $model = \App\Models\History::with([
    //   'member',
    //   'cast',
    //   'course',
    //   'shop',
    //   'point_come',
    //   'point_pay',
    //   'point_come_use',
    //   'point_pay_use',
    //   'couponuse.coupon'

    // ])->orderBy('created_at', 'desc');
  //
    $model = DB::table(env('MEMBER_DB_DATABASE').'.histories')
                ->leftJoin(env('MEMBER_DB_DATABASE').'.users', env('MEMBER_DB_DATABASE').'.histories.user_id', '=', env('MEMBER_DB_DATABASE').'.users.id')
                ->leftJoin(env('DB_DATABASE').'.casts', env('MEMBER_DB_DATABASE').'.histories.cast_id', '=', env('DB_DATABASE').'.casts.id')
                ->leftJoin(env('DB_DATABASE').'.shops', env('MEMBER_DB_DATABASE').'.histories.shop_id', '=', env('DB_DATABASE').'.shops.id')
                ->leftJoin(env('MEMBER_DB_DATABASE').'.courses', env('MEMBER_DB_DATABASE').'.histories.course_id', '=', env('MEMBER_DB_DATABASE').'.courses.id')
                ->leftJoin(env('MEMBER_DB_DATABASE').'.coupon_uses', env('MEMBER_DB_DATABASE').'.histories.id', '=', env('MEMBER_DB_DATABASE').'.coupon_uses.history_id')
                // // POINTS type=2
                // ->leftJoin(
                //     DB::raw('(
                //         SELECT history_id, point AS point_pay
                //         FROM ' . env('MEMBER_DB_DATABASE') . '.points
                //         WHERE type = 3
                //     ) AS pt2'),
                //     env('MEMBER_DB_DATABASE').'.histories.id', '=', 'pt2.history_id'
                // )

                // // POINTS type=3
                // ->leftJoin(
                //     DB::raw('(
                //         SELECT history_id, point AS point_use
                //         FROM ' . env('MEMBER_DB_DATABASE') . '.points
                //         WHERE type = 5
                //     ) AS pt3'),
                //     env('MEMBER_DB_DATABASE').'.histories.id', '=', 'pt3.history_id'
                // )                
                // // POINTS type=3
                // ->leftJoin(
                //     DB::raw('(
                //         SELECT history_id, point AS point_valid
                //         FROM ' . env('MEMBER_DB_DATABASE') . '.points
                //         WHERE confirm = 1
                //     ) AS pt4'),
                //     env('MEMBER_DB_DATABASE').'.histories.id', '=', 'pt4.history_id'
                // )                
                ->orderBy(env('MEMBER_DB_DATABASE').'.histories.created_at','desc');
    // dd($model->limit(100)->get());
    // $model->whereIn(env('MEMBER_DB_DATABASE').'.histories.name', ['"来店"', '"PT有効期限切れ"']);
    $member_db = env('MEMBER_DB_DATABASE');
    $model->where(function($query) {
        $query->orWhereRaw('`' . env('MEMBER_DB_DATABASE') . '`.`histories`.`name` = ?', ['来店']);
        $query->orWhereRaw('`' . env('MEMBER_DB_DATABASE') . '`.`histories`.`name` = ?', ['PT有効期限切れ']);
    });
    // $model->whereRaw('`' . env('MEMBER_DB_DATABASE') . '`.`histories`.`name` = ?', ['来店']);
    // $model->orWhereRaw('`' . env('MEMBER_DB_DATABASE') . '`.`histories`.`name` = ?', ['PT有効期限切れ']);
    // $model->where(env('MEMBER_DB_DATABASE').'.histories.name',"=" ,"PT有効期限切れ");

    if ( $request->has('shop') && $request->query('shop') !== null) {
        if ($request->query('shop') !== '') {
        $model->where(env('MEMBER_DB_DATABASE').'.histories.shop_id', $request->query('shop'));
        }
    }
    if ( $request->has('cast_name') && $request->query('cast_name') !== null) {
        if ($request->query('cast_name') !== '') {
            // dd($request->query('cast_name'));
            // $model->where(env('DB_DATABASE').'.casts.name', 'like', '%' . $request->query('cast_name') . '%');
            $namess = mb_convert_kana($request->query('cast_name'), 's');
            // $nameArray = explode(' ', $namess);
            // $nameArray = array_filter($nameArray, 'strlen');
            // $model->where(function($query) use ($nameArray) {
            //     foreach ($nameArray as $name) {
            //         $query->orWhere('casts.name', 'like', "%$name%");
            //     }
            // });
            // dd($namess);
            // $model->where(env('DB_DATABASE').'.casts.name', 'like', "%$namess%");
            $model->whereRaw('`' . env('DB_DATABASE') . '`.`casts`.`name` LIKE ?', ["%{$namess}%"]);
            // dd($model->get());
        }
    }
    if ( $request->has('created_at') && $request->query('created_at') !== null) {
        if ($request->query('created_at') !== '') {
            $model->whereDate(env('MEMBER_DB_DATABASE').'.histories.created_at', '=', $request->query('created_at'));
        }
    }
    // if ($request->input('cast')) {
    //     $model->where(function ($query) use ($request) {
    //         $query->whereHas('cast', function ($query) use ($request) {
    //             $query->where(env('MEMBER_DB_DATABASE').'.casts.name', 'like', '%' . $request->input('cast') . '%');
    //         });
    //         $query->orWhere(env('MEMBER_DB_DATABASE').'.histories.cast_name', 'like', '%' . $request->input('cast') . '%');
    //     });
    // }

    $total = $model->count();

    $page = $request->query('page') ? (int) $request->query('page') : 1;
    $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
    $skip = ($page - 1) * $limit;
    $pages = ceil($total / $limit);

    $models = $model->selectRaw('DATE_FORMAT('.env("MEMBER_DB_DATABASE").'.histories.created_at, "%Y-%m-%d %H:%i:%s") as created_at,
                            '.env("MEMBER_DB_DATABASE").'.users.name as user_name,
                            '.env("MEMBER_DB_DATABASE").'.histories.id as id,
                            '.env("MEMBER_DB_DATABASE").'.histories.shop_id as shop_id,
                            '.env("MEMBER_DB_DATABASE").'.users.id as user_id,
                            '.env("MEMBER_DB_DATABASE").'.histories.office_id as office_id,
                            '.env("MEMBER_DB_DATABASE").'.histories.name as name,
                            '.'`'.env("DB_DATABASE").'`.shops.name as shop_name,
                            '.'`'.env("DB_DATABASE").'`.casts.name as casts_name,
                            '.env("MEMBER_DB_DATABASE").'.histories.call_name as call_name,
                            '.env("MEMBER_DB_DATABASE").'.courses.name as course_name,
                            '.env("MEMBER_DB_DATABASE").'.histories.extension_name as extension_name,
                            '.env("MEMBER_DB_DATABASE").'.histories.price as price,
                            '.env("MEMBER_DB_DATABASE").'.users.comment as user_comment')

    ->skip($skip)
    ->take($limit)
    ->orderBy(env("MEMBER_DB_DATABASE").'.histories.created_at', 'desc')
    ->orderBy(env("MEMBER_DB_DATABASE").'.histories.id', 'desc')
    ->get();
    $datas = null;    
    if ($models) {
        $datas = collect($models)->map(function ($item) {
            $item->history_shop_count = \App\Models\History::where('user_id', $item->user_id)
            ->where('id', '<=', $item->id)
            ->where('shop_id', '=', $item->shop_id)
            ->where('name', '来店')
            ->count();
            $item->point_pay = \App\Models\Point::where('history_id', $item->id)
                ->where('type', 3)
                ->sum('point');
            $item->point_use = \App\Models\Point::where('history_id', $item->id)
                ->where('type', 5)
                ->sum('point');
            $item->point_valid = \App\Models\Point::where('user_id', $item->user_id)
                ->where('history_id', '<=', $item->id)
                ->whereIn('type', [3, 5])
                ->where('confirm', 1)
                ->sum('valid_point');
            $item->history_count = \App\Models\History::where('user_id', $item->user_id)
            ->where('id', '<=', $item->id)
            ->where('office_id', '=', $item->office_id)
            ->where('name', '来店')
            ->count();
            $item->user_comment = (str_replace(["\\r\\n"], "\n", $item->user_comment));
            return $item;
            // dd($item);
        });
        
        // $models = HistoryResource::collection($data)
            // ->toArray(request());
    }
    // dd($datas);
    return view('admin.visit.index', [
        'datas' => $datas,
        'page' => $page,
        'limit' => $limit,
        'skip' => $skip,
        'total' => $total,
        'pages' => $pages,
        'shops' => \App\Models\Shop::whereNot('slug','touchvip')->whereNot('slug','headquarter')->get(),
    ]);
  }

}