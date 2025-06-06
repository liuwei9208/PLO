<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\Shop;

class EventController extends Controller
{
    const DEFAULT_LIMIT = 30;
    /**
     * Display a listing of the event.
     */
    public function index(Request $request): View
    {
      $query = Event::query();
      if ( $request->has('shop') && $request->query('shop') !== null) {
        $shop = $request->query('shop');
        $query -> whereHas('shop', function ($query) use ($shop) {
            $query->where('slug', $shop);
        });

      }

      if ($request->has('public') && $request->query('public') !== null) {
        $query->where('is_public', $request->query('public') ? true : false);
      }
      if ( $request->has('published_at') && $request->query('published_at') !== null) {
        $query->where('published_at', $request->query('published_at'));
      }

      $total = $query->count();

      $page = $request->query('page') ? (int) $request->query('page') : 1;
      $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
      $skip = ($page - 1) * $limit;
      $pages = ceil($total / $limit);

      return view('admin.event.index', [
          'events' => $query->orderBy('id', 'asc')->get(),
          'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('id', 'asc')->get(),
          'page' => $page,
          'limit' => $limit,
          'skip' => $skip,
          'total' => $total,
          'pages' => $pages,
      ]);
    }

    /**
     * Display the specified event.
     */
    public function show(Request $request, string $id): View
    {
      $event = Event::findOrFail($id);
      // dd($event);
        return view('admin.event.detail', [
            'event' => Event::findOrFail($id),
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Update the specified event.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
      // $validated = $request->validate([
      //   'cast_name' => 'required',
      //   'shop_id' => 'required',
      // ]);

      $file_path = "event/{$id}";
      $file1 = $request->file('file_1');
      if ( ($file1 == null && $request->path_1 == null) ) {
        return redirect()->back();
      }

      $event = Event::find($id);
      $event->title = $request->title;
      $event->shop_id = $request->shop_id;
      $event->published_at = $request->published_at;
      $event->is_public = $request->is_public ? true : false;
      $event->thumbnail = $file1 ? $file1->store($file_path, 'public') : $request->path_1;

      $event->save();


      return redirect('/admin/event/' . $event->id);
    }
    /**
     * Create a event.
     */
    public function create(Request $request): View
    {
        return view('admin.event.create', [
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('id', 'asc')->get(),
        ]);
    }
    /**
     * Store a event.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'shop_id' => 'required',
            'title' => 'required',
            'file_1' => 'required',
        ],['file_1.required' => '画像は必須です。','title.required' => 'タイトルは必須です。','shop_id.required' => '店舗は必須です。']);
        // dd($request->is_public ? true : false);
        $event = Event::Create([
            'title' => $request->title,
            'shop_id' => $request->shop_id,
            'published_at' => $request->published_at,
            'is_public' => $request->is_public ? true : false,
            'is_public' => 1,
        ]);
        $file_path = "event/{$event->id}";
        $file1 = $request->file('file_1');
        $event->thumbnail = $file1 ? $file1->store($file_path, 'public') : null;
        $event->save();

        return redirect('/admin/event')->with('success', 'イベントを作成しました。');
    }
    public function destroy(string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/admin/event')->with('success', 'イベントを削除しました。');
    }
}

?>