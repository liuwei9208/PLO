<header class="header-sub" id="header-sub">
    <div class="left-header">
        <div class="header-user-menu">
            <a href="{{ route('public.groups.home') }}">
                <small>Top</small>
                <span class="menu_newface">トップページ</span>
            </a>
        </div>
        <div class="header-separator"></div>
        <div class="header-user-menu">
            <a href="{{ route('public.groups.newface') }}">
                <small>New Face</small>
                <span class="menu_newface">新人情報</span>
            </a>
        </div>
        <div class="header-separator"></div>
        <div class="header-user-menu">
            <a href="{{ route('public.group.newcomer') }}">
                <small>Schedule</small>
                <span class="menu_newface">出勤情報</span>
            </a>
        </div>
    </div>
    <div class="sub-header-logo">
        <a href="{{ route('public.group.home') }}">
            <img src="{{ asset('assets/img/groups/PLO2.png') }}" alt="">
        </a>
    </div>
    <div class="right-header">
        <div class="right-header-menu">
        <div class="header-user-menu">
            <a href="{{ route('public.group.newcomer') }}">
                <small>Event</small>
                <span class="menu_newface">イベント情報</span>
            </a>
        </div>
        <div class="header-separator header-separator--dark"></div>
        <div class="header-user-menu">
            <a href="{{ route('public.group.newcomer') }}">
                <small>Shop</small>
                <span class="menu_newface">店舗一覧</span>
            </a>
        </div>
        <div class="header-separator header-separator--dark"></div>
        <div class="header-user-menu">
            <a href="{{ route('public.group.newcomer') }}">
                <small>Logout</small>
                <span class="menu_newface">ログアウト</span>
            </a>
        </div>
        </div>
        <div class="header-buttons">
            @if (Auth::guard('web')->check())
            <a href="{{ route('admin.home') }}" class="logout-button">
                <span>管理画面</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                    <path d="M0 14.2739V0H7.13695V1.58599H1.58599V12.6879H7.13695V14.2739H0ZM10.3089 11.1019L9.21856 9.95208L11.2407 7.92994H4.75797V6.34395H11.2407L9.21856 4.32182L10.3089 3.17198L14.2739 7.13695L10.3089 11.1019Z" fill="#021A21"/>
                </svg>
            </a>
            @endif
            <button class="menu-button" id="drawer-toggle" data-pushbar-target="right">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="27" viewBox="0 0 62 27" fill="none">
                    <line y1="1" x2="61.25" y2="1" stroke="white" stroke-width="2"/>
                    <line y1="13.5" x2="61.25" y2="13.5" stroke="white" stroke-width="2"/>
                    <line y1="26" x2="61.25" y2="26" stroke="white" stroke-width="2"/>
                </svg>
                <span>Menu</span>
            </button>
        </div>
    </div>
</header>
@once
  @vite('resources/scss/groups/header-sub.scss')
@endonce
