<x-shizuku-layout>
    <div class="home">
        <div class="home-gradient-overlay"></div>
        <!-- Menu Overlay -->
        <div class="menu-overlay" id="menuOverlay">
            <div class="menu-overlay-content">
                <button class="menu-close" id="menuClose">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M38.5 13.625L36.375 11.5L25 22.875L13.625 11.5L11.5 13.625L22.875 25L11.5 36.375L13.625 38.5L25 27.125L36.375 38.5L38.5 36.375L27.125 25L38.5 13.625Z"
                            fill="#000000" />
                    </svg>
                </button>

                <div class="menu-logo">
                    <img src="{{ asset('assets/img/shops/shizuku/footer-logo-black.png') }}" alt="Shizuku Logo">
                </div>

                <div class="menu-grid">
                    <div class="menu-column">
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 20V14H14V20H19V12H22L12 3L2 12H5V20H10Z" fill="#BD902F" />
                            </svg>
                            <span>TOPページ</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C9.5 19.2 7.29 17.92 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C16.71 17.92 14.5 19.2 12 19.2Z"
                                    fill="#4CAF50" />
                            </svg>
                            <span>新人情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 12H12V17H17V12ZM16 1V3H8V1H6V3H5C3.89 3 3.01 3.9 3.01 5L3 19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3H18V1H16ZM19 19H5V8H19V19Z"
                                    fill="#FFA000" />
                            </svg>
                            <span>イベント情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 2H4C2.9 2 2.01 2.9 2.01 4L2 22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM6 9H18V11H6V9ZM14 14H6V12H14V14ZM18 8H6V6H18V8Z"
                                    fill="#9C27B0" />
                            </svg>
                            <span>口コミ一覧</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2ZM12 11.5C10.62 11.5 9.5 10.38 9.5 9C9.5 7.62 10.62 6.5 12 6.5C13.38 6.5 14.5 7.62 14.5 9C14.5 10.38 13.38 11.5 12 11.5Z"
                                    fill="#F44336" />
                            </svg>
                            <span>店舗一覧</span>
                        </a>
                    </div>

                    <div class="menu-column">
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 11H7V13H9V11ZM13 11H11V13H13V11ZM17 11H15V13H17V11ZM19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V9H19V20Z"
                                    fill="#2196F3" />
                            </svg>
                            <span>出勤情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 11C17.66 11 18.99 9.66 18.99 8C18.99 6.34 17.66 5 16 5C14.34 5 13 6.34 13 8C13 9.66 14.34 11 16 11ZM8 11C9.66 11 10.99 9.66 10.99 8C10.99 6.34 9.66 5 8 5C6.34 5 5 6.34 5 8C5 9.66 6.34 11 8 11ZM8 13C5.67 13 1 14.17 1 16.5V19H15V16.5C15 14.17 10.33 13 8 13ZM16 13C15.71 13 15.38 13.02 15.03 13.05C16.19 13.89 17 15.02 17 16.5V19H23V16.5C23 14.17 18.33 13 16 13Z"
                                    fill="#E91E63" />
                            </svg>
                            <span>キャスト一覧</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 19V5C21 3.9 20.1 3 19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19ZM8.5 13.5L11 16.51L14.5 12L19 18H5L8.5 13.5Z"
                                    fill="#FF5722" />
                            </svg>
                            <span>写メ日記</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"
                                    fill="#FFC107" />
                            </svg>
                            <span>女の子ランキング</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C9.5 19.2 7.29 17.92 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C16.71 17.92 14.5 19.2 12 19.2Z"
                                    fill="#607D8B" />
                            </svg>
                            <span>ログイン</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 12C17.21 12 19 10.21 19 8C19 5.79 17.21 4 15 4C12.79 4 11 5.79 11 8C11 10.21 12.79 12 15 12ZM6 10V7H4V10H1V12H4V15H6V12H9V10H6ZM15 14C12.33 14 7 15.34 7 18V20H23V18C23 15.34 17.67 14 15 14Z"
                                    fill="#009688" />
                            </svg>
                            <span>会員新規登録</span>
                        </a>
                    </div>

                    <div class="menu-column">
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.8 10.9C9.53 10.31 8.8 9.7 8.8 8.75C8.8 7.66 9.81 6.9 11.5 6.9C13.28 6.9 13.94 7.75 14 9H16.21C16.14 7.28 15.09 5.7 13 5.19V3H10V5.16C8.06 5.58 6.5 6.84 6.5 8.77C6.5 11.08 8.41 12.23 11.2 12.9C13.7 13.5 14.2 14.38 14.2 15.31C14.2 16 13.71 17.1 11.5 17.1C9.44 17.1 8.63 16.18 8.52 15H6.32C6.44 17.19 8.08 18.42 10 18.83V21H13V18.85C14.95 18.48 16.5 17.35 16.5 15.3C16.5 12.46 14.07 11.49 11.8 10.9Z"
                                    fill="#4CAF50" />
                            </svg>
                            <span>料金システム</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 22C6.49 22 2 17.51 2 12C2 6.49 6.49 2 12 2C17.51 2 22 6.49 22 12C22 17.51 17.51 22 12 22ZM12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12C4 14.1217 4.84285 16.1566 6.34315 17.6569C7.84344 19.1571 9.87827 20 12 20ZM13 12H17V14H11V7H13V12Z"
                                    fill="#FF9800" />
                            </svg>
                            <span>新着情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 10.5V7C17 4.24 14.76 2 12 2C9.24 2 7 4.24 7 7V10.5C5.9 10.5 5 11.4 5 12.5V20.5C5 21.6 5.9 22.5 7 22.5H17C18.1 22.5 19 21.6 19 20.5V12.5C19 11.4 18.1 10.5 17 10.5ZM12 17.5C10.9 17.5 10 16.6 10 15.5C10 14.4 10.9 13.5 12 13.5C13.1 13.5 14 14.4 14 15.5C14 16.6 13.1 17.5 12 17.5ZM15.1 10.5H8.9V7C8.9 5.29 10.29 3.9 12 3.9C13.71 3.9 15.1 5.29 15.1 7V10.5Z"
                                    fill="#3F51B5" />
                            </svg>
                            <span>MOVIE一覧</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2ZM12 11.5C10.62 11.5 9.5 10.38 9.5 9C9.5 7.62 10.62 6.5 12 6.5C13.38 6.5 14.5 7.62 14.5 9C14.5 10.38 13.38 11.5 12 11.5Z"
                                    fill="#009688" />
                            </svg>
                            <span>アクセス情報</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C9.5 19.2 7.29 17.92 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C16.71 17.92 14.5 19.2 12 19.2Z"
                                    fill="#E91E63" />
                            </svg>
                            <span>女性求人</span>
                        </a>
                        <a href="#" class="menu-link">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C9.5 19.2 7.29 17.92 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C16.71 17.92 14.5 19.2 12 19.2Z"
                                    fill="#2196F3" />
                            </svg>
                            <span>男性求人</span>
                        </a>
                    </div>
                </div>

                <div class="menu-bottom-buttons">
                    <a href="#" class="menu-bottom-btn">
                        <img src="{{ asset('assets/img/shops/shizuku/plo-group-btn.png') }}" alt="PLO Group">
                    </a>
                    <a href="#" class="menu-bottom-btn">
                        <img src="{{ asset('assets/img/shops/shizuku/recruit-btn.png') }}" alt="女の子募集中">
                    </a>
                </div>
            </div>
        </div>
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
            <div class="castlist-title">
                <h1>CAST LIST</h1>
                <p>キャスト一覧</p>
            </div>
            <div class="castlist-page-info">
                <p>すすきのhigh grade health 雫 ＞ トップページ ＞ キャスト一覧 </p>
            </div>
        </div>
        <div class="castlist-content">
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
            <div class="castlist-card-list">
                @for ($i = 1; $i <= 20; $i++)
                    <x-public.shops.schedule-card
                        background-image="assets/img/shops/shizuku/castlist.png"
                        frame-image="assets/img/shops/shizuku/card-frame.png"
                        badge-shift="本日出勤"
                        badge-time="12:00〜24:00"
                        status-icon=''
                        status-text=""
                        name="かれん（20）"
                        measurements="T.160 B.85(C) W.60 H.83"
                        message="キャストメッセージが出ますキャ"
                        badge-border-color="#B90000"
                        badge-bg-color="#B90000"
                        badge-text-color="#FFDA89"
                        badge-time-color="#2A1A08"
                        status-text-color="#FFE500"
                        name-color="#FFFFFF"
                        measurements-color="#FFFFFF"
                        message-gradient-start="#FFF2D7"
                        message-gradient-end="#BD902F"
                        content-gradient-start="rgba(42, 26, 8, 0.80)"
                        content-gradient-end="rgba(0, 0, 0, 0.00)"
                        variant="castlist"
                    />
                @endfor
            </div>
            <div class="castlist-top-page-button">
                <a href="{{ route('public.shop.home', ['shop' => 'shizuku']) }}" class="top-page-link">
                    トップページはこちら
                </a>
            </div>
            <x-public.shops.footer
            :showExternalLink="false"
            :showExternalLinksGrid="true"
            :shops="[
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 1',
                    'text1' => '上品な空間、時を忘れる美貌と',
                    'text2' => 'おもてなしが魅力のヘルス',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 2',
                    'text1' => 'すすきの屈指の人妻・痴女が在籍するヘルス',
                    'text2' => 'エンターテインメントヘルス',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 3',
                    'text1' => 'アナタ色のエッチな女の子に育てられる育成型ヘルス',
                    'text2' => '在籍するヘルス',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 4',
                    'text1' => '若妻、人妻、淫乱妻など大人のエロさ溢れる人妻ヘルス店',
                    'text2' => '人妻ヘルス店',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 5',
                    'text1' => '女の子を見て選べる唯一無二のエンターテインメントヘルス',
                    'text2' => '丁寧な本格マッサージ店',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 6',
                    'text1' => '容姿端麗なオトナ女性による丁寧な本格マッサージ店',
                    'text2' => '育成型ヘルス',
                    'url' => '#',
                ],
            ]" 
            :external-links="[
                [
                    'image' => 'assets/img/shops/shizuku/external-link-1.png',
                    'alt' => '全国 駅ちか人気！風俗ランキング',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-4.png',
                    'alt' => 'VANILLA',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-2.png',
                    'alt' => '風俗求人情報 NO.1 Heaven すすきの求人',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-3.png',
                    'alt' => '女の子掲載数 NO.1 Heaven ネット すすきの風俗',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-2.png',
                    'alt' => '風俗求人情報 NO.1 Heaven すすきの求人',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/external-link-3.png',
                    'alt' => '女の子掲載数 NO.1 Heaven ネット すすきの風俗',
                    'url' => '#',
                ],
            ]" 
            :menu-links="[
                ['text' => '店舗TOP', 'url' => '#'],
                ['text' => '出勤情報', 'url' => '#'],
                ['text' => '料金システム', 'url' => '#'],
                ['text' => 'キャスト一覧', 'url' => '#'],
                ['text' => '新着情報', 'url' => '#'],
                ['text' => 'SNS', 'url' => '#'],
                ['text' => '店舗一覧', 'url' => '#'],
                ['text' => 'ログイン', 'url' => '#'],
                ['text' => '新規会員登録', 'url' => '#'],
                [
                    'text' => 'メルマガ',
                    'url' => 'https://17auto.biz/plogroup/registp/entryform2.htm',
                    'target' => '_blank',
                ],
                ['text' => '女性求人', 'url' => '#'],
                ['text' => '男性求人', 'url' => '#'],
                ['text' => '個人情報保護方針', 'url' => 'https://plo-group.jp/privacy-policy', 'target' => '_blank'],
                ['text' => 'グループTOP', 'url' => 'https://plo-group.jp/', 'target' => '_blank'],
            ]" />
        </div>
        <!-- Fixed Phone Button -->
        <x-public.shops.fixed-phone-button phone-number="0115338988" phone-display="011-533-8988"
        hours="8:30〜24:00まで" mobile-text="TEL" />
    
        <!-- Fixed Side Buttons -->
        <x-public.shops.fixed-side-buttons />
    </div>
</x-shizuku-layout>

@once
@vite([
    'resources/scss/shops/shizuku/castlist.scss', 
    'resources/scss/shops/contact-info.scss',
    'resources/scss/shops/home-header.scss',
    'resources/js/shops/home-header.js',
])
@endonce
