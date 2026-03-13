<x-public-groups-sub-page-layout
  titleEn=""
  titleJa=""
  :bannerImage="asset('')"
  :vectorImage="asset('')"
  :showButtonGroup="false"
  :showLoadMore="false"
  :showDateSearchBar="false"
>
  <section class="recruit-confirm">
    <div class="recruit-confirm__inner">
      <h2 class="recruit-confirm__title">送信内容の確認</h2>
      <p class="recruit-confirm__lead">以下の内容でよろしければ「送信する」ボタンを押してください。</p>

      <dl class="recruit-confirm__list">
        <div class="recruit-confirm__row">
          <dt>希望勤務店舗</dt>
          <dd>{{ $shopLabel }}</dd>
        </div>
        <div class="recruit-confirm__row">
          <dt>氏名</dt>
          <dd>{{ $data['name'] }}</dd>
        </div>
        @if (!empty($data['furigana']))
        <div class="recruit-confirm__row">
          <dt>フリガナ</dt>
          <dd>{{ $data['furigana'] }}</dd>
        </div>
        @endif
        <div class="recruit-confirm__row">
          <dt>メールアドレス</dt>
          <dd>{{ $data['email'] }}</dd>
        </div>
        @if (!empty($data['phone']))
        <div class="recruit-confirm__row">
          <dt>電話番号</dt>
          <dd>{{ $data['phone'] }}</dd>
        </div>
        @endif
        @if (!empty($data['age']))
        <div class="recruit-confirm__row">
          <dt>年齢</dt>
          <dd>{{ $data['age'] }}{{ $type === 'male' ? '歳' : '' }}</dd>
        </div>
        @endif
        @if (!empty($data['experience']))
        <div class="recruit-confirm__row">
          <dt>{{ $type === 'male' ? '風俗店での業務経験' : 'お仕事経験' }}</dt>
          <dd>{{ $experienceLabel }}</dd>
        </div>
        @endif
        @if (!empty($data['subject']))
        <div class="recruit-confirm__row">
          <dt>件名</dt>
          <dd>{{ $subjectLabel }}</dd>
        </div>
        @endif
        <div class="recruit-confirm__row recruit-confirm__row--textarea">
          <dt>問い合わせ内容</dt>
          <dd>{!! nl2br(e($data['inquiry'])) !!}</dd>
        </div>
      </dl>

      <form action="{{ route('public.recruit.submit') }}" method="POST" class="recruit-confirm__form">
        @csrf
        <div class="recruit-confirm__actions">
          <a href="{{ $type === 'male' ? route('public.recruit.male') : route('public.recruit.female') }}#recruit-form" class="recruit-confirm__back">戻る</a>
          <button type="submit" class="recruit-confirm__submit">送信する</button>
        </div>
      </form>
    </div>
  </section>

  <footer class="recruit-female-footer recruit-female-footer--male">
    <p class="recruit-female-footer__copy">Copyright © PLO Group All Rights Reserved.</p>
  </footer>
</x-public-groups-sub-page-layout>
