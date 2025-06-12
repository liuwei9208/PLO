<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Pickup;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PickupController extends Controller
{
    /**
     * Display a listing of the pickup.
     */
    public function index(Request $request): View
    {
        return view('admin.pickup.index', [
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank', 'asc')->get(),
        ]);
    }

    /**
     * Display the specified pickup.
     */
    public function show(Request $request, string $id): View
    {
        return view('admin.pickup.detail', [
            'shop' => Shop::findOrFail($id),
            'casts' => Cast::where('shop_id', $id)->get(),
            'pickups' => Pickup::where('shop_id', $id)->get(),
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        Pickup::where('shop_id', $id)->delete();

        $pickups = $request->input('pickup', []);
        foreach ($pickups as $cast_id) {
            if (is_numeric($cast_id)) {
                Pickup::create([
                    'shop_id' => $id,
                    'cast_id' => $cast_id,
                ]);
            }
        }

        return redirect('/admin/pickup/' . $id);
    }
}
