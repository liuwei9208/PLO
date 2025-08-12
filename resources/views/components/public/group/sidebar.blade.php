@php
  $shopNavs = [
    'pussycat' => [
      'name' => 'Pussycat',
      'japanese' => 'プッシーキャット',
      'logo' => 'pussycat-logo.png',
      'link' => route('public.shop.home', ['shop' => 'pussycat']),
      'banner' => 'pussycat.png',
      'xlink' => 'https://x.com/xxxx'
    ],
    'shizuku' => [
      'name' => 'Shizuku',
      'japanese' => '雫',
      'logo' => 'shizuku-logo.png',
      'link' => route('public.shop.home', ['shop' => 'shizuku']),
      'banner' => 'shizuku.png',
      'xlink' => 'https://x.com/ShizukuHealth'
    ],
    'miyabi' => [
      'name' => 'Miyabi',
      'japanese' => '雅',
      'logo' => 'miyabi-logo.png',
      'link' => route('public.shop.home', ['shop' => 'miyabi']),
      'banner' => 'miyabi.png',
      'xlink' => 'https://x.com/xxxx'
    ],
    'shiroganeze' => [
      'name' => 'Shiroganeze',
      'japanese' => 'シロガネーゼ',
      'logo' => 'shiroganeze-logo.png',
      'link' => route('public.shop.home', ['shop' => 'shiroganeze']),
      'banner' => 'shiroganeze.png',
      'xlink' => 'https://x.com/EstheSiroganeze'
    ],
    'lovestory' => [
      'name' => 'Love Story',
      'japanese' => 'ラブストーリー',
      'logo' => 'lovestory-logo.png',
      'link' => route('public.shop.home', ['shop' => 'lovestory']),
      'banner' => 'lovestory.png',
      'xlink' => 'https://x.com/lovestory9911'
    ],
  ];
@endphp

<aside class="pg-fixed-sidebar">
  <div class="pg-fixed-sidebar__inner">
    <div class="pg-fixed-sidebar__logo">
      <a href="{{ route('public.group.home') }}">
        <img src="{{ asset('assets/img/group/header/plo-logo.png') }}" alt="PLO Group"/>
      </a>
    </div>

    <nav class="pg-fixed-sidebar__shops">
        @foreach($shopNavs as $shopNav)
          <a class="pg-fixed-sidebar__shop" href="{{ $shopNav['link'] }}">
            <img src="{{ asset('assets/img/logo/' . $shopNav['logo']) }}" alt="{{ $shopNav['name'] }}"/>
            <div class="pg-fixed-sidebar__shop-label">
                <span class="pg-fixed-sidebar__shop-label-name">{{ strtoupper($shopNav['name']) }}</span>
                <span class="pg-fixed-sidebar__shop-label-japanese">{{ $shopNav['japanese'] }}</span>
            </div>
          </a>
        @endforeach
    </nav>

    <div class="pg-fixed-sidebar__phone">
      <div class="pg-phone">
        <div class="pg-phone__content">
          <div class="pg-phone__banner">
            <div class="pg-phone__banner-track" data-banner-track>
              @foreach($shopNavs as $shopKey => $shopNav)
                <a class="pg-phone__banner-item" href="{{ $shopNav['xlink'] }}" data-xlink="{{ $shopNav['xlink'] }}" target="_blank" rel="noopener">
                  <img src="{{ asset('assets/img/shop banner/'. $shopNav['banner']) }}" alt="{{ $shopNav['name'] }} banner" />
                </a>
              @endforeach
            </div>
          </div>
          <a class="pg-phone__xlink" href="#" target="_blank" rel="noopener" data-xlink-button>
            <span class="pg-phone__xicon">𝕏</span>
          </a>
        </div>
        <img src="{{ asset('assets/img/phone.png') }}" alt="phone" class="pg-phone__frame" />
      </div>
    </div>
  </div>
</aside>

@push('scripts')
  <script>
    (function(){
      const track = document.querySelector('[data-banner-track]');
      const xBtn = document.querySelector('[data-xlink-button]');
      if(!track || !xBtn) return;
      let index = 0;
      const updateXLink = () => {
        const items = Array.from(track.children);
        if(items.length === 0) return;
        const current = items[index];
        const href = current.getAttribute('data-xlink') || current.getAttribute('href');
        xBtn.setAttribute('href', href);
      };
      const step = () => {
        const items = track.children;
        if(items.length === 0) return;
        index = (index + 1) % items.length;
        const itemWidth = items[0].getBoundingClientRect().width + 8; // width + gap
        const x = -index * itemWidth;
        track.style.transform = `translateX(${x}px)`;
        updateXLink();
      };
      updateXLink();
      setInterval(step, 2500);
    })();
  </script>
@endpush


