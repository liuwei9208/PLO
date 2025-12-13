@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.css" rel="stylesheet">
@endpush

<x-shizuku-page-layout page-title="PHOTO DIARY DETAIL" page-subtitle="写メ日記詳細" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 写メ日記 ＞ 写メ日記詳細"
    :assets="['resources/scss/shops/shizuku/photo-diary-detail.scss']">
    <section class="photo-diary-details-section">
        <h1 class="photo-diary-details-section-title">写メ日記詳細</h1>
        <div class="photo-diary-details-section-content">
            <div class="photo-diary-details-section-content-left">
                <button class="profile-button">
                    <p>プロフィール</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.071 7.071L1.414 12.728L0 11.314L4.95 6.364L0 1.414L1.414 0L7.071 5.657C7.25847 5.84453 7.36379 6.09884 7.36379 6.364C7.36379 6.62916 7.25847 6.88347 7.071 7.071Z" fill="white"/>
                    </svg>
                </button>
                <div class="today-work-content">
                    <div class="today-work-content-title">
                        <p>本日出勤</p>
                    </div>
                    <div class="today-work-content-time">
                        <p>12:00〜24:00</p>
                    </div>
                </div>
                <div class="photo-diary-details-section-content-left-calendar pc-only" id="photo-diary-details-section-content-left-calendar">
                </div>
            </div>
            <div class="photo-diary-details-section-content-right">
                <div class="photo-diary-image sp-only">
                    <img src="{{ asset('assets/img/shops/shizuku/diary-details.png') }}">
                </div>
                <div class="blog-title">
                    <p>ブログタイトル</p>
                    <hr>
                </div>
                <div class="blog-time">
                    <p class="pc-only">00.00.00 00:00:00</p>
                    <p class="sp-only">00/00/00</p>
                </div>
                <div class="photo-diary-image pc-only">
                    <img src="{{ asset('assets/img/shops/shizuku/diary-details.png') }}">
                </div>
                <div class="blog-content">
                    <p>ブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入ります
                    <br><br>
                        ブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入ります ブログ本文が入ります ブログ本文が入ります ブログ本文が入ります ブログ本
                    </p>
                </div>
                <hr>
                <div class="blog-pagination">
                    @if($prevDiary)
                        <a href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => 'shizuku', 'id' => $prevDiary->id]) }}" class="blog-pagination-btn blog-pagination-prev">
                            <p>前の投稿</p>
                        </a>
                    @else
                        <div class="blog-pagination-btn blog-pagination-prev blog-pagination-disabled">
                            <p>前の投稿</p>
                        </div>
                    @endif
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'shizuku']) }}" class="blog-pagination-btn blog-pagination-list">
                        <p>一覧へ</p>
                    </a>
                    @if($nextDiary)
                        <a href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => 'shizuku', 'id' => $nextDiary->id]) }}" class="blog-pagination-btn blog-pagination-next">
                            <p>次の投稿</p>
                        </a>
                    @else
                        <div class="blog-pagination-btn blog-pagination-next blog-pagination-disabled">
                            <p>次の投稿</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="p-[20px]">
        <div class="diary-details-mobile-calendar sp-only">
            <div class="diary-details-left-calendar-content" id="diary-details-calendar-mobile">
            </div>
        </div>
    </div>
</x-shizuku-page-layout>
<script>
    let cast_id = "";
    let shop_id = "";
    let shop_slug = "shizuku";
    let date = "";
    let diarys_date = [];
</script>
@once
    @vite(['resources/scss/shops/shizuku/photo-diary-detail.scss', 'resources/js/shops/shizuku/photo-diary-detail.js'])
@endonce

