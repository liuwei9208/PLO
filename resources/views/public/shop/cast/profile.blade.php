<x-public-shop-layout :shop="$shop">

  <!-- Title -->
  <div class="title">
    <p class="title-label1">CAST PROFILE</p>
    <p class="title-label2">Girls Name</p>
    <h1 class="title-name">
      {{ $cast->name }}
    </h1>
    <p class="title-attr">
      Age {{ $cast->age }}／T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
    </p>
  </div>
  @if(count($gallerys) > 0)
  <div class="gallery">
    <div class="gallery-slider">
      <div class="gallery-slider__container">
        @foreach($gallerys as $gallery)
          <div class="gallery-slider__slide">
            <img src="{{ asset('storage/' . $gallery) }}" alt="{{ $cast->name }}">
          </div>
        @endforeach
      </div>
      <button class="gallery-slider__prev">←</button>
      <button class="gallery-slider__next">→</button>
      <div class="gallery-slider__dots">
        @foreach($gallerys as $index => $gallery)
          <button class="gallery-slider__dot" data-index="{{ $index }}"></button>
        @endforeach
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
  {{-- <div class="schedule">
    <div class="schedule-title">
      <h2 class="schedule-title__title">Schedule</h2>
    </div>
    <div class="schedule-container">
      <div class="schedule-today-status">
        <h3 class="schedule-today-status__title">Today's Schedule</h3>
        <h1 class="schedule-today-status__status">出勤中</h1>
      </div>
      <div class="schedule-week">
        <div class="schedule-week__title_container">
          <h2 class="schedule-week__title">Weekly Schedule</h2>
        </div>
        <div class="schedule-week__items">
          <div class="schedule-week__item">
            <div class="schedule-week__item__date">06/01</div>
            <div class="schedule-week__item__weekday">日</div>
            <div class="schedule-week__item__status">お休み</div>
          </div>
          <div class="schedule-week__item">
            <div class="schedule-week__item__date">06/02</div>
            <div class="schedule-week__item__weekday">月</div>
            <div class="schedule-week__item__status">お休み</div>
          </div>
          <div class="schedule-week__item">
            <div class="schedule-week__item__date">06/03</div>
            <div class="schedule-week__item__weekday">火</div>
            <div class="schedule-week__item__status">10：00～12：00</div>
          </div>
          <div class="schedule-week__item">
            <div class="schedule-week__item__date">06/04</div>
            <div class="schedule-week__item__weekday">水</div>
            <div class="schedule-week__item__status">10：00～12：00</div>
          </div>
          <div class="schedule-week__item">
            <div class="schedule-week__item__date">06/05</div>
            <div class="schedule-week__item__weekday">木</div>
            <div class="schedule-week__item__status">10：00～12：00</div>
          </div>
          <div class="schedule-week__item">
            <div class="schedule-week__item__date">06/06</div>
            <div class="schedule-week__item__weekday">金</div>
            <div class="schedule-week__item__status">10：00～12：00</div>
          </div>
          <div class="schedule-week__item">
            <div class="schedule-week__item__date">06/07</div>
            <div class="schedule-week__item__weekday">土</div>
            <div class="schedule-week__item__status">10：00～12：00</div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="movie">
    <div class="movie-title">
      <h2 class="movie-title__title">Movie</h2>
    </div>
    <div class="movie-container">
      {{-- @foreach($movies as $movie) --}}
        <div class="movie-item">
          <div class="movie-item__image">
            <img src="{{ asset('storage/movie/1.png') }}" alt="">
          </div>
          {{-- <div class="movie-item__title">{{ 'タイトル' }}</div> --}}
        </div>
        <div class="movie-item">
          <div class="movie-item__image">
            <img src="{{ asset('storage/movie/2.png') }}" alt="">
          </div>
          {{-- <div class="movie-item__title">{{ 'タイトル' }}</div> --}}
        </div>
      {{-- @endforeach --}}
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
</x-public-shop-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const container = document.querySelector('.gallery-slider__container');
  const slides = document.querySelectorAll('.gallery-slider__slide');
  const prevBtn = document.querySelector('.gallery-slider__prev');
  const nextBtn = document.querySelector('.gallery-slider__next');
  const dots = document.querySelectorAll('.gallery-slider__dot');
  let currentPosition = 0;
  const isMobile = window.innerWidth <= 767;
  const slideWidth = isMobile ? 100 : 100 / 3; // PC:3枚、SP:1枚
  let autoSlideInterval;

  function updateSlider() {
    container.style.transform = `translateX(-${currentPosition * slideWidth}%)`;
    // ドットのアクティブ状態を更新
    dots.forEach((dot, index) => {
      if (isMobile) {
        dot.classList.toggle('active', index === currentPosition);
      } else {
        // PCの場合は3枚表示なので、現在のスライド位置に応じてドットをアクティブに
        const startIndex = currentPosition;
        const endIndex = startIndex + 2;
        dot.classList.toggle('active', index >= startIndex && index <= endIndex);
      }
    });
  }

  function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
      if (currentPosition < slides.length - (isMobile ? 1 : 3)) {
        currentPosition++;
      } else {
        currentPosition = 0;
      }
      updateSlider();
    }, 3000); // 3秒ごとにスライド
  }

  function stopAutoSlide() {
    clearInterval(autoSlideInterval);
  }

  prevBtn.addEventListener('click', () => {
    stopAutoSlide();
    if (currentPosition > 0) {
      currentPosition--;
      updateSlider();
    }
    startAutoSlide();
  });

  nextBtn.addEventListener('click', () => {
    stopAutoSlide();
    if (currentPosition < slides.length - (isMobile ? 1 : 3)) {
      currentPosition++;
      updateSlider();
    }
    startAutoSlide();
  });

  // ドットクリック時の処理
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      stopAutoSlide();
      if (isMobile) {
        currentPosition = index;
      } else {
        // PCの場合は3枚表示なので、クリックしたドットが最初に表示されるように調整
        currentPosition = Math.min(index, slides.length - 3);
      }
      updateSlider();
      startAutoSlide();
    });
  });

  // マウスがスライダー上にある時は自動スライドを停止
  container.addEventListener('mouseenter', stopAutoSlide);
  container.addEventListener('mouseleave', startAutoSlide);

  // 初期化
  updateSlider();
  startAutoSlide();
});
</script>
