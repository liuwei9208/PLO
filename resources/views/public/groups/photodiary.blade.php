@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.css" rel="stylesheet">
@endpush

<x-public-groups-sub-page-layout>
  <!-- Photo Diary Content -->
  <div class="photodiary">
    <section>
      <div class="diary-content">
        <!-- Calendar Sidebar -->
        <div class="diary-content-sidebar pc-only">
          <div class="diary-body-left-calendar-content" id="diary-calendar">
          </div>
        </div>

        <!-- Diary Cards Grid -->
        <div class="diary-content-main">
          <div class="diary-cards-grid">
              @for($i = 0; $i < 9; $i++)
                <div class="diary-card">
                  <div class="diary-card-image">
                    <img src="{{ asset('assets/img/groups/photo-diary-card.jpg') }}" alt="Diary">
                  </div>
                  <div class="diary-card-content">
                    <h3 class="diary-card-title">日記タイトル日記タイ</h3>
                    <p class="diary-card-date">12/01 00:00</p>
                  </div>
                  <div class="diary-card-author">
                    <div class="diary-card-author-info">
                      <div class="diary-card-author-avatar">
                        <img src="{{ asset('assets/img/groups/diary-card-placeholder.png') }}" alt="Cast">
                      </div>
                      <div class="diary-card-author-details">
                        <p class="diary-card-author-name">投稿者名(00)</p>
                        <p class="diary-card-author-stats">T.160 B.85(C) W.60 H.83</p>
                      </div>
                    </div>
                    <div class="diary-card-shop">
                      <p>シロガネーゼ</p>
                    </div>
                  </div>
                </div>
              @endfor
          </div>

          <!-- Pagination -->
          <div class="diary-pagination">
            <button class="diary-pagination-btn diary-pagination-btn--prev" disabled>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M15 18L9 12L15 6" stroke="#BEBEBE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button class="diary-pagination-page diary-pagination-page--active">1</button>
            <button class="diary-pagination-page">2</button>
            <button class="diary-pagination-page">3</button>
            <button class="diary-pagination-btn diary-pagination-btn--next">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M9 6L15 12L9 18" stroke="#021A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</x-public-groups-sub-page-layout>
<script>
    let date = "{{ $date ?? '' }}";
    let diarys_date = {!! json_encode($diarys_date ?? []) !!};
</script>
@once
  @vite(['resources/scss/groups/photodiary.scss', 'resources/js/groups/photodiary.js'])
@endonce