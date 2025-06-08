<x-admin-layout>
    <div style="background: #f5f5f5; padding: 16px 0 0 0;">
        <div style="font-size: 18px; font-weight: bold; margin-bottom: 8px;">
            2025年06月08日(日)の出勤予定
        </div>
        <div style="display: flex; align-items: center; justify-content: flex-start;">
            <button style="background: #eee; border: none; color: #bbb; padding: 8px 16px; border-radius: 4px; margin-right: 8px; cursor: pointer; min-width: 70px;">先週</button>
            <div style="display: flex; flex: 1;">
                <div style="background: #e91e63; color: #fff; font-weight: bold; padding: 12px 0; border-radius: 4px 4px 0 0; margin-right: 4px; position: relative; flex: 1; text-align: center;">
                    06/08(日)
                    <div style="position: absolute; left: 50%; bottom: -8px; transform: translateX(-50%); width: 0; height: 0; border-left: 8px solid transparent; border-right: 8px solid transparent; border-top: 8px solid #e91e63;"></div>
                </div>
                <div style="background: #fff; color: #222; padding: 12px 0; border-radius: 4px 4px 0 0; margin-right: 4px; border-bottom: 2px solid #eee; flex: 1; text-align: center;">06/09(月)</div>
                <div style="background: #fff; color: #222; padding: 12px 0; border-radius: 4px 4px 0 0; margin-right: 4px; border-bottom: 2px solid #eee; flex: 1; text-align: center;">06/10(火)</div>
                <div style="background: #fff; color: #222; padding: 12px 0; border-radius: 4px 4px 0 0; margin-right: 4px; border-bottom: 2px solid #eee; flex: 1; text-align: center;">06/11(水)</div>
                <div style="background: #fff; color: #222; padding: 12px 0; border-radius: 4px 4px 0 0; margin-right: 4px; border-bottom: 2px solid #eee; flex: 1; text-align: center;">06/12(木)</div>
                <div style="background: #fff; color: #222; padding: 12px 0; border-radius: 4px 4px 0 0; margin-right: 4px; border-bottom: 2px solid #eee; flex: 1; text-align: center;">06/13(金)</div>
                <div style="background: #1976d2; color: #fff; font-weight: bold; padding: 12px 0; border-radius: 4px 4px 0 0; border-bottom: 2px solid #1976d2; flex: 1; text-align: center;">06/14(土)</div>
            </div>
            <button style="background: #eee; border: none; color: #222; padding: 8px 16px; border-radius: 4px; margin-left: 8px; cursor: pointer; min-width: 70px;">翌週</button>
        </div>
    </div>
    <div style="margin-top: 24px; background: #f8f8f8; border-radius: 8px; overflow: hidden; padding: 16px 0;">
        <!-- キャスト　出勤予定 タイトル-->
        <div style="display: flex; margin-bottom: 12px;">
            <div style="width: 160px; font-size: 18px; font-weight: bold; padding-left: 24px;">キャスト</div>
            <div style="flex: 1; font-size: 18px; font-weight: bold; padding-left: 24px;">出勤予定</div>
        </div>
        <!-- 上段：キャスト情報＋出勤予定エリア -->
        <div style="display: flex; align-items: stretch;">
            <!-- キャスト情報（上段） -->
            <div style="width: 160px; background: #fff; border-right: 1px solid #eee; text-align: center; padding: 16px 8px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="キャスト写真" style="width: 80px; height: 100px; object-fit: cover; border-radius: 8px; margin-bottom: 8px;">
                <div style="font-size: 16px; color: #333;">山咲　花</div>
            </div>
            <!-- 出勤予定エリア（上段） -->
            <div style="flex: 1; padding: 16px; background: #eaffea; display: flex; flex-direction: column; justify-content: flex-start;">
                <!-- 出勤時間選択（時間軸の上） -->
                <div style="display: flex; justify-content: flex-start; align-items: center; margin-bottom: 8px; gap: 8px;">
                    <select style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc; min-width: 90px;">
                        <option>16:00</option>
                        <option>16:30</option>
                        <option>17:00</option>
                    </select>
                    <span style="font-size: 18px; color: #888;">-</span>
                    <select style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc; min-width: 90px;">
                        <option>16:30</option>
                        <option>17:00</option>
                        <option>17:30</option>
                    </select>
                </div>
                <!-- 時間軸 -->
                <div style="display: flex; align-items: center; margin-bottom: 8px; width: 100%;">
                    <div style="width: 20px;"></div>
                    <div style="display: flex; flex: 1; width: 100%; justify-content: space-between;">
                        @for ($h = 8; $h <= 23; $h++)
                            <div style="width: calc(100% / 16); height: 32px; text-align: left; padding-left: 0; padding-top: 2px; color: #666; font-size: 13px; border-right: none; display: flex; align-items: flex-start; justify-content: flex-start; line-height: 1; position: relative; left: -12px;">
                                {{$h}}時
                            </div>
                        @endfor
                    </div>
                </div>
                <!-- 時間グリッド -->
                <div style="display: flex; align-items: center; margin-bottom: 0; width: 100%;">
                    <div style="width: 20px;height: 32px;background: #eee;border: 1px solid #ccc;"></div>
                    <div style="display: flex; flex: 1; width: 100%; justify-content: space-between;">
                        @for ($i = 0; $i < 32; $i++)
                            @php
                                $hour = 8 + intdiv($i, 2);
                                $minute = $i % 2 === 0 ? '00' : '30';
                                $isHour = $i % 2 === 0;
                                $border = $isHour ? '1px solid #ccc' : '2px solid #000';
                            @endphp
                            @if ($isHour)
                                <div style="width: calc(100% / 32); height: 32px; background: #eee; border: {{ $border }};"></div>
                            @else
                                <div style="width: calc(100% / 32); height: 32px; background: #eee; border-right: {{ $border }};border-left:1px solid #ccc;border-top:1px solid #ccc;border-bottom:1px solid #ccc"></div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <!-- 下段：予約情報＋出勤予定フォーム -->
        <div style="display: flex; align-items: stretch; margin-top: 0;">
            <!-- 予約情報（下段） -->
            <div style="width: 160px; background: #fff; border-right: 1px solid #eee; text-align: center; padding: 16px 8px; display: flex; flex-direction: column; justify-content: center;">
                <div style="font-size: 15px; color: #1976d2; font-weight: bold; margin-bottom: 8px;">予約情報</div>
                <div style="font-size: 13px; color: #333;">（ここに予約情報を表示）</div>
            </div>
            <!-- 出勤予定フォーム（下段） -->
            <div style="flex: 1; padding: 16px; background: #eaffea; display: flex; flex-direction: column; justify-content: flex-start;">
                <div style="display: flex; gap: 16px;">
                    <div style="background: #eaffea; border: 1px solid #b2dfdb; border-radius: 8px; padding: 12px; min-width: 220px; position: relative;">
                        <button style="position: absolute; top: 8px; right: 8px; background: #f44336; color: #fff; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">×</button>
                        <div style="display: flex; gap: 8px; margin: 15px 0;">
                            <select style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc;">
                                <option>08:30</option>
                                <option>09:00</option>
                                <option>10:00</option>
                            </select>
                            <span>～</span>
                            <select style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc;">
                                <option>15:30</option>
                                <option>16:00</option>
                                <option>17:00</option>
                            </select>
                        </div>
                        <button style="width: 100%; background: #1976d2; color: #fff; border: none; border-radius: 4px; padding: 6px 0; font-weight: bold; margin-bottom: 6px;">登録</button>
                    </div>
                    <!-- 追加の出勤予定フォーム例 -->
                    <div style="background: #eaffea; border: 1px solid #b2dfdb; border-radius: 8px; padding: 12px; min-width: 220px; position: relative; opacity: 0.7;">
                        <button style="position: absolute; top: 8px; right: 8px; background: #f44336; color: #fff; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer;">×</button>
                        <div style="display: flex; gap: 8px; margin: 15px 0;">
                            <select style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc;">
                                <option>16:00</option>
                            </select>
                            <span>～</span>
                            <select style="padding: 4px 8px; border-radius: 4px; border: 1px solid #ccc;">
                                <option>16:30</option>
                            </select>
                        </div>
                        <button style="width: 100%; background: #1976d2; color: #fff; border: none; border-radius: 4px; padding: 6px 0; font-weight: bold; margin-bottom: 6px;">登録済</button>
                    </div>
                    <!-- 空の追加ボックス -->
                    <div style="background: #fff; border: 1px dashed #bbb; border-radius: 8px; min-width: 220px; display: flex; align-items: center; justify-content: center; color: #bbb; font-size: 40px; cursor: pointer;">＋</div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
@once
    @vite(['resources/js/admin/schedule.js','resources/scss/admin/schedule.scss'])
@endonce