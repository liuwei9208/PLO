<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'PLOグループ') }}</title>

    <link rel="icon" href="favicon.ico">

    <!-- Scripts -->
    @vite(['resources/scss/group.scss', 'resources/js/group.js'])
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
  </head>
  <body class="">

    <!-- Header -->
    <x-public.group.header />

    <!-- Drawer -->
    <x-public.group.drawer />

    <!-- Main -->
    <main class="main" id="main">
      {{ $slot }}
    </main>

    <!-- Footer -->
    <x-public.group.footer />
    @stack('scripts')
  </body>
</html>
