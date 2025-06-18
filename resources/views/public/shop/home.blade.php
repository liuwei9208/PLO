<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />
  <div class="phone-link-container --mv">
    <x-public.shop.phone-link :shop="$shop" />
  </div>
  
  @if ($todayCasts->count() > 0)
  <!-- Today Schedule -->
  <div class="today">
    <h2 class="today-title title-font">
      {{-- <img src="{{ asset('assets/img/shop/' . $shop->slug . '/today/title.svg') }}" alt="Today Schedule"> --}}
      Today Schedule
    </h2>
    <div class="today-list">
      @foreach ($todayCasts as $cast)
        <x-public.shop.today :cast="$cast" />
      @endforeach
    </div>
  </div>
  @endif
  {{-- <!-- Mock -->
  <div class="mock mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop-mock-sp.png') }}">
      <img src="{{ asset('assets/img/shop-mock-pc.png') }}" alt="">
    </picture>
  </div> --}}
  <!-- New Girls -->
  {{-- <div class="new-girls mock mock">
    <h2 class="new-girls-title">
      <picture>
        <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop/newgirls-sm.png') }}">
        <img src="{{ asset('assets/img/shop/newgirls.png') }}" alt="New Girls">
      </picture>
    </h2>
    <div class="new-girls-list"></div>
  </div> --}}
  <div class="new-girls content-wrapper">
    @if($new_girls_month->count() > 0)
    <div class="new-girls-header">
      <div class="new-girls-header-title title-font">
        New Girls
      </div>
      <div class="new-girls-header-button">
        <a href="{{ route('public.shop.newcomer', ['shop' => $shop->slug]) }}" class="new-girls-header-button-link content-font">
          一覧を見る
        </a>
      </div>
    </div>
    @endif
    @if ($new_girls->count() > 0)
    <div class="new-girls-list">
      @foreach ($new_girls as $new_girl)
        <div class="new-girls-item">
          <div class="new-girls-item-image">
            <img src="{{ asset('storage/' . $new_girl->gallery_1) }}" alt="{{ $new_girl->name }}">
            <div class="new-girls-item-image-overlay">
              {{ $new_girl->created_at->format('y:m:d')."入店" }}
            </div>
          </div>
          <div class="new-girls-item-name">
            {{ $new_girl->name."(".$new_girl->age.")" }}
          </div>
          <div class="new-girls-item-property">
            {{ "T:" . $new_girl->height." B:".$new_girl->bust." W:".$new_girl->waist." H:".$new_girl->hip }}
          </div>
        </div>
      @endforeach
    </div>
    <div class="new-girls-sp-slider">
      <div class="news-girls-slider swiper">
        <div class="swiper-wrapper">
          @foreach($new_girls as $new_girl)
            <div class="swiper-slide">
              <img src="{{ asset('storage/' . $new_girl->gallery_1) }}" alt="{{ $new_girl->name }}">
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="new-girls-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </div>
        <div class="new-girls-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </div>
      </div>
    </div>
    @endif
    @if($new_girls_month->count() > 0)
    <div class="new-girls-footer-button">
      <a href="{{ route('public.shop.newcomer', ['shop' => $shop->slug]) }}" class="new-girls-header-button-link content-font">
        一覧を見る
      </a>
    </div>
    @endif
  </div>
  <div class="news-diary content-wrapper">
    <div class="news">
      <div class="news-header">
        <div class="news-header-title">
          <h2 class="news-title title-font">
            News
          </h2>
        </div>
        <div class="news-header-button">
          <a href="" class="news-header-button-link content-font">
            一覧を見る
          </a>
        </div>
      </div>
      <div class="news-body">
      </div>
    </div>
    <div class="diary-top">
      <div class="diary-top-header">
        <div class="diary-top-header-title">
          <h2 class="diary-top-title title-font">
            Photo Diary
          </h2>
        </div>
        <div class="diary-top-header-button">
          <a href="" class="diary-top-header-button-link content-font">
            もっと見る
          </a>
        </div>
      </div>
      <div class="diary-top-body">
        <div class="diary-top-items">
          @foreach ($diaries as $diary)
            <div class="diary-top-item">
              <a href="{{ route('public.shop.diarydetail', ['shop' => $shop->slug, 'id' => $diary->id]) }}">
                <div class="diary-top-item-image">
                  <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="{{ $diary->subject }}">
                  <div class="diary-top-item-title">
                    {{ $diary->subject }}
                  </div>
                </div>
                <div class="diary-top-item-name">
                  {{ $diary->name }}
                </div>
                <div class="diary-top-item-date">
                  {{ $diary->updated_at->format('y.m.d') }}
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @if ($events->count() > 0)
  <div class="evnet">
    <h2 class="event-title title-font">Event</h2>
    <div class="event-main">
      <div class="event-main-image">
        <a href="{{ route('public.shop.event.detail', ['shop' => $shop->slug, 'id' => $events[0]->id]) }}">
          <img src="{{ asset('storage/' . $events[0]->thumbnail) }}" alt="{{ $events[0]->title }}">
        </a>
      </div>
      {{-- <picture>
        <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop/event-store-sm.png') }}">
        <img src="{{ asset('assets/img/shop/event-store.png') }}" alt="Event">
      </picture> --}}
      <div class="event-slider swiper">
        <div class="swiper-wrapper">
          @foreach ($events->skip(1) as $event)
            <div class="swiper-slide">
              <div class="event-slide">
                <div class="event-slide-image">
                  <a href="{{ route('public.shop.event.detail', ['shop' => $shop->slug, 'id' => $event->id]) }}">
                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="event-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </div>
        <div class="event-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </div>

      </div>
    </div>
  </div>
  @endif

  <div class="castlist content-wrapper">
    <div class="castlist-header">
      <div class="castlist-header-title">
        <h2 class="castlist-title title-font">
          Cast List
        </h2>
        <div class="castlist-header-button">
          <a href="{{ route('public.shop.castlist', ['shop' => $shop->slug]) }}" class="castlist-header-button-link content-font">
            一覧を見る
          </a>
        </div>
      </div>
    </div>
    <div class="castlist-body">
      <div class="castlist-body-items">
        <div class="castlist-body-items-slider swiper">
          <div class="swiper-wrapper">
            @foreach ($castlist as $cast)
            <div class="swiper-slide">
              <a href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $cast->id]) }}">
                <div class="castlist-body-items-time">
                  <div class="castlist-slide-image">
                    <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
                    <div class="castlist-body-item-name">
                      {{ $cast->name }}
                    </div>
                  </div>
                  <div class="castlist-body-item-property">
                    {{ "T:" . $cast->height." B:".$cast->bust." W:".$cast->waist." H:".$cast->hip }}
                  </div>
                  <div class="castlist-body-item-appeal">
                    {{ $cast->appeal_point }}
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="castlist-body-footer">
        <div class="castlist-body-footer-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </div>
        <div class="castlist-body-footer-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="castlist mock mock">
    <h2 class="castlist-title">
      <picture>
        <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop/castlist-sm.png') }}">
        <img src="{{ asset('assets/img/shop/castlist.png') }}" alt="Castlist">
      </picture>
    </h2>
  </div> --}}
  <!-- 相互リンク - Link -->
  @if ($banners->count() > 0)
  <div class="banner content-wrapper">
    {{-- <div class="banner-title">
      <img src="{{ asset('assets/img/link.svg') }}" alt="相互リンク">
      <h2 class="banner-title-ja">相互リンク</h2>
    </div> --}}
    <div class="banner-list">
    @foreach ($banners as $banner)
      <a href="{{ $banner->link_url }}" target="_blank">
        <img src="{{ asset('storage/' . $banner->thumbnail) }}" alt="{{ $banner->title }}">
        </a>
      @endforeach
    </div>
  </div>
  @endif
  <!-- Fixed Phone Link (SP Only) -->
  <div class="phone-link-container --fixed">
    <x-public.shop.phone-link :shop="$shop" />
  </div>
</x-public-shop-layout>

@push('scripts')
<script>
  import { Autoplay, Navigation, Pagination } from 'swiper/modules'
document.addEventListener('DOMContentLoaded', function() {
  if (typeof Swiper !== 'undefined') {
    const eventSlider = new Swiper('.event-slider', {
      modules: [Navigation, Pagination, Autoplay],
      slidesPerView: 'auto',
      spaceBetween: 20,
      centeredSlides: true,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        reverseDirection: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.event-slide-next',
        prevEl: '.event-slide-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
          centeredSlides: false,
        }
      }
    });
  } else {
    console.error('Swiper is not loaded');
  }

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
@endpush
@once
  @vite(['resources/js/shop/newGirls.js', 'resources/js/shop/castlist_top.js', 'resources/scss/shop/castlist_top.scss'])
@endonce