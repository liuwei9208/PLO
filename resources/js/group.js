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
if (newfaceMore) {
  newfaceMore.addEventListener('click', function() {
    document.querySelector('.newface-slide').classList.add('is-hidden')
    document.querySelector('.newface-list').classList.remove('is-hidden')
    document.querySelector('.newface-more').classList.add('is-hidden')
  })
}

// イベントスライダーの初期化
const initEventSlider = () => {
  const eventSlider = new Swiper('.event-slider', {
// new Swiper('.event-slider', {
      modules: [Navigation, Pagination, Autoplay],
      slidesPerView: 'auto',
      spaceBetween: 20,
      centeredSlides: true,
      loop: true,
      speed: 1000,
      autoplay: {
          delay: 3000,
          disableOnInteraction: false,
          reverseDirection: false,
      },
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
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
              slidesPerView: 3,
              spaceBetween: 30,
              centeredSlides: false,
          },
          // 1366: {
          //   slidesPerView: 3,
          //   spaceBetween: 45,
          // }

      }

  });
};

// DOMContentLoadedイベントで初期化
document.addEventListener('DOMContentLoaded', () => {
  initEventSlider();
});