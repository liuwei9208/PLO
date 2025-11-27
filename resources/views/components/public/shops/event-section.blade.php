@props([
    'backgroundImage' => 'assets/img/shops/shizuku/event-bg.png',
    'backgroundAlt' => 'Event Background',
    'mainBannerImage' => 'assets/img/shops/shizuku/event-main.png',
    'mainBannerAlt' => 'Main Banner Background',
    'subBannerImages' => [],
])

<div class="home-event">
    <div class="event-background">
        <img src="{{ asset($backgroundImage) }}" alt="{{ $backgroundAlt }}" class="event-bg-image">
        <div class="event-bg-overlay"></div>
    </div>
    <div class="event-main-banner">
        <div class="event-main-bg">
            <img src="{{ asset($mainBannerImage) }}" alt="{{ $mainBannerAlt }}" class="event-main-image">
        </div>
    </div>
    @if(count($subBannerImages) > 0)
        <div class="event-sub-banners">
            @foreach($subBannerImages as $subBanner)
                <div class="event-sub-banner">
                    <img src="{{ asset($subBanner['image'] ?? $subBanner) }}" alt="{{ $subBanner['alt'] ?? 'Event Sub Banner' }}">
                </div>
            @endforeach
        </div>
    @endif
</div>

