{{-- <div class="mock">
  <picture>
    <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-footer-sm.png') }}">
    <img src="{{ asset('assets/img/mock-footer-lg.png') }}" alt="">
  </picture>
</div> --}}
<div class="law">
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

</div>
<div class="scroll-top">
  <a href="#top" id="scroll-top-btn">
    <span class="scroll-top-arrow">↑</span>
  </a>
</div>
<a href="{{ route('public.group.search') }}" class="search-girl">
  <div class="search-girl-content">
    <img src="{{ asset('assets/img/search.png') }}" alt="search">
    <div class="search-girl-content-text">
      <h2>女の子検索</h2>
    </div>
  </div>
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Scroll to top functionality
  const scrollTopBtn = document.getElementById('scroll-top-btn');

  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function(e) {
      e.preventDefault();

      // Smooth scroll to top with strong animation
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });

      // Add click animation
      this.style.transform = 'scale(0.9)';
      setTimeout(() => {
        this.style.transform = '';
      }, 150);
    });
  }

  // Show/hide scroll-top button based on scroll position
  window.addEventListener('scroll', function() {
    const scrollTopBtn = document.querySelector('.scroll-top');
    if (scrollTopBtn) {
      if (window.pageYOffset > 300) {
        scrollTopBtn.style.opacity = '1';
        scrollTopBtn.style.visibility = 'visible';
        scrollTopBtn.style.transform = 'translateY(0)';
      } else {
        scrollTopBtn.style.opacity = '0';
        scrollTopBtn.style.visibility = 'hidden';
        scrollTopBtn.style.transform = 'translateY(20px)';
      }
    }
  });

  // Initialize scroll-top button state
  const scrollTopBtn = document.querySelector('.scroll-top');
  if (scrollTopBtn) {
    scrollTopBtn.style.opacity = '0';
    scrollTopBtn.style.visibility = 'hidden';
    scrollTopBtn.style.transform = 'translateY(20px)';
    scrollTopBtn.style.transition = 'all 0.3s ease';
  }
});
</script>
<footer class="footer" id="footer">
  <nav class="footer__nav">
    <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">HOME</a></div>
    <div class="footer__nav-item"><a href="{{ route('public.group.shop') }}">店舗一覧</a></div>
    <div class="footer__nav-item"><a href="{{ url('https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/') }}">求人情報</a></div>
    <div class="footer__nav-item"><a href="{{ route('public.group.home') }}">グループTOP</a></div>
  </nav>
  <div class="footer__nav">
    <div class="footer__nav-item"><a href="{{ route('public.group.privacy-policy') }}">プライバシーポリシー</a></div>
  </div>
  <div class="footer__copyright">
    Copyright © PLO Group All Rights Reserved.
  </div>
</footer>
