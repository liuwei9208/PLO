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
            <div class="flex w-full">
                <div class="w-[30%]">
                    
                </div>
                <div class="w-[70%]">
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
