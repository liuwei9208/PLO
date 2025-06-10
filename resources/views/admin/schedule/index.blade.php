<x-admin-layout>
    <div class="schedule-container">
        <div class="schedule-date">
            {{-- 2025年06月08日(日)の出勤予定 --}}
        </div>
        <div class="schedule-navigation">
            <button class="prev-week-btn">先週</button>
            <div class="date-tabs">
                {{-- <div class="date-tab active">
                    06/08(日)
                    <div class="active-indicator"></div>
                </div>
                <div class="date-tab">06/09(月)</div>
                <div class="date-tab">06/10(火)</div>
                <div class="date-tab">06/11(水)</div>
                <div class="date-tab">06/12(木)</div>
                <div class="date-tab">06/13(金)</div>
                <div class="date-tab">06/14(土)</div> --}}
            </div>
            <button class="next-week-btn">翌週</button>
        </div>
    </div>
    <div class="schedule-content">
        <!-- キャスト　出勤予定 タイトル-->
        <div class="schedule-header">
            <div class="cast-column">キャスト</div>
            <div class="schedule-column">出勤予定</div>
        </div>
        @foreach ($casts as $cast)
        <!-- キャストセクション：各キャストの情報とスケジュールを管理する単位 -->
        <div class="schedule-cast-section">
            <!-- 上段：キャスト情報＋出勤予定エリア -->
            <div class="schedule-row">
                <!-- キャスト情報（上段） -->
                <div class="cast-info">
                    <img class="cast-image" src="{{ asset('storage/'.$cast->gallery_1) }}" alt="キャスト写真">
                    <div class="cast-name">{{$cast->name}}</div>
                </div>
                <!-- 出勤予定エリア（上段） -->
                <div class="schedule-area">
                    <!-- 出勤時間選択（時間軸の上） -->
                    <div class="time-selector">
                        <select class="start-time">
                            @for ($hour = 8; $hour <= 24; $hour++)
                                @for ($min = 0; $min < 60; $min += 30)
                                    @php
                                        if ($hour == 24 && $min == 30) {
                                            continue;
                                        }
                                        $timeStr = sprintf('%02d:%02d', $hour, $min);
                                    @endphp
                                    <option value="{{ $timeStr }}">{{ $timeStr }}</option>
                                @endfor
                            @endfor
                        </select>
                        <span class="time-separator">-</span>
                        <select class="end-time">
                            @for ($hour = 8; $hour <= 24; $hour++)
                                @for ($min = 0; $min < 60; $min += 30)
                                    @php
                                        if ($hour == 24 && $min == 30) {
                                            continue;
                                        }
                                        $timeStr = sprintf('%02d:%02d', $hour, $min);
                                    @endphp
                                    <option value="{{ $timeStr }}">{{ $timeStr }}</option>
                                @endfor
                            @endfor
                        </select>
                        <select class="visibility-status">
                            <option>公開</option>
                            <option>非公開</option>
                        </select>
                    </div>
                    <!-- 時間軸 -->
                    <div class="time-axis">
                        <div class="time-axis-spacer"></div>
                        <div class="time-axis-labels">
                            @for ($h = 8; $h <= 23; $h++)
                                <div class="time-label">
                                    {{$h}}時
                                </div>
                            @endfor
                        </div>
                    </div>
                    <!-- 時間グリッド -->
                    <div class="time-grid">
                        <div class="grid-spacer"></div>
                        <div class="grid-cells">
                            @for ($i = 0; $i < 32; $i++)
                                @php
                                    $hour = 8 + intdiv($i, 2);
                                    $minute = $i % 2 === 0 ? '00' : '30';
                                    $isHour = $i % 2 === 0;
                                    $border = $isHour ? '1px solid #ccc' : '2px solid #000';
                                @endphp
                                @if ($isHour)
                                    <div class="grid-cell half-hour-cell"></div>
                                @else
                                    <div class="grid-cell hour-cell"></div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <!-- 下段：予約情報＋出勤予定フォーム -->
            <div class="schedule-row">
                <!-- 予約情報（下段） -->
                <div class="reservation-info">
                    <div class="reservation-title">予約情報</div>
                    <div class="reservation-content">（ここに予約情報を表示）</div>
                </div>
                <!-- 出勤予定フォーム（下段） -->
                <div class="schedule-form-area">
                    <div class="schedule-forms">
                        <!-- 空の追加ボックス -->
                        <div class="add-form-btn">＋</div>
                        <div class="add-form-btn">＋</div>
                        <div class="add-form-btn">＋</div>
                        <div class="add-form-btn">＋</div>
                        <div class="add-form-btn">＋</div>
                        <div class="add-form-btn">＋</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <div class="mb-10 flex justify-center">
        <div class="flex align-center rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            @if ($page > 1)
            <a
                href="{{ route('admin.schedule.index', array_merge(request()->all(), ['page' => $page - 1])) }}"
                class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
            >
                <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
                </svg>
            </a>
            @else
            <span
                class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800"
            >
                <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
                </svg>
            </span>
            @endif
    
            @for ($i = 1; $i <= $pages; $i++)
            @if ($i === $page)
                <span
                class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white"
                >
                {{ $i }}
                </span>
            @else
                <a
                href="{{ route('admin.schedule.index', array_merge(request()->all(), ['page' => $i])) }}"
                class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
                >
                {{ $i }}
                </a>
            @endif
            @endfor
    
            @if ($page < $pages)
            <a
                href="{{ route('admin.schedule.index', array_merge(request()->all(), ['page' => $page + 1])) }}"
                class="flex items-center justify-center w-10 h-10 hover:bg-gray-100 dark:hover:bg-gray-800"
            >
                <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"></path>
                </svg>
            </a>
            @else
            <span
                class="flex items-center justify-center w-10 h-10"
            >
                <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"></path>
                </svg>
            </span>
            @endif
        </div>
    </div>
</x-admin-layout>
@once
    @vite(['resources/js/admin/schedule.js','resources/scss/admin/schedule.scss'])
@endonce