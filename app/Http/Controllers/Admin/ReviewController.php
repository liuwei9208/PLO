<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    const DEFAULT_LIMIT = 30;

    /**
     * Display a listing of the diary.
     */
    public function index(Request $request): View
    {
        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $shop_id = $request->user()->shops->first()->id;
            $query = Review::query()->whereHas('cast', function ($query) use ($shop_id) {
                $query->whereHas('shop', function ($query) use ($shop_id) {
                    $query->where('id', $shop_id);
                });
            });
        } else {
            $query = Review::query();
        }
        
        if ($request->has('search') && $request->query('search')) {
            $search = '%' . $request->query('search') . '%';
            $query->whereHas('cast', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            })->whereHas('member', function ($query) use ($search) {
                $query->where('name', 'like', $search);
            });
        }

        if ($request->has('shop') && $request->query('shop')) {
            $shop = $request->query('shop');
            $query->whereHas('cast', function ($query) use ($shop) {
                $query->whereHas('shop', function ($query) use ($shop) {
                    $query->where('slug', $shop);
                });
            });
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $reviews = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')->get();

        return view('admin.review.index', [
            'reviews' => $reviews,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
            'shops' => Shop::all(),
        ]);
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $review = Review::find($id);

        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $my_shop_id = $request->user()->shops->first()->id;
            if ($review->cast->shop->id !== $my_shop_id) {
                abort(403);
            }
        }

        return view('admin.review.detail', [
            'review' => $review,
        ]);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $review = Review::find($id);
        $review->is_public = $request->input('is_public');
        $review->manager_comment = $request->input('manager_comment');
        $review->save();

        return redirect('/admin/review');
    }

    /**
     * Delete the specified review.
     */
    public function delete(Request $request, string $id): RedirectResponse
    {
        $review = Review::find($id);
        $review->delete();

        return redirect('/admin/review');
    }
}
