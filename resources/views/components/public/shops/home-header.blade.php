@props([
    'logoImage' => 'assets/img/shops/shizuku/footer-logo.png',
    'logoAlt' => 'Logo',
    'menuItems' => [
        ['title' => 'トップページ', 'subtitle' => 'top page'],
        ['title' => 'キャスト一覧', 'subtitle' => 'cast list'],
        ['title' => '出勤情報', 'subtitle' => 'schedule'],
        ['title' => '写メ日記', 'subtitle' => 'photo diary'],
        ['title' => 'イベント一覧', 'subtitle' => 'event'],
        ['title' => '料金システム', 'subtitle' => 'system'],
        ['title' => '新人情報', 'subtitle' => 'new cast'],
        ['title' => 'ログイン', 'subtitle' => 'login'],
    ],
    'menuButtonId' => 'mobileMenuButton',
    'backgroundColor' => '#160B00',
    'showPageTop' => true,
    'socialLink' => '#',
    'socialSvg' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                        <path d="M5.71429 0C2.5625 0 0 2.5625 0 5.71429V34.2857C0 37.4375 2.5625 40 5.71429 40H34.2857C37.4375 40 40 37.4375 40 34.2857V5.71429C40 2.5625 37.4375 0 34.2857 0H5.71429ZM32.2411 7.5L22.9732 18.0893L33.875 32.5H25.3393L18.6607 23.7589L11.0089 32.5H6.76786L16.6786 21.1696L6.22321 7.5H14.9732L21.0179 15.4911L28 7.5H32.2411ZM28.8661 29.9643L13.6964 9.90179H11.1696L26.5089 29.9643H28.8571H28.8661Z" fill="#B19D67"/>
                    </svg>'
])

<div class="home-header" style="background: {{ $backgroundColor }};">
    <!-- Mobile Header Logo -->
    <div class="mobile-header-logo">
        <img src="{{ asset($logoImage) }}" alt="{{ $logoAlt }}">
    </div>
    
    <div class="menu-list-container">
        @foreach($menuItems as $item)
            <div class="menu-item">
                <h1>{{ $item['title'] }}</h1>
                <p>{{ $item['subtitle'] }}</p>
            </div>
        @endforeach
    </div>
    
    <div class="menu-button" id="{{ $menuButtonId }}">
        <svg width="51" height="22" viewBox="0 0 51 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line y1="1" x2="50.5785" y2="1" stroke="#FFDA89" stroke-width="2"/>
            <line y1="11" x2="50.5785" y2="11" stroke="#FFDA89" stroke-width="2"/>
            <line y1="21" x2="50.5785" y2="21" stroke="#FFDA89" stroke-width="2"/>
        </svg>                    
        <p>menu</p>
    </div>
    
    @if($showPageTop)
        <!-- Page Top Button -->
        <div class="page-top-section">
            <div class="page-top-line"></div>
            <a href="#" class="page-top-text" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">page top</a>
            <a href="{{ $socialLink }}" class="page-top-social">
                {!! $socialSvg !!}
            </a>
        </div>
    @endif
</div>

