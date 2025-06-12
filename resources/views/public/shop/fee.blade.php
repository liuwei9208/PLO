<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <!-- 料金 -->
  <section class="shop-fee">
    <div class="container">
      <h2 class="shop-fee__title">料金システム</h2>
      <div class="shop-fee__content content-wrapper">
        <div class="shop-fee__content-item">
          <div class="shop-fee__content-item-description">
            {!! $shop->fee !!}
          </div>
        </div>
        <div class="shop-fee__content-banner">
          <img src="{{ asset('assets/img/shop/feebanner-1.png') }}" alt="料金システム">
          <img src="{{ asset('assets/img//shop/feebanner-2.png') }}" alt="料金システム">
        </div>
      </div>
    </div>
  </section>

</x-public-shop-layout>
@once
  @vite('resources/scss/shop/_fee.scss')
@endonce