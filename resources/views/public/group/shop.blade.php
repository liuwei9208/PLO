<x-public-group-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- Shop -->
 <!-- ピックアップ - Pickup Girl -->
  <section class="shop">
    <div class="section-title">
      <span class="section-title-en">
        <img src="{{ asset('assets/img/group/shop/title-en.svg') }}" alt="Shop">
      </span>
      <h2 class="section-title-ja">店舗一覧</h2>
    </div>
    <div class="shop-list">
      @foreach ($shops as $shop)
        <div class="shop-item">
          <div class="shop-name">
            {{ $shop->name }}
          </div>
          <div class="shop-address1">
            {{ $shop->address1 }}
          </div>
          <div class="shop-address2">
            {{ $shop->address2 }}
          </div>
          <div class="shop-tel">
            {{ $shop->tel }}
          </div>
          <a href="{{ route('public.shop.home', $shop->slug) }}" class="shop-more ">店舗詳細</a>
        </div>
        @endforeach
    </div>

  </section>
</x-public-group-layout>
