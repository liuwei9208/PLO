<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Ranking;
use App\Models\Shop;
use App\Models\Qa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Termwind\Components\Raw;

class QaController extends Controller
{
    public function index(Request $request): View
    {
        $questions = Qa::orderBy('id', 'asc')->get();
        return view('admin.qa.index', [
            'questions' => $questions,
        ]);
    }

        /**
     * Create a question.
     */
    public function create(): View
    {
        return view('admin.qa.create');
    }

    /**
     * Store a question.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required',
        ],['question.required' => '質問を必須です。']);

        $question = Qa::Create([
            'question' => request('question'),
            'is_public' => $request->is_public ? true : false,
        ]);

        return redirect('/admin/qa');
    }

    public function show(Request $request, string $id): View
    {
        return view('admin.ranking.detail', [
            'shop' => Shop::findOrFail($id),
            'casts' => Cast::where('shop_id', $id)->where('is_public', 1)->get(),
            'rankings' => Ranking::where('shop_id', $id)->get(),
        ]);
    }

    /**
     * Update the specified ranking.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $rankings = $request->input('rank', []);

        // 同じcast_idがないかチェック（nullは除外）
        $nonNullRankings = array_filter($rankings, function($value) {
            return $value !== null && $value !== '';
        });
        $uniqueRankings = array_unique($nonNullRankings);
        $duplicateRankings = array_diff_assoc($nonNullRankings, $uniqueRankings);
        if (count($uniqueRankings) !== count($nonNullRankings)) {
            $duplicateCastIDs = array_unique($duplicateRankings);
            $duplicateCastNames = array_map(function($value) {
                return Cast::find($value)->name;
            }, $duplicateCastIDs);
            return redirect()->back()->withInput()->withErrors(['error' => '同じキャストは複数選択できません。キャスト名: ' . implode(', ', $duplicateCastNames)]);
        }

        Ranking::where('shop_id', $id)->delete();

        foreach ($rankings as $index => $cast_id) {
            if (is_numeric($cast_id)) {
                Ranking::create([
                    'shop_id' => $id,
                    'cast_id' => $cast_id,
                    'rank' => $index + 1,
                ]);
            }else if ( $cast_id === null ) {
                Ranking::create([
                    'shop_id' => $id,
                    'cast_id' => null,
                    'rank' => $index + 1,
                ]);
            }
        }

        return redirect('/admin/ranking/' . $id)->with('success', 'ランキングを更新しました。');
    }
}