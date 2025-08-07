import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
// import Scroll from './group/Scroll'
// import Header from './group/Header'
// import Drawer from './group/Drawer'
import Pushbar from './group/pushbar'

/** Scroll */
// const scroll = new Scroll()

/** Header */
// const header = new Header()

/** Drawer */
// const drawer = new Drawer({ scroll: scroll })

const pushbar = new Pushbar({
  blur: true,
  overlay: true,
});

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
  loopedSlides: 5,
  breakpoints: {
    320: {
      slidesPerView: 4,
    },
    768: {
      slidesPerView: 6,
    },
    1024: {
      slidesPerView: 6,
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
        console.log({realIndex});
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


// Add Intersection Observer for event-slider animation
const eventSliderElement = document.querySelector('.event-slider');
if (eventSliderElement) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate');
        // Stop observing after animation is triggered
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.2, // Trigger when 20% of the element is visible
    rootMargin: '0px' // No margin
  });

  observer.observe(eventSliderElement);
}

// DOMContentLoadedイベントで初期化
document.addEventListener('DOMContentLoaded', () => {
  const mv = document.querySelector('.mv');
  const body = document.querySelector('body');

  if (mv) {
    // if ( body.clientWidth < 768){
    //   mv.style.width = `${body.clientWidth}px`;

    // }
  }
});
window.addEventListener('load', () => {
  // const header_child_menu_logo = document.querySelector('.header-child-user-menu-logo');
  // if (header_child_menu_logo) {
  //   console.log(header_child_menu_logo.getBoundingClientRect().x) ;
  //   const header_child_logo = document.querySelector('.header-child-logo');
  //   if (header_child_logo) {
  //     console.log(header_child_menu_logo.getBoundingClientRect().left) ;
  //     let logo_left = header_child_menu_logo.getBoundingClientRect().left;
  //     document.documentElement.style.setProperty('--logo-left', `${logo_left + 10}px`);
  //     // header_child_logo.style.left = `${header_child_menu_logo.getBoundingClientRect().x}px`;
  //     console.log(header_child_logo.getBoundingClientRect()) ;
  //   }
  // }
  // const mv = document.querySelector('.mv');
  // const body = document.querySelector('body');

  // if (mv) {
  //   console.log({mv});
  //   console.log(body.clientWidth);
  //   console.log(mv.offsetWidth);
  //   console.log(mv.clientWidth);
  //   let logo_height = 0;
  //   const logo = document.querySelector('.header-logo');
  //   if (logo) {
  //     logo_height = logo.offsetHeight;
  //   }
  //   let logo_child_logo_height = 0;
  //   const logo_child_logo = document.querySelector('.header-child-logo');
  //   if (logo_child_logo) {
  //     logo_child_logo_height = logo_child_logo.offsetHeight;
  //   }
  //   const draw = document.querySelector('.drawer-toggle');
  //   if (draw) {
  //     const draw_height = draw.offsetHeight;
  //     console.log({draw_height});
      
  //     if (logo_height > draw_height) {
  //       draw.style.top = `${logo_height - draw_height}px`;
  //     }
  //     if (logo_child_logo_height > draw_height) {
  //       draw.style.top = `${logo_child_logo_height - draw_height}px`;
  //     }
  //   }
  //   // if ( body.clientWidth < 768){
  //   //   mv.style.width = `${body.clientWidth}px`;

  //   // }
  //   console.log({logo_height});
  //   // console.log(logo.clientHeight);
  //   const main = document.querySelector('.main');
  //   if (main) {
  //     if ( logo_height > 0){
  //       mv.style.top = `${logo_height}px`;
  //       main.style.marginTop = `${mv.offsetHeight + logo_height}px`;
  //     }
  //     if ( logo_child_logo_height > 0){
  //       mv.style.top = `${logo_child_logo_height}px`;
  //       main.style.marginTop = `${mv.offsetHeight + logo_child_logo_height}px`;
  //     }
  //   }
  // }

  // const newface = document.querySelector('.newface');
  // if (newface) {
  //   let newfaceHeight = newface.offsetHeight;
  //   console.log({newfaceHeight});
  //   const newfaceBorder = document.querySelector('.newface-main');
  //   console.log({newfaceBorder});
  //   if (newfaceBorder) {
  //     console.log(newfaceBorder.offsetHeight);
  //     const fullWidth = body.clientWidth;
  //     console.log({fullWidth});
  //     if (fullWidth < 768) {
  //       newfaceHeight = newfaceHeight - newfaceBorder.offsetHeight + 10;
  //     } else if (fullWidth >= 768 && fullWidth < 1440) {
  //       newfaceHeight = newfaceHeight - newfaceBorder.offsetHeight - 0;
  //     }else{
  //       newfaceHeight = newfaceHeight - newfaceBorder.offsetHeight - 30;
  //     }
  //     console.log({newfaceHeight});
  //     document.documentElement.style.setProperty('--newface-height', `${newfaceHeight}px`);
  //     // newfaceBorder.style.setProperty('--newface-height', `${newfaceHeight}px`);
  //     // const border = document.querySelector('.section-title');
  //     // console.log(getComputedStyle(border).getPropertyValue('--newface-height'));
  //   }
  // }

  resizeModule();
});

