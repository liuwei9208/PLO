<x-public-shop-layout :shop="$shop">




  <!-- Event List -->
  <section class="event">
    <div class="event-title">
      <img src="{{ asset('assets/img/group/event/event.svg') }}" alt="Event">
      <h2 class="event-title-ja">イベント一覧</h2>
    </div>
    <div class="event-list">
      @foreach ($events as $event)
        <div class="event-list-item">
          <div class="event-list-item-image">
            <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
          </div>
          <div class="event-list-item-published-at">
            <p>{{ $event->published_at->format('y:m:d') }}</p>
          </div>
          <div class="event-list-item-title">
            <h3>{{ $event->title }}</h3>
          </div>
        </div>
      @endforeach
    </div>
  </section>

</x-public-shop-layout>
@once
  @vite(['resources/scss/group/_eventview.scss'])
@endonce
