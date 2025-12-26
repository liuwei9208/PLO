@props([
    'girlName' => '女の子の名前',
    'measurements' => '00歳／T.000 B.000(C) W.00 H.00',
    'rating' => 3,
    'girlRating' => 3,
    'playRating' => 3,
    'staffRating' => 3,
    'frameImage' => 'assets/img/shops/shizuku/card-frame.png',
    'girlImage' => 'assets/img/shops/shizuku/review1.png',
    'reviewerName' => '投稿者名',
    'comment' =>
        'テキストテキストテキストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストストテキストストテキストストテキスト',
    'shopReplyTitle' => 'お店からの返信コメント',
    'shopReply' =>
        'お店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメント',
    'scss' => 'resources/scss/shops/review-card.scss',
    'fillStarColor' => '#FFE500',
    'emptyStarColor' => 'none',
])

<div class="reivew-card-item">
    <div class="review-card-name-mobile-section">
        <h3 class="review-card-name">{{ $girlName }}</h3>
        <p class="review-card-measurements">{{ $measurements }}</p>
    </div>
    <div class="review-card-rating-mobile-section">
        <div class="review-card-stars">
            @for ($i = 0; $i < $rating; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="{{ $emptyStarColor }}">
                    <path
                        d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                        fill="{{ $fillStarColor }}" />
                </svg>
            @endfor
            @for ($i = 0; $i < 5 - $rating; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="{{ $emptyStarColor }}">
                    <path
                        d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                        fill="{{ $emptyStarColor }}" stroke="{{ $fillStarColor }}" stroke-width="1.5" />
                </svg>
            @endfor
            <span class="review-card-rating-number">{{ $rating }}</span>
        </div>
        <p class="review-card-tags">女の子 {{ $girlRating }}　プレイ {{ $playRating }}　スタッフ {{ $staffRating }}</p>
    </div>
    <div class="review-card-info">
        <div class="review-card-image-wrapper">
            <img src="{{ asset($frameImage) }}" class="review-card-frame" alt="Frame">
            <img src="{{ asset($girlImage) }}" class="review-card-image" alt="Girl">
        </div>
        <div class="review-card-content">
            <div class="review-card-header">
                <div class="review-card-name-section pc-only">
                    <h3 class="review-card-name">{{ $girlName }}</h3>
                    <p class="review-card-measurements">{{ $measurements }}</p>
                </div>
                <div class="review-card-rating-section pc-only">
                    <div class="review-card-stars">
                        @for ($i = 0; $i < $rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="{{ $emptyStarColor }}">
                                <path
                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                    fill="{{ $fillStarColor }}" />
                            </svg>
                        @endfor
                        @for ($i = 0; $i < 5 - $rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="{{ $emptyStarColor }}">
                                <path
                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                    fill="{{ $emptyStarColor }}" stroke="{{ $fillStarColor }}" stroke-width="1.5" />
                            </svg>
                        @endfor
                        <span class="review-card-rating-number">{{ $rating }}</span>
                    </div>
                    <p class="review-card-tags">女の子 {{ $girlRating }}　プレイ {{ $playRating }}　スタッフ
                        {{ $staffRating }}</p>
                </div>
            </div>
            <div class="review-card-comment-section">
                <div class="review-card-comment">
                    <p class="review-card-comment-author">{{ $reviewerName }}</p>
                    <div class="review-card-comment-text">
                        <textarea class="review-card-comment-textarea" readonly>{{ $comment }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="review-card-details">
        <div class="review-card-shop-reply">
            <p class="review-card-shop-reply-title">{{ $shopReplyTitle }}</p>
            <p class="review-card-shop-reply-text">{{ $shopReply }}</p>
        </div>
    </div>
</div>

@once
    @vite($scss)
@endonce
