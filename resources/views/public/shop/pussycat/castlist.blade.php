<x-shizuku-page-layout
    page-title="CAST LIST"
    page-subtitle="キャスト一覧"
    breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ キャスト一覧"
    :assets="[
        'resources/scss/shops/shizuku/castlist.scss',
    ]"
>
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
</x-shizuku-page-layout>
