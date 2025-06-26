{{-- <div class="mock">
  <picture>
    <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-footer-sm.png') }}">
    <img src="{{ asset('assets/img/mock-footer-lg.png') }}" alt="">
  </picture>
</div> --}}

<footer class="footer" id="footer">
  <nav class="footer__nav">
    <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">HOME</a></div>
    <div class="footer__nav-item"><a href="{{ route('public.group.shop') }}">店舗一覧</a></div>
    <div class="footer__nav-item"><a href="{{ url('https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/') }}">求人情報</a></div>
    <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">グループTOP</a></div>
  </nav>
  <div class="footer__nav">
    <div class="footer__nav-item"><a href="{{ route('public.group.personal-policy') }}">個人情報保護方針</a></div>
  </div>
  <div class="footer__copyright">
    Copyright © PLO Group All Rights Reserved.
  </div>
</footer>
