<x-public-groups-sub-page-layout
  titleEn=""
  titleJa=""
  :bannerImage="asset('assets/img/female/home-page.png')"
  :vectorImage="asset('')"
  :showButtonGroup="false"
  :showLoadMore="false"
  :showDateSearchBar="false"
>
  @push('styles')
    <style>
      @media screen and (min-width: 1280px) {
        .banner-photodiary--female ~ .main {
          margin-left: auto !important;
          margin-right: auto !important;
          width: min(100%, 1440px) !important;
          max-width: 1440px !important;
          display: flex;
          flex-direction: column;
          align-items: center;
          background: #ececec;
          padding-bottom: 36px;
        }

        .banner-photodiary--female ~ .main > .recruit-line-cta,
        .banner-photodiary--female ~ .main > .recruit-female-shop,
        .banner-photodiary--female ~ .main > .recruit-female-movie,
        .banner-photodiary--female ~ .main > .recruit-female-treatment,
        .banner-photodiary--female ~ .main > .recruit-female-flow,
        .banner-photodiary--female ~ .main > .recruit-female-faq,
        .banner-photodiary--female ~ .main > .recruit-female-blog,
        .banner-photodiary--female ~ .main > .recruit-female-contact,
        .banner-photodiary--female ~ .main > .recruit-female-staff-link,
        .banner-photodiary--female ~ .main > .recruit-stores,
        .banner-photodiary--female ~ .main > .recruit-female-footer {
          width: 100%;
          max-width: 1440px;
          margin-left: 0;
          margin-right: 0;
        }
      }

      @media screen and (min-width: 1441px) {
        .banner-photodiary--female ~ .main .recruit-female-shop__inner {
          min-height: 1675.63px;
          height: 1675.63px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__grid {
          grid-template-columns: repeat(2, 600px);
          gap: 39px 40px;
          max-width: 1240px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__cardLink {
          width: 600px;
          height: 433.54px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__card {
          width: 600px;
          height: 433.54px;
          box-sizing: border-box;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__image {
          height: 327px;
          aspect-ratio: auto;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__body {
          min-height: calc(433.54px - 327px);
          box-sizing: border-box;
        }
      }

      .recruit-female-shop__cardLink,
      .recruit-stores__cardLink {
        display: block;
        text-decoration: none;
        color: inherit;
      }

      .recruit-female-shop__cardLink {
        height: 100%;
      }

      .recruit-female-shop__card {
        height: 100%;
      }

      .recruit-female-blog {
        display: none !important;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 20px;
        background: #000;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__thumbs {
        overflow-x: auto;
        overflow-y: hidden;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__thumb {
        flex: 0 0 220px;
        width: 220px;
        padding: 0;
        border: 0;
        background: transparent;
        cursor: pointer;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__thumbVideo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      @media screen and (max-width: 1024px) {
        .banner-photodiary--female ~ .main .recruit-female-shop__inner {
          padding: 0 16px 28px;
          gap: 16px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__heading {
          margin-top: -28px;
          font-size: 56px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
          max-width: 100%;
          gap: 12px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__card {
          flex-direction: column;
          border-width: 2px;
          border-radius: 14px;
          align-items: stretch;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__image {
          width: 100%;
          aspect-ratio: 600 / 327;
          flex-shrink: 0;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__image img {
          border-top-left-radius: 12px;
          border-top-right-radius: 12px;
          border-bottom-left-radius: 0;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__body {
          width: 100%;
          align-items: center;
          text-align: center;
          justify-content: flex-start;
          padding: 8px 8px 10px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__name {
          width: 100%;
          text-align: center;
          font-size: 16px;
          margin-bottom: 2px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__text {
          width: 100%;
          text-align: center;
          font-size: 10px;
          font-weight: 600;
          line-height: 1.45;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__br {
          display: inline;
        }

        .banner-photodiary--female ~ .main .recruit-female-movie__video {
          border-radius: 1vw;
        }

        .banner-photodiary--female ~ .main .recruit-female-movie__thumb {
          flex: 0 0 24vw;
          width: 24vw;
        }
      }
    </style>
  @endpush

  @if (session('success'))
    <div style="max-width: 960px; margin: 16px auto; padding: 12px 16px; border-radius: 8px; background: #e8f7ec; color: #165b2c; font-weight: 700;">
      {{ session('success') }}
    </div>
  @endif

  @if ($errors->any())
    <div style="max-width: 960px; margin: 16px auto; padding: 12px 16px; border-radius: 8px; background: #fdeaea; color: #7d1d1d;">
      <ul style="margin: 0; padding-left: 20px;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <section class="recruit-line-cta recruit-line-cta--female" aria-label="LINEとメールで簡単応募バナー">
    <div class="recruit-line-cta__inner">
      <div class="recruit-message__line-cta recruit-message__line-cta--female">
        <span class="recruit-message__line-ctaLead">LINEで簡単応募！</span>
        <a href="#recruit-form" class="recruit-message__line-ctaLink recruit-message__line-ctaLink--line-female">
          <span class="recruit-message__line-ctaIcon">
            <img src="{{ asset('assets/img/male/line.png') }}" alt="LINE公式アカウント">
          </span>
          <span class="recruit-message__line-ctaText">公式LINE</span>
        </a>
        <a href="#recruit-form" class="recruit-message__line-ctaLink recruit-message__line-ctaLink--mail-female">
          <span class="recruit-message__line-ctaIcon">
            <img src="{{ asset('assets/img/female/mail.png') }}" alt="お問い合わせフォーム">
          </span>
          <span class="recruit-message__line-ctaText">お問い合わせ</span>
        </a>
      </div>
    </div>
  </section>

  <section class="recruit-female-shop" aria-labelledby="recruit-female-shop-title">
    <div class="recruit-female-shop__inner">
      <h2 id="recruit-female-shop-title" class="recruit-female-shop__heading">
        SHOP
      </h2>

      <div class="recruit-female-shop__grid">
        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/siroganeze/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1.png') }}" alt="シロガネーゼ 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">シロガネーゼ</h3>
              <p class="recruit-female-shop__text">
                着衣のまま接客可能で<br class="recruit-female-shop__br">30～40代も活躍できる<br class="recruit-female-shop__br">メンズエステ
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/pussycat011/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-1.png') }}" alt="プッシーキャット 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">プッシーキャット</h3>
              <p class="recruit-female-shop__text">
                フルリニューアルオー<br class="recruit-female-shop__br">プン！安定した高収入<br class="recruit-female-shop__br">をお約束
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/lovesS/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-2.png') }}" alt="ラブストーリー 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">ラブストーリー</h3>
              <p class="recruit-female-shop__text">
                20代の未経験ならラブ<br class="recruit-female-shop__br">ストでスタートがおす<br class="recruit-female-shop__br">すめ
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/miyabi0930/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-3.png') }}" alt="雅 MIYABI 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">雅 〜MIYABI〜</h3>
              <p class="recruit-female-shop__text">
                従来の人妻店とは違い<br class="recruit-female-shop__br">即サービスがないのが<br class="recruit-female-shop__br">働き易さのポイント
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-4.png') }}" alt="艶 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">艶</h3>
              <p class="recruit-female-shop__text">
                既婚者さんでも働きや<br class="recruit-female-shop__br">すい人妻店
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/8988/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-5.png') }}" alt="雫 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">雫</h3>
              <p class="recruit-female-shop__text">
                ★ソフトサービスヘル<br class="recruit-female-shop__br">ス！一切オプション無<br class="recruit-female-shop__br">し★
              </p>
            </div>
          </article>
        </a>
      </div>
    </div>
  </section>

  <section class="recruit-female-movie" aria-labelledby="recruit-female-movie-title">
    @php
      $staffVideos = collect(glob(public_path('assets/video/スタッフインタビュー動画/*.mp4')) ?: [])
        ->sort()
        ->values()
        ->map(fn ($path) => 'assets/video/スタッフインタビュー動画/' . basename($path))
        ->all();

      $girlVideos = collect(glob(public_path('assets/video/女の子インタビュー動画/*.mp4')) ?: [])
        ->sort()
        ->values()
        ->map(fn ($path) => 'assets/video/女の子インタビュー動画/' . basename($path))
        ->all();

      $staffPrimaryVideo = $staffVideos[0] ?? 'assets/video/female/staff-interview.mp4';
      $girlPrimaryVideo = $girlVideos[0] ?? 'assets/video/female/girl-interview.mp4';
    @endphp

    <div class="recruit-female-movie__inner">
      <header class="recruit-female-movie__header">
        <h2 id="recruit-female-movie-title" class="recruit-female-movie__heading">MOVIE</h2>
        <p class="recruit-female-movie__subheading">スタッフや在籍中の女の子に聞く！</p>
      </header>

      <div class="recruit-female-movie__blocks">
        {{-- Staff interview block (turquoise) --}}
        <section class="recruit-female-movie__block">
          <div class="recruit-female-movie__main recruit-female-movie__main--teal">
            <div class="recruit-female-movie__frame">
              <video
                id="staff-main-video"
                class="recruit-female-movie__video"
                controls
                playsinline
                preload="metadata"
                poster="{{ asset('assets/img/female/section2-1.png') }}"
              >
                <source src="{{ asset($staffPrimaryVideo) }}" type="video/mp4">
              </video>
            </div>

            <div class="recruit-female-movie__ribbon">
              <img src="{{ asset('assets/img/female/section2.png') }}" alt="" aria-hidden="true">
              <p class="recruit-female-movie__ribbonText">スタッフ interview</p>
            </div>

            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--prev" aria-label="前の動画へ">
              <img src="{{ asset('assets/img/female/left.png') }}" alt="">
            </button>
            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--next" aria-label="次の動画へ">
              <img src="{{ asset('assets/img/female/right.png') }}" alt="">
            </button>
          </div>

          <div class="recruit-female-movie__thumbs">
            @forelse ($staffVideos as $videoPath)
              <button
                type="button"
                class="recruit-female-movie__thumb recruit-female-movie__thumbButton"
                data-target-video="staff-main-video"
                data-video-src="{{ asset($videoPath) }}"
                aria-label="スタッフインタビュー動画を再生"
              >
                <video class="recruit-female-movie__thumbVideo" muted playsinline preload="metadata">
                  <source src="{{ asset($videoPath) }}" type="video/mp4">
                </video>
              </button>
            @empty
              <div class="recruit-female-movie__thumb">
                <img src="{{ asset('assets/img/female/section2-1.png') }}" alt="スタッフインタビュー サムネイル">
              </div>
            @endforelse
          </div>
        </section>

        {{-- Girl interview block (pink) --}}
        <section class="recruit-female-movie__block">
          <div class="recruit-female-movie__main recruit-female-movie__main--pink">
            <div class="recruit-female-movie__frame">
              <video
                id="girl-main-video"
                class="recruit-female-movie__video"
                controls
                playsinline
                preload="metadata"
                poster="{{ asset('assets/img/female/section2-1.png') }}"
              >
                <source src="{{ asset($girlPrimaryVideo) }}" type="video/mp4">
              </video>
            </div>

            <div class="recruit-female-movie__ribbon">
              <img src="{{ asset('assets/img/female/section2-2.png') }}" alt="" aria-hidden="true">
              <p class="recruit-female-movie__ribbonText">女の子 interview</p>
            </div>

            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--prev recruit-female-movie__arrow--pink" aria-label="前の動画へ">
              <img src="{{ asset('assets/img/female/left1.png') }}" alt="">
            </button>
            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--next recruit-female-movie__arrow--pink" aria-label="次の動画へ">
              <img src="{{ asset('assets/img/female/right1.png') }}" alt="">
            </button>
          </div>

          <div class="recruit-female-movie__thumbs">
            @forelse ($girlVideos as $videoPath)
              <button
                type="button"
                class="recruit-female-movie__thumb recruit-female-movie__thumbButton"
                data-target-video="girl-main-video"
                data-video-src="{{ asset($videoPath) }}"
                aria-label="女の子インタビュー動画を再生"
              >
                <video class="recruit-female-movie__thumbVideo" muted playsinline preload="metadata">
                  <source src="{{ asset($videoPath) }}" type="video/mp4">
                </video>
              </button>
            @empty
              <div class="recruit-female-movie__thumb">
                <img src="{{ asset('assets/img/female/section2-1.png') }}" alt="女の子インタビュー サムネイル">
              </div>
            @endforelse
          </div>
        </section>
      </div>
    </div>
  </section>

  <section class="recruit-female-treatment" aria-labelledby="recruit-female-treatment-title">
    <div class="recruit-female-treatment__inner">
      <header class="recruit-female-treatment__header">
        <h2 id="recruit-female-treatment-title" class="recruit-female-treatment__heading">
          TREATMENT
        </h2>
        <p class="recruit-female-treatment__subheading">
          気になる待遇！
        </p>
      </header>

      <div class="recruit-female-treatment__grid">
        {{-- POINT 1 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-light recruit-female-treatment__content--sp-dark">
            <p class="recruit-female-treatment__point">POINT 1</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">体験入店あり</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                体験入店された方には必ず報酬をご用意！<br>
                未経験でも短期間・短時間でも、ライフス<br>
                タイルに合わせた働き方が可能です。
              </span>
              <span class="recruit-female-treatment__text--sp">
                体験入店された方には必ず報酬をご用<br>
                意！未経験でも短期間・短時間でも、<br>
                ライフスタイルに合わせた働き方が可<br>
                能です。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 2 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-dark recruit-female-treatment__content--sp-light">
            <p class="recruit-female-treatment__point">POINT 2</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">
                徹底した<br>身バレ対策
              </p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                接客前にお客様の顔を確認できたり、アリ<br>
                バイ対策・露出する顔写真もモザイク加工<br>
                をするため、 みなさんが不安な身バレを<br>
                徹底的に防ぎます。
              </span>
              <span class="recruit-female-treatment__text--sp">
                接客前にお客様の顔を確認できたり、<br>
                アリバイ対策・露出する顔写真もモザ<br>
                イク加工をするため、みなさんが不安<br>
                な身バレを徹底的に防ぎます。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 3 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-dark recruit-female-treatment__content--sp-dark">
            <p class="recruit-female-treatment__point">POINT 3</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">完全日払い制</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                お給料はその日のお仕事終わりに全額お<br>
                支払いいたします。 ノルマもないので、安<br>
                心して働くことができます。
              </span>
              <span class="recruit-female-treatment__text--sp">
                お給料はその日のお仕事終わりに全額<br>
                お支払いいたします。ノルマもないの<br>
                で、安心して働くことができます。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 4 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-light recruit-female-treatment__content--sp-light">
            <p class="recruit-female-treatment__point">POINT 4</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">女性が講習</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                各店女性スタッフが多く、実際のお仕事<br>
                の講習は女性スタッフが対応するので、<br>
                不安な方でも安心です！
              </span>
              <span class="recruit-female-treatment__text--sp">
                各店女性スタッフが多く、実際のお仕<br>
                事の講習は女性スタッフが対応するの<br>
                で、不安な方でも安心です！
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 5 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-light recruit-female-treatment__content--sp-dark">
            <p class="recruit-female-treatment__point">POINT 5</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">短期OK</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                体験入店の数日間だけでも可能！お金が<br>
                必要な時だけ働きたいといった理由で<br>
                も、 大歓迎です。
              </span>
              <span class="recruit-female-treatment__text--sp">
                体験入店の数日間だけでも可能！お金<br>
                が必要な時だけ働きたいといった理由<br>
                でも、大歓迎です。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 6 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-dark recruit-female-treatment__content--sp-light">
            <p class="recruit-female-treatment__point">POINT 6</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">
                入未経験・出戻り<br>大歓迎店あり
              </p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                未経験の方でも事前講習があるので安心<br>
                して稼げます！ また以前働いたことがあ<br>
                る方でも問題ありません。
              </span>
              <span class="recruit-female-treatment__text--sp">
                未経験の方でも事前講習があるので安<br>
                心して稼げます！また以前働いたこと<br>
                がある方でも問題ありません。
              </span>
            </p>
          </div>
        </article>
      </div>

      <div class="recruit-female-treatment__icons">
        <div class="recruit-female-treatment__iconItem">
          <span class="recruit-female-treatment__iconCircle recruit-female-treatment__iconCircle--pink">
            <img src="{{ asset('assets/img/female/section3-2.png') }}" alt="">
          </span>
          <p class="recruit-female-treatment__iconLabel">送迎あり</p>
        </div>
        <div class="recruit-female-treatment__iconItem">
          <span class="recruit-female-treatment__iconCircle recruit-female-treatment__iconCircle--gold">
            <img src="{{ asset('assets/img/female/section3-3.png') }}" alt="">
          </span>
          <p class="recruit-female-treatment__iconLabel">寮あり</p>
        </div>
        <div class="recruit-female-treatment__iconItem">
          <span class="recruit-female-treatment__iconCircle recruit-female-treatment__iconCircle--pink">
            <img src="{{ asset('assets/img/female/section3-4.png') }}" alt="">
          </span>
          <p class="recruit-female-treatment__iconLabel">個室待機</p>
        </div>
      </div>
    </div>
  </section>

  <section class="recruit-female-flow" aria-labelledby="recruit-female-flow-title">
    <div class="recruit-female-flow__inner">
      <header class="recruit-female-flow__header">
        <h2 id="recruit-female-flow-title" class="recruit-female-flow__heading">FLOW</h2>
        <p class="recruit-female-flow__subheading">入店までの流れ</p>
      </header>

      <div class="recruit-female-flow__list" role="list">
        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4.png') }}" alt="step 01">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">まずはお問い合わせください！</span>
              <span class="recruit-female-flow__title--sp">まずはお問い合わせ<br>ください！</span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">電話・HP・メール・LINEいずれかから応募できます！</span>
              <span class="recruit-female-flow__text--sp">電話・HP・メール・LINEいずれかから<br>応募できます！</span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-1.png') }}" alt="step 02">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">あなたのお話を聞かせてください！</span>
              <span class="recruit-female-flow__title--sp">あなたのお話を<br>聞かせてください！</span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">
                面接にて、お仕事についてお話しします。<br>
                不安や疑問などあればなんでもお尋ねください。
              </span>
              <span class="recruit-female-flow__text--sp">
                面接にて、お仕事についてお話しします。<br>
                不安や疑問などあればなんでもお尋ねくだ<br>
                さい。
              </span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-2.png') }}" alt="step 03">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">面接に受かったら宣材撮影！</span>
              <span class="recruit-female-flow__title--sp">面接に受かったら<br>宣材撮影！</span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">
                お仕事に大事な撮影をします。プロのカメラマン・ヘアメイクが完全サポートするので、お任せください！
              </span>
              <span class="recruit-female-flow__text--sp">
                お仕事に大事な撮影をします。<br>
                プロのカメラマン・ヘアメイクが<br>
                完全サポートするので、お任せください！
              </span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-3.png') }}" alt="step 04">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">
                <span>女性講習員が丁寧に</span><br>
                <span>お仕事をお教えします！</span>
              </span>
              <span class="recruit-female-flow__title--sp">
                女性講習員が丁寧に<br>
                お仕事をお教えします！
              </span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">
                お仕事に入る前に、接客の流れを講習いたします。<br>
                講習員は現場をよく知る女性なのでご安心ください！
              </span>
              <span class="recruit-female-flow__text--sp">
                お仕事に入る前に、<br>
                接客の流れを講習いたします。<br>
                講習員は現場をよく知る女性なので<br>
                ご安心ください！
              </span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item recruit-female-flow__item--last" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-4.png') }}" alt="step 05">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flo