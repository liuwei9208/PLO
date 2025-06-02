<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <!-- Ranking -->
  <section class="ranking">
    <div class="ranking-title">
      <h2>ランキング</h2>
      @foreach ($rankings as $ranking)
        @if($ranking->rank == 1)
          <div class="ranking-item">
            @if($ranking->rank == 1)
              <img src="{{ asset('assets/img/shop/1.png') }}" alt="1位" class="ranking-badge">
            @endif
            <div class="ranking-item-photo">
              <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
            </div>
            <div class="ranking-item-name">
              {{ $ranking->cast->name}}<span class="ranking-item-age">{{ '('.$ranking->cast->age.')' }}</span>
            </div>
            <div class="ranking-item-bwh">
              <span class="ranking-item-bwh-bust">{{ 'B'.$ranking->cast->bust }}</span>
              <span class="ranking-item-bwh-waist">{{ 'W'.$ranking->cast->waist }}</span>
              <span class="ranking-item-bwh-hip">{{ 'H'.$ranking->cast->hip }}</span>
            </div>
            <div class="ranking-item-appeal">
              <span class="ranking-item-appeal-text">{{ $ranking->cast->appeal_point }}</span>
              {{-- {{ $ranking->cast->appeal_point }} --}}
            </div>
          </div>
        @endif
      @endforeach

      <div class="ranking-items-container">
        @foreach ($rankings as $ranking)
          @if($ranking->rank > 1)
            <div class="ranking-item">
              @if($ranking->rank == 2)
                <img src="{{ asset('assets/img/shop/2.png') }}" alt="2位" class="ranking-badge">
              @elseif($ranking->rank == 3)
                <img src="{{ asset('assets/img/shop/3.png') }}" alt="3位" class="ranking-badge">
              @elseif($ranking->rank == 4)
                <img src="{{ asset('assets/img/shop/4.png') }}" alt="4位" class="ranking-badge">
              @elseif($ranking->rank == 5)
                <img src="{{ asset('assets/img/shop/5.png') }}" alt="5位" class="ranking-badge">
              @endif
              <div class="ranking-item-photo">
                <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
              </div>
              <div class="ranking-item-name">
                {{ $ranking->cast->name}}<span class="ranking-item-age">{{ '('.$ranking->cast->age.')' }}</span>
              </div>
              <div class="ranking-item-bwh">
                <span class="ranking-item-bwh-bust">{{ 'B'.$ranking->cast->bust }}</span>
                <span class="ranking-item-bwh-waist">{{ 'W'.$ranking->cast->waist }}</span>
                <span class="ranking-item-bwh-hip">{{ 'H'.$ranking->cast->hip }}</span>
              </div>
              <div class="ranking-item-appeal">
                <span class="ranking-item-appeal-text">{{ $ranking->cast->appeal_point }}</span>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>
</x-public-shop-layout>
