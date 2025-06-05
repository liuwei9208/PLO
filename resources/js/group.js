import Swiper from 'swiper'
import { Autoplay, Navigation } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import Scroll from './group/Scroll'
import Header from './group/Header'
import Drawer from './group/Drawer'

/** Scroll */
const scroll = new Scroll()

/** Header */
const header = new Header()

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
      document.querySelector('.pickup-list').dataset.shop = button.dataset.shop
      document.querySelector('.pickup-list').classList.add('--expanded')
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

