<x-admin-layout>
    <div class="schedule-container">
        <div class="schedule-date">
            2025年06月08日(日)の出勤予定
        </div>
        <div class="schedule-navigation">
            <button class="prev-week-btn">先週</button>
            <div class="date-tabs">
                <div class="date-tab active">
                    06/08(日)
                    <div class="active-indicator"></div>
                </div>
                <div class="date-tab">06/09(月)</div>
                <div class="date-tab">06/10(火)</div>
                <div class="date-tab">06/11(水)</div>
                <div class="date-tab">06/12(木)</div>
                <div class="date-tab">06/13(金)</div>
                <div class="date-tab">06/14(土)</div>
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
        <!-- 上段：キャスト情報＋出勤予定エリア -->
        <div class="schedule-row">
            <!-- キャスト情報（上段） -->
            <div class="cast-info">
                <img class="cast-image" src="https://randomuser.me/api/portraits/women/1.jpg" alt="キャスト写真">
                <div class="cast-name">山咲　花</div>
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
                    <div class="schedule-form active">
                        <button class="delete-form-btn">×</button>
                        <div class="form-time-selector">
                            <select class="form-start-time">
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
                            <span class="form-time-separator">～</span>
                            <select class="form-end-time">
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
                        </div>
                        <button class="register-btn">登録</button>
                    </div>
                    <!-- 追加の出勤予定フォーム例 -->
                    <div class="schedule-form registered">
                        <button class="delete-form-btn">×</button>
                        <div class="form-time-selector">
                            <select class="form-start-time">
                                <option>16:00</option>
                            </select>
                            <span class="form-time-separator">～</span>
                            <select class="form-end-time">
                                <option>16:30</option>
                            </select>
                        </div>
                        <button class="register-btn registered">登録済</button>
                    </div>
                    <!-- 空の追加ボックス -->
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                    <div class="add-form-btn">＋</div>
                </div>
            </div>
        </div>
        <div class="schedule-row">
            <!-- キャスト情報（上段） -->
            <div class="cast-info">
                <img class="cast-image" src="https://randomuser.me/api/portraits/women/1.jpg" alt="キャスト写真">
                <div class="cast-name">山咲　花</div>
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
                    <div class="schedule-form active">
                        <button class="delete-form-btn">×</button>
                        <div class="form-time-selector">
                            <select class="form-start-time">
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
                            <span class="form-time-separator">～</span>
                            <select class="form-end-time">
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
                        </div>
                        <button class="register-btn">登録</button>
                    </div>
                    <!-- 追加の出勤予定フォーム例 -->
                    <div class="schedule-form registered">
                        <button class="delete-form-btn">×</button>
                        <div class="form-time-selector">
                            <select class="form-start-time">
                                <option>16:00</option>
                            </select>
                            <span class="form-time-separator">～</span>
                            <select class="form-end-time">
                                <option>16:30</option>
                            </select>
                        </div>
                        <button class="register-btn registered">登録済</button>
                    </div>
                    <!-- 空の追加ボックス -->
                    <div class="add-form-btn">＋</div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
@once
    @vite(['resources/js/admin/schedule.js','resources/scss/admin/schedule.scss'])
@endonce