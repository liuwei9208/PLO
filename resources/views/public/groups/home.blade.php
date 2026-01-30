<x-public-groups-layout>
  <x-public.group.sidebar />
  <!-- Main Visual -->
  <x-public.group.mv />


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
      @for ($i=1 ; $i <= 10 ; $i++)
      <div class="schedule-grid-content">{{-- flex col--}}
        <div class="schedule-grid-content-img">
          <img class="schedule-grid-content-img-photo" src="{{ asset('assets/img/groups/pickup-cast-1.png') }}">
          <img class="schedule-grid-content-img-frame" src="{{ asset('assets/img/groups/card-frame.png') }}">
        </div>
        <div class="schedule-grid-content-contents">{{-- flex col--}}
          <div class="schedule-grid-content-contents-top">{{-- flex row--}}
            <div class="schedule-grid-content-contents-top-times">{{-- flex row--}}
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">00:00 - 00:00</span>
            </div>
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">プッシーキャット</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-measure">
            <span class="schedule-grid-content-contents-measure-text">キャスト名(00)／T.160 B.85(C) W.60 H.83</span>
          </div>
          <div class="schedule-grid-content-contents-message">
            <textarea class="schedule-grid-content-contents-message-text">メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ</textarea>
          </div>
        </div>
      </div>

      @endfor
    </div>
    <div class="schedule-button">
      <a href="#" class="schedule-button-more">もっと見る</a>
    </div>
  </div>

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
              <div class="event-main-content">
                <h3 class="event-main-title">{{ $event->published_at->format('y.m.d')."  |  " .$event->title}}</h3>
              </div>
              <div class="event-main-image">
                <a href="{{ route('public.group.event.detail', ['id' => $event->id]) }}">
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
      {{-- <button class="event-slide-prev">
        <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
      </button>
      <button class="event-slide-next">
        <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
      </button> --}}
    </div>
  </div>
  <div class="newface">
    <div class="newface-bgs">
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
    <div class="newface-slide content-wrapper">
      <div class="swiper-wrapper">
        @foreach ($newfaces_this_week as $cast)
          <div class="swiper-slide">


            <div class="newface-content">
              <div class="newface-content-top">
                <div class="newface-content-top-newdate">
                  <span class="newface-content-top-newdate-date">12/25</span>
                  <span class="newface-content-top-newdate-new">New</span>
                </div>
                <div class="newface-content-top-underbar"></div>
              </div>
              <div class="newface-content-img">
                <img class="newface-content-img-photo" src="{{ asset('assets/img/groups/pickup-cast-1.png') }}">
                <img class="newface-content-img-frame" src="{{ asset('assets/img/groups/card-frame.png') }}">
              </div>
              <div class="newface-content-contents">
                <div class="newface-content-contents-top">
                  <span class="newface-content-contents-top-name">キャスト名</span>
                  <div class="newface-content-contents-top-shop">
                    <span class="newface-content-contents-top-shop-text">プッシーキャット</span>
                  </div>
                </div>
                <div class="newface-content-contents-measure">
                  <span class="newface-content-contents-measure-text">00歳／T.160 B.85(C) W.60 H.83</span>
                </div>
                <div class="newface-content-contents-message">
                  <span class="newface-content-contents-message-text">女の子メッセージ女の子メッセージ女の子メ</span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{-- <div class="newface-slide-nav">
        <button class="newface-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </button>
        <button class="newface-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </button>
      </div> --}}
    </div>
    <div class="newface-button">
      <a href="#" class="newface-button-more">もっと見る</a>
    </div>

  </div>

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
    <div class="pickup-contents"> {{--flex col--}}
        <div class="pickup-slider swiper content-wrapper">
          <div class="swiper-wrapper">
          @foreach($pickups as $pickup)
            <div class="swiper-slide">
              <div class="pickup-main">
                <div class="pickup-main-border">
                  <div class="pickup-main-border-img">
                    <img class="pickup-main-border-img-photo" src="{{ asset('assets/img/groups/pickup-cast-1.png') }}">
                    <img class="pickup-main-border-img-frame" src="{{ asset('assets/img/groups/card-frame.png') }}">
                  </div>
                  <div class="pickup-main-border-contents">
                    <span class="pickup-main-border-contents-name">キャスト名</span>
                    <span class="pickup-main-border-contents-measure">T.160 B.85(C) W.60 H.83</span>
                    <span class="pickup-main-border-contents-shop">プッシーキャット</span>
                    <div class="pickup-main-border-contents-schedule">
                      <span class="pickup-main-border-contents-schedule-text">本日出勤中 | 本日お休み</span>
                    </div>
                    <div class="pickup-main-border-contents-manager">
                      <textarea class="pickup-main-border-contents-manager-text">店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ 店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ</textarea>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="pickup-pagination">
          <div class="swiper-wrapper">
            @foreach($pickups as $pickup)
              <div class="swiper-slide" data-swiper-slide-index="{{ $loop->index }}">
                <div class="pickup-slide-contents">
                  <div class="pickup-slide-contents-img">
                    <img class="pickup-slide-contents-img-photo" src="{{ asset('assets/img/groups/pickup-cast-1.png') }}">
                    <img class="pickup-slide-contents-img-frame" src="{{ asset('assets/img/groups/card-frame.png') }}">
                  </div>
                  <div class="pickup-slide-contents-detail">
                    <span class="pickup-slide-contents-detail-name">キャスト名</span>
                    <span class="pickup-slide-contents-detail-measure">T.160 B.85(C) W.60 H.83</span>
                    <span class="pickup-slide-contents-detail-shop">プッシーキャット</span>
                    <div class="pickup-slide-contents-detail-schedule">
                      <span class="pickup-slide-contents-detail-schedule-text">本日出勤中</span>
                    </div>
                    <span class="pickup-slide-contents-detail-message">女の子メッセージ女の子メッセージ</span>

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
    <div class="pickup-button">
      <a href="#" class="pickup-button-more">もっと見る</a>
    </div>
  </div>
</x-public-group-layout>

@once
  {{-- @vite(['resources/scss/group/_pickup_top.scss','resources/scss/group/diary_top.scss','resources/scss/group/newstop.scss']) --}}
  @vite(['resources/scss/groups/section-title.scss','resources/scss/groups/schedule-content.scss','resources/scss/groups/event-content.scss','resources/scss/groups/newface-content.scss','resources/scss/groups/pickup-content.scss'])
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
