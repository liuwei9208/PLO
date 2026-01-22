<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Pacifico&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    {{-- <link href="https://vjs.zencdn.net/8.22.0/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/8.22.0/video.min.js"></script> --}}
    <title>{{ config('app.name', 'PLOグループ') }}</title>
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/scss/groupbase.scss', 'resources/js/group.js'])
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
  </head>
  <body class="">

    <!-- 年齢確認モーダル -->
    <x-age-verification-modal />

    <!-- Header -->
    <x-public.group.header-front />

    <!-- Drawer -->
    <x-public.group.drawer />

    <!-- Sidebar -->
    <x-public.group.sidebar />

    <!-- Main -->
    <main class="main" id="main">
      {{ $slot }}
      <x-public.group.shopintro />
    </main>

    <!-- Footer -->
    <x-public.group.footer />

    <x-public.group.bottom-nav />
    @stack('scripts')
  </body>
</html>
