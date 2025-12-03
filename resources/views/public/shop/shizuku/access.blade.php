<x-shizuku-page-layout
    page-title="ACCESS"
    page-subtitle="アクセス情報"
    breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ アクセス情報"
    :assets="[
        'resources/scss/shops/shizuku/access.scss',
    ]"
>
    <section class="access-section">
        <h1 class="access-title">ABOUT</h1>
        <div class="access-content">
            <div class="access-content-item">
                <h2> 住所 </h2>
                <p> 北海道札幌市中央区南5条西5丁目 第8旭観光ビル </p>
            </div>
            <div class="access-content-item">
                <h2> 電話番号 </h2>
                <p> 011-521-3593</p>
            </div>
            <div class="access-content-item">
                <h2> 営業時間 </h2>
                <p> 09:00〜00:00 </p>
            </div>
            <div class="access-content-item">
                <h2> 店舗情報 </h2>
                <p> テスト１ </p>
            </div>
        </div>
        <h1 class="map-title">MAP</h1>
        <div class="map-content">
            <img src="{{ asset('assets/img/shops/shizuku/map.png') }}" alt="Map" class="pc-only">
            <img src="{{ asset('assets/img/shops/shizuku/map-sp.png') }}" alt="Map" class="sp-only">
        </div>
    </section>
</x-shizuku-page-layout>