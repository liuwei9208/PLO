<div class="groups-date-search-bar">
  <div class="groups-date-search-header">
    <div class="groups-date-search-icon">
      <img src="{{ $icon }}" alt="Calendar">
    </div>
    <p class="groups-date-search-heading">{{ $heading }}</p>
  </div>
  <div class="groups-date-search-buttons">
    @foreach($dates as $dateItem)
      @php
        $isActive = $activeDate === $dateItem['date'];
      @endphp
      <button
        type="button"
        class="groups-date-button {{ $isActive ? 'is-active' : '' }}"
        data-date="{{ $dateItem['date'] }}"
        aria-pressed="{{ $isActive ? 'true' : 'false' }}"
      >
        {{ $dateItem['display'] ?? $dateItem['label'] }}
      </button>
    @endforeach
  </div>
</div>
