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
use App\Models\Question;
use App\Models\Qa;
use Illuminate\Support\Facades\Auth;
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
            $query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
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
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Display a listing of the cast.
     */
    public function sortindex(Request $request): View
    {
        $token = Auth::user()->createToken('schedule')->plainTextToken;
        return view('admin.cast.sortindex', [
            'token' => $token,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank')->get(),
        ]);
    }
    /**
     * Create a cast.
     */
    public function create(Request $request): View
    {
        $questions = Question::where('is_public', true)->orderBy('id', 'asc')->get();
        return view('admin.cast.create', [
            'shop' => $request->user()->shops->first() ?? null,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
            'options' => Option::all(),
            'personalities' => Personality::all(),
            'styles' => Style::all(),
            'questions' => $questions,
        ]);
    }

    /**
     * Store a cast.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->filled('redirect')) {
            return redirect($request->input('redirect'))->with('success', 'キャスト情報を更新しました');
        }
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
        $file6 = $request->file('file_6');
        $file7 = $request->file('file_7');
        $file8 = $request->file('file_8');
        $file9 = $request->file('file_9');
        $file10 = $request->file('file_10');
        $cast->gallery_1 = $file1 ? $file1->store($file_path, 'public') : null;
        $cast->gallery_2 = $file2 ? $file2->store($file_path, 'public') : null;
        $cast->gallery_3 = $file3 ? $file3->store($file_path, 'public') : null;
        $cast->gallery_4 = $file4 ? $file4->store($file_path, 'public') : null;
        $cast->gallery_5 = $file5 ? $file5->store($file_path, 'public') : null;
        $cast->gallery_6 = $file6 ? $file6->store($file_path, 'public') : null;
        $cast->gallery_7 = $file7 ? $file7->store($file_path, 'public') : null;
        $cast->gallery_8 = $file8 ? $file8->store($file_path, 'public') : null;
        $cast->gallery_9 = $file9 ? $file9->store($file_path, 'public') : null;
        $cast->gallery_10 = $file10 ? $file10->store($file_path, 'public') : null;
        $cast->save();

        $questions = $request->input('question', []);

        foreach ($questions as $index => $question_id) {
            if (is_numeric($question_id)) {
                Qa::create([
                    'cast_id' => $cast->id,
                    'question_id' => $question_id,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }else if ( $question_id === null ) {
                Qa::create([
                    'cast_id' => $cast->id,
                    'question_id' => null,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }
        }

        return redirect('/admin/cast');
    }

    /**
     * Display the specified cast.
     */
    public function show(Request $request, string $id): View
    {
        $qas = Qa::where('cast_id', $id)->with('question')->orderBy('rank', 'asc')->get();
        // dd(Cast::find($id));
        return view('admin.cast.detail', [
            'cast' => Cast::find($id),
            'shop' => $request->user()->shops->first() ?? null,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
            'options' => Option::all(),
            'personalities' => Personality::all(),
            'styles' => Style::all(),
            'questions' => Question::where('is_public', true)->orderBy('id', 'asc')->get(),
            'qas' => $qas,
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        if ($request->filled('redirect')) {
            return redirect($request->input('redirect'))->with('success', 'キャスト情報を更新しました');
        }
        $validated = $request->validate([
            'cast_name' => 'required',
            'shop_id' => 'required',
        ]);

        $questions = $request->input('question', []);
        // 同じcast_idがないかチェック（nullは除外）
        $nonNullQuestions = array_filter($questions, function($value) {
            return $value !== null && $value !== '';
        });
        $uniqueQuestions = array_unique($nonNullQuestions);
        if (count($uniqueQuestions) !== count($nonNullQuestions)) {
            return redirect()->back()->withInput()->withErrors(['error' => '同じ質問は複数選択できません。']);
        }
        $qas = Qa::where('cast_id', $id)->delete();
        foreach ($questions as $index => $question_id) {
            if (is_numeric($question_id)) {
                Qa::create([
                    'cast_id' => $id,
                    'question_id' => $question_id,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }else if ( $question_id === null ) {
                Qa::create([
                    'cast_id' => $id,
                    'question_id' => null,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }
        }

        $file_path = "gallery/{$id}";
        $file1 = $request->file('file_1');
        $file2 = $request->file('file_2');
        $file3 = $request->file('file_3');
        $file4 = $request->file('file_4');
        $file5 = $request->file('file_5');
        $file6 = $request->file('file_6');
        $file7 = $request->file('file_7');
        $file8 = $request->file('file_8');
        $file9 = $request->file('file_9');
        $file10 = $request->file('file_10');

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
        $cast->gallery_6 = $file6 ? $file6->store($file_path, 'public') : $request->path_6;
        $cast->gallery_7 = $file7 ? $file7->store($file_path, 'public') : $request->path_7;
        $cast->gallery_8 = $file8 ? $file8->store($file_path, 'public') : $request->path_8;
        $cast->gallery_9 = $file9 ? $file9->store($file_path, 'public') : $request->path_9;
        $cast->gallery_10 = $file10 ? $file10->store($file_path, 'public') : $request->path_10;
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
