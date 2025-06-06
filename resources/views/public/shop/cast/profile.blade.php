<x-public-shop-layout :shop="$shop">
  <!-- Title -->
  <div class="title">
    <p class="title-label1">CAST PROFILE</p>
    <p class="title-label2">Girls Name</p>
    <h1 class="title-name">{{ $cast->name }}</h1>
    <p class="title-attr">
      Age {{ $cast->age }}／T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
    </p>
  </div>

  @if(count($gallerys) > 0)
    <div class="gallery">
      <div class="gallery-slider swiper">
        <div class="swiper-wrapper">
          @foreach($gallerys as $gallery)
            <div class="swiper-slide">
              <img src="{{ asset('storage/' . $gallery) }}" alt="{{ $cast->name }}">
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div><div class="swiper-pagination"></div>
        <div class="profile-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </div>
        <div class="profile-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </div>
      </div>
    </div>
  @endif

  <div class="diary">
    <div class="diary-title">
      <h2 class="diary-title__title">Photo Diary</h2>
      <a href="#" class="diary-title__link">もっと見る</a>
    </div>
    <div class="diary-item">
      @foreach($diarys as $diary)
        <div class="diary-item__content">
          <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="{{ $diary->subject }}">
          <div class="diary-item__subject">{{ $diary->subject }}</div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="working">
    <div class="working-title">
      <h2 class="working-title__title">Schedule</h2>
    </div>
    <div class="working-container">
      <img src="{{ asset('assets/img/shop/working.png') }}" alt="Schedule" class="working-image">
    </div>
  </div>

  <div class="movie">
    <div class="movie-title">
      <h2 class="movie-title__title">Movie</h2>
    </div>
    <div class="movie-container">
      <div class="movie-item">
        <div class="movie-item__image">
          <img src="{{ asset('storage/movie/1.png') }}" alt="">
        </div>
      </div>
      <div class="movie-item">
        <div class="movie-item__image">
          <img src="{{ asset('storage/movie/2.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>

  <!-- Profile Content -->
  <div class="profile-content">
    <h2 class="profile-content__main-title">Profile</h2>
    <div class="profile-content__top">
      <div class="profile-content__message">
        <h3 class="profile-content__title">Girl Message</h3>
        <div class="profile-content__text">
          {{ $cast->appeal_point }}
        </div>
      </div>
      <div class="profile-content__qa">
        <h3 class="profile-content__title">Q&A</h3>
        <div class="profile-content__text">
          @foreach($qas as $qa)
            <div class="profile-content__qa-item">
              <div class="profile-content__qa-item__question">{{ 'Q' }}: {{ $qa->question->question }}</div>
              <div class="profile-content__qa-item__answer">{{ 'A' }}: {{ $qa->answer }}</div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="profile-content__style">
      <h3 class="profile-content__title">性格＆スタイル</h3>
      <div class="profile-content__text">
        @if($personalities == "")
          {{ $styles }}
        @else
          {{ $personalities.','.$styles }}
        @endif
      </div>
    </div>

    <div class="profile-content__option">
      <h3 class="profile-content__title">Option</h3>
      <div class="profile-content__text">
        {{ $options }}
      </div>
    </div>

    <div class="profile-content__bottom">
      <div class="profile-content__shop-message">
        <h3 class="profile-content__title">Shop Message</h3>
        <div class="profile-content__text">
          {{ $cast->manager_comment }}
        </div>
      </div>
    </div>
  </div>
  {{-- @push('scripts')
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.gallery-slider', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        }
      }
    });
  });
  </script>
  @endpush --}}
  @once
    @vite('resources/js/shop/profile.js')
  @endonce
</x-public-shop-layout>