window.addEventListener('resize', () => {
  resizeModule();
});

function resizeModule() {
  const header_child_menu_logo = document.querySelector('.header-child-user-menu-logo');
  if (header_child_menu_logo) {
    console.log(header_child_menu_logo.getBoundingClientRect().x) ;
    const header_child_logo = document.querySelector('.header-child-logo');
    if (header_child_logo) {
      console.log(header_child_menu_logo.getBoundingClientRect().left) ;
      let logo_left = header_child_menu_logo.getBoundingClientRect().left;
      document.documentElement.style.setProperty('--logo-left', `${logo_left + 10}px`);
      // header_child_logo.style.left = `${header_child_menu_logo.getBoundingClientRect().x}px`;
      console.log(header_child_logo.getBoundingClientRect()) ;
    }
  }
  const mv = document.querySelector('.mv');
  const body = document.querySelector('body');

  if (mv) {
    console.log({mv});
    console.log(body.clientWidth);
    console.log(mv.offsetWidth);
    console.log(mv.clientWidth);
    let logo_height = 0;
    const logo = document.querySelector('.header-logo');
    if (logo) {
      logo_height = logo.offsetHeight;
    }
    let logo_child_logo_height = 0;
    const logo_child_logo = document.querySelector('.header-child-logo');
    if (logo_child_logo) {
      logo_child_logo_height = logo_child_logo.offsetHeight;
    }
    const draw = document.querySelector('.drawer-toggle');
    if (draw) {
      const draw_height = draw.offsetHeight;
      console.log({draw_height});
      
      // if (logo_height > draw_height) {
      //   draw.style.top = `${logo_height - draw_height}px`;
      // }
      if (logo_child_logo_height > draw_height) {
        draw.style.top = `${logo_child_logo_height - draw_height}px`;
      }
    }
    // if ( body.clientWidth < 768){
    //   mv.style.width = `${body.clientWidth}px`;

    // }
    console.log({logo_height});
    // console.log(logo.clientHeight);
    const main = document.querySelector('.main');
    if (main) {
      if ( logo_height > 0){
        mv.style.top = `${logo_height}px`;
        main.style.marginTop = `${mv.offsetHeight + logo_height}px`;
      }
      if ( logo_child_logo_height > 0){
        mv.style.top = `${logo_child_logo_height}px`;
        main.style.marginTop = `${mv.offsetHeight + logo_child_logo_height}px`;
      }
    }
    
    if (mv.style.top != draw.getBoundingClientRect().bottom && body.clientWidth < 768) {
      console.log('aaa');
      console.log(mv.style.top);
      console.log(draw.getBoundingClientRect().bottom);
      draw.style.top = `${mv.getBoundingClientRect().top - draw.offsetHeight}px`;
    }

  }

  const newface = document.querySelector('.newface');
  if (newface) {
    let newfaceHeight = newface.offsetHeight;
    console.log({newfaceHeight});
    const newfaceBorder = document.querySelector('.newface-main');
    console.log({newfaceBorder});
    if (newfaceBorder) {
      console.log(newfaceBorder.offsetHeight);
      const fullWidth = body.clientWidth;
      console.log({fullWidth});
      if (fullWidth < 768) {
        newfaceHeight = newfaceHeight - newfaceBorder.offsetHeight + 10;
      } else if (fullWidth >= 768 && fullWidth < 1440) {
        newfaceHeight = newfaceHeight - newfaceBorder.offsetHeight - 0;
      }else{
        newfaceHeight = newfaceHeight - newfaceBorder.offsetHeight - 30;
      }
      console.log({newfaceHeight});
      document.documentElement.style.setProperty('--newface-height', `${newfaceHeight}px`);
      // newfaceBorder.style.setProperty('--newface-height', `${newfaceHeight}px`);
      // const border = document.querySelector('.section-title');
      // console.log(getComputedStyle(border).getPropertyValue('--newface-height'));
    }
  }
}
// window.addEventListener('scroll', () => {
//   const mv = document.querySelector('.mv');
//   if (mv) {
//     mv.style.opacity = 0.6;
//   }
// });
let scrollTimeout;
window.addEventListener('scroll', () => {
  const mv = document.querySelector('.mv');
  if (mv) {
    mv.style.opacity = 0.6;
  }
clearTimeout(scrollTimeout);
  scrollTimeout = setTimeout(() => {
    // const mv = document.querySelector('.mv');
    if (mv) {
      mv.style.opacity = 1;
    }
  }, 150); // 150msのディレイ
});
