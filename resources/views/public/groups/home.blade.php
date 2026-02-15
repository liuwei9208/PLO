<x-public-groups-layout>
  <x-public.groups.sidebar />
  <!-- Main Visual -->
  <x-public.groups.mv />
  {{-- <div class="mv-banner-bottom">
    <div class="mv-banner-bottom-wrapper">
      <div class="mv-banner-bottom-slide">
        <img src="{{ asset('assets/img/groups/banner-bottom.png') }}" alt="">
        <img src="{{ asset('assets/img/groups/banner-bottom.png') }}" alt="">
      </div>
    </div>
  </div> --}}
  @if($todayCasts->count() > 0)
  <div class="section-title">
    <h1 class="section-title-en">Today Schecule</h1>
    <div class="section-title-jp">
      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="23" viewBox="0 0 21 23" fill="none">
        <path d="M2.01123 23C0.795273 22.7404 0.127176 22.0539 0.0186893 20.8024C0.114519 15.1935 -0.158505 9.53781 0.158818 3.95402C0.251936 3.42664 1.30245 2.51562 1.78521 2.51562H4.09055V4.62695C4.09055 4.89648 4.76046 5.4068 5.0606 5.4598C5.60304 5.55504 7.2674 5.54156 7.84238 5.48047C8.32876 5.42836 8.66055 5.23699 8.8721 4.79676C8.90736 4.72309 9.06286 4.30082 9.06286 4.26758V2.51562H11.9558V4.26758C11.9558 4.82371 12.5245 5.41578 13.0841 5.48227C13.6437 5.54875 15.4428 5.55234 15.9581 5.4598C16.2781 5.4023 16.9281 4.945 16.9281 4.62695V2.51562H19.2335C19.2895 2.51562 19.9341 2.82559 20.0318 2.89027C20.642 3.29277 20.896 3.92797 20.9955 4.62785L21 20.8024C20.9376 21.992 20.1014 22.8661 18.9171 23H2.01123ZM19.4595 7.99609H1.5592V20.9785C1.5592 21.1843 2.07722 21.558 2.32313 21.4771H18.6043C18.8682 21.5293 19.4595 21.2418 19.4595 20.9785V7.99609Z" fill="#021A21"/>
        <path d="M15.3008 0C15.6109 0.1725 15.9572 0.380039 16.0187 0.769063C16.072 1.10598 16.0593 4.23973 15.9789 4.40324C15.9057 4.55148 15.7664 4.56766 15.6209 4.58652C14.8515 4.68535 13.7251 4.57125 12.9494 4.49219V0.583984C12.9494 0.364766 13.4322 0.134766 13.5822 0H15.3008Z" fill="#021A21"/>
        <path d="M7.34515 0C7.67694 0.1725 7.96172 0.269531 8.06388 0.67832L8.05031 4.33945C8.00059 4.4868 7.89753 4.55238 7.74926 4.57934C7.49613 4.62605 5.32097 4.60809 5.17452 4.53711C5.07145 4.4877 5.01088 4.37629 4.99642 4.26488C5.08592 3.18586 4.86714 1.90379 4.9919 0.851719C5.04614 0.394414 5.34719 0.203047 5.71695 0H7.34515Z" fill="#021A21"/>
        <path d="M16.6569 9.97266H4.36177V11.5898H16.6569V9.97266Z" fill="#021A21"/>
        <path d="M16.6569 13.5664H4.36177V15.0938H16.6569V13.5664Z" fill="#021A21"/>
        <path d="M13.2215 17.1602H4.36177V18.6875H13.2215V17.1602Z" fill="#021A21"/>
      </svg>
      <h2 class="section-title-jp-text">出勤情報</h2>
    </div>
  </div>

  <div class="schedule"> {{-- grid --}}
    <div class="schedule-grid">
      {{-- @for ($i=1 ; $i <= 10 ; $i++)
      <div class="schedule-grid-content">
        <div class="schedule-grid-content-img">
          <img class="schedule-grid-content-img-photo" src="{{ asset('assets/img/groups/pickup-cast-1.png') }}">
          <img class="schedule-grid-content-img-frame" src="{{ asset('assets/img/groups/card-frame.png') }}">
        </div>
        <div class="schedule-grid-content-contents">
          <div class="schedule-grid-content-contents-top pc-only">
            <div class="schedule-grid-content-contents-top-times">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">00:00 - 00:00</span>
            </div>
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">プッシーキャット</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-top sp-only">
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">プッシーキャット</span>
            </div>
            <div class="schedule-grid-content-contents-top-times">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">00:00 - 00:00</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-measure pc-only">
            <span class="schedule-grid-content-contents-measure-text">キャスト名(00)／T.160 B.85(C) W.60 H.83</span>
          </div>
          <div class="schedule-grid-content-contents-measure sp-only">
            <span class="schedule-grid-content-contents-measure-name">キャスト名(00)</span>
            <span class="schedule-grid-content-contents-measure-text">T.160 B.85(C) W.60 H.83</span>
          </div>
          <div class="schedule-grid-content-contents-message">
            <textarea class="schedule-grid-content-contents-message-text">メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ</textarea>
          </div>
        </div>
      </div>

      @endfor --}}
      @foreach($todayCasts as $todayCast)
      <a class="schedule-grid-content" href="{{ route('public.shops.shop.profile',[ 'shop'=>$todayCast->shop_slug,'id'=>$todayCast->id ]) }}">{{-- flex col--}}
        <div class="schedule-grid-content-img">
          <img class="schedule-grid-content-img-photo" src="{{ asset('storage/' . $todayCast->gallery_1) }}">
          <img class="schedule-grid-content-img-frame" src="{{ asset('assets/img/groups/card-frame-'.$todayCast->shop_slug.'.png') }}">
        </div>
        <div class="schedule-grid-content-contents">{{-- flex col--}}
          <div class="schedule-grid-content-contents-top pc-only">{{-- flex row--}}
            <div class="schedule-grid-content-contents-top-times">{{-- flex row--}}
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">{{ date('H:i', strtotime($todayCast->start_datetime)) }} - {{ date('H:i', strtotime($todayCast->end_datetime)) }}</span>
            </div>
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">{{ $todayCast->shop_name }}</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-top sp-only">{{-- flex row--}}
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">{{ $todayCast->shop_name }}</span>
            </div>
            <div class="schedule-grid-content-contents-top-times">{{-- flex row--}}
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">{{ date('H:i', strtotime($todayCast->start_datetime)) }} - {{ date('H:i', strtotime($todayCast->end_datetime)) }}</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-measure pc-only">
            <span class="schedule-grid-content-contents-measure-text">{{ $todayCast->name }} ({{ $todayCast->age }})／T.{{ $todayCast->height }} B.{{ $todayCast->bust }}({{ $todayCast->bra}}) W.{{ $todayCast->waist }} H.{{ $todayCast->hip }}</span>
          </div>
          <div class="schedule-grid-content-contents-measure sp-only">
            <span class="schedule-grid-content-contents-measure-name">{{ $todayCast->name }} ({{ $todayCast->age }})</span>
            <span class="schedule-grid-content-contents-measure-text">T.{{ $todayCast->height }} B.{{ $todayCast->bust }}({{ $todayCast->bra}}) W.{{ $todayCast->waist }} H.{{ $todayCast->hip }}</span>
          </div>
          <div class="schedule-grid-content-contents-message">
            <textarea class="schedule-grid-content-contents-message-text">{{ $todayCast->appeal_point }}</textarea>
          </div>
        </div>
      </a>

      @endforeach
    </div>
    <div class="groups-button-more">
      <a href="{{ route('public.groups.schedule') }}" class="groups-button-more-btn">もっと見る</a>
    </div>
  </div>
  @endif
  @if($events->count() > 0)
  <div class="event">
    <div class="section-title">
      <h1 class="section-title-en">Event Info</h1>
      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" viewBox="0 0 22 25" fill="none">
          <path d="M10.9016 0.00805664C12.3237 0.177979 12.8743 1.80591 12.0609 2.93481C15.4556 3.38208 18.2079 6.27954 18.5209 9.73071C18.7305 12.0393 18.0157 14.5999 19.2097 16.6956H2.78674C3.95857 14.6233 3.28619 12.0999 3.46491 9.81665C3.72092 6.53833 6.32058 3.5686 9.54914 3.03149C8.59081 1.91919 9.11441 0.187744 10.6118 0.00805664C10.6978 -0.00268555 10.8156 -0.00268555 10.9016 0.00805664Z" fill="#D99F01"/>
          <path d="M10.6118 24.9915C10.4524 24.9778 9.91723 24.8186 9.74237 24.7473C9.0188 24.4504 8.56571 23.677 8.38989 22.9426H13.1236C12.8763 23.9993 12.1015 24.8586 10.9982 24.9924C10.8862 25.0061 10.7277 25.0012 10.6118 24.9915Z" fill="#D99F01"/>
          <path d="M1.40913 17.9875L20.4182 17.9641C22.4276 18.1926 22.5551 20.9377 20.6134 21.3821H1.38401C-0.464057 20.9348 -0.466955 18.4104 1.40913 17.9875Z" fill="#D99F01"/>
        </svg>
        <h2 class="section-title-jp-text">イベント情報</h2>
      </div>
    </div>

    <div class="event-slider swiper content-wrapper">
      <div class="swiper-wrapper">
        @foreach($events as $event)
          <div class="swiper-slide">
            <div class="event-main">
              <div class="event-main-content pc-only">
                <h3 class="event-main-title">{{ $event->published_at->format('y/m/d')."  |  " .$event->title}}</h3>
              </div>
              <div class="event-main-content sp-only">
                <h3 class="event-main-content-date">{{ $event->published_at->format('y/m/d') }}</h3>
                <h3 class="event-main-content-title">{{ $event->title }}</h3>
              </div>
              <div class="event-main-image">
                <a href="{{ route('public.groups.event.detail', ['id' => $event->id]) }}">
                  <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="event-pagination">
        <div class="swiper-wrapper">
          @foreach($events as $event)
            <div class="swiper-slide" data-swiper-slide-index="{{ $loop->index }}">
              <div class="event-slide-image">
                <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endif
  @if($newfaces_this_week->count() > 0)
  <div class="newface">
    <div class="newface-bgs">
      <img class="newface-bgs-bg1" src="{{ asset('assets/img/groups/bg-pickup.png') }}">
      {{-- <img class="newface-bgs-bg1" src="{{ asset('assets/img/groups/bg-newface.jpg') }}">
      <img class="newface-bgs-bg2" src="{{ asset('assets/img/groups/bg-newface.jpg') }}"> --}}
    </div>
    <div class="section-title">
      <h1 class="section-title-en">New Face</h1>
      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none">
          <path d="M4.17548 0L5.21993 0.461095L10.4749 5.52484L15.6644 0.461095L16.7088 0H17.1629C18.3845 0.329222 18.874 0.992277 18.9776 2.26029C18.7732 6.26536 19.2546 10.5535 18.983 14.5254C18.8559 16.3855 18.2592 16.6262 17.1148 17.7918C15.5817 19.354 13.709 21.4483 12.0779 22.8205C11.6219 23.2042 11.2051 23.4522 10.6238 23.6035C10.5057 23.5933 10.3759 23.6191 10.2605 23.6035C9.74193 23.5315 9.29145 23.242 8.89729 22.9127C7.31699 21.5931 5.5269 19.5744 4.04197 18.0685C2.81952 16.8291 2.03754 16.522 1.90131 14.5254C1.62976 10.5535 2.11111 6.26536 1.90676 2.26029C2.00848 1.00888 2.52707 0.332911 3.72137 0H4.17548ZM10.4422 20.2836C11.4884 19.4831 12.363 18.4493 13.3003 17.5152C13.8316 16.9868 15.8796 15.2466 16.0304 14.6619L16.0259 5.07297C15.817 4.73914 15.4782 4.70225 15.1694 4.93741L10.4431 9.63505L10.4422 20.2836Z" fill="#52B845"/>
        </svg>
        <h2 class="section-title-jp-text">新人情報</h2>
      </div>
    </div>
    <div class="newface-slide swiper content-wrapper">
      <div class="swiper-wrapper">
        @foreach ($newfaces_this_week as $cast)
          <div class="swiper-slide">


            <a class="newface-content" href="{{ route('public.shops.shop.profile',[ 'shop'=>$cast->shop_slug,'id'=>$cast->id ]) }}">
              <div class="newface-content-top">
                <div class="newface-content-top-newdate">
                  <span class="newface-content-top-newdate-date">{{ \Carbon\Carbon::parse($cast->joined_at)->format('m/d') }}</span>
                  <span class="newface-content-top-newdate-new">New</span>
                </div>
                <div class="newface-content-top-underbar"></div>
              </div>
              <div class="newface-content-img">
                <img class="newface-content-img-photo" src="{{ asset('storage/' . $cast->gallery_1) }}">
                <img class="newface-content-img-frame" src="{{ asset('assets/img/groups/card-frame-'.$cast->shop_slug.'.png') }}">
              </div>
              <div class="newface-content-contents">
                <div class="newface-content-contents-top">
                  <span class="newface-content-contents-top-name">{{ $cast->name }}</span>
                  <div class="newface-content-contents-top-shop">
                    <span class="newface-content-contents-top-shop-text">{{ $cast->shop_name }}</span>
                  </div>
                </div>
                <div class="newface-content-contents-measure">
                  <span class="newface-content-contents-measure-text">{{ $cast->age }}歳／T.{{ $cast->height }} B.{{ $cast->bust }}({{$cast->bra}}) W.{{ $cast->waist }} H.{{ $cast->hip }}</span>
                </div>
                <div class="newface-content-contents-message">
                  <span class="newface-content-contents-message-text">{{ $cast->appeal_point }}</span>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
    <div class="groups-button-more">
      <a href="{{ route('public.groups.newface')}}" class="groups-button-more-btn">もっと見る</a>
    </div>
  </div>
  @endif

  @if($pickups->count() > 0)
  <div class="pickup">
    <div class="section-title">
      <h1 class="section-title-en">Pickup Girl</h1>
      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
          <path d="M22.9831 12.0475C23.0074 12.2684 23.0038 12.6444 22.9831 12.8689C22.9589 13.14 22.8295 13.6739 22.7594 13.9641C22.3434 15.6891 21.3112 17.3265 20.2474 18.7101H17.0625C18.1172 16.1601 19.34 13.6337 19.8153 10.8774C19.95 10.0943 20.0021 9.31125 20.1037 8.52452C20.4388 8.0919 21.3309 8.84943 21.5969 9.12232C22.2842 9.82783 22.8753 11.06 22.984 12.0466L22.9831 12.0475Z" fill="#FF3498"/>
          <path d="M0.0139126 11.865C0.0938727 11.0928 0.527813 10.0578 1.00308 9.44815C1.2798 9.09403 2.47291 7.79801 2.89338 8.34198C2.9949 9.1278 3.04701 9.9118 3.18177 10.6949C3.65794 13.4549 4.88519 15.9721 5.93455 18.5276H2.75052C1.69038 17.154 0.656289 15.4965 0.237621 13.7825C0.161255 13.4704 0.0354749 12.8926 0.0139126 12.5951C-0.0013607 12.3834 -0.0076497 12.0721 0.0139126 11.865Z" fill="#FF3498"/>
          <path d="M12.9342 18.7101V8.25983C12.9342 7.84273 13.3825 7.20933 13.7122 6.95195C15.3312 5.69244 17.836 6.66993 18.1145 8.739C18.2691 9.88716 17.7704 11.6295 17.4434 12.7557C16.8478 14.8075 15.9781 16.8017 15.0419 18.7092H12.9333L12.9342 18.7101Z" fill="#FF3498"/>
          <path d="M10.0637 18.5276H7.95512C7.02525 16.6164 6.15197 14.6249 5.55362 12.5741C5.2257 11.4515 4.72886 9.7028 4.8825 8.55737C5.16101 6.48648 7.66672 5.50169 9.28479 6.77033C9.59116 7.01036 10.0628 7.69579 10.0628 8.07821V18.5285L10.0637 18.5276Z" fill="#FF3498"/>
          <path d="M20.1118 20.1704H2.88529V22.9998H20.1118V20.1704Z" fill="#FF3498"/>
          <path d="M12.3062 0V2.00792H14.3699V3.74202H12.3062V5.74994H10.6917V3.74202H8.62804V2.00792H10.6917V0H12.3062Z" fill="#FF3498"/>
          <path d="M11.8363 9.24097C12.1121 9.52299 11.9693 10.1263 11.4509 10.1153C10.6181 10.098 11.2101 8.60118 11.8363 9.24097Z" fill="#FF3498"/>
          <path d="M11.8354 7.14088C12.0654 7.34532 11.9971 8.00793 11.5381 8.02527C10.5911 8.06269 11.1706 6.54945 11.8354 7.14088Z" fill="#FF3498"/>
          <path d="M11.3871 11.2407C12.158 11.1047 12.1005 12.1579 11.53 12.2109C11.0376 12.2565 10.7816 11.3484 11.3871 11.2407Z" fill="#FF3498"/>
          <path d="M11.3871 13.3399C12.158 13.2039 12.1005 14.2571 11.53 14.31C11.0376 14.3557 10.7816 13.4476 11.3871 13.3399Z" fill="#FF3498"/>
          <path d="M11.2928 15.4418C12.14 15.1826 12.2245 16.4795 11.3691 16.3371C10.9325 16.265 10.9352 15.5513 11.2928 15.4418Z" fill="#FF3498"/>
          <path d="M11.2928 17.541C12.14 17.2818 12.2245 18.5787 11.3691 18.4363C10.9325 18.3642 10.9352 17.6505 11.2928 17.541Z" fill="#FF3498"/>
        </svg>
        <h2 class="section-title-jp-text">ピックアップ</h2>
      </div>
    </div>
    <div class="pickup-contents pc-only"> {{--flex col--}}
        <div class="pickup-slider swiper content-wrapper">
          <div class="swiper-wrapper">
          @foreach($pickups as $pickup)
            <div class="swiper-slide">
              <a class="pickup-main" href="{{ route('public.shops.shop.profile',[ 'shop'=>$pickup->shop_slug,'id'=>$pickup->id ]) }}">
                <div class="pickup-main-border">
                  <div class="pickup-main-border-img">
                    <img class="pickup-main-border-img-photo" src="{{ asset('storage/' . $pickup->gallery_1) }}">
                    <img class="pickup-main-border-img-frame" src="{{ asset('assets/img/groups/card-frame-'.$pickup->shop_slug.'.png') }}">
                  </div>
                  <div class="pickup-main-border-contents">
                    <span class="pickup-main-border-contents-name">{{ $pickup->name }}</span>
                    <span class="pickup-main-border-contents-measure">T.{{ $pickup->height }} B.{{ $pickup->bust }}({{$pickup->bra}}) W.{{ $pickup->waist }} H.{{ $pickup->hip }}</span>
                    <span class="pickup-main-border-contents-shop">{{ $pickup->shop_name }}</span>
                    <div class="pickup-main-border-contents-schedule">
                      <span class="pickup-main-border-contents-schedule-text">{{ $pickup->schedule_status }}</span>
                    </div>
                    <div class="pickup-main-border-contents-manager">
                      <textarea class="pickup-main-border-contents-manager-text">{{ $pickup->manager_comment }}</textarea>
                      </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
        <div class="pickup-pagination swiper">
          <div class="swiper-wrapper">
            @foreach($pickups as $pickup)
              <div class="swiper-slide" data-swiper-slide-index="{{ $loop->index }}">
                <div class="pickup-slide-contents">
                  <div class="pickup-slide-contents-img">
                    <img class="pickup-slide-contents-img-photo" src="{{ asset('storage/' . $pickup->gallery_1) }}">
                    <img class="pickup-slide-contents-img-frame" src="{{ asset('assets/img/groups/card-frame-'.$pickup->shop_slug.'.png') }}">
                  </div>
                  <div class="pickup-slide-contents-detail">
                    <span class="pickup-slide-contents-detail-name">{{ $pickup->name }}</span>
                    <span class="pickup-slide-contents-detail-measure">T.{{ $pickup->height }} B.{{ $pickup->bust }}({{$pickup->bra}}) W.{{ $pickup->waist }} H.{{ $pickup->hip }}</span>
                    <span class="pickup-slide-contents-detail-shop">{{ $pickup->shop_name }}</span>
                    <div class="pickup-slide-contents-detail-schedule">
                      <span class="pickup-slide-contents-detail-schedule-text">{{ $pickup->schedule_status }}</span>
                    </div>
                    <span class="pickup-slide-contents-detail-message">{{ $pickup->appeal_point }}</span>

                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        {{-- <button class="event-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </button>
        <button class="event-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </button> --}}
      </div>
    </div>
    <div class="pickup-contents sp-only">
      <div class="pickup-contents-slider swiper content-wrapper">
        <div class="swiper-wrapper">
          @foreach ( $pickups as $pickup)
          <div class="swiper-slide">
            <a class="pickup-contents-sp" href="{{ route('public.shops.shop.profile',[ 'shop'=>$pickup->shop_slug,'id'=>$pickup->id ]) }}">
              <div class="pickup-contents-sp-img">
                <img class="pickup-contents-sp-img-photo" src="{{ asset('storage/' . $pickup->gallery_1) }}">
                <img class="pickup-contents-sp-img-frame" src="{{ asset('assets/img/groups/card-frame-'.$pickup->shop_slug.'.png') }}">
              </div>
              <div class="pickup-contents-sp-contents">
                <span class="pickup-contents-sp-contents-name">{{ $pickup->name }}</span>
                <span class="pickup-contents-sp-contents-measure">T.{{ $pickup->height }} B.{{ $pickup->bust }}({{ $pickup->bra }}) W.{{ $pickup->waist }} H.{{ $pickup->hip }}</span>
                <span class="pickup-contents-sp-contents-shop">{{ $pickup->shop_name }}</span>
                <div class="pickup-contents-sp-contents-schedule">
                  <span class="pickup-contents-sp-contents-schedule-text">
                    {{ $pickup->schedule_status }}
                  </span>
                </div>
                <div class="pickup-contents-sp-contents-manager">
                  <textarea class="pickup-contents-sp-contents-manager-text">{{ $pickup->manager_comment }}</textarea>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="pickup-list sp-only">
      {{-- @for( $i=1 ; $i < 10 ; $i++)
      <div class="pickup-list-item">
        <div class="pickup-list-item-img">
          <img class="pickup-list-item-img-photo" src="{{ asset('assets/img/groups/castphoto.png') }}">
          <img class="pickup-list-item-img-frame" src="{{ asset('assets/img/groups/card-frame.png') }}">
        </div>
        <div class="pickup-list-item-contents">
          <span class="pickup-list-item-contents-name">キャスト名</span>
          <span class="pickup-list-item-contents-measure">T.160 B.85(C) W.60 H.83</span>
          <span class="pickup-list-item-contents-shop">プッシーキャット</span>
          <div class="pickup-list-item-contents-schedule">
            <span class="pickup-list-item-contents-schedule-text">本日出勤中</span>
          </div>
          <span class="pickup-list-item-contents-message">女の子メッセージ女の子メ</span>
        </div>
      </div>
      @endfor --}}
      @foreach($pickups as $pickup)
      <div class="pickup-list-item">
        <div class="pickup-list-item-img">
          <img class="pickup-list-item-img-photo" src="{{ asset('storage/' . $pickup->gallery_1) }}">
          <img class="pickup-list-item-img-frame" src="{{ asset('assets/img/groups/card-frame-'.$pickup->shop_slug.'.png') }}">
        </div>
        <div class="pickup-list-item-contents">
          <span class="pickup-list-item-contents-name">{{ $pickup->name }}</span>
          <span class="pickup-list-item-contents-measure">T.{{ $pickup->height }} B.{{ $pickup->bust }}({{ $pickup->bra }}) W.{{ $pickup->waist }} H.{{ $pickup->hip }}</span>
          <span class="pickup-list-item-contents-shop">{{ $pickup->shop_name }}</span>
          <div class="pickup-list-item-contents-schedule">
            <span class="pickup-list-item-contents-schedule-text">{{ $pickup->schedule_status }}</span>
          </div>
          <span class="pickup-list-item-contents-message">{{ $pickup->appeal_point }}</span>
        </div>
      </div>
      @endforeach
    </div>
    <div class="groups-button-more">
      <a href="{{ route('public.groups.pickup') }}" class="groups-button-more-btn">もっと見る</a>
    </div>
  </div>
  @endif
  @if($diaries->count() > 0)
  <div class="diary">
    <div class="section-title">
      <h1 class="section-title-en">Photo Diary</h1>
      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
          <path d="M18.2649 1C18.7446 1.12039 19.207 1.16082 19.673 1.35578C20.7946 1.82387 21.6025 2.86336 21.8691 4.02055C22.1311 8.88738 21.9053 13.7955 21.9869 18.6777L21.8963 18.9463L16.9049 23.9075C13.6661 23.6891 10.032 24.1995 6.84043 23.9075C5.09412 23.7475 3.63342 22.585 3.23628 20.8869C3.29159 15.6984 2.77567 10.05 3.11841 4.88844C3.25895 2.77441 4.65437 1.19945 6.84043 1H18.2649ZM16.3608 22.4754V19.9247C16.3608 19.4243 17.4326 18.3587 17.9476 18.3587H20.4863L20.6223 18.2248V4.80309C20.6223 3.73395 19.5824 2.5534 18.4916 2.43121H6.61375C5.21652 2.69445 4.58092 3.73754 4.47937 5.06812C4.11578 9.8568 4.75773 15.0893 4.4839 19.9238C4.5646 20.7575 4.85747 21.5715 5.57648 22.0666C5.68529 22.142 6.35988 22.4754 6.43241 22.4754H16.3608Z" fill="#A30ABA"/>
          <path d="M16.633 15.9437H8.47267C8.41283 14.3346 9.67677 12.5871 11.3524 12.3877C11.8483 12.3284 12.2745 12.482 12.7831 12.4569C13.4505 12.4245 13.5167 12.2323 14.2738 12.5009C15.7145 13.0112 16.6693 14.4406 16.633 15.9437Z" fill="#A30ABA"/>
          <path d="M12.1684 6.7509C15.4398 6.29449 15.6656 11.3599 12.9536 11.73C9.6677 12.1784 9.4238 7.13363 12.1684 6.7509Z" fill="#A30ABA"/>
        </svg>
        <h2 class="section-title-jp-text">最新写メ日記</h2>
      </div>
    </div>
    <div class="diary-contents">
      <div class="diary-contents-border pc-only">
        {{-- @for($i=1; $i<10 ; $i++)
        <div class="diary-contents-border-item">
          <div class="diary-contents-border-item-img">
            <img src="{{ asset('assets/img/groups/diary1.jpg') }}">
          </div>
          <span class="diary-contents-border-item-title">日記タイトル日記タイ</span>
          <span class="diary-contents-border-item-datetime">0月0日(水) 00:00</span>
          <div class="diary-contents-border-item-detail">
            <div class="diary-contents-border-item-detail-castphoto">
              <img class="diary-contents-border-item-detail-castphoto-img" src="{{ asset('assets/img/groups/castphoto.png') }}">
            </div>
            <div class="diary-contents-border-item-detail-contents">
              <span class="diary-contents-border-item-detail-contents-name">投稿者名(00)</span>
              <span class="diary-contents-border-item-detail-contents-measure">T.160 B.85(C) W.60 H.83</span>

            </div>
          </div>
          <span class="diary-contents-border-item-shop">
            シロガネーゼ
          </span>
        </div>
        @endfor --}}
        @foreach($diaries as $diary)
        <a class="diary-contents-border-item" href="{{ route('public.shops.shop.photo-diary.detail',['shop'=>$diary->shop_slug, 'id'=>$diary->id]) }}">
          <div class="diary-contents-border-item-img">
            <img src="{{ asset('storage/diary/' . $diary->photo) }}">
          </div>
          <span class="diary-contents-border-item-title">{{ $diary->subject }}</span>
          <span class="diary-contents-border-item-datetime">{{ $diary->updated_at }}</span>
          <div class="diary-contents-border-item-detail">
            <div class="diary-contents-border-item-detail-castphoto">
              <img class="diary-contents-border-item-detail-castphoto-img" src="{{ asset('storage/' . $diary->gallery_1) }}">
            </div>
            <div class="diary-contents-border-item-detail-contents">
              <span class="diary-contents-border-item-detail-contents-name">{{ $diary->name."(".$diary->cast_age.")" }}</span>
              <span class="diary-contents-border-item-detail-contents-measure">T.{{ $diary->cast_height }} B.{{ $diary->cast_bust }}({{$diary->cast_bra}}) W.{{ $diary->cast_waist }} H.{{ $diary->cast_hip }}</span>

            </div>
          </div>
          <span class="diary-contents-border-item-shop">
            {{ $diary->shop_name }}
            {{-- <span class="diary-contents-border-item-shop-text">シロガネーゼ</span> --}}
          </span>
        </a>
        @endforeach
      </div>
      <div class="diary-contents-slide content-wrapper sp-only">
        <div class="swiper-wrapper">
          {{-- @for($i=1; $i<10 ; $i++)
          <div class="swiper-slide">
            <div class="diary-contents-slide-item">
              <div class="diary-contents-slide-item-img">
                <img src="{{ asset('assets/img/groups/diary1.jpg') }}">
              </div>
              <span class="diary-contents-slide-item-title">日記タイトル日記タイ</span>
              <span class="diary-contents-slide-item-datetime">0月0日(水) 00:00</span>
              <div class="diary-contents-slide-item-detail">
                <div class="diary-contents-slide-item-detail-castphoto">
                  <img class="diary-contents-slide-item-detail-castphoto-img" src="{{ asset('assets/img/groups/castphoto.png') }}">
                </div>
                <div class="diary-contents-slide-item-detail-contents">
                  <span class="diary-contents-slide-item-detail-contents-name">投稿者名(00)</span>
                  <span class="diary-contents-slide-item-detail-contents-measure">T.160 B.85(C) W.60 H.83</span>

                </div>
              </div>
              <span class="diary-contents-slide-item-shop">
                シロガネーゼ
              </span>
            </div>
              </div>
          @endfor --}}
          @foreach($diaries as $diary)
          <div class="swiper-slide">
            <div class="diary-contents-slide-item">
              <div class="diary-contents-slide-item-img">
                <img src="{{ asset('storage/diary/' . $diary->photo) }}">
              </div>
              <span class="diary-contents-slide-item-title">{{ $diary->subject }}</span>
              <span class="diary-contents-slide-item-datetime">{{ $diary->updated_at }}</span>
              <div class="diary-contents-slide-item-detail">
                <div class="diary-contents-slide-item-detail-castphoto">
                  <img class="diary-contents-slide-item-detail-castphoto-img" src="{{ asset('storage/' . $diary->gallery_1) }}">
                </div>
                <div class="diary-contents-slide-item-detail-contents">
                  <span class="diary-contents-slide-item-detail-contents-name">{{ $diary->name."(".$diary->cast_age.")" }}</span>
                  <span class="diary-contents-slide-item-detail-contents-measure">T.{{ $diary->cast_height }} B.{{ $diary->cast_bust }}(C) W.{{ $diary->cast_waist }} H.{{ $diary->cast_hip }}</span>

                </div>
              </div>
              <span class="diary-contents-slide-item-shop">
                {{ $diary->shop_name }}
              </span>
            </div>
              </div>
          @endforeach
        </div>
      </div>
      <div class="groups-button-more">
        <a href="{{ route('public.groups.photodiary')}}" class="groups-button-more-btn">もっと見る</a>
      </div>
    </div>
  </div>
  @endif
  @if($videos->count() > 0)
  <div class="movie">
    <div class="movie-bgs">
      <img class="movie-bgs-bg1" src="{{ asset('assets/img/groups/bg-newface.png') }}"></img>
      {{-- <div class="movie-bgs-bg1" src="{{ asset('assets/img/groups/bg-newface.jpg') }}"></div>
      <div class="movie-bgs-bg2" src="{{ asset('assets/img/groups/bg-newface.jpg') }}"></div> --}}
    </div>
    <div class="section-title">
      <h1 class="section-title-en">Shop Movie</h1>
      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
          <path d="M25 0V18H0V0H25ZM3.78516 1.724C3.58984 1.524 2.16406 1.515 2.00098 1.799C1.92578 1.93 1.91406 3.881 1.94922 4.155C1.96973 4.316 1.9873 4.47 2.14844 4.551C2.38184 4.667 3.64648 4.669 3.80176 4.443C3.96973 4.199 3.97461 1.919 3.78516 1.724ZM21.2148 1.724C21.0244 1.919 21.0312 4.199 21.1992 4.443C21.3545 4.669 22.6191 4.667 22.8525 4.551C23.0137 4.47 23.0312 4.316 23.0518 4.155C23.0859 3.881 23.0752 1.93 23 1.799C22.8359 1.515 21.4092 1.524 21.2148 1.724ZM9.92969 5.113C9.69043 5.24 9.68555 5.503 9.66406 5.745C9.47559 7.877 9.81738 10.291 9.66406 12.454C9.66602 12.783 9.89258 12.947 10.1953 12.899L16.3975 9.236C16.5615 9.007 16.4658 8.766 16.2451 8.614L10.4893 5.21L9.92969 5.112V5.113ZM2.2168 7.32C2.05859 7.368 1.98438 7.494 1.95605 7.653C1.90918 7.909 1.92285 9.835 2.00195 10.001C2.13379 10.279 3.4668 10.273 3.71191 10.151C3.87305 10.07 3.89062 9.916 3.91113 9.755C3.94727 9.467 3.94141 7.675 3.8584 7.5C3.72754 7.224 2.4873 7.239 2.21777 7.321L2.2168 7.32ZM21.3574 7.32C21.1992 7.368 21.125 7.494 21.0967 7.653C21.0498 7.909 21.0635 9.835 21.1426 10.001C21.2744 10.279 22.6074 10.273 22.8525 10.151C23.0137 10.07 23.0312 9.916 23.0518 9.755C23.0879 9.467 23.082 7.675 22.999 7.5C22.8682 7.224 21.6279 7.239 21.3584 7.321L21.3574 7.32ZM3.78516 13.524C3.46289 13.359 2.16016 13.267 2.00098 13.6C1.91797 13.774 1.91113 15.661 1.94824 15.955C1.96875 16.116 1.98633 16.27 2.14746 16.351C2.37012 16.462 3.67578 16.461 3.81543 16.234C3.9668 15.99 3.96973 13.713 3.78516 13.524ZM21.2148 16.276C21.4102 16.476 22.8359 16.485 22.999 16.201C23.0742 16.07 23.0859 14.119 23.0508 13.845C23.0303 13.684 23.0127 13.53 22.8516 13.449C22.6182 13.333 21.3535 13.331 21.1982 13.557C21.0303 13.801 21.0254 16.081 21.2148 16.276Z" fill="#021A21"/>
        </svg>
        <h2 class="section-title-jp-text">各お店の最新動画</h2>
      </div>
    </div>
    <div class="movie-contents">
      @foreach ($videos as $video)
      <div class="movie-contents-item">
        <video class="movie-contents-item-movie" controls  muted  poster="{{ asset('storage/' . $video->thumb_url) }}">
          <source src="{{ $video->video_url }}" type="video/mp4">
        </video>
        <div class="movie-contents-item-detail pc-only">
          <span class="movie-contents-item-detail-date">{{ \Carbon\Carbon::parse($video->updated_at)->format('m/d') }} UP</span>
          <span class="movie-contents-item-detail-name">{{ $video->name }}</span>
          <div class="movie-contents-item-detail-shop">
            <span class="movie-contents-item-detail-shop-text">{{ $video->shop_name }}</span>
          </div>
        </div>
        <div class="movie-contents-item-details sp-only">
          <div class="movie-contents-item-details-row">
          <span class="movie-contents-item-details-date">{{ \Carbon\Carbon::parse($video->updated_at)->format('m/d') }} UP</span>
          <span class="movie-contents-item-details-name">{{ $video->name }}</span>
          </div>

          <div class="movie-contents-item-details-shop">
            <span class="movie-contents-item-details-shop-text">{{ $video->shop_name }}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="groups-button-more">
      <a href="{{ route('public.groups.movie') }}" class="groups-button-more-btn">もっと見る</a>
    </div>

  </div>
  @endif
  <x-public.groups.footer />


  <!-- Fixed Button -->
  <a href="{{ route('public.groups.girl-search') }}" class="fixed-groups-button" aria-label="女の子検索">
    <div class="fixed-groups-button__inner">
      <div class="fixed-groups-button__icon">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M16.5 25.5C21.4706 25.5 25.5 21.4706 25.5 16.5C25.5 11.5294 21.4706 7.5 16.5 7.5C11.5294 7.5 7.5 11.5294 7.5 16.5C7.5 21.4706 11.5294 25.5 16.5 25.5Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M24 24L28.5 28.5" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <p class="fixed-groups-button__text">女の子検索</p>
    </div>
  </a>
</x-public-groups-layout>

@once
  {{-- @vite(['resources/scss/group/_pickup_top.scss','resources/scss/group/diary_top.scss','resources/scss/group/newstop.scss']) --}}
  @vite(['resources/scss/groups/section-title.scss','resources/scss/groups/schedule-content.scss','resources/scss/groups/event-content.scss','resources/scss/groups/newface-content.scss','resources/scss/groups/pickup-content.scss','resources/scss/groups/diary-content.scss','resources/scss/groups/movie-content.scss'])
@endonce
{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
  const moreButton = document.getElementById('diary_more_button');
  const shopsList = document.querySelector('.diary-content-bottom-shops');

  if (moreButton && shopsList) {
    moreButton.addEventListener('click', function(e) {
      e.preventDefault();
      shopsList.style.display = 'flex';
    });
  }
});
</script> --}}
