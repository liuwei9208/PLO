<x-public-groups-sub-page-layout
  titleEn=""
  titleJa=""
  :bannerImage="asset('')"
  :vectorImage="asset('')"
  :showButtonGroup="false"
  :showLoadMore="false"
  :showDateSearchBar="false"
>
  <section class="recruit-complete">
    <div class="recruit-complete__inner">
      <h2 class="recruit-complete__title">送信が完了しました</h2>
      <p class="recruit-complete__lead">お問い合わせありがとうございます。<br>担当者よりご連絡いたします。</p>
      <div class="recruit-complete__actions">
        <a href="{{ route('public.groups.home') }}" class="recruit-complete__link">トップページへ戻る</a>
      </div>
    </div>
  </section>

  <footer class="recruit-female-footer recruit-female-footer--male">
    <p class="recruit-female-footer__copy">Copyright © PLO Group All Rights Reserved.</p>
  </footer>
</x-public-groups-sub-page-layout>
