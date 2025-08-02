<header class="header --{{ $shop->slug }}">
  <div class="header-logo --shizuku lg md sm" id="header-logo">
    <a href="{{ url('/'.$shop->slug) }}">
      {{-- <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="" class="pc-logo"> --}}
      {{-- <img src="{{ asset('assets/img/shop/shizuku/shizuku-logo-lg.svg') }}" alt="" class="pc-logo">
      <img src="{{ asset('assets/img/shop/shizuku/shizuku-logo-sm.svg') }}" alt="" class="sp-logo"> --}}
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-lg.svg') }}" alt="" class="pc-logo">
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-md.svg') }}" alt="" class="md-logo">
      <img src="{{ asset('assets/img/shop/logo/'.$shop->slug.'-logo-sm.svg') }}" alt="" class="sp-logo">
    </a>
  </div>
  <div class="header-nav lg">
    {{-- <img src="{{ asset('assets/img/shop/' . 'shizuku' . '/nav-mock.svg') }}" alt=""> --}}
    <div class="header-nav-lists">
      <div class="header-nav-lists-opentime">
        <p>朝8:30〜
        </p>
        <p>予約可能</p>
      </div>
      <div class="header-nav-lists-contact">
        <a href="tel:{{ $shop->tel }}">
          <img src="{{ asset('assets/img/shop/call.png') }}" alt="">
          <span>{{ $shop->tel }}</span>
        </a>
      </div>
      <div class="header-nav-lists-signin">
        <a href="{{ route('login') }}">
          <img src="{{ asset('assets/img/shop/signin-e.png') }}" alt="">
          <span>ログイン</span>
        </a>
      </div>
      <div class="header-nav-lists-signup">
        <a href="{{ route('register') }}">
          <img src="{{ asset('assets/img/shop/signup.png') }}" alt="">
          <span>新規登録</span>
        </a>
      </div>
    </div>
  </div>
  <button class="header-toggle" id="drawer-toggle">
    <i class="header-toggle-bar"></i>
    <i class="header-toggle-bar"></i>
    <i class="header-toggle-bar"></i>
  </button>
</header>

<div class="drawer" id="drawer">
  <div class="drawer-content">
    <button class="drawer-close" id="drawer-close">
      <span></span>
      <span></span>
    </button>
    <nav class="drawer-nav">
      <div class="drawer-nav-lists">
        <ul class="drawer-nav-list">
          <li><a href="{{ route('public.shop.home', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">TOPページ</a></li>
          <li><a href="{{ route('public.shop.schedule', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">出勤情報
          </a></li>
          <li><a href="{{ route('public.shop.event', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">イベント</a></li>
          <li><a href="{{ route('public.shop.castlist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">キャスト一覧</a></li>
          <li><a href="{{route('public.shop.reviewlist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">口コミ一覧</a></li>
          @if($shop)
            <li><a href="{{ url('/' . $shop->slug . '/ranking') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">指名ランキング</a></li>
          @else
            <li><a href="{{ url('#') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">指名ランキング</a></li>
          @endif
          <li><a href="{{ route('public.shop.about', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">アクセス情報</a></li>
        </ul>
        <ul class="drawer-nav-list">
          <li><a href="{{ route('public.shop.newslist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">News情報</a></li>
          <li><a href="{{ route('public.shop.fee',$shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">料金システム</a></li>
          <li><a href="{{ route('public.shop.diarylist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">写メ日記一覧
          </a></li>
          <li><a href="{{ route('public.shop.movielist', $shop->slug) }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">MOVIE一覧
          </a></li>
          @if(Auth::guard('member')->check())
          <li><a href="{{ route('public.group.mypage') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">マイページ
          </a></li>
          @endif
          @if (Auth::guard('member')->check() || Auth::guard('web')->check())
          <li><a href="{{ route('logoutAll') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">ログアウト
          </a></li>
          @else
          <li><a href="{{ route('login') }}"><img src="{{ asset('assets/img/raindrop.png') }}" alt="" class="raindrop-icon">ログイン
          </a></li>
          @endif
        </ul>
      </div>
      <div class="drawer-nav-bottom">
        <a href="{{ url('/') }}" class="plo-top-link">PLOグループ TOP</a>
      </div>
    </nav>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const drawerToggle = document.getElementById('drawer-toggle');
  const drawerClose = document.getElementById('drawer-close');
  const drawer = document.getElementById('drawer');
  const body = document.body;
  let scrollPosition = 0;

  function lockScroll() {
    scrollPosition = window.pageYOffset;
    body.style.position = 'fixed';
    body.style.top = `-${scrollPosition}px`;
    main.style.position = 'fixed';
    main.style.top = `-${scrollPosition}px`;
    body.style.width = '100%';
    body.classList.add('is-drawer-open');
  }

  function unlockScroll() {
    body.style.position = '';
    body.style.top = '';
    main.style.position = '';
    main.style.top = '';
    body.style.width = '';
    body.classList.remove('is-drawer-open');
    window.scrollTo(0, scrollPosition);
  }

  function openDrawer() {
    drawer.classList.add('is-open');
    lockScroll();
  }

  function closeDrawer() {
    drawer.classList.remove('is-open');
    unlockScroll();
  }

  drawerToggle.addEventListener('click', function(e) {
    e.preventDefault();
    openDrawer();
  });

  drawerClose.addEventListener('click', function(e) {
    e.preventDefault();
    closeDrawer();
  });

  drawer.addEventListener('click', function(e) {
    if (e.target === drawer) {
      closeDrawer();
    }
  });

  // ページ読み込み時にdrawerが開いていたら閉じる
  if (drawer.classList.contains('is-open')) {
    closeDrawer();
  }
});
</script>
