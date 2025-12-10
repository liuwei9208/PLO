<x-shizuku-page-layout page-title="MOVIE" page-subtitle="動画一覧" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 動画一覧"
    :assets="['resources/scss/shops/shizuku/movie.scss']">
    <section class="movie-list">

        <div class="movie-list-item">
            @for ($i = 0; $i < 6; $i++)
                <video class="movie-list-item-movie" controls autoplay muted  poster="assets/img/shops/shizuku/movie-list-item-movie.png">
                    <source src="assets/img/shops/shizuku/movie-list-item-movie.mp4" type="video/mp4">
                </video>
            @endfor
        </div>
    </section>
</x-shizuku-page-layout>