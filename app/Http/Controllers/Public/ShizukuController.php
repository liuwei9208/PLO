<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShizukuController extends Controller
{
    public function showHome(Request $request): View
    {
        return view('public.shop.shizuku.home');
    }
}
