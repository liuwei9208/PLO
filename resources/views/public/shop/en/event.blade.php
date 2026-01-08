<x-shiroganeze-page-layout page-title="EVENT" page-subtitle="イベント情報"
    breadcrumb="すすきの Premium Men’s Esthe シロガネーゼ ＞ トップページ ＞ イベント情報" :assets="['resources/scss/shops/shiroganeze/event.scss']" :banners="$banners">
    <section class="event-section">
        @foreach ($events as $event)
            <x-public.shops.event-card image="{{ asset('storage/' . $event->thumbnail) }}" image-alt="event-image"
                title="{{ $event->title }}" :url="route('public.shops.shop.event.detail', ['shop' => 'shiroganeze', 'id' => $event->id])"
                scss="resources/scss/shops/shiroganeze/component/event-card.scss">
                {!! nl2br($event->contents) !!}
            </x-public.shops.event-card>
        @endforeach
        <div class="event-pagination">
            {{ $events->links('pagination::shops') }}
        </div>
    </section>
</x-shiroganeze-page-layout>
