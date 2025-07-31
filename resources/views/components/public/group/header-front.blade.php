<header class="header" id="header">
  <a href="{{ route('public.group.home') }}" class="header-logo sm">
    <img src="{{ asset('assets/img/group/header/plo-logo.png') }}" alt="">
  </a>
  <div class="header-user md lg">
    <div class="header-user-menu">
      <a href="{{ route('logoutAll') }}">
        <small>NEWFACET</small>
        <span class="menu_newface">新人情報</span>
      </a>
      <a href="{{ route('logoutAll') }}">
        <small>SCHEDULE</small>
        <span class="menu_schedule">出勤情報</span>
      </a>
      <a href="{{ route('logoutAll') }}">
        <small>EVENT</small>
        <span class="menu_event">イベント情報</span>
      </a>
      <a href="{{ route('logoutAll') }}">
        <small>SHOP</small>
        <span class="menu_shop">店舗一覧</span>
      </a>
    </div>
    <div class="header-user-logbox">
    @if (Auth::guard('member')->check() || Auth::guard('web')->check())
      <a href="{{ route('logoutAll') }}">
        <small>LOGOUT</small>
        <span>ログアウト</span>
      </a>
    @else
      <a href="{{ route('login') }}">
        <small>LOGIN</small>
        <span>ログイン</span>
      </a>
    @endif
      <div class="header-user-logbox-last">
        <span></span>
        <a href="#">
          <small>SIGN UP</small>
          <span>新規登録</span>
        </a>
      </div>
    </div>
  </div>

</header>
<button class="drawer-toggle" id="drawer-toggle" data-pushbar-target="right">
  <div class="drawer-toggle-bars">
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
  </div>
  <span class="drawer-toggle-menu rainbow-text">MENU</span>
</button>