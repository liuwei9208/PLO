<x-public-shop-layout :shop="$shop">

  <section class="news-detail content-wrapper">
    <div class="news-detail-published-at">
      <p>{{ $news->published_at ? \Carbon\Carbon::createFromTimeString($news->published_at)->format('y.m.d') : '' }}</p>
    </div>
    <div class="news-detail-title">
      <h2 class="news-detail-title-ja title-font">{{ $news->title }}</h2>
    </div>
    <div class="news-detail-image">
      <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
    </div>
    <div class="news-detail-contents">
      <p>{!! $news->contents !!}</p>
    </div>
  </section>

</x-public-shop-layout>
@once
  @vite('resources/scss/shop/newsdetail.scss')
@endonce

