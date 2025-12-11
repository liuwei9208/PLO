<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\System;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;

class SystemController extends Controller
{
  
    const DEFAULT_LIMIT = 30;
    /**
     * Display a listing of the system.
     */
    public function index(Request $request): View
    {
        // $banners = Banner::where('is_public', true)->with('shop')->get();
        $systems = System::with('shop')->orderBy('id', 'asc')->get();
        // if ( $request->has('shop') && $request->query('shop') !== null) {
        //   $shop = $request->query('shop');
        //   $query -> whereHas('shop', function ($query) use ($shop) {
        //       $query->where('slug', $shop);
        //   });
  
        // }
  
        // if ($request->has('public') && $request->query('public') !== null) {
        //   $query->where('is_public', $request->query('public') ? true : false);
        // }
  
        // $total = $query->count();
  
        // $page = $request->query('page') ? (int) $request->query('page') : 1;
        // $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        // $skip = ($page - 1) * $limit;
        // $pages = ceil($total / $limit);
        // dd($systems[0]->shop);
        return view('admin.system.index', [
          'systems' => $systems,
          // 'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
          // 'page' => $page,
          // 'limit' => $limit,
          // 'skip' => $skip,
          // 'total' => $total,
          // 'pages' => $pages,
        ]);
    }

    /**
     * Create a banner.
     */
    // public function create(Request $request): View
    // {
    //     return view('admin.banner.create', [
    //       'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
    //     ]);
    // }

    /**
     * Store a banner.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'file_1' => 'required',
    //         'title' => 'required',
    //         'shop_id' => 'required',
    //     ],[
    //         'file_1.required' => __('message.thumbnail_required'),
    //         'title.required' => __('message.title_required'),
    //         'shop_id.required' => __('message.shop_id_required'),
    //     ]);

    //     $banner = Banner::Create([
    //         'is_public' => $request->is_public ? true : false,
    //         'link_url' => $request->link_url,
    //         'title' => $request->title,
    //         'shop_id' => $request->shop_id,
    //     ]);

    //     // dd($request);
    //     $file_path = "banner/{$banner->id}";
    //     $file1 = $request->file('file_1');
    //     $banner->thumbnail = $file1 ? $file1->store($file_path, 'public') : null;
    //     $banner->save();

    //     return redirect('/admin/banner')->with('success', __('message.admin_banner_create_success'));
    // }
    /**
     * Display the specified cast.
     */
    public function show(Request $request, string $id): View
    {
        return view('admin.system.detail', [
            'system' => System::with('shop')->findOrFail($id),
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request);
        // $validated = $request->validate([
        //     'path_1' => 'required',
        //     'path_2' => 'required',
        // ]);

        $file_path = "system/{$id}";

        $system = System::find($id);

        $file1 = $request->file('file_1');
        $file2 = $request->file('file_2');
      //   if ( ($file1 == null && $request->path_1 == null) ) {
      //     $system->header = $file1 ? $file1->store($file_path, 'public') : $request->path_1;
      //     // return redirect()->back()->with('error', __('message.admin_system_header_required'));
      //   }
      //   $file2 = $request->file('file_2');
      //   if ( ($file2 == null && $request->path_2 == null) ) {
      //     $system->play = $file2 ? $file2->store($file_path, 'public') : $request->path_2;
      //     // return redirect()->back()->with('error', __('message.admin_system_play_required'));
      // }

        $system->header = $file1 ? $file1->store($file_path, 'public') : $request->path_1 ?? null;
        $system->play = $file2 ? $file2->store($file_path, 'public') : $request->path_2 ?? null;
        $system->save();

        return redirect(route('admin.system.index'))->with('success', __('message.admin_system_update_success'));
    }

    /**
     * Destroy the specified cast.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     $banner = Banner::find($id);
    //     $banner->delete();

    //     return redirect(route('admin.banner.index'))->with('success', __('message.admin_banner_delete_success'));
    // }
}