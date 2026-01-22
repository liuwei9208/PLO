{{-- <div class="mock">
  <picture>
    <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-footer-sm.png') }}">
    <img src="{{ asset('assets/img/mock-footer-lg.png') }}" alt="">
  </picture>
</div> --}}
{{-- <div class="law">
  <div class="law-content content-wrapper pc-only">
    <p>当グループは、風俗関連営業等の規制及び業務の適正化等に関する法律</p>
    <p>(第27条第2項、第33条第2項)の規定を取得しておりますので安心してお遊び頂けます。</p>
    <p>このサイトにはアダルトコンテンツが含まれています。</p>
    <p>18歳未満の方の閲覧は固くお断りいたします。</p>
  </div>
  <div class="law-content content-wrapper sp-only">
    <p>当グループは、風俗関連営業等の規制及び</p><p>業務の適正化等に関する法律</p>
    <p>(第27条第2項、第33条第2項)の規定</p><p>を取得しておりますので</p><p>安心してお遊び頂けます。</p>
    <p>このサイトには</p><p>アダルトコンテンツが含まれています。</p>
    <p>18歳未満の方の閲覧は固くお断りいたします。</p>
  </div>

</div> --}}
<footer class="footer" id="footer">
  <div class="footer__main">
    <div class="footer__content">
      <nav class="footer__nav">
        <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">TOP</a></div>
        <div class="footer__nav-item"><a href="{{ route('public.group.schedule') }}">出勤情報</a></div>
        <div class="footer__nav-item"><a href="{{ route('public.group.pickup') }}">ピックアップ</a></div>
        <div class="footer__nav-item"><a href="{{ route('public.group.event') }}">イベント情報</a></div>
        <div class="footer__nav-item"><a href="{{ route('public.group.shop') }}">店舗一覧</a></div>
        <div class="footer__nav-item"><a href="#">SNS</a></div>
        <div class="footer__nav-item"><a href="{{ route('login') }}">ログイン</a></div>
        <div class="footer__nav-item"><a href="{{ route('terms.show') }}">新規会員登録</a></div>
        <div class="footer__nav-item"><a href="https://17auto.biz/plogroup/registp/entryform2.htm">メルマガ</a></div>
        <div class="footer__nav-item"><a href="{{ url('https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/') }}">女性求人</a></div>
        <div class="footer__nav-item"><a href="">男性求人</a></div>
        <div class="footer__nav-item"><a href="{{ route('public.group.privacy-policy') }}">個人情報保護方針</a></div>
      </nav>
      
      <div class="footer__logo-section">
        <div class="footer__logo-image">
          <img src="{{ asset('assets/img/group/header/plo-new.png') }}" alt="PLO Logo">
        </div>
      </div>
    </div>
  </div>
</footer>
