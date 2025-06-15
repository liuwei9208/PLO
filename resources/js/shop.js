import Swiper from 'swiper'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import Scroll from './shop/Scroll'
import Header from './shop/Header'
import Drawer from './shop/Drawer'

/** Scroll */
const scroll = new Scroll()

/** Header */
const header = new Header()

(function(d) {
  var config = {
    kitId: 'asj2cdd',
    scriptTimeout: 3000,
    async: true
  },
  h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
})(document);  
/** Drawer */
const drawer = new Drawer({ scroll: scroll })
document.addEventListener('DOMContentLoaded', function() {
  if (typeof Swiper !== 'undefined') {
    const eventSlider = new Swiper('.event-slider', {
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
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
          centeredSlides: false,
        }
      }
    });
  } else {
    console.error('Swiper is not loaded');
  }
})