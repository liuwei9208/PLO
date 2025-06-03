<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />
  <div class="phone-link-container --mv">
    <x-public.shop.phone-link :shop="$shop" />
  </div>
  
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

  <!-- Fixed Phone Link (SP Only) -->
  <div class="phone-link-container --fixed">
    <x-public.shop.phone-link :shop="$shop" />
  </div>
</x-public-shop-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const mvLink = document.querySelector('.phone-link-container.--mv');
  const fixedLink = document.querySelector('.phone-link-container.--fixed');
  const mvElement = document.querySelector('.mv');
  
  function updatePhoneLinkVisibility() {
    // SPの場合のみ実行
    if (window.innerWidth > 767) {
      mvLink.style.display = 'none';
      fixedLink.style.display = 'none';
      return;
    }

    const scrollY = window.scrollY;
    const mvBottom = mvElement.getBoundingClientRect().bottom + scrollY;
    
    if (scrollY === 0) {
      // ページトップではMVの下に表示
      mvLink.style.display = 'block';
      fixedLink.style.display = 'none';
    } else if (scrollY >= mvBottom) {
      // MVが画面外に出たら固定表示
      mvLink.style.display = 'none';
      fixedLink.style.display = 'block';
    } else {
      // MVが画面内にある間はMVの下に表示
      mvLink.style.display = 'block';
      fixedLink.style.display = 'none';
    }
  }

  // 初期表示時とスクロール時に表示を更新
  updatePhoneLinkVisibility();
  window.addEventListener('scroll', updatePhoneLinkVisibility);
  window.addEventListener('resize', updatePhoneLinkVisibility);
});
</script>
