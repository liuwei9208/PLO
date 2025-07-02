import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import Scroll from './group/Scroll'
import Header from './group/Header'
import Drawer from './group/Drawer'

/** Scroll */
const scroll = new Scroll()

/** Header */
// const header = new Header()

/** Drawer */
const drawer = new Drawer({ scroll: scroll })



new Swiper('.newface-slide', {
  modules: [ Autoplay, Navigation ],
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  speed: 1000,
  breakpoints: {
    0: {
      centeredSlides: 1,
      slidesPerView: 1.35,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1366: {
      slidesPerView: 3,
      spaceBetween: 45,
    }
  },
  navigation: {
    prevEl: '.newface-slide-prev',
    nextEl: '.newface-slide-next',
  },
})


/** ピックアップの「店舗名」ボタン */
const pickupShops = document.querySelectorAll('.pickup-shop')
if (pickupShops.length > 0) {
  pickupShops.forEach(button => {
    button.addEventListener('click', () => {
      const selectedShop = button.dataset.shop
      const pickupItems = document.querySelectorAll('.pickup-item')

      // すべてのボタンからアクティブクラスを削除
      pickupShops.forEach(btn => btn.classList.remove('is-active'))
      // クリックされたボタンにアクティブクラスを追加
      button.classList.add('is-active')

      // 各アイテムの表示/非表示を制御
      pickupItems.forEach(item => {
        if (selectedShop === 'all') {
          item.style.display = 'block'
        } else {
          item.style.display = item.classList.contains(`--${selectedShop}`) ? 'block' : 'none'
        }
      })
    })
  })
}




/** 新人情報の「もっと見る」ボタン */
const newfaceMore = document.querySelector('.newface-more')
// if (newfaceMore) {
//   newfaceMore.addEventListener('click', function() {
//     document.querySelector('.newface-slide').classList.add('is-hidden')
//     document.querySelector('.newface-list').classList.remove('is-hidden')
//     document.querySelector('.newface-more').classList.add('is-hidden')
//   })
// }

// Create thumbnail swiper for pagination
const thumbsSwiper = new Swiper('.event-pagination', {
  slidesPerView: 'auto',
  centeredSlides: true,
  slideToClickedSlide: true,
  spaceBetween: 4,
  watchSlidesProgress: true,
  loop: true,
  loopedSlides: 4,
  breakpoints: {
    320: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 4,
    },
    1024: {
      slidesPerView: 4,
    }
  }
});

// Main event slider
const eventSlider = new Swiper('.event-slider', {
  modules: [Navigation, Pagination, Autoplay],
  slidesPerView: 'auto',
  spaceBetween: 20,
  centeredSlides: true,
  loop: true,
  loopedSlides: 4,
  speed: 1000,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
    reverseDirection: false,
  },
  thumbs: {
    swiper: thumbsSwiper,
    multipleActiveThumbs: false,
  },
  navigation: {
    nextEl: '.event-slide-next',
    prevEl: '.event-slide-prev',
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 60,
      centeredSlides: false,
    },
  },
  on: {
    init: function () {
      this.emit('slideChange');
    },
    slideChange: function () {
      const realIndex = this.realIndex;

      // サムネイルスライダーを同期
      if (thumbsSwiper.slides) {
        thumbsSwiper.slideToLoop(realIndex, 0);

        // すべてのサムネイルからアクティブクラスを削除
        const thumbnails = document.querySelectorAll('.event-pagination .event-slide-image');
        thumbnails.forEach(thumb => {
          thumb.classList.remove('swiper-pagination-bullet-active');
        });

        // 現在のインデックスに対応するサムネイルにアクティブクラスを追加
        const activeSlides = document.querySelectorAll(`.event-pagination .swiper-slide[data-swiper-slide-index="${realIndex}"] .event-slide-image`);
        activeSlides.forEach(slide => {
          slide.classList.add('swiper-pagination-bullet-active');
        });
      }
    }
  }
});

// Sync thumbnail clicks with main slider
thumbsSwiper.on('click', function (swiper) {
  const clickedSlide = swiper.clickedSlide;
  if (clickedSlide) {
    const slideIndex = parseInt(clickedSlide.getAttribute('data-swiper-slide-index'));
    if (!isNaN(slideIndex)) {
      eventSlider.slideToLoop(slideIndex);
    }
  }
});

// DOMContentLoadedイベントで初期化
document.addEventListener('DOMContentLoaded', () => {
  const mv = document.querySelector('.mv');
  if (mv) {
    console.log({mv});
    console.log(mv.offsetHeight);
    console.log(mv.clientHeight);
    let logo_height = 0;
    const logo = document.querySelector('.header-logo');
    if (logo) {
      logo_height = logo.offsetHeight;
    }
    console.log({logo_height});
    console.log(logo.clientHeight);
    const main = document.querySelector('.main');
    if (main) {
      main.style.marginTop = `${mv.offsetHeight + logo_height}px`;
    }
  }
});
