<x-shizuku-page-layout
    page-title="NEW CAST"
    page-subtitle="新人情報"
    breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 新人情報"
    :assets="[
        'resources/scss/shops/shizuku/newcast.scss',
    ]"
>
<section class="newcast-section">
    @for ($i = 0; $i < 6; $i++)
    <x-public.shops.new-girl-card background-image="assets/img/shops/shizuku/new-girl.png"
        photo-image="assets/img/shops/shizuku/new-girl.png" date="2025.00.00 SUN"
        date-label="入店" name="名前名前" name-vertical="Name" age="00"
        measurements="T.000 B.000(C) W.00 H.00"
        description="テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト"
        gradient-id="calendar-gradient-{{ $i }}" gradient-start="#FFF2D7"
        gradient-end="#BD902F" overlay-opacity="0.7" name-color="#FFFFFF"
        measurements-color="#FFFFFF" />
@endfor
</section>
</x-shizuku-page-layout>