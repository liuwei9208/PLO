<x-public-group-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- schedule List -->
  <section class="schedule">
    <div class="schedule-title">
      <img src="{{ asset('assets/img/group/schedule/schedule.svg') }}" alt="Schedule">
      <h2 class="schedule-title-ja">出勤情報</h2>
    </div>
    <div class="schedule-week">
      @foreach ($days as $day)
        <div class="schedule-week-day">
          <button class="schedule-week-day-date" value="{{ $day['date'] }}">{{ $day['weekDay'] }}</button>
        </div>
      @endforeach
    </div>
    <div class="schedule-shop-list">
      <div class="schedule-shop-list-title">
        店舗名
      </div>
      <div class="schedule-shop-list-items">
      @foreach ($shops as $shop)
        <div class="schedule-shop-list-item">
          <button class="schedule-shop-list-item-button" value="{{ $shop->id }}">{{ $shop->name }}</button>
        </div>
      @endforeach
      </div>
    </div>
    <div class="schedule-person-info-list">
      @foreach ($casts as $cast)
      <div class="schedule-person-info-list-item">
        <a href="{{ route('public.group.cast.profile', ['shop' => $shop->slug, 'id' => $cast->id]) }}">
          <div class="schedule-person-info-photo">
            <img src="{{ asset('assets/img/group/schedule/person.svg') }}" alt="Person">
          </div>
          <div class="schedule-person-info-items">
            <div class="schedule-person-info-shop-working">
              店舗名　出勤時間
            </div>
            <div class="schedule-person-info-name">
              名前
            </div>
            <div class="schedule-person-info-property">
              プロパティ
            </div>
            <div class="schedule-person-info-message">
              メッセージ
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </section>

</x-public-group-layout>
<script>
  const token = '{{ $token }}';
</script>
@once
  @vite(['resources/scss/group/_showschedule.scss', 'resources/js/group/showschedule.js'])
@endonce
