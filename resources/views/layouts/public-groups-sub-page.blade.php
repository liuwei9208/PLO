<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'PLOグループ') }}</title>
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/scss/groups.scss', 'resources/js/groups.js'])
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
  </head>
  <body class="">

    <!-- 年齢確認モーダル -->
    {{-- <x-age-verification-modal /> --}}

    <!-- Header -->
    <x-public.groups.header-sub />

    <!-- Dynamic Banner -->
    <div class="banner-photodiary">
      <div class="banner-photodiary-background" aria-hidden="true">
        <img src="{{ $bannerImage }}" class="banner-photodiary-bg-image" alt="">
        <div class="banner-photodiary-overlay"></div>
      </div>
      <div class="banner-photodiary-content">
        <p class="banner-photodiary-title-en">{{ $titleEn }}</p>
        <div class="banner-photodiary-title-ja-wrapper">
          <p class="banner-photodiary-title-ja">{{ $titleJa }}</p>
        </div>
      </div>
    </div>
    <div class="banner-vector-scroll">
      <img src="{{ $vectorImage }}" alt="">
    </div>

    <!-- Main -->
    <main class="main" id="main">
      @if($showButtonGroup)
        <div class="groups-page-wrapper">
          <div class="groups-content-container">
            <div class="groups-shops-buttons">
              <button class="groups-shop-button--main">
                全店舗
              </button>
              <div class="groups-shops-grid">
                @if($buttonGroup)
                  @foreach($buttonGroup as $row)
                    <div class="groups-shops-grid-row">
                      @foreach($row as $button)
                        <a href="{{ $button['url'] }}" class="groups-shop-button--shop {{ $button['class'] ?? '' }}">
                          <img src="{{ asset($button['image']) }}" alt="{{ $button['alt'] ?? '' }}">
                        </a>
                      @endforeach
                    </div>
                  @endforeach
                @else
                  {{-- Default button group for photo diary --}}
                  <div class="groups-shops-grid-row">
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'shizuku']) }}" class="groups-shop-button--shop all-shops-button--shizuku">
                      <img src="{{ asset('assets/img/groups/photo-diary-button1.png') }}" alt="Shizuku">
                    </a>
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'shiroganeze']) }}" class="groups-shop-button--shop">
                      <img src="{{ asset('assets/img/groups/photo-diary-button2.png') }}" alt="Siroganeze">
                    </a>
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'lovestory']) }}" class="groups-shop-button--shop">
                      <img src="{{ asset('assets/img/groups/photo-diary-button3.png') }}" alt="Love Story">
                    </a>
                  </div>
                  <div class="groups-shops-grid-row">
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'pussycat']) }}" class="groups-shop-button--shop all-shops-button--pussycat">
                      <img src="{{ asset('assets/img/groups/photo-diary-button4.png') }}" alt="Pussycat">
                    </a>
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'miyabi']) }}" class="groups-shop-button--shop all-shops-button--miyabi">
                      <img src="{{ asset('assets/img/groups/photo-diary-button5.png') }}" alt="Miyabi">
                    </a>
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'en']) }}" class="groups-shop-button--shop">
                      <img src="{{ asset('assets/img/groups/photo-diary-button6.png') }}" alt="En">
                    </a>
                  </div>
                @endif
              </div>
            </div>
            {{ $slot }}
          </div>
        </div>
      @endif



      @if($showLoadMore)
        <div class="go-to-top-page">
          <p>
            トップページへもどる
          </p>
          </div>
      @endif
    </main>
    <!-- Footer -->
    <x-public.groups.footer />
    @stack('scripts')
    @once
      @vite('resources/scss/groups/banner.scss')
    @endonce
  </body>
</html>
