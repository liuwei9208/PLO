<x-public-shop-layout :shop="$shop">
    <div class="reviewlist__container">
        <!-- Filter and Comment Count -->
        <div class="reviewlist__header">
            <div class="reviewlist__filter">
                <select class="reviewlist__filter-select">
                    <option>女の子で絞り込む | 女の子を選んでください</option>
                    <option>テスト花子</option>
                    <option>サンプル美咲</option>
                </select>
            </div>
            <div class="reviewlist__count">コメント数　102件</div>
        </div>

        <!-- Review Cards -->
        <div class="reviewlist__cards">
            @foreach(range(1,2) as $i)
            <div class="reviewcard">
                <!-- Header: Nickname, Visit Date -->
                <div class="reviewcard__header">
                    <div class="reviewcard__nickname">ニックネーム{{ $i }}</div>
                    <div class="reviewcard__visitdate">来店日: 2024/07/10</div>
                </div>
                <!-- Cast Info -->
                <div class="reviewcard__castinfo">
                    <div class="reviewcard__castphoto">写真</div>
                    <div class="reviewcard__castprofile">
                        <div class="reviewcard__castname">キャスト名（20歳）</div>
                        <div class="reviewcard__castsize">サイズ: T160 B85(C) W58 H86</div>
                        <button class="reviewcard__profilebtn">プロフを見る</button>
                    </div>
                </div>
                <!-- Star Rating -->
                <div class="reviewcard__rating">
                    <span class="reviewcard__stars">★★★★★</span>
                    <span class="reviewcard__score">(4.0)</span>
                    <span class="reviewcard__details">女の子4.0　プレイ4.0　料金4.0　スタッフ3.0　写真4.0</span>
                </div>
                <!-- Title -->
                <div class="reviewcard__title">タイトル{{ $i }}</div>
                <!-- Main Text -->
                <div class="reviewcard__body">本文がここに入ります。とても楽しかったです！また利用したいです。</div>
                <!-- Shop Comment -->
                <div class="reviewcard__shopcomment">
                    <div class="reviewcard__shopcomment-label">お店からのコメント</div>
                    <div class="reviewcard__shopcomment-body">ご来店ありがとうございました！またお待ちしております。</div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination and Footer -->
        <div class="reviewlist__footer">コメントを１０掲載</div>
        <div class="reviewlist__pagination">
            <nav class="reviewlist__pagination-nav">
                <a href="#" class="reviewlist__pagination-prev">&lt;</a>
                <a href="#" class="reviewlist__pagination-page reviewlist__pagination-page--active">1</a>
                <a href="#" class="reviewlist__pagination-page">2</a>
                <a href="#" class="reviewlist__pagination-page">3</a>
                <a href="#" class="reviewlist__pagination-next">&gt;</a>
            </nav>
        </div>
    </div>
</x-public-shop-layout>
@once
  @vite(['resources/scss/shop/reviewlist.scss', 'resources/scss/shop/newface.scss'])
@endonce