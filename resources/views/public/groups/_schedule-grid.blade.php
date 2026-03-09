<div class="schedule-grid schedule-grid--{{ $variant }}">
  @foreach($casts->chunk($chunkSize) as $row)
    <div class="schedule-grid-row schedule-grid-row--{{ $variant }}">
      @foreach($row as $todayCast)
        @php
          $itemIndex = (($loop->parent->index * $chunkSize) + $loop->index);

          $scheduleImageUrl = $homeSchedulePhotos->isNotEmpty()
            ? $homeSchedulePhotos[$itemIndex % $homeSchedulePhotos->count()]
            : (
              !empty($todayCast->gallery_1)
                ? asset('storage/' . ltrim($todayCast->gallery_1, '/'))
                : asset('assets/img/groups/pickup-cast-1.png')
            );

          $scheduleFrameUrl = $homeScheduleFrames->isNotEmpty()
            ? $homeScheduleFrames[$itemIndex % $homeScheduleFrames->count()]
            : asset('assets/img/groups/card-frame-' . $todayCast->shop_slug . '.png');
        @endphp

        <a class="schedule-grid-content" href="{{ route('public.shops.shop.profile', ['shop' => $todayCast->shop_slug, 'id' => $todayCast->id]) }}">
          <div class="schedule-grid-content-img" aria-label="{{ $todayCast->name }}">
            <img class="schedule-grid-content-img-photo" src="{{ $scheduleImageUrl }}" alt="{{ $todayCast->name }}">
            <img class="schedule-grid-content-img-frame" src="{{ $scheduleFrameUrl }}" alt="">
          </div>
          <div class="schedule-grid-content-contents">
            <div class="schedule-grid-content-contents-top pc-only">
              <div class="schedule-grid-content-contents-top-times">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
                </svg>
                <span class="schedule-grid-content-contents-top-times-text">{{ date('H:i', strtotime($todayCast->start_datetime)) }} - {{ date('H:i', strtotime($todayCast->end_datetime)) }}</span>
              </div>
              <div class="schedule-grid-content-contents-top-shop">
                <span class="schedule-grid-content-contents-top-shop-name">{{ $todayCast->shop_name }}</span>
              </div>
            </div>
            <div class="schedule-grid-content-contents-top sp-only">
              <div class="schedule-grid-content-contents-top-shop">
                <span class="schedule-grid-content-contents-top-shop-name">{{ $todayCast->shop_name }}</span>
              </div>
              <div class="schedule-grid-content-contents-top-times">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
                </svg>
                <span class="schedule-grid-content-contents-top-times-text">{{ date('H:i', strtotime($todayCast->start_datetime)) }} - {{ date('H:i', strtotime($todayCast->end_datetime)) }}</span>
              </div>
            </div>
            <div class="schedule-grid-content-contents-measure pc-only">
              <span class="schedule-grid-content-contents-measure-text">キャスト名(00)／T.160 B.85(C) W.60 H.83</span>
            </div>
            <div class="schedule-grid-content-contents-measure sp-only">
              <span class="schedule-grid-content-contents-measure-name">{{ $todayCast->name }} ({{ $todayCast->age }})</span>
              <span class="schedule-grid-content-contents-measure-text">キャスト名(00)／T.160 B.85(C) W.60 H.83</span>
            </div>
            <div class="schedule-grid-content-contents-message">
              <span class="schedule-grid-content-contents-message-text">{{ \Illuminate\Support\Str::limit($todayCast->appeal_point, 60, '...') }}</span>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  @endforeach
</div>
