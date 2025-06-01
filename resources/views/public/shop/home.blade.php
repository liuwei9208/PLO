<x-public-shop-layout>

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <!-- Today Schedule -->
  <div class="today">
    <h2 class="today-title">
      <img src="{{ asset('assets/img/shop/' . $shop->slug . '/today/title.svg') }}" alt="Today Schedule">
    </h2>
    <div class="today-list">
      @foreach ($todayCasts as $cast)
        <x-public.shop.today :cast="$cast" />
      @endforeach
    </div>
  </div>

  <!-- Mock -->
  <div class="mock mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop-mock-sp.png') }}">
      <img src="{{ asset('assets/img/shop-mock-pc.png') }}" alt="">
    </picture>
  </div>
</x-public-shop-layout>
