<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller{
  const DEFAULT_LIMIT = 30;

  public function index(Request $request): View{
    
    $query = Member::query();

    if ($request->has('nickname') && $request->query('nickname') !== null) {
        $name = '%' . $request->query('nickname') . '%';
        $query->where('name', 'like', $name);
    }

    if ($request->has('mail') && $request->query('mail') !== null) {
        $email = '%' . $request->query('mail') . '%';
        $query->where('email', 'like', $email);
    }

    if ($request->has('tel') && $request->query('tel') !== null) {
        $tel = '%' . $request->query('tel') . '%';
        $query->where('tel', 'like', $tel);
    }

    $total = $query->count();

    $page = $request->query('page') ? (int) $request->query('page') : 1;
    $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
    $skip = ($page - 1) * $limit;
    $pages = ceil($total / $limit);
    // dd($limit);
    $members = $query->selectRaw('id, name, subname, email, tel, oldid, DATE_FORMAT(birth, "%Y-%m-%d") as birth, pref_id, address, DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s") as created_at')
        ->skip($skip)
        ->take($limit)
        ->orderBy('created_at', 'desc')
        ->orderBy('id', 'desc')
        ->get();    

    return view('admin.member.index', [
        'members' => $members,
        'page' => $page,
        'limit' => $limit,
        'skip' => $skip,
        'total' => $total,
        'pages' => $pages,
    ]);

  }
  /*
   const enum pref:string {
    case "1" = "北海道";
    case "2" = "青森県";
    case "3" = "岩手県";
    case "4" = "宮城県";
    case "5" = "秋田県";
    case "6" = "山形県";
    case "7" = "福島県";
    case "8" = "茨城県";
    case "9" = "栃木県";
    case "10" = "群馬県";
    case "11" = "埼玉県";
    case "12" = "千葉県";
    case "13" = "東京都";
    case "14" = "神奈川県";
    case "15" = "新潟県";
    case "16" = "富山県";
    case "17" = "石川県";
    case "18" = "福井県";
    case "19" = "山梨県";
    case "20" = "長野県";
    case "21" = "岐阜県";
    case "22" = "静岡県";
    case "23" = "愛知県";
    case "24" = "三重県";
    case "25" = "滋賀県";
    case "26" = "京都府";
    case "27" = "大阪府";
    case "28" = "兵庫県";
    case "29" = "奈良県";
    case "30" = "和歌山県";
    case "31" = "鳥取県";
    case "32" = "島根県";
    case "33" = "岡山県";
    case "34" = "広島県";
    case "35" = "山口県";
    case "36" = "徳島県";
    case "37" = "香川県";
    case "38" = "愛媛県";
    case "39" = "高知県";
    case "40" = "福岡県";
    case "41" = "佐賀県";
    case "42" = "長崎県";
    case "43" = "熊本県";
    case "44" = "大分県";
    case "45" = "宮崎県";
    case "46" = "鹿児島県";
    case "47" = "沖縄県";
    case "48" = "その他";

  }
  */

}
//   const pref = [
//     {
//       value: "1",
//       text: "北海道"
// },
// {
//     value: "2",
//     text: "青森県"
// },
// {
//     value: "3",
//     text: "岩手県"
// },
// {
//     value: "4",
//     text: "宮城県"
// },
// {
//     value: "5",
//     text: "秋田県"
// },
// {
//     value: "6",
//     text: "山形県"
// },
// {
//     value: "7",
//     text: "福島県"
// },
// {
//     value: "8",
//     text: "茨城県"
// },
// {
//     value: "9",
//     text: "栃木県"
// },
// {
//     value: "10",
//     text: "群馬県"
// },
// {
//     value: "11",
//     text: "埼玉県"
// },
// {
//     value: "12",
//     text: "千葉県"
// },
// {
//     value: "13",
//     text: "東京都"
// },
// {
//     value: "14",
//     text: "神奈川県"
// },
// {
//     value: "15",
//     text: "新潟県"
// },
// {
//     value: "16",
//     text: "富山県"
// },
// {
//     value: "17",
//     text: "石川県"
// },
// {
//     value: "18",
//     text: "福井県"
// },
// {
//     value: "19",
//     text: "山梨県"
// },
// {
//     value: "20",
//     text: "長野県"
// },
// {
//     value: "21",
//     text: "岐阜県"
// },
// {
//     value: "22",
//     text: "静岡県"
// },
// {
//     value: "23",
//     text: "愛知県"
// },
// {
//     value: "24",
//     text: "三重県"
// },
// {
//     value: "25",
//     text: "滋賀県"
// },
// {
//     value: "26",
//     text: "京都府"
// },
// {
//     value: "27",
//     text: "大阪府"
// },
// {
//     value: "28",
//     text: "兵庫県"
// },
// {
//     value: "29",
//     text: "奈良県"
// },
// {
//     value: "30",
//     text: "和歌山県"
// },
// {
//     value: "31",
//     text: "鳥取県"
// },
// {
//     value: "32",
//     text: "島根県"
// },
// {
//     value: "33",
//     text: "岡山県"
// },
// {
//     value: "34",
//     text: "広島県"
// },
// {
//     value: "35",
//     text: "山口県"
// },
// {
//     value: "36",
//     text: "徳島県"
// },
// {
//     value: "37",
//     text: "香川県"
// },
// {
//     value: "38",
//     text: "愛媛県"
// },
// {
//     value: "39",
//     text: "高知県"
// },
// {
//     value: "40",
//     text: "福岡県"
// },
// {
//     value: "41",
//     text: "佐賀県"
// },
// {
//     value: "42",
//     text: "長崎県"
// },
// {
//     value: "43",
//     text: "熊本県"
// },
// {
//     value: "44",
//     text: "大分県"
// },
// {
//     value: "45",
//     text: "宮崎県"
// },
// {
//     value: "46",
//     text: "鹿児島県"
// },
// {
//     value: "47",
//     text: "沖縄県"
// },
// {
//     value: "48",
//     text: "その他"
// }
// ];


?>