<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extend;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ExtendController extends Controller
{
    const DEFAULT_LIMIT = 30;

    /**
     * Display a listing of the diary.
     */
    public function index(Request $request): View
    {
        $query = Extend::query();

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $extends = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')->get();

        return view('admin.extend.index', [
            'extends' => $extends,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

    public function create(): View
    {
        return view('admin.extend.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'extend_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $extend = Extend::firstOrCreate([
            'extend' => request('extend_name'),
            'price' => request('price'),
            'description' => request('description'),
        ]);

        return redirect('/admin/extend/');
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $extend = Extend::find($id);

        return view('admin.extend.detail', [
            'extend' => $extend,
        ]);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'extend_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $extend = Extend::find($id);
        $extend->extend = request('extend_name');
        $extend->price = request('price');
        $extend->description = request('description');
        $extend->save();

        return redirect('/admin/extend');
    }
}
