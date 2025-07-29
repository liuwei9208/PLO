<x-public-shop-layout :shop="$shop">
  <div class="reviewlist__container">
    <!-- Filter and Comment Count -->
    <div class="reviewlist__header">
      <div class="reviewlist__filter">
        <select class="reviewlist__filter-select">
          <option>女の子で絞り込む | 女の子を選んでください</option>
          @foreach($reviews as $review)
          <option>{{ $review->cast_name }}</option>
          @endforeach
        </select>
      </div>
      <div class="reviewlist__count">コメント数　{{ count($reviews) }}件</div>
    </div>

    <!-- Review Cards -->
    <div class="reviewlist__cards">
      {{-- @foreach(range(1, 5) as $i) --}}
      @foreach($reviews as $review)
      <div class="review-item">
        <div class="review-item-head">
          <div class="review-item-head-top">
            <div class="review-item-shopnameButton">
              <p class="userrank">
                <span style="background-image: url('//img2.cityheaven.net/img/myheaven/icon-user.svg'); width: 50px;height: 50px;border:1px solid #fff;border-radius: 50%;background-size: cover;background-position: center;float: left;" id="iconimage">
                </span>
              </p>
              <div class="userrank_box">
                <p class="userrank_icon">愛の狩人</p>
                <p class="userrank_nickname_shogo">
                  <a href="/userpage/12732714/review-list/">{{$review->member_name}}</a>
                </p>
              </div>
            </div>
            <span class="special_thanks_icon">
              <img src="//img2.cityheaven.net/img/specialthanks.png?imgopt=y">
            </span>
          </div>
          <div class="review-visit">
            <div class="visit-time">
              <dl class="list">
              <dt>訪問日</dt>
              <dd>{{$review->review_created_at ? \Carbon\Carbon::parse($review->review_created_at)->format('Y年m月d日') : ''}}</dd>
              <dd>
              </dd>
              </dl>
            </div>
            <div class="visit-date">
              <div class="shop-icon inner">
              <a href="/hokkaido/A0101/A010103/oneesan/girlid-60894823/">
                <img name="osusume" itemprop="image url" class="type-girls" oncontextmenu="return false"
                src="{{ asset('storage/'.$review->cast_gallery) }}"
                style="background-image: none; background-repeat: no-repeat; background-position: center center; animation-duration: 0.8s;">
              </a>
              </div>
              <dl class="list">
              <dt>遊んだ女の子</dt>
              {{-- <dd class="name">夢野凪彩7/24Debut[23歳] --}}
                <dd class="name">{{$review->cast_name." [".$review->cast_age."] "}}
                </dd>
              </dl>
              <p class="girls-spec">
              T154･ (Ccup)･･ </p>
              <p class="more-girlsinfo"><a href="{{route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $review->cast_id])}}">プロフィールを見る</a></p>
            </div>
          </div>
        </div>
        <div class="review-item-content">
          <div class="review-item-star">
            <div class="review-average-star-icon star_on in_item"></div>
            <div class="review-average-star-icon star_on in_item"></div>
            <div class="review-average-star-icon star_on in_item"></div>
            <div class="review-average-star-icon star_on in_item"></div>
            <div class="review-average-star-icon star_half in_item"></div>

            <span class="total_rate">{{$review->review_average_point}}</span>
            {{-- <span class="total_rate">{{$review->review_average_point}}</span> --}}

            <div class="review-item-icons">
              <span class="review-item-icon _reserve">ネット予約で行きました</span>
            </div>
          </div>

          <ul class="review-item-rate">
            <li>女の子 <span>{{$review->review_cast_point}}</span></li>
            <li>プレイ <span>{{$review->review_play_point}}</span></li>
            <li>料金 <span>{{$review->review_price_point}}</span></li>
            <li>スタッフ <span>{{$review->review_stuff_point}}</span></li>
            <li>写真 <span>{{$review->review_photo_point}}</span></li>
          </ul>

          <div class="review-item-title">
            <span class="review_bold">{{$review->review_title}}</span>
          </div>
          <p class="review-item-post">{{$review->review_content}}</p>
          {{-- <p class="review-item-post">【女の子について】<br>
          正直隠しておきたいくらいの大当たり｡<br>
          ホテル下まで迎えに行って、車から出てきてすぐ「これは当たりだ！」と確信してしまうルックスの良さ｡<br>
          女子大生か､いや女子校生？と見紛うくらいの若さ､幼さでお店のコンセプトとはちょっと違うけどすごい可愛らしい｡<br>
          ラスト枠で疲れているはずなのに色々話してくれるし性格も良い子だなと感じました｡<br>
          テクニック面は発展途上だけど､それを差し引いても文句なしのレベル｡こういう子に稀に巡り会えるからまたお店を利用しちゃうんだよな､と改めて実感｡本人にも伝えましたが、絶対すぐ人気キャストになるはずの逸材です｡まだ半年残してますが、きっと今年のお姉さんCLUBの新人王だ、というハイクオリティ｡<br>
          お店の紹介文にもありますがくりっとした目が橋本環奈さんっぽい。自分としては元乃〇坂46の向井〇月さんにも似てるな､と思いました。すれてない美少女という感じの子です。<br>
          まだ新人さんで写真とのギャップは判定しづらいですが､お店の紹介文や宣材写真に偽りなし､という印象｡思ったより若い､幼い､というくらいでしょうか｡写メ日記でご本人が出している写真の服が似合いそうな女の子をイメージしたら､その通りの可愛い子が来た！という感じです｡<br>
          <br>
          【料金納得度】<br>
          このレベルの子と新人割引で遊べるなんて信じられない。お世辞抜きで超お得体験でした。新人割引がなくなっても絶対また呼びたい｡<br>
          <br>
          【プレイ内容】<br>
          新人さんということもあり､女の子からの攻めは普通かも､と思いました。でも疲れているはずなのに手抜き感は一切なく､一生懸命サービスしてくれるから好感度は高いです。それよりこんな清楚感､ロリ感の高い子を攻められる方が貴重な体験｡肌も白くてきれいだし､こんな背徳感を感じさせてくれるのは凪彩さんのルックス､キャラクターあってこそ｡受け派より攻め派の方が満足度は高いと思います。<br>
          <br>
          【スタッフの対応】<br>
          良い｡当日､花火大会の影響で案内時間が遅れてしまったものの確認の電話の際に言われた時間通りだったので、それは仕方ないかな､と思いました｡電話口の女性スタッフの方は言葉遣いが丁寧で聞き取りやすく安心でした。<br>
          <br>
          凪彩さんみたいな子には是非長く在籍してほしい。デビュー間もなくでちょっとお疲れ気味に見えたので、早く無理なく働けるようになったら良いな､と思いました｡
          </p> --}}
          {{-- <p class="review-item-post-date">掲載日：2025年07月28日</p> --}}
          <div class="review-item-reply">
            <div class="review-item-reply-inner is_open">
              <div class="review-item-reply-head">
                お店からの返信コメント
                <img src="//img2.cityheaven.net/img/icon/baseline-chat_bubble_outline-24px.svg">
              </div>
              <p class="review-item-reply-body">
                {{$review->review_manager_comment}}
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Pagination and Footer -->
    <div class="reviewlist__footer">コメントを１０掲載</div>
    <div class="reviewlist__pagination">
      <ul class="pagination">
        <li class="pagination-item disabled">
          <a class="page-link" href="#" data-page="prev">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </a>
        </li>

        <li class="pagination-item active">
          <a class="page-link" href="#" data-page="1">1</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="2">2</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="3">3</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="4">4</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="next">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
</x-public-shop-layout>
@once
  @vite(['resources/scss/shop/reviewlist.scss', 'resources/scss/shop/newface.scss'])
@endonce