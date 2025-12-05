<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap" rel="stylesheet">
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lustria&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Bentham&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lustria&display=swap"
        rel="stylesheet">
    --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Bentham&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lustria&family=Pacifico&display=swap"
        rel="stylesheet"> --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Bentham&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lustria&family=Pacifico&display=swap"
        rel="stylesheet"> --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Bentham&family=Caveat:wght@400..700&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lustria&family=Pacifico&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=M+PLUS+1:wght@100..900&display=swap" rel="stylesheet"> --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Bentham&family=Caveat:wght@400..700&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lustria&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&display=swap"
        rel="stylesheet"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Bentham&family=Caveat:wght@400..700&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lustria&family=M+PLUS+1:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&display=swap"
        rel="stylesheet">
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
