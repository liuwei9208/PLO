@props([
    'backgroundImage' => 'assets/img/shops/shizuku/new-girl.png',
    'photoImage' => 'assets/img/shops/shizuku/new-girl.png',
    'date' => '2025.00.00 SUN',
    'dateLabel' => '入店',
    'name' => '名前名前',
    'nameVertical' => 'Name',
    'age' => '00',
    'measurements' => 'T.000 B.000(C) W.00 H.00',
    'description' => 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
    'gradientId' => null,
    'gradientStart' => '#FFF2D7',
    'gradientEnd' => '#BD902F',
    'overlayOpacity' => '0.7',
    'nameColor' => '#FFFFFF',
    'measurementsColor' => '#FFFFFF',
])

@php
    $uniqueId = $gradientId ?? 'calendar-gradient-' . uniqid();
@endphp

<div class="new-girl-card">
    <div class="new-girl-card-bg-left">
        <img src="{{ asset($backgroundImage) }}" alt="Background" class="card-bg-image">
        <div class="card-bg-overlay" style="background: rgba(0, 0, 0, {{ $overlayOpacity }});"></div>
    </div>
    <div class="new-girl-card-left">
        <div class="new-girl-card-date">
            <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="{{ $uniqueId }}" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="20.67%" style="stop-color:{{ $gradientStart }};stop-opacity:1" />
                        <stop offset="100%" style="stop-color:{{ $gradientEnd }};stop-opacity:1" />
                    </linearGradient>
                </defs>
                <rect width="27" height="24" fill="url(#{{ $uniqueId }})"/>
            </svg>
            <p class="date-text" style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                {{ $date }} <span class="date-label">{{ $dateLabel }}</span>
            </p>
        </div>
        <div class="new-girl-card-divider" style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%);"></div>
        <div class="new-girl-card-info">
            <div class="card-name-section">
                <p class="card-name" style="color: {{ $nameColor }};">{{ $name }}</p>
            </div>
            <p class="card-measurements" style="color: {{ $measurementsColor }};">{{ $age }}歳／{{ $measurements }}</p>
            <div class="card-description">
                <p>{{ $description }}</p>
            </div>
        </div>
    </div>
    <div class="new-girl-card-divider-vertical" style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%);">
        <p class="divider-name-text">{{ $nameVertical }}</p>
    </div>
    <div class="new-girl-card-right">
        <img src="{{ asset($photoImage) }}" alt="Cast Photo" class="card-photo">
        <p class="card-name-vertical">{{ $nameVertical }}</p>
    </div>
</div>

