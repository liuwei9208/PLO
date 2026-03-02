import Pushbar from './groups/pushbar'
import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import './group/date-search-bar'
import initGroupsHeaderMenu from './groups/header'

const pushbar = new Pushbar({
  blur: true,
  overlay: true,
});

if (document.querySelector('.newface-slide')) new Swiper('.newface-slide', {
  modules: [Autoplay, Navigation],
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
  modules: [Autoplay],
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
  modules: [Autoplay, Navigation],
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
        console.log({ realIndex });
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
        console.log({ realIndex });
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
document.addEventListener('DOMContentLoaded', function () {
  const shopButton = document.querySelector('.groups-shop-button--main');
  const shopsGrid = document.querySelector('.groups-shops-grid');

  if (shopButton && shopsGrid) {
    shopButton.addEventListener('click', function (event) {
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
    document.addEventListener('click', function (event) {
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

// Video play button functionality for movie page
document.addEventListener('DOMContentLoaded', function () {
  const videoWrappers = document.querySelectorAll('.groups-movie-card__video-wrapper');

  videoWrappers.forEach(wrapper => {
    const video = wrapper.querySelector('.groups-movie-card__video');
    const playButton = wrapper.querySelector('.groups-movie-card__play-button');

    if (!video || !playButton) return;

    // Click on wrapper to play video
    wrapper.addEventListener('click', function (e) {
      // Don't trigger if clicking directly on video controls
      if (e.target === video || video.contains(e.target)) {
        return;
      }

      // Show video controls and play
      video.setAttribute('controls', 'controls');
      video.style.display = 'block';
      playButton.style.display = 'none';
      video.play().catch(err => {
        console.log('Video play failed:', err);
      });
    });

    // Hide play button when video starts playing
    video.addEventListener('play', function () {
      playButton.style.display = 'none';
    });

    // Show play button when video is paused (but not if controls are visible)
    video.addEventListener('pause', function () {
      if (!video.hasAttribute('controls')) {
        playButton.style.display = 'block';
      }
    });

    // Show play button when video ends
    video.addEventListener('ended', function () {
      playButton.style.display = 'block';
      video.removeAttribute('controls');
      video.style.display = 'none';
    });
  });
});

// Recruit staff blog simple carousel
document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.querySelector('[data-recruit-blog-carousel]');
  const prevBtn = document.querySelector('[data-recruit-blog-prev]');
  const nextBtn = document.querySelector('[data-recruit-blog-next]');

  if (!carousel || !prevBtn || !nextBtn) return;

  const firstCard = carousel.querySelector('.recruit-blog__card');
  const step = firstCard ? firstCard.getBoundingClientRect().width + 20 : 420;

  function scrollByStep(direction) {
    carousel.scrollBy({
      left: direction * step,
      behavior: 'smooth',
    });
  }

  prevBtn.addEventListener('click', () => scrollByStep(-1));
  nextBtn.addEventListener('click', () => scrollByStep(1));
});

// Recruit requirements cards carousel with dots
document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.querySelector('[data-requirements-carousel]');
  const dotsContainer = document.querySelector('[data-requirements-dots]');

  if (!carousel || !dotsContainer) return;

  const cards = carousel.querySelectorAll('.recruit-requirements__card');
  const dots = dotsContainer.querySelectorAll('[data-requirements-dot]');

  if (cards.length === 0 || dots.length === 0) return;

  // Update active dot based on scroll position
  function updateActiveDot() {
    const scrollLeft = carousel.scrollLeft;
    const containerWidth = carousel.offsetWidth;

    // Find which card is most centered/visible
    let activeIndex = 0;
    let minDistance = Infinity;

    cards.forEach((card, index) => {
      const cardLeft = card.offsetLeft - carousel.offsetLeft;
      const cardCenter = cardLeft + card.offsetWidth / 2;
      const viewCenter = scrollLeft + containerWidth / 2;
      const distance = Math.abs(cardCenter - viewCenter);

      if (distance < minDistance) {
        minDistance = distance;
        activeIndex = index;
      }
    });

    // Update dots
    dots.forEach((dot, index) => {
      dot.classList.toggle('recruit-requirements__dot--active', index === activeIndex);
    });
  }

  // Scroll to specific card when dot is clicked
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      if (cards[index]) {
        const cardLeft = cards[index].offsetLeft - carousel.offsetLeft;
        const containerWidth = carousel.offsetWidth;
        const cardWidth = cards[index].offsetWidth;
        // Center the card in the viewport
        const scrollTarget = cardLeft - (containerWidth - cardWidth) / 2;

        carousel.scrollTo({
          left: Math.max(0, scrollTarget),
          behavior: 'smooth',
        });
      }
    });
  });

  // Listen to scroll events with debounce
  let scrollTimeout;
  carousel.addEventListener('scroll', () => {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(updateActiveDot, 50);
  });

  // Initial state
  updateActiveDot();
});

// Recruit Female Movie Carousel
document.addEventListener('DOMContentLoaded', function () {
  const blocks = document.querySelectorAll('.recruit-female-movie__block');

  blocks.forEach(block => {
    const mainImg = block.querySelector('.recruit-female-movie__frame img');
    const prevBtn = block.querySelector('.recruit-female-movie__arrow--prev');
    const nextBtn = block.querySelector('.recruit-female-movie__arrow--next');
    const thumbContainers = Array.from(block.querySelectorAll('.recruit-female-movie__thumb'));

    if (!mainImg || !prevBtn || !nextBtn || thumbContainers.length === 0) return;

    let currentIndex = 0;

    // Update main image from current thumb
    const updateMainImage = () => {
      const img = thumbContainers[currentIndex].querySelector('img');
      if (img) mainImg.src = img.src;
    };

    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : thumbContainers.length - 1;
      updateMainImage();
    });

    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex < thumbContainers.length - 1) ? currentIndex + 1 : 0;
      updateMainImage();
    });

    // Optional: Make thumbs clickable too
    thumbContainers.forEach((thumb, index) => {
      thumb.style.cursor = 'pointer';
      thumb.addEventListener('click', () => {
        currentIndex = index;
        updateMainImage();
      });
    });
  });
});
