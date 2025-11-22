<x-shizuku-layout>
    <div class="home">
        <div class="home-gradient-overlay"></div>
        <div class="banner">
            <div class="contact-info">
                <div class="contact-wrapper">
                    <div class="contact-phone">
                        <div class="contact-phone-content">
                            <div class="contact-phone-main">
                                <div class="contact-phone-icon">
                                    <img src="{{ asset('assets/img/shops/shizuku/phone.png') }}" alt="Phone">
                                </div>
                                <p class="contact-phone-number">011-533-8988</p>
                            </div>
                            <div class="contact-email">
                                <p>@ShizukuHealth</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-address">
                        <div class="contact-address-content">
                            <p class="contact-address-text">〒064-0806</br> 北海道札幌市中央区南6条西5丁目</p>
                            <div class="contact-buttons">
                                <button class="contact-button-hours">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.5 3V7.5H4.125M14.25 7.5C14.25 8.38642 14.0754 9.26417 13.7362 10.0831C13.397 10.9021 12.8998 11.6462 12.273 12.273C11.6462 12.8998 10.9021 13.397 10.0831 13.7362C9.26417 14.0754 8.38642 14.25 7.5 14.25C6.61358 14.25 5.73583 14.0754 4.91689 13.7362C4.09794 13.397 3.35382 12.8998 2.72703 12.273C2.10023 11.6462 1.60303 10.9021 1.26381 10.0831C0.924594 9.26417 0.75 8.38642 0.75 7.5C0.75 5.70979 1.46116 3.9929 2.72703 2.72703C3.9929 1.46116 5.70979 0.75 7.5 0.75C9.29021 0.75 11.0071 1.46116 12.273 2.72703C13.5388 3.9929 14.25 5.70979 14.25 7.5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <p>9:00 ~ 0:00</p>
                                </button>
                                <button class="contact-button-credit">
                                    <p>クレジット決済可能</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-note">
                    <p>電話予約の対応時間は朝8:30~となります。</p>
                </div>
            </div>
            <div class="register">
                <button class="register-button">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="20" height="20" fill="url(#pattern0_8_13)"/>
                        <defs>
                        <pattern id="pattern0_8_13" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_8_13" transform="scale(0.00390625)"/>
                        </pattern>
                        <image id="image0_8_13" width="256" height="256" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                        </defs>
                    </svg>                    
                    <p>新規会員登録はコチラ！</p>
                </button>
            </div>
        </div>
        <div class="home-content">
            <div class="home-header">
                <div class="menu-list-container">
                    <div class="menu-item">
                        <h1>トップページ</h1>
                        <p> top page </p>
                    </div>
                    <div class="menu-item">
                        <h1>キャスト一覧</h1>
                        <p> cast list </p>
                    </div>
                    <div class="menu-item">
                        <h1>出勤情報</h1>
                        <p> schedule </p>
                    </div>
                    <div class="menu-item">
                        <h1>写メ日記</h1>
                        <p> photo diary </p>
                    </div>
                    <div class="menu-item">
                        <h1>イベント一覧</h1>
                        <p> event </p>
                    </div>
                    <div class="menu-item">
                        <h1>料金システム</h1>
                        <p> system </p>
                    </div>
                    <div class="menu-item">
                        <h1>新人情報</h1>
                        <p> new cast </p>
                    </div>
                    <div class="menu-item">
                        <h1>ログイン</h1>
                        <p> login </p>
                    </div>
                </div>
                <div class="menu-button">
                    <svg width="51" height="22" viewBox="0 0 51 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="1" x2="50.5785" y2="1" stroke="#FFDA89" stroke-width="2"/>
                        <line y1="11" x2="50.5785" y2="11" stroke="#FFDA89" stroke-width="2"/>
                        <line y1="21" x2="50.5785" y2="21" stroke="#FFDA89" stroke-width="2"/>
                        </svg>                    
                    <p>menu</p>
                </div>
            </div>
            <div class="home-schedule">
                <div class="home-schedule-title">
                    <h2>schedule</h2>
                </div>
                <div class="home-schedule-info">
                    <div class="schedule-info-header">
                        <img src="{{ asset('assets/img/shop/calender-g.png') }}" alt="出勤情報" class="schedule-info-icon">
                        <p class="schedule-info-title">出勤情報</p>
                    </div>
                    <div class="schedule-info-description">
                        <p>本日出勤するキャスト一覧になります。</p>
                    </div>
                    <div class="schedule-info-button">
                        <p>一覧を見る</p>
                        <div class="schedule-info-underline"></div>
                    </div>
                </div>
                <div class="home-schedule-cards">
                    @for ($i = 0; $i < 12; $i++)
                    <div class="schedule-card">
                        <div class="schedule-card-image">
                            <img src="{{ asset('assets/img/shops/shizuku/coming-soon-card.png') }}" alt="Background" class="card-bg">
                            <img src="{{ asset('assets/img/shops/shizuku/card-frame.png') }}" alt="Frame" class="card-frame">
                            <div class="schedule-card-content">
                                <div class="schedule-card-badge">
                                    <div class="badge-red-bg">
                                        <span class="badge-shift">本日出勤</span>
                                    </div>
                                    <div class="badge-content">
                                        <span class="badge-time">12:00〜24:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="schedule-card-info">
                            <div class="schedule-card-status">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/>
                                </svg>                                    
                                <span class="status-text">待機中</span>
                            </div>
                            <p class="schedule-card-name">のんたん（20）</p>
                            <p class="schedule-card-measurements">T.160 B.85(C) W.60 H.83</p>
                            <p class="schedule-card-message">キャストメッセージが甲斐キキキャ</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            <div class="home-news">
                <div class="news-section">
                    <div class="news-title">
                        <h1>news</h1>
                    </div>
                    <div class="news-slider-wrapper">
                        <button class="news-slider-prev">
                            <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5052 0C10.6825 0 10.8639 0.0838379 10.9999 0.246558C11.2719 0.571997 11.2719 1.10454 10.9999 1.42998L1.68797 12.574L10.8639 23.5503C11.1359 23.8758 11.1359 24.4083 10.8639 24.7338C10.5918 25.0592 10.1466 25.0592 9.87457 24.7338L0.204043 13.1657C-0.0680143 12.8403 -0.0680143 12.3077 0.204043 11.9823L10.0106 0.246582C10.1466 0.0838623 10.328 4.88281e-05 10.5052 4.88281e-05L10.5052 0Z" fill="white"/>
                            </svg>                                                                                              
                        </button>
                        <div class="news-content">
                            @for ($i = 0; $i < 10; $i++)
                            <div class="news-content-card">
                                <div class="news-content-card-image">
                                    <img src="{{ asset('assets/img/shops/shizuku/news-image.png') }}" alt="News Card Image">
                                </div>
                                <div class="news-content-card-date">
                                    <h2>00.00</h2>
                                </div>
                                <div class="news-content-card-content">
                                    <p>タイトルタイトルタイトルタイトルタイ</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <button class="news-slider-next">
                            <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.698697 0C0.521441 0 0.340063 0.0838379 0.204035 0.246558C-0.0680227 0.571997 -0.0680227 1.10454 0.204035 1.42998L9.51595 12.574L0.340064 23.5503C0.0680065 23.8758 0.0680065 24.4083 0.340064 24.7338C0.612122 25.0592 1.05729 25.0592 1.32935 24.7338L10.9999 13.1657C11.2719 12.8403 11.2719 12.3077 10.9999 11.9823L1.19332 0.246582C1.05729 0.0838623 0.875954 4.88281e-05 0.698678 4.88281e-05L0.698697 0Z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="news-section">
                    <div class="news-title">
                        <h1>photo diary</h1>
                    </div>
                    <div class="diary-slider-wrapper">
                        <button class="diary-slider-prev">
                            <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5052 0C10.6825 0 10.8639 0.0838379 10.9999 0.246558C11.2719 0.571997 11.2719 1.10454 10.9999 1.42998L1.68797 12.574L10.8639 23.5503C11.1359 23.8758 11.1359 24.4083 10.8639 24.7338C10.5918 25.0592 10.1466 25.0592 9.87457 24.7338L0.204043 13.1657C-0.0680143 12.8403 -0.0680143 12.3077 0.204043 11.9823L10.0106 0.246582C10.1466 0.0838623 10.328 4.88281e-05 10.5052 4.88281e-05L10.5052 0Z" fill="white"/>
                            </svg>
                        </button>
                        <div class="diary-content">
                            @for ($i = 0; $i < 10; $i++)
                            <div class="diary-content-card">
                                <div class="diary-content-card-image">
                                    <img src="{{ asset('assets/img/shops/shizuku/diary-image.png') }}" alt="Diary Card Image">
                                </div>
                                <div class="diary-content-card-date">
                                    <h2>00.00</h2>
                                </div>
                                <div class="diary-content-card-content">
                                    <p>タイトルタイトルタイトルタイトルタイ</p>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <button class="diary-slider-next">
                            <svg width="12" height="25" viewBox="0 0 12 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.698697 0C0.521441 0 0.340063 0.0838379 0.204035 0.246558C-0.0680227 0.571997 -0.0680227 1.10454 0.204035 1.42998L9.51595 12.574L0.340064 23.5503C0.0680065 23.8758 0.0680065 24.4083 0.340064 24.7338C0.612122 25.0592 1.05729 25.0592 1.32935 24.7338L10.9999 13.1657C11.2719 12.8403 11.2719 12.3077 10.9999 11.9823L1.19332 0.246582C1.05729 0.0838623 0.875954 4.88281e-05 0.698678 4.88281e-05L0.698697 0Z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="home-pickup">
                <div class="pickup-header">
                    <div class="pickup-header-bg">
                        <img src="{{ asset('assets/img/shops/shizuku/pickup-bg.png') }}" alt="Background">
                        <div class="pickup-header-overlay"></div>
                        <div class="pickup-header-shadow"></div>
                    </div>
                    <div class="pickup-header-content">
                        <h1 class="pickup-title-en">PICK UP</h1>
                        <div class="pickup-title-ja-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="32" viewBox="0 0 18 32" fill="none">
                                <path d="M17.4396 14.9991L9.51595 12.8759L12.966 7.80923e-05L-2.36381e-06 16.6955L7.92361 18.8187L4.47353 31.6945L17.4396 14.9991Z" fill="white"/>
                              </svg>
                            <h2 class="pickup-title-ja">ピックアップ</h2>
                        </div>
                        <p class="pickup-description">当店の女の子イチオシ情報です</p>
                    </div>
                </div>
                <div class="pickup-badge">
                    <div class="pickup-badge-diamond">
                        <svg width="188" height="188" viewBox="0 0 188 188" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M94 0L188 94L94 188L0 94L94 0Z" fill="url(#paint0_linear_badge)"/>
                            <defs>
                                <linearGradient id="paint0_linear_badge" x1="94" y1="0" x2="94" y2="188" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFF2D7"/>
                                    <stop offset="1" stop-color="#BD902F"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <p class="pickup-badge-text">当店一押し</p>
                </div>
                <div class="pickup-cast-card">
                    <div class="pickup-cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/pickup-cast-1.png') }}" alt="Cast 1" class="cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="Frame" class="cast-frame">
                    </div>
                </div>
                <div class="pickup-cast-card">
                    <div class="pickup-cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/pickup-cast-2.png') }}" alt="Cast 2" class="cast-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="Frame" class="cast-frame">
                    </div>
                </div>
            </div>
            <div class="home-new-girl-section">
                <div class="home-new-girl-title">
                    <h2 class="new-girl-title">NEW GIRL</h2>
                </div>
                <div class="home-new-girl-info">
                    <div class="new-girl-info-header">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="35" height="35" fill="url(#pattern0_8_1967)"/>
                            <defs>
                            <pattern id="pattern0_8_1967" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_8_1967" transform="scale(0.00390625)"/>
                            </pattern>
                            <image id="image0_8_1967" width="256" height="256" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                            </defs>
                            </svg>                        
                        <p class="new-girl-info-title">新人情報</p>
                    </div>
                    <div class="new-girl-info-description">
                        <p>新入デビュー♪ ヴィラコート雫の新人入店情報になります</p>
                    </div>
                    <div class="new-girl-info-button">
                        <p>一覧を見る</p>
                        <div class="new-girl-info-underline"></div>
                    </div>
                </div>
            </div>
            <div class="home-new-girl-slider">
                <div class="new-girl-slider-cards">
                    <div class="new-girl-slider-content">
                        @for ($i = 0; $i < 6; $i++)
                        <div class="new-girl-card">
                            <div class="new-girl-card-bg-left">
                                <img src="{{ asset('assets/img/shops/shizuku/new-girl.png') }}" alt="Background" class="card-bg-image">
                                <div class="card-bg-overlay"></div>
                            </div>
                            <div class="new-girl-card-left">
                                <div class="new-girl-card-date">
                                    <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <defs>
                                            <linearGradient id="calendar-gradient-{{ $i }}" x1="0%" y1="0%" x2="0%" y2="100%">
                                                <stop offset="20.67%" style="stop-color:#FFF2D7;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#BD902F;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <rect width="27" height="24" fill="url(#calendar-gradient-{{ $i }})"/>
                                    </svg>
                                    <p class="date-text">2025.00.00 SUN <span class="date-label">入店</span></p>
                                </div>
                                <div class="new-girl-card-divider"></div>
                                <div class="new-girl-card-info">
                                    <div class="card-name-section">
                                        <p class="card-name">名前名前</p>
                                    </div>
                                    <p class="card-measurements">00歳／T.000 B.000(C) W.00 H.00</p>
                                    <div class="card-description">
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                                    </div>
                                </div>
                            </div>
                            <div class="new-girl-card-divider-vertical">
                                <p class="divider-name-text">Name</p>
                            </div>
                            <div class="new-girl-card-right">
                                <img src="{{ asset('assets/img/shops/shizuku/new-girl.png') }}" alt="Cast Photo" class="card-photo">
                                <p class="card-name-vertical">Name</p>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="new-girl-slider-controls">
                    <div class="slider-dots">
                        <button class="dot active" aria-label="Go to page 1"></button>
                        <button class="dot" aria-label="Go to page 2"></button>
                        <button class="dot" aria-label="Go to page 3"></button>
                    </div>
                    <div class="slider-buttons">
                        <button class="new-girl-slider-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M60.5 30.5C60.5 31.4283 60.1313 32.3185 59.4749 32.9749C58.8185 33.6313 57.9283 34 57 34H11.5L23.75 46.25C24.0948 46.5948 24.3688 47.0038 24.556 47.4542C24.7432 47.9046 24.8401 48.3879 24.8413 48.8762C24.8426 49.3645 24.7482 49.8483 24.5634 50.2996C24.3786 50.7509 24.1069 51.1613 23.7638 51.5081C23.4207 51.855 23.0129 52.1311 22.5631 52.3203C22.1133 52.5095 21.6304 52.6084 21.1421 52.6118C20.6538 52.6151 20.1696 52.5228 19.7171 52.3398C19.2646 52.1568 18.8527 51.8867 18.5042 51.5458L0.979167 34.0208C0.32282 33.3645 -0.0457764 32.4748 -0.0457764 31.5466C-0.0457764 30.6185 0.32282 29.7288 0.979167 29.0725L18.5042 11.5475C19.1708 10.9236 20.0465 10.5793 20.9543 10.5859C21.8621 10.5925 22.7326 10.9496 23.3901 11.5828C24.0476 12.216 24.4417 13.0759 24.4919 13.9828C24.5421 14.8898 24.2444 15.7866 23.6625 16.4875L11.5 28.5H57C57.9283 28.5 58.8185 28.8687 59.4749 29.5251C60.1313 30.1815 60.5 31.0717 60.5 32V30.5Z" fill="white"/>
                            </svg>
                        </button>
                        <button class="new-girl-slider-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 30.5C0.5 31.4283 0.868749 32.3185 1.52513 32.9749C2.1815 33.6313 3.07174 34 4 34H49.5L37.25 46.25C36.9052 46.5948 36.6312 47.0038 36.444 47.4542C36.2568 47.9046 36.1599 48.3879 36.1587 48.8762C36.1574 49.3645 36.2518 49.8483 36.4366 50.2996C36.6214 50.7509 36.8931 51.1613 37.2362 51.5081C37.5793 51.855 37.9871 52.1311 38.4369 52.3203C38.8867 52.5095 39.3696 52.6084 39.8579 52.6118C40.3462 52.6151 40.8304 52.5228 41.2829 52.3398C41.7354 52.1568 42.1473 51.8867 42.4958 51.5458L60.0208 34.0208C60.6772 33.3645 61.0458 32.4748 61.0458 31.5466C61.0458 30.6185 60.6772 29.7288 60.0208 29.0725L42.4958 11.5475C41.8292 10.9236 40.9535 10.5793 40.0457 10.5859C39.1379 10.5925 38.2674 10.9496 37.6099 11.5828C36.9524 12.216 36.5583 13.0759 36.5081 13.9828C36.4579 14.8898 36.7556 15.7866 37.3375 16.4875L49.5 28.5H4C3.07174 28.5 2.1815 28.8687 1.52513 29.5251C0.868749 30.1815 0.5 31.0717 0.5 32V30.5Z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="home-castlist">
                <div class="home-castlist-title">
                    <h2>cast list</h2>
                </div>
                <div class="home-castlist-info">
                    <div class="castlist-info-header">
                        <img src="{{ asset('assets/img/shops/shizuku/girl-icon.png') }}" alt="出勤情報" class="castlist-info-icon">
                        <p class="castlist-info-title">キャスト一覧</p>
                    </div>
                    <div class="castlist-info-description">
                        <p>ヴィラコート雫のキャスト一覧です</p>
                    </div>
                    <div class="castlist-info-button">
                        <p>一覧を見る</p>
                        <div class="castlist-info-underline"></div>
                    </div>
                </div>
                <div class="home-castlist-cards">
                    @for ($i = 0; $i < 12; $i++)
                    <div class="castlist-card">
                        <div class="castlist-card-image">
                            <img src="{{ asset('assets/img/shops/shizuku/castlist.png') }}" alt="Background" class="card-bg">
                            <img src="{{ asset('assets/img/shops/shizuku/card-frame.png') }}" alt="Frame" class="card-frame">
                            <div class="castlist-card-content">
                                <div class="castlist-card-badge">
                                    <div class="badge-red-bg">
                                        <span class="badge-shift">本日出勤</span>
                                    </div>
                                    <div class="badge-content">
                                        <span class="badge-time">12:00〜24:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="castlist-card-info">
                            <div class="castlist-card-status">
                                {{-- <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/>
                                </svg>                                     --}}
                                <span class="status-text">待機中</span>
                            </div>
                            <p class="castlist-card-name">かれん (20)</p>
                            <p class="castlist-card-measurements">T.160 B.85(C) W.60 H.83</p>
                            <p class="castlist-card-message">キャストメッセージが甲斐キキキャ</p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-shizuku-layout>

@once
@vite(['resources/scss/shops/shizuku/home.scss', 'resources/js/shops/shizuku/home.js'])
@endonce
