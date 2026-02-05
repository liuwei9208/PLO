<x-public-groups-sub-page-layout
  titleEn="New Face"
  titleJa="新人情報"
  :bannerImage="asset('assets/img/groups/newface-banner.jpg')"
  :vectorImage="asset('assets/img/groups/Vector.png')"
  :showButtonGroup="true"
  :showLoadMore="true"
>
  <!-- New Face Content -->
  <div class="newface">
    <section>
      <div class="newface-cards-container">
        <div class="newface-cards-grid">
            @foreach(range(1, 6) as $i)
              <x-public.groups.newface-card 
                date="12/25"
                name="キャスト名"
                age="00"
                height="160"
                bust="85"
                braSize="C"
                waist="60"
                hip="83"
                message="女の子メッセージ女の子メッセージ女の子メッセージ女の子メッセージ女の子メッセージ女の子メッセージ"
                shopName="ラブストーリー"
                shopSlug="lovestory"
                :imageUrl="asset('assets/img/groups/newface-card.png')"
                :frameImageUrl="asset('assets/img/groups/card-frame-lovestory.png')"
                :showNew="true"
              />
            @endforeach
        </div>
      </div>
    </section>
  </div>
</x-public-groups-sub-page-layout>

@once
  @vite(['resources/scss/groups/newface-page.scss'])
@endonce
