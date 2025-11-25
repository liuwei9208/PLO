<x-shizuku-layout>
    <div class="home">
        <div class="home-gradient-overlay"></div>
        <div class="banner">
            <x-public.shops.contact-info
            phone-icon="assets/img/shops/shizuku/phone.png"
            phone-number="011-533-8988"
            email="@ShizukuHealth"
            address="〒064-0806</br> 北海道札幌市中央区南6条西5丁目"
            hours="9:00 ~ 0:00"
            credit-text="クレジット決済可能"
            note="電話予約の対応時間は朝8:30~となります。"
            phone-background="linear-gradient(180deg, rgba(255, 242, 215, 0.8) 20.67%, rgba(189, 144, 47, 0.8) 100%)"
            address-background="#160B00"
            />
            <div class="profile-title">
                <h1>PROFILE</h1>
                <p>女の子プロフィール</p>
            </div>
            <div class="profile-page-info">
                <p>すすきのhigh grade health 雫 ＞ トップページ ＞ 女の子プロフィール </p>
            </div>
        </div>
        <div class="profile-content">
            <x-public.shops.home-header
            logo-image="assets/img/shops/shizuku/footer-logo.png"
            logo-alt="Shizuku Logo"
            :menu-items="[
                ['title' => 'トップページ', 'subtitle' => 'top page'],
                ['title' => 'キャスト一覧', 'subtitle' => 'cast list'],
                ['title' => '出勤情報', 'subtitle' => 'schedule'],
                ['title' => '写メ日記', 'subtitle' => 'photo diary'],
                ['title' => 'イベント一覧', 'subtitle' => 'event'],
                ['title' => '料金システム', 'subtitle' => 'system'],
                ['title' => '新人情報', 'subtitle' => 'new cast'],
                ['title' => 'ログイン', 'subtitle' => 'login'],
            ]"
            menu-button-id="mobileMenuButton"
            background-color="#160B00"
            />
            <div class="flex w-full mt-6">
                <div class="profile-left-colum">
                    <div class="girl-info-section">
                        <img src="{{ asset('assets/img/shops/shizuku/castlist.png') }}" alt="Cast 1" class="cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="Frame" class="cast-frame">
                    </div>
                    <div class="girl-photo-gallery">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="girl-photo-gallery-item">
                                <img src="{{ asset('assets/img/shops/shizuku/castlist.png') }}" alt="Cast 1" class="cast-image">
                            </div>
                        @endfor
                    </div>
                    <div class="girl-video">
                        <div class="girl-video-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
                                <path d="M25 0V18H0V0H25ZM3.78516 1.724C3.58984 1.524 2.16406 1.515 2.00098 1.799C1.92578 1.93 1.91406 3.881 1.94922 4.155C1.96973 4.316 1.9873 4.47 2.14844 4.551C2.38184 4.667 3.64648 4.669 3.80176 4.443C3.96973 4.199 3.97461 1.919 3.78516 1.724ZM21.2148 1.724C21.0244 1.919 21.0312 4.199 21.1992 4.443C21.3545 4.669 22.6191 4.667 22.8525 4.551C23.0137 4.47 23.0312 4.316 23.0518 4.155C23.0859 3.881 23.0752 1.93 23 1.799C22.8359 1.515 21.4092 1.524 21.2148 1.724ZM9.92969 5.113C9.69043 5.24 9.68555 5.503 9.66406 5.745C9.47559 7.877 9.81738 10.291 9.66406 12.454C9.66602 12.783 9.89258 12.947 10.1953 12.899L16.3975 9.236C16.5615 9.007 16.4658 8.766 16.2451 8.614L10.4893 5.21L9.92969 5.112V5.113ZM2.2168 7.32C2.05859 7.368 1.98438 7.494 1.95605 7.653C1.90918 7.909 1.92285 9.835 2.00195 10.001C2.13379 10.279 3.4668 10.273 3.71191 10.151C3.87305 10.07 3.89062 9.916 3.91113 9.755C3.94727 9.467 3.94141 7.675 3.8584 7.5C3.72754 7.224 2.4873 7.239 2.21777 7.321L2.2168 7.32ZM21.3574 7.32C21.1992 7.368 21.125 7.494 21.0967 7.653C21.0498 7.909 21.0635 9.835 21.1426 10.001C21.2744 10.279 22.6074 10.273 22.8525 10.151C23.0137 10.07 23.0312 9.916 23.0518 9.755C23.0879 9.467 23.082 7.675 22.999 7.5C22.8682 7.224 21.6279 7.239 21.3584 7.321L21.3574 7.32ZM3.78516 13.524C3.46289 13.359 2.16016 13.267 2.00098 13.6C1.91797 13.774 1.91113 15.661 1.94824 15.955C1.96875 16.116 1.98633 16.27 2.14746 16.351C2.37012 16.462 3.67578 16.461 3.81543 16.234C3.9668 15.99 3.96973 13.713 3.78516 13.524ZM21.2148 16.276C21.4102 16.476 22.8359 16.485 22.999 16.201C23.0742 16.07 23.0859 14.119 23.0508 13.845C23.0303 13.684 23.0127 13.53 22.8516 13.449C22.6182 13.333 21.3535 13.331 21.1982 13.557C21.0303 13.801 21.0254 16.081 21.2148 16.276Z" fill="url(#paint0_linear_9_2296)"/>
                                <defs>
                                  <linearGradient id="paint0_linear_9_2296" x1="12.5" y1="0" x2="12.5" y2="18" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.206731" stop-color="#FFF2D7"/>
                                    <stop offset="1" stop-color="#BD902F"/>
                                  </linearGradient>
                                </defs>
                              </svg>
                            <h3>キャスト動画</h3>
                        </div>
                    </div>
                </div>
                <div class="profile-right-column">
                </div>
            </div>
        </div>
    </div>
</x-shizuku-layout>

@once
@vite([
    'resources/scss/shops/shizuku/profile.scss', 
    'resources/scss/shops/contact-info.scss',
    'resources/scss/shops/home-header.scss',
    'resources/js/shops/home-header.js',
])
@endonce
