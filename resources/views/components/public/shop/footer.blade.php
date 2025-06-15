<footer class="footer" id="footer">
  <div class="footer-content">
    <div class="footer-nav">
      <ul class="footer-nav-list">
        <li><a href="{{ url('#')}}">HOME</a></li>
        <li><a href="{{ url('#')}}">最新情報</a></li>
        <li><a href="{{ route('public.shop.fee', $shop->slug) }}">料金システム</a></li>
        <li><a href="{{ route('public.shop.castlist', $shop->slug) }}">キャスト一覧</a></li>
        <li><a href="{{ url('shop')}}">店舗一覧</a></li>
        <li><a href="{{ url('https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/')}}">求人情報</a></li>
        <li><a href="{{ url('/privacy-policy') }}">個人情報保護方針</a></li>
        <li><a href="{{ url('/') }}">グループTOP</a></li>
      </ul>
    </div>
    <div class="footer-logo">
      <img src="{{ asset('assets/img/shop/footer.svg') }}" alt="PLO Group">
    </div>
  </div>
  <div class="footer-copyright">
    <p>Copyright © PLO Group All Rights Reserved.</p>
  </div>
</footer>
