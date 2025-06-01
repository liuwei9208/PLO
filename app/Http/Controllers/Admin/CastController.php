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

class CastController extends Controller
{
    const DEFAULT_LIMIT = 30;

    /**
     * Display a listing of the cast.
     */
    public function index(Request $request): View
    {
        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $shop_id = $request->user()->shops->first()->id;
            $query = Cast::where('shop_id', $shop_id);
        } else {
            $query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id);
        }

        if ($request->has('cast') && $request->query('cast') !== null) {
            $cast = '%' . $request->query('cast') . '%';
            $query->where('name', 'like', $cast);
        }

        if ($request->has('shop') && $request->query('shop') !== null) {
            $shop = $request->query('shop');
            $query->whereHas('shop', function ($query) use ($shop) {
                $query->where('slug', $shop);
            });
        }

        if ($request->has('public') && $request->query('public') !== null) {
            $query->where('is_public', $request->query('public') ? true : false);
        }

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

        return view('admin.cast.index', [
            'casts' => $casts,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Create a cast.
     */
    public function create(Request $request): View
    {
        return view('admin.cast.create', [
            'shop' => $request->user()->shops->first() ?? null,
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('id', 'asc')->get(),
            'options' => Option::all(),
            'personalities' => Personality::all(),
            'styles' => Style::all(),
        ]);
    }

    /**
     * Store a cast.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'cast_name' => 'required',
            'shop_id' => 'required',
        ]);

        $cast = Cast::firstOrCreate([
            'name' => $request->cast_name,
            'shop_id' => $request->shop_id,
            'joined_at' => $request->joined_at,
            'age' => $request->age,
            'height' => $request->height,
            'bra_size' => $request->bra_size,
            'bust' => $request->bust,
            'waist' => $request->waist,
            'hip' => $request->hip,
            'appeal_point' => $request->appeal_point,
            'manager_comment' => $request->manager_comment,
            'diary_email_from' => $request->diary_email_from,
            'diary_email_to' => $request->diary_email_to,
            'is_public' => $request->is_public ? true : false,
            'memo' => $request->memo,
        ]);

        $cast->options()->sync($request->options);
        $cast->personalities()->sync($request->personalities);
        $cast->styles()->sync($request->styles);

        $file_path = "gallery/{$cast->id}";
        $file1 = $request->file('file_1');
        $file2 = $request->file('file_2');
        $file3 = $request->file('file_3');
        $file4 = $request->file('file_4');
        $file5 = $request->file('file_5');
        $cast->gallery_1 = $file1 ? $file1->store($file_path, 'public') : null;
        $cast->gallery_2 = $file2 ? $file2->store($file_path, 'public') : null;
        $cast->gallery_3 = $file3 ? $file3->store($file_path, 'public') : null;
        $cast->gallery_4 = $file4 ? $file4->store($file_path, 'public') : null;
        $cast->gallery_5 = $file5 ? $file5->store($file_path, 'public') : null;
        $cast->save();

        return redirect('/admin/cast');
    }

    /**
     * Display the specified cast.
     */
    public function show(Request $request, string $id): View
    {
        return view('admin.cast.detail', [
            'cast' => Cast::find($id),
            'shop' => $request->user()->shops->first() ?? null,
            'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('id', 'asc')->get(),
            'options' => Option::all(),
            'personalities' => Personality::all(),
            'styles' => Style::all(),
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'cast_name' => 'required',
            'shop_id' => 'required',
        ]);

        $file_path = "gallery/{$id}";
        $file1 = $request->file('file_1');
        $file2 = $request->file('file_2');
        $file3 = $request->file('file_3');
        $file4 = $request->file('file_4');
        $file5 = $request->file('file_5');

        $cast = Cast::find($id);
        $cast->name = $request->cast_name;
        $cast->shop_id = $request->shop_id;
        $cast->joined_at = $request->joined_at;
        $cast->age = $request->age;
        $cast->height = $request->height;
        $cast->bra_size = $request->bra_size;
        $cast->bust = $request->bust;
        $cast->waist = $request->waist;
        $cast->hip = $request->hip;
        $cast->appeal_point = $request->appeal_point;
        $cast->manager_comment = $request->manager_comment;
        $cast->diary_email_from = $request->diary_email_from;
        $cast->diary_email_to = $request->diary_email_to;
        $cast->gallery_1 = $file1 ? $file1->store($file_path, 'public') : $request->path_1;
        $cast->gallery_2 = $file2 ? $file2->store($file_path, 'public') : $request->path_2;
        $cast->gallery_3 = $file3 ? $file3->store($file_path, 'public') : $request->path_3;
        $cast->gallery_4 = $file4 ? $file4->store($file_path, 'public') : $request->path_4;
        $cast->gallery_5 = $file5 ? $file5->store($file_path, 'public') : $request->path_5;
        $cast->is_public = $request->is_public ? true : false;
        $cast->memo = $request->memo;
        $cast->save();

        $cast->options()->sync($request->options);
        $cast->personalities()->sync($request->personalities);
        $cast->styles()->sync($request->styles);

        return redirect('/admin/cast/' . $cast->id);
    }

    /**
     * Destroy the specified cast.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cast = Cast::find($id);
        $cast->delete();

        return redirect('admin/cast');
    }
}
