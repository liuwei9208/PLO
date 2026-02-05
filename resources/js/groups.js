import Pushbar from './groups/pushbar'
import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

const pushbar = new Pushbar({
  blur: true,
  overlay: true,
});

if (document.querySelector('.newface-slide')) new Swiper('.newface-slide', {
  modules: [ Autoplay, Navigation ],
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  speed: 1000,
  breakpoints: {
    0: {
      centeredSlides: true,
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

if (document.querySelector('.pickup-contents-slider')) new Swiper('.pickup-contents-slider', {
  modules: [ Autoplay ],
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  speed: 1000,
  breakpoints: {
    0: {
      centeredSlides: true,
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
})


new Swiper('.diary-contents-slide', {
  modules: [ Autoplay, Navigation ],
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  speed: 1000,
  breakpoints: {
    0: {
      centeredSlides: true,
      slidesPerView: 1.4,
      spaceBetween: 30,
    },
    768: {
      centeredSlides: true,
      slidesPerView: 1.3,
      spaceBetween: 30,
    },
    1366: {
      centeredSlides: true,
      slidesPerView: 1.6,
      spaceBetween: 45,
    }
  },
  // navigation: {
  //   prevEl: '.newface-slide-prev',
  //   nextEl: '.newface-slide-next',
  // },
})


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
        console.log({realIndex});
        thumbsSwiper.slideToLoop(realIndex, 0);

        // すべてのサムネイルからアクティブクラスを削除
        // const thumbnails = document.querySelectorAll('.event-pagination .event-slide-image');
        const thumbnails = document.querySelectorAll('.event-pagination .event-slide-image');
        // const thumbnails = document.querySelectorAll('.event-pagination ');
        thumbnails.forEach(thumb => {
          thumb.classList.remove('swiper-pagination-bullet-active');
        });

        // 現在のインデックスに対応するサムネイルにアクティブクラスを追加
        const activeSlides = document.querySelectorAll(`.event-pagination .swiper-slide[data-swiper-slide-index="${realIndex}"] .event-slide-image`);
        // const activeSlides = document.querySelectorAll(`.event-pagination .swiper-slide[data-swiper-slide-index="${realIndex}"]`);
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
// const eventSliderElement = document.querySelector('.event-slider');
// if (eventSliderElement) {
//   const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//       if (entry.isIntersecting) {
//         entry.target.classList.add('animate');
//         // Stop observing after animation is triggered
//         observer.unobserve(entry.target);
//       }
//     });
//   }, {
//     threshold: 0.2, // Trigger when 20% of the element is visible
//     rootMargin: '0px' // No margin
//   });

//   observer.observe(eventSliderElement);
// }


// Create thumbnail swiper for pagination

const thumbsSwiper_pickup = new Swiper('.pickup-pagination', {
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
      slidesPerView: 4,
    },
    1024: {
      slidesPerView: 4,
    }
  }
});

// Main event slider
const pickupSlider = new Swiper('.pickup-slider', {
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
    swiper: thumbsSwiper_pickup,
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
      if (thumbsSwiper_pickup.slides) {
        console.log({realIndex});
        thumbsSwiper_pickup.slideToLoop(realIndex, 0);

        // すべてのサムネイルからアクティブクラスを削除
        const thumbnails = document.querySelectorAll('.pickup-pagination .pickup-slide-contents');
        thumbnails.forEach(thumb => {
          thumb.classList.remove('swiper-pagination-bullet-active');
        });

        // 現在のインデックスに対応するサムネイルにアクティブクラスを追加
        const activeSlides = document.querySelectorAll(`.pickup-pagination .swiper-slide[data-swiper-slide-index="${realIndex}"] .pickup-slide-contents`);
        activeSlides.forEach(slide => {
          slide.classList.add('swiper-pagination-bullet-active');
        });
      }
    }
  }
});

// Sync thumbnail clicks with main slider
thumbsSwiper_pickup.on('click', function (swiper) {
  const clickedSlide = swiper.clickedSlide;
  if (clickedSlide) {
    const slideIndex = parseInt(clickedSlide.getAttribute('data-swiper-slide-index'));
    if (!isNaN(slideIndex)) {
      pickupSlider.slideToLoop(slideIndex);
    }
  }
});

// Mobile dropdown menu for groups-shops-buttons
document.addEventListener('DOMContentLoaded', function() {
  const shopButton = document.querySelector('.groups-shop-button--main');
  const shopsGrid = document.querySelector('.groups-shops-grid');
  
  if (shopButton && shopsGrid) {
    shopButton.addEventListener('click', function(event) {
      // On mobile, this acts as a dropdown toggle (prevent form submit if it's inside a form)
      if (window.innerWidth <= 850) {
        const isSubmit = shopButton.getAttribute('type') === 'submit';
        const isOpen = shopButton.classList.contains('active');

        // First tap: open dropdown
        if (!isOpen) {
          event.preventDefault();
          shopButton.classList.add('active');
          shopsGrid.classList.add('active');
          return;
        }

        // Second tap while open:
        // - New Face (submit button): allow submit to reset to "all shops"
        // - Other pages (type=button): just close the dropdown
        if (!isSubmit) {
          event.preventDefault();
          shopButton.classList.remove('active');
          shopsGrid.classList.remove('active');
        } else {
          shopButton.classList.remove('active');
          shopsGrid.classList.remove('active');
        }
      }
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
      const isClickInside = shopButton.contains(event.target) || shopsGrid.contains(event.target);
      if (!isClickInside && window.innerWidth <= 850) {
        shopButton.classList.remove('active');
        shopsGrid.classList.remove('active');
      }
    });
  }
});


// Add Intersection Observer for event-slider animation
// const pickupSliderElement = document.querySelector('.pickup-slider');
// if (pickupSliderElement) {
//   const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//       if (entry.isIntersecting) {
//         entry.target.classList.add('animate');
//         // Stop observing after animation is triggered
//         observer.unobserve(entry.target);
//       }
//     });
//   }, {
//     threshold: 0.2, // Trigger when 20% of the element is visible
//     rootMargin: '0px' // No margin
//   });

//   observer.observe(pickupSliderElement);
// }
