<x-shizuku-layout>
    <div class="home">
        <div class="home-gradient-overlay"></div>
        <!-- Menu Overlay Component -->
        <x-public.shops.menu-overlay 
            logo-image="assets/img/shops/shizuku/footer-logo-black.png"
            logo-alt="Shizuku Logo"
            :menu-links="[
                'top' => '#',
                'schedule' => '#',
                'pricing' => '#',
                'new' => '#',
                'cast' => '#',
                'news' => '#',
                'event' => '#',
                'diary' => '#',
                'movie' => '#',
                'review' => '#',
                'ranking' => '#',
                'shop' => '#',
                'access' => '#',
                'recruit-male' => '#',
                'login' => '#',
                'recruit-female' => '#',
                'register' => '#',
            ]"
            :bottom-buttons="[
                'group' => '#',
                'recruit' => '#',
            ]"
            :bottom-button-images="[
                'group' => 'assets/img/shops/shizuku/plo-group-btn.png',
                'recruit' => 'assets/img/shops/shizuku/recruit-btn.png',
            ]"
            mobile-image="assets/img/shops/shizuku/credit_system.png"
            mobile-image-alt="女の子募集中"
        />
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
                    'text1' => '上品な空間、時を忘れる美貌とおもてなしが魅力のヘルス',
                    'text2' => '',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 2',
                    'text1' => 'アナタ色のエッチな女の子に育てられる育成型ヘルス',
                    'text2' => '',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 3',
                    'text1' => '若妻、人妻、淫乱妻など大人のエロさ溢れる人妻ヘルス店',
                    'text2' => '',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 4',
                    'text1' => '女の子を見て選べる唯一無二のエンターテインメントヘルス',
                    'text2' => '',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 5',
                    'text1' => '女の子を見て選べる唯一無二のエンターテインメントヘルス',
                    'text2' => '',
                    'url' => '#',
                ],
                [
                    'image' => 'assets/img/shops/shizuku/home-banner.png',
                    'alt' => 'Shop 6',
                    'text1' => '容姿端麗なオトナ女性による丁寧な本格マッサージ店',
                    'text2' => '',
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
