<x-public-group-layout>

  <!-- Main Visual -->
  <x-public.group.mv />



  <!-- ピックアップ - Pickup Girl -->
  <section class="pickup">
    <div class="section-title">
      <span class="section-title-en">
        <img src="{{ asset('assets/img/group/pickup/title-en.svg') }}" alt="Pickup Girl">
      </span>
      <h2 class="section-title-ja">ピックアップ</h2>
    </div>
    <ul class="pickup-shops">
      <li class="pickup-shop" data-shop="all">ALL</li>
      <li class="pickup-shop" data-shop="pussycat">プッシー<br class="sm">キャット</li>
      <li class="pickup-shop" data-shop="shizuku">雫</li>
      <li class="pickup-shop" data-shop="miyabi">雅</li>
      <li class="pickup-shop" data-shop="en">艶</li>
      <li class="pickup-shop" data-shop="shiroganeze">シロガネーゼ</li>
      <li class="pickup-shop" data-shop="lovestory">ラブストーリー</li>
    </ul>
    <div class="pickup-list">
      @foreach ($pickups as $pickup)
        <a
          href="{{ route('public.shop.cast.profile', ['shop' => $pickup->cast->shop->slug, 'id' => $pickup->cast->id]) }}"
          class="pickup-item --{{ $pickup->cast->shop->slug }}"
        >
          <div class="pickup-photo">
            <img src="{{ asset('storage/' . $pickup->cast->gallery_1) }}" alt="{{ $pickup->cast->name }}">
          </div>
          <span class="pickup-shop">
            {{ $pickup->cast->shop->name }}
          </span>
          <span class="pickup-name">
            {{ $pickup->cast->name }} <small>{{ $pickup->cast->age ? '(' . $pickup->cast->age . ')' : '' }}</small>
          </span>
          <span class="pickup-size">
            B{{ $pickup->cast->bust }}　W{{ $pickup->cast->waist }}　H{{ $pickup->cast->hip }}
          </span>
          <span class="pickup-intro">
            {{ $pickup->cast->appeal_point }}
          </span>
        </a>
      @endforeach
    </div>
    <a href="{{ route('public.group.pickup') }}" class="pickup-more more-button">もっと見る</a>
  </section>

  <!-- 新着情報 - PLO News -->
  <div class="mock mock-1">
    <div class="section-title">
      <h2 class="section-title-news">Event</h2>
    </div>
    @if($events->count() > 0)
      <div class="event-main">
        <div class="event-main-content">
          <div class="event-main-date">{{ $events[0]->published_at->format('y.m.d')."  |  " }}</div>
          <h3 class="event-main-title">{{ $events[0]->title }}</h3>
        </div>
        <div class="event-main-image">
          <img src="{{ asset('storage/' . $events[0]->thumbnail) }}" alt="{{ $events[0]->title }}">
        </div>
      </div>

      <div class="event-slider swiper">
        <div class="swiper-wrapper">
          @foreach($events->skip(1) as $event)
            <div class="swiper-slide">
              <div class="event-slide">
                <div class="event-slide-image">
                  <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
                </div>
                {{-- <div class="event-slide-date">{{ $event->published_at->format('Y.m.d') }}</div>
                <h4 class="event-slide-title">{{ $event->title }}</h4> --}}
              </div>
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <button class="event-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </button>
        <button class="event-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </button>
      </div>
    @endif
  </div>
  
  <!-- 新人情報 - New Face -->
  <section class="newface">
    <div class="section-title">
      <span class="section-title-en">
        <img src="{{ asset('assets/img/group/newface/title-en.svg') }}" alt="New Face">
      </span>
      <h2 class="section-title-ja">新人情報</h2>
    </div>
    <div class="newface-slide">
      <div class="newface-slide-nav">
        <button class="newface-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </button>
        <button class="newface-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </button>
      </div>
      <div class="swiper-wrapper">
        @foreach ($newfaces_this_week as $cast)
          <div class="swiper-slide">
            <x-public.group.newface :cast="$cast" />
          </div>
        @endforeach
      </div>
    </div>
    <div class="newface-list is-hidden">
      @foreach ($newfaces_this_month as $cast)
        <x-public.group.newface :cast="$cast" />
      @endforeach
    </div>
    <a href="{{ route('public.group.newcomer') }}"  class="newface-more more-button">もっと見る</a>
  </section>

  <!-- 最新写メ日記 - Photo Diary -->
  <div class="mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-diary-sm.png') }}">
      <img src="{{ asset('assets/img/mock-diary-lg.png') }}" alt="">
    </picture>
  </div>

  <!-- 各お店の最新動画 - Shop Movie -->
  <div class="mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-movie-sm.png') }}">
      <img src="{{ asset('assets/img/mock-movie-lg.png') }}" alt="">
    </picture>
  </div>

  <!-- 相互リンク - Link -->
  <div class="mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-link-sm.png') }}">
      <img src="{{ asset('assets/img/mock-link-lg.png') }}" alt="">
    </picture>
  </div>
</x-public-group-layout>

@once
  @vite(['resources/scss/group/_pickup_top.scss'])
@endonce