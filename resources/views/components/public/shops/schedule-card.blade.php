@props([
    'backgroundImage' => 'assets/img/shops/shizuku/coming-soon-card.png',
    'frameImage' => 'assets/img/shops/shizuku/card-frame.png',
    'badgeShift' => '本日出勤',
    'badgeTime' => '12:00〜24:00',
    'statusIcon' => '<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/>
                    </svg>',
    'statusText' => '待機中',
    'name' => 'のんたん（20）',
    'measurements' => 'T.160 B.85(C) W.60 H.83',
    'message' => 'キャストメッセージが甲斐キキキャ',
    'badgeBorderColor' => '#B90000',
    'badgeBgColor' => '#B90000',
    'badgeTextColor' => '#FFDA89',
    'badgeTimeColor' => '#2A1A08',
    'statusTextColor' => '#FFE500',
    'nameColor' => '#FFFFFF',
    'measurementsColor' => '#FFFFFF',
    'messageGradientStart' => '#FFF2D7',
    'messageGradientEnd' => '#BD902F',
    'contentGradientStart' => 'rgba(42, 26, 8, 0.80)',
    'contentGradientEnd' => 'rgba(0, 0, 0, 0.00)',
    'contentGradientStartPercent' => '58.65%',
    'contentGradientEndPercent' => '100%',
    'variant' => 'schedule', // 'schedule' or 'castlist'
])

<div class="schedule-card @if ($variant === 'castlist') castlist-card @endif">
    <div class="schedule-card-image @if ($variant === 'castlist') castlist-card-image @endif">
        <img src="{{ asset($backgroundImage) }}" alt="Background" class="card-bg">
        <img src="{{ asset($frameImage) }}" alt="Frame" class="card-frame">
        {{-- <div class="schedule-card-content @if ($variant === 'castlist') castlist-card-content @endif"
            style="background: linear-gradient(90deg, {{ $contentGradientStart }} {{ $contentGradientStartPercent }}, {{ $contentGradientEnd }} {{ $contentGradientEndPercent }});"> --}}
        <div class="schedule-card-content @if ($variant === 'castlist') castlist-card-content @endif"
            style="background: linear-gradient(90deg, {{ $contentGradientStart }} 58.65% , {{ $contentGradientEnd }} 100%);">
            <div class="schedule-card-badge @if ($variant === 'castlist') castlist-card-badge @endif"
                style="border-color: {{ $badgeBorderColor }};">
                <div class="badge-red-bg" style="background: {{ $badgeBgColor }};">
                    <span class="badge-shift" style="color: {{ $badgeTextColor }};">{{ $badgeShift }}</span>
                </div>
                <div class="badge-content">
                    <span class="badge-time" style="color: {{ $badgeTimeColor }};">{{ $badgeTime }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="schedule-card-info @if ($variant === 'castlist') castlist-card-info @endif">
        <div class="schedule-card-status @if ($variant === 'castlist') castlist-card-status @endif">
            {!! $statusIcon !!}
            <span class="status-text" style="color: {{ $statusTextColor }};">{{ $statusText }}</span>
        </div>
        <p class="schedule-card-name @if ($variant === 'castlist') castlist-card-name @endif"
            style="color: {{ $nameColor }};">{{ $name }}</p>
        <p class="schedule-card-measurements @if ($variant === 'castlist') castlist-card-measurements @endif"
            style="color: {{ $measurementsColor }};">{{ $measurements }}</p>
        <p class="schedule-card-message @if ($variant === 'castlist') castlist-card-message @endif"
            style="background: linear-gradient(180deg, {{ $messageGradientStart }} 20.67%, {{ $messageGradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            {{ $message }}</p>
    </div>
</div>
