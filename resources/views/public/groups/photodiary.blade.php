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
                <a href="/groups/photodiary?month={{ $availableMonth }}" 
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
          @if($diaries->hasPages())
            @php
              $currentPage = $diaries->currentPage();
              $lastPage = $diaries->lastPage();
              $onEachSide = 2; // Show 2 pages on each side of current page
              
              // Calculate page ranges
              $start = max(1, $currentPage - $onEachSide);
              $end = min($lastPage, $currentPage + $onEachSide);
              
              // Build pagination array
              $pages = [];
              
              // Always add first page
              if ($start > 1) {
                $pages[] = ['page' => 1, 'url' => $diaries->url(1), 'type' => 'page'];
                if ($start > 2) {
                  $pages[] = ['page' => null, 'type' => 'ellipsis'];
                }
              }
              
              // Add pages around current
              for ($i = $start; $i <= $end; $i++) {
                $pages[] = ['page' => $i, 'url' => $diaries->url($i), 'type' => 'page'];
              }
              
              // Add ellipsis and last page if needed
              if ($end < $lastPage) {
                if ($end < $lastPage - 1) {
                  $pages[] = ['page' => null, 'type' => 'ellipsis'];
                }
                $pages[] = ['page' => $lastPage, 'url' => $diaries->url($lastPage), 'type' => 'page'];
              }
            @endphp
            
            <div class="diary-pagination">
              <button class="diary-pagination-btn diary-pagination-btn--prev" 
                      {{ $diaries->onFirstPage() ? 'disabled' : '' }}
                      onclick="window.location.href='{{ $diaries->previousPageUrl() }}'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M15 18L9 12L15 6" stroke="{{ $diaries->onFirstPage() ? '#BEBEBE' : '#021A21' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
              
              @foreach($pages as $item)
                @if($item['type'] === 'ellipsis')
                  <span class="diary-pagination-ellipsis">...</span>
                @else
                  <button class="diary-pagination-page {{ $diaries->currentPage() == $item['page'] ? 'diary-pagination-page--active' : '' }}"
                          onclick="window.location.href='{{ $item['url'] }}'">
                    {{ $item['page'] }}
                  </button>
                @endif
              @endforeach
              
              <button class="diary-pagination-btn diary-pagination-btn--next"
                      {{ $diaries->hasMorePages() ? '' : 'disabled' }}
                      onclick="window.location.href='{{ $diaries->nextPageUrl() }}'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M9 6L15 12L9 18" stroke="{{ $diaries->hasMorePages() ? '#021A21' : '#BEBEBE' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          @endif

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
                  <a href="/groups/photodiary?month={{ $availableMonth }}" 
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