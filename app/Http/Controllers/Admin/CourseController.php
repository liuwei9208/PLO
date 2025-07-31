<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseGroup;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    const DEFAULT_LIMIT = 30;

    /**
     * Display a listing of the diary.
     */
    public function index(Request $request): View
    {
        $query = CourseGroup::query();

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $courses = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')->get();

        return view('admin.course.index', [
            'courses' => $courses,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
        ]);
    }

    public function create(): View
    {
        return view('admin.course.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'course_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $course = CourseGroup::firstOrCreate([
            'course' => request('course_name'),
            'price' => request('price'),
            'description' => request('description'),
        ]);

        return redirect('/admin/course/');
    }

    /**
     * Display the specified diary.
     */
    public function show(Request $request, string $id): View
    {
        $course = CourseGroup::find($id);

        return view('admin.course.detail', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'course_name' => 'required',
            'price' => 'required|numeric',
        ]);

        $course = CourseGroup::find($id);
        $course->course = request('course_name');
        $course->price = request('price');
        $course->description = request('description');
        $course->save();

        return redirect('/admin/course');
    }
}
