<x-public-group-layout>

  <!-- Main Visual -->
  <x-public.group.mv />
  @if($news->count() > 0)
  <section class="plo_news content-wrapper">
    <div class="section-title">
      <img src="{{ asset('assets/img/plo_news.png') }}" alt="PLO News">
      <h2 class="section-title-ja">新着情報</h2>
    </div>
    <div class="plo_news-list">
      @foreach($news as $news)
        <div class="plo_news-item">
          {{-- <div class="plo_news-item-title">
            {{ $news->title }}
          </div>
          <div class="plo_news-item-content">
            {{ $news->contents }}
          </div> --}}
        </div>
      @endforeach
    </div>
  </section>
  @endif
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
  @if($events->count() > 0)
  <div class="mock mock-1">
    <div class="section-title">
      <h2 class="section-title-news">Event</h2>
    </div>
    <div class="event-main">
      <div class="event-main-content">
        <div class="event-main-date">{{ $events[0]->published_at->format('y.m.d')."  |  " }}</div>
        <h3 class="event-main-title">{{ $events[0]->title }}</h3>
      </div>
      <div class="event-main-image">
        <a href="{{ route('public.group.event.detail', ['id' => $events[0]->id]) }}">
          <img src="{{ asset('storage/' . $events[0]->thumbnail) }}" alt="{{ $events[0]->title }}">
        </a>
      </div>
    </div>

    <div class="event-slider swiper">
      <div class="swiper-wrapper">
        @foreach($events->skip(1) as $event)
          <div class="swiper-slide">
            <div class="event-slide">
              <div class="event-slide-image">
                <a href="{{ route('public.group.event.detail', ['id' => $event->id]) }}">
                  <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
                </a>
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
  </div>
  @endif
  <!-- 新人情報 - New Face -->
  @if($newfaces_this_week->count() > 0)
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
    @endif
    <div class="newface-list is-hidden">
      @foreach ($newfaces_this_month as $cast)
        <x-public.group.newface :cast="$cast" />
      @endforeach
    </div>
    <a href="{{ route('public.group.newcomer') }}"  class="newface-more more-button">もっと見る</a>
  </section>

  <!-- 最新写メ日記 - Photo Diary -->
  {{-- <div class="mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-diary-sm.png') }}">
      <img src="{{ asset('assets/img/mock-diary-lg.png') }}" alt="">
    </picture>
  </div> --}}
  <div class="diary">
    <div class="section-title">
      <h2 class="section-title-lg">PHOTO DIARY</h2>
      <h3 class="section-title-sm">最新写メ日記</h3>
    </div>
    <div class="diary-content content-wrapper">
      <div class="diary-content-top">
        <img src="{{ asset('assets/img/group/diary-top-pc.png') }}" alt="" class="pc-only">
        <img src="{{ asset('assets/img/group/diary-top-sp.png') }}" alt="" class="sp-only">
      </div>
      <div class="diary-content-list">
        @foreach ($diaries as $diary)
          <div class="diary-content-item">
            <div class="diary-content-item-image">
              <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="{{ $diary->subject }}">
              <div class="diary-content-item-title">
                {{ $diary->subject }}
              </div>
            </div>
            <div class="diary-content-item-name">
              {{ $diary->name }}
            </div>
            <div class="diary-content-item-date">
              {{ $diary->updated_at->format('y.m.d') }}
            </div>
          </div>
        @endforeach
      </div>
      <div class="diary-content-bottom">
        <img src="{{ asset('assets/img/group/diary-bottom-pc.png') }}" alt="" class="pc-only">
        <img src="{{ asset('assets/img/group/diary-bottom-sp.png') }}" alt="" class="sp-only">
        <div class="diary-content-bottom-more">
          <a href="#" class="diary-content-bottom-more-button" id="diary_more_button">もっと見る</a>
        </div>
      </div>
    </div>
    <ul class="diary-content-bottom-shops ">
      <a href="{{ route('public.shop.diary', ['shop' => 'pussycat']) }}"><li class="diary-content-bottom-shops-item " data-shop="pussycat">プッシー<br class="sm">キャット</li></a>
      <a href="{{ route('public.shop.diary', ['shop' => 'shizuku']) }}"><li class="diary-content-bottom-shops-item " data-shop="shizuku">雫</li></a>
      <a href="{{ route('public.shop.diary', ['shop' => 'miyabi']) }}"><li class="diary-content-bottom-shops-item " data-shop="miyabi">雅</li></a>
      <a href="{{ route('public.shop.diary', ['shop' => 'en']) }}"><li class="diary-content-bottom-shops-item " data-shop="en">艶</li></a>
      <a href="{{ route('public.shop.diary', ['shop' => 'shiroganeze']) }}"><li class="diary-content-bottom-shops-item " data-shop="shiroganeze">シロガネーゼ</li></a>
      <a href="{{ route('public.shop.diary', ['shop' => 'lovestory']) }}"><li class="diary-content-bottom-shops-item " data-shop="lovestory">ラブストーリー</li></a>
    </ul>

  </div>
  <!-- 各お店の最新動画 - Shop Movie -->
  <div class="mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-movie-sm.png') }}">
      <img src="{{ asset('assets/img/mock-movie-lg.png') }}" alt="">
    </picture>
  </div>

  <!-- 相互リンク - Link -->
  @if ($banners->count() > 0)
  <div class="banner content-wrapper">
    <div class="banner-title">
      <img src="{{ asset('assets/img/link.svg') }}" alt="相互リンク">
      <h2 class="banner-title-ja">相互リンク</h2>
    </div>
    <div class="banner-list">
    @foreach ($banners as $banner)
      <a href="{{ $banner->link_url }}" target="_blank">
        <img src="{{ asset('storage/' . $banner->thumbnail) }}" alt="{{ $banner->title }}">
        </a>
      @endforeach
    </div>
  </div>
  @endif
</x-public-group-layout>

@once
  @vite(['resources/scss/group/_pickup_top.scss','resources/scss/group/diary_top.scss'])
@endonce
<script>
document.addEventListener('DOMContentLoaded', function() {
  const moreButton = document.getElementById('diary_more_button');
  const shopsList = document.querySelector('.diary-content-bottom-shops');
  
  if (moreButton && shopsList) {
    moreButton.addEventListener('click', function(e) {
      e.preventDefault();
      shopsList.style.display = 'flex';
    });
  }
});
</script>
