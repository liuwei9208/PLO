<x-shizuku-page-layout
    page-title="EVENT"
    page-subtitle="イベント情報"
    breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ イベント情報"
    :assets="[
        'resources/scss/shops/shizuku/event.scss',
    ]"
>
    <section class="event-section">
        <x-public.shops.event-card
            image="assets/img/shops/shizuku/event-card-1.png"
            image-alt="event-image"
            title="イベントタイトルイベントタイトルイベントタイトル"
            :url="route('public.shops.shop.event.detail', ['shop' => 'shizuku', 'id' => 1])"
        >
        本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文
        </x-public.shops.event-card>
        <x-public.shops.event-card
            image="assets/img/shops/shizuku/event-card-2.png"
            image-alt="event-image"
            title="イベントタイトルイベントタイトルイベントタイトル"
            :url="route('public.shops.shop.event.detail', ['shop' => 'shizuku', 'id' => 2])"
        >
        本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文
        </x-public.shops.event-card>
        <x-public.shops.event-card
            image="assets/img/shops/shizuku/event-card-3.png"
            image-alt="event-image"
            title="イベントタイトルイベントタイトルイベントタイトル"
            :url="route('public.shops.shop.event.detail', ['shop' => 'shizuku', 'id' => 3])"
        >
        本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文
        </x-public.shops.event-card>
    </section>
</x-shizuku-page-layout>