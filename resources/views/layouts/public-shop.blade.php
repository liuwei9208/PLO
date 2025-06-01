<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bentham&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'PLOグループ') }}</title>

    <link rel="icon" href="favicon.ico">

    <!-- Scripts -->
    @vite(['resources/scss/shop.scss', 'resources/js/shop.js'])

    <!-- Styles -->
    {{-- @if (Request::routeIs('public.shop.home'))
      @vite('resources/scss/shop/home.scss')
    @elseif (Request::routeIs('public.shop.cast.profile'))
      @vite('resources/scss/shop/cast/profile.scss')
    @endif --}}

  </head>
  <body class="">

    <!-- Header -->
    <x-public.shop.header />

    <!-- Main -->
    <main class="main" id="main">
      {{ $slot }}
    </main>

    <!-- Footer -->
    <x-public.shop.footer />

  </body>
</html>
