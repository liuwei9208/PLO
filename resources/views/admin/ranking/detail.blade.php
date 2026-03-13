<x-admin-layout>
    <div class="p-4 mx-auto max-w-full md:p-6">
        <div x-data="{ pageName: `ランキングを編集` }">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
            </div>
        </div>
        @if ($errors->has('error'))
            <div class="alert alert-danger"
                style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #f5c2c7; border-radius: 0.375rem; color: #842029; background-color: #f8d7da;">
                {{ $errors->first('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success"
                style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #badbcc; border-radius: 0.375rem; color: #0f5132; background-color: #d1e7dd;">
                {{ session('success') }}
            </div>
        @endif
        @role('admin')
            <form action="{{ url('/admin/ranking') }}" method="GET" id="search_form"
                class="flex align-center justify-between mb-2 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex p-5 sm:p-6 dark:border-gray-800">
                    <div class="mr-2">
                        <div class="flex items-center gap-4 ">
                            <label for="search_form_shop" class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                店舗
                            </label>
                            <div class="relative z-20 bg-transparent">
                                <select name="shop" id="search_form_shop"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                    @foreach ($shops as $shop_tmp)
                                        <option value="{{ $shop_tmp->slug }}"
                                            class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                                            @selected(request()->shop ? $shop_tmp->slug === request()->shop : $shop->slug === $shop_tmp->slug)>
                                            {{ $shop_tmp->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span
                                    class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endrole
        <form method="post" action="{{ url('/admin/ranking/' . $shop->id) }}">
            @method('PUT')
            @csrf
            @for ($position = 1; $position <= 5; $position++)
                @php
                    $selectedRankId = ($rankByPosition[$position] ?? null)?->rank_id ?? '';
                @endphp
                <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="p-4 sm:p-6">
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-400 mb-2 block">
                            カテゴリ {{ $position }}
                        </label>
                        <div class="relative z-20 w-full max-w-[380px] bg-transparent">
                            <select name="shop_rank_category[{{ $position }}]" id="shop_rank_category_{{ $position }}"
                                class="shop-rank-category-select dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                <option value="" @selected($selectedRankId === '')>非表示</option>
                                @foreach ($ranks as $rank)
                                    <option value="{{ $rank->id }}" @selected($selectedRankId == $rank->id)>
                                        {{ $rank->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span
                                class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="p-4 sm:p-6 cast-ranks-container" data-position="{{ $position }}"
                        style="{{ $selectedRankId ? '' : 'display:none;' }}">
                        @foreach ($ranks as $rank)
                            <div class="rank-casts rank-casts-{{ $rank->id }}" data-rank-id="{{ $rank->id }}"
                                style="{{ (string)$selectedRankId === (string)$rank->id ? '' : 'display:none;' }}">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-400 mb-2 block">
                                    {{ $rank->name }}（1位〜7位）
                                </label>
                                @foreach (['1位', '2位', '3位', '4位', '5位', '6位', '7位'] as $index => $label)
                                    @php
                                        $currentRanking = $rankings->firstWhere(
                                            fn($r) => $r->rank_id == $rank->id && $r->rank == $index + 1,
                                        );
                                    @endphp
                                    <div class="flex items-center gap-4 mb-6">
                                        <label class="text-sm font-medium text-gray-700 dark:text-gray-400 w-12">
                                            {{ $label }}
                                        </label>
                                        <div class="relative z-20 w-full max-w-[380px] bg-transparent">
                                            <select name="rank[{{ $rank->id }}][{{ $index + 1 }}]"
                                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                                <option value="">選択してください</option>
                                                @foreach ($casts as $cast)
                                                    <option value="{{ $cast->id }}"
                                                        @selected($currentRanking && $currentRanking->cast_id == $cast->id)>
                                                        {{ $cast->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span
                                                class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396"
                                                        stroke="" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
            <div class="px-5 flex items-center justify-between">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                    保存する
                </button>
            </div>
        </form>
    </div>
    <script>
        document.querySelectorAll('.shop-rank-category-select').forEach(select => {
            select.addEventListener('change', function() {
                const position = this.id.replace('shop_rank_category_', '');
                const container = this.closest('.mb-6').querySelector('.cast-ranks-container');
                const rankId = this.value;
                if (container) {
                    container.style.display = rankId ? '' : 'none';
                    container.querySelectorAll('.rank-casts').forEach(div => {
                        div.style.display = div.dataset.rankId === rankId ? '' : 'none';
                    });
                }
            });
        });
    </script>
</x-admin-layout>
