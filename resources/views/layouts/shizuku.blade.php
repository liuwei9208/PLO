<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<<<<<<< HEAD
=======
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
>>>>>>> 27eb87e50876f9f55243489ba9fa7de65433068d
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Bentham&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"> --}}

    <title>{{ config('app.name', 'PLOグループ') }}</title>
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/scss/app.scss'])

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}
    @stack('styles')
</head>

<body class="">

    <!-- 年齢確認モーダル -->
    {{-- <x-age-verification-modal /> --}}

    <!-- Header -->
    {{-- <x-public.shop.header :shop="$shop" /> --}}

    <!-- Drawer -->
    {{-- <x-public.shop.drawer :shop="$shop" /> --}}
    <!-- Main -->
    <main class="main">
        {{ $slot }}
    </main>

    <!-- Footer -->
    {{-- <x-public.shop.footer :shop="$shop" />

    <x-public.shop.bottom-nav :shop="$shop" /> --}}

    @stack('scripts')
</body>

</html>
