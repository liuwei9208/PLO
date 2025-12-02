<x-shizuku-page-layout
    page-title="RANKING"
    page-subtitle="女の子ランキング"
    breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 女の子ランキング"
    :assets="[
        'resources/scss/shops/shizuku/ranking.scss',
    ]"
>
    <section class="ranking-section">
        <div class="ranking-searchbar">
            <button class="ranking-filter-btn ranking-filter-btn-active">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 0L8 6L14 0L16 2L8 10L0 2L2 0Z" fill="#2A1A08"/>
                </svg>
                <span>本指名ランキング</span>
            </button>
            <button class="ranking-filter-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                  </svg>
                <span>巨乳ランキング</span>
            </button>
            <button class="ranking-filter-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                  </svg>
                <span>〇〇ランキング</span>
            </button>
            <button class="ranking-filter-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                </svg>
                <span>〇〇ランキング</span>
            </button>
            <button class="ranking-filter-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                  </svg>
                <span>〇〇ランキング</span>
            </button>
        </div>
        <div class="ranking-list-no1">
            <div class="ranking-no1-header">
                <div class="ranking-no1-image">
                    <img src="{{ asset('assets/img/shops/shizuku/no1.png') }}" alt="ranking-no1">
                </div>
                <div class="no1-person-info">
                    <h2 class="no1-person-name">
                        名前名前名前
                    </h2>
                    <p class="no1-person-details">
                        00歳／T.160 B.85(C) W.60 H.83
                    </p>
                </div>
                <div class="no1-person-services">
                    <p>
                        女の子メッセージが入ります女の子メッセージが入ります女の子メッセージが入ります女の子メッセージが入ります女の子メッセージが入ります
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-shizuku-page-layout>