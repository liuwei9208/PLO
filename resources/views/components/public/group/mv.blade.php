<div class="mv">
  <div class="mv-main">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/group/mv/main-sm.jpg') }}">
      <img src="{{ asset('assets/img/group/mv/main-lg.jpg') }}" alt="">
      <source media="(min-width: 768px)" srcset="{{ asset('assets/img/group/mv/main-lg.jpg') }}">
    </picture>
  </div>

  {{-- <div class="mv-text">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/group/mv/text-sm.png') }}">
      <img src="{{ asset('assets/img/group/mv/text-lg.png') }}" alt="">
    </picture>
  </div> --}}
  <div class="mv-scroll md lg">
    <img src="{{ asset('assets/img/group/mv/scroll.svg') }}" alt="">
  </div>
  {{-- @if(request()->routeIs('public.group.home'))
  <div class="mv-member">
    <div class="pc-only mv-member-pc">
      <div class="mv-member-pc-login">
        @if(!Auth::guard('member')->check() && !Auth::guard('web')->check())
        <a href="{{ route('login') }}">
          <img src="{{ asset('assets/img/group/mv/login-lg.png') }}" alt="">
        </a>
        @else
          <img src="{{ asset('assets/img/group/mv/login-lg.png') }}" alt="">
        @endif
      </div>
      <div class="mv-member-pc-post">
        <img src="{{ asset('assets/img/group/mv/post-lg.png') }}" alt="">
      </div>
    </div>
    <div class="sp-only mv-member-sp">
      @if(!Auth::guard('member')->check() && !Auth::guard('web')->check())
      <a href="{{ route('login') }}">
      <img src="{{ asset('assets/img/group/mv/login-sm.png') }}" alt="">
      </a>
      @else
        <img src="{{ asset('assets/img/group/mv/login-sm.png') }}" alt="">
      @endif
    </div>
    <picture class="review-image sp-only">
      <img src="{{ asset('assets/img/group/mv/review-sm.png') }}" alt="">
    </picture>
  </div>
  @endif --}}
</div>
