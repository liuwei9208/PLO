<x-miyabi-page-layout page-title="MOVIE" page-subtitle="動画一覧" breadcrumb="すすきの Luxury Room 雅 ＞ トップページ ＞ 動画一覧"
    :assets="['resources/scss/shops/miyabi/movie.scss']" :banners="$banners">
    <section class="movie-list">
        <div class="movie-list-item">
            @foreach ($movies as $movie)
                <div class="movie-list-item-movie-container">
                    <div class="movie-list-item-movie-frame">
                        <video class="movie-list-item-movie" controls preload="metadata" playsinline
                            @if ($movie->thumb_url) poster="{{ asset('storage/' . $movie->thumb_url) }}" @endif>
                            <source src="{{ $movie->video_url }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="movie-list-item-movie-info">
                        <div class="movie-list-item-movie-photo">
                            @if ($movie->gallery_1)
                                <img src="{{ asset('storage/' . $movie->gallery_1) }}" alt="{{ $movie->name }}">
                            @endif
                        </div>
                        <div class="movie-list-item-movie-title">
                            {{ $movie->name . '(' . $movie->age . ')' }}
                        </div>
                        <div class="movie-list-item-movie-measurements">
                            T.{{ $movie->height }} B.{{ $movie->bust }} W.{{ $movie->waist }}
                            H.{{ $movie->hip }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="movie-list-pagination">
            {{ $movies->links('pagination::shops') }}
        </div>
    </section>
</x-miyabi-page-layout>
