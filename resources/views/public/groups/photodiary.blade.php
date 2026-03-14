@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.css" rel="stylesheet">
@endpush

<x-public-groups-sub-page-layout
  :showButtonGroup="true"
  :buttonGroup="$buttonGroup"
  :showLoadMore="true"
>
  <!-- Photo Diary Content -->
  <div class="photodiary">
    <section>
      <div class="diary-content">
        <!-- Calendar Sidebar (Desktop Only) -->
        <div class="diary-content-sidebar pc-only">
          <div class="diary-body-left-calendar-content" id="diary-calendar">
          </div>
          
          <!-- Monthly Picker -->
          <div class="diary-monthly-picker">
            @if(!empty($availableMonths))
              @foreach($availableMonths as $availableMonth)
                @php
                  $year = substr($availableMonth, 0, 4);
                  $monthNum = substr($availableMonth, 5, 2);
                  $monthLabel = $year . '年' . (int)$monthNum . '月';
                  $isCurrentMonth = $availableMonth === $currentMonth;
                @endphp
                <a href="{{ route('public.groups.photodiary') }}?month={{ $availableMonth }}" 
                   class="diary-monthly-picker-item {{ $isCurrentMonth ? 'diary-monthly-picker-item--active' : '' }}">
                  {{ $monthLabel }}
                </a>
              @endforeach
            @endif
          </div>
        </div>

        <!-- Diary Cards Grid -->
        <div class="diary-content-main">
          <div class="diary-cards-grid">
              @forelse($diaries as $diary)
                <div class="diary-card">
                  <div class="diary-card-image">
                    @if($diary->photo)
                      <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="{{ $diary->subject }}">
                    @else
                      <img src="{{ asset('assets/img/groups/photo-diary-card.jpg') }}" alt="Diary">
                    @endif
                  </div>
                  <div class="diary-card-content">
                    <h3 class="diary-card-title">{{ $diary->subject }}</h3>
                    <p class="diary-card-date">{{ $diary->created_at->format('m/d H:i') }}</p>
                  </div>
                  <div class="diary-card-author">
                    <div class="diary-card-author-info">
                      <div class="diary-card-author-avatar">
                        @if($diary->gallery_1 ?? null)
                          <img src="{{ asset('storage/cast/' . $diary->gallery_1) }}" alt="{{ $diary->cast_name }}">
                        @else
                          <img src="{{ asset('assets/img/groups/diary-card-placeholder.png') }}" alt="Cast">
                        @endif
                      </div>
                      <div class="diary-card-author-details">
                        <p class="diary-card-author-name">{{ $diary->cast_name }}({{ $diary->age }})</p>
                        <p class="diary-card-author-stats">T.{{ $diary->height }} B.{{ $diary->bust }}({{ $diary->bra_size }}) W.{{ $diary->waist }} H.{{ $diary->hip }}</p>
                      </div>
                    </div>
                    <div class="diary-card-shop">
                      <p>{{ $diary->shop_name }}</p>
                    </div>
                  </div>
                </div>
              @empty
                <div class="diary-card-empty">
                  <p>日記がありません</p>
                </div>
              @endforelse
          </div>

          <!-- Pagination -->
          <x-public.groups.pagination :paginator="$diaries" />

          <!-- Mobile Calendar and Monthly Picker -->
          <div class="diary-mobile-calendar-section mobile-only">
            <div class="diary-mobile-calendar-wrapper">
              <div class="diary-body-left-calendar-content" id="diary-calendar-mobile">
              </div>
            </div>
            
            <div class="diary-mobile-monthly-picker">
              @if(!empty($availableMonths))
                @foreach($availableMonths as $availableMonth)
                  @php
                    $year = substr($availableMonth, 0, 4);
                    $monthNum = substr($availableMonth, 5, 2);
                    $monthLabel = $year . '年' . (int)$monthNum . '月';
                    $isCurrentMonth = $availableMonth === $currentMonth;
                  @endphp
                  <a href="{{ route('public.groups.photodiary') }}?month={{ $availableMonth }}" 
                     class="diary-monthly-picker-item {{ $isCurrentMonth ? 'diary-monthly-picker-item--active' : '' }}">
                    {{ $monthLabel }}
                  </a>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-public-groups-sub-page-layout>
<script>
    let date = "{{ $date ?? '' }}";
    let month = "{{ $month ?? '' }}";
    let currentMonth = "{{ $currentMonth ?? '' }}";
    let diarys_date = {!! json_encode($diarys_date ?? []) !!};
</script>
@once
  @vite(['resources/scss/groups/photodiary.scss', 'resources/js/groups/photodiary.js'])
@endonce