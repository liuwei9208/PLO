<header class="header" id="header">
  <a href="{{ route('public.group.home') }}" class="header-logo sm">
    <img src="{{ asset('assets/img/group/header/logo.png') }}" alt="">
  </a>
  <div class="header-user md lg">
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
    <a href="#">
      <small>SIGN UP</small>
      <span>新規登録</span>
    </a>
  </div>

</header>
<button class="drawer-toggle" id="drawer-toggle">
  <div class="drawer-toggle-bars">
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
    <span class="drawer-toggle-bar"></span>
  </div>
  <span class="drawer-toggle-menu rainbow-text">MENU</span>
</button>