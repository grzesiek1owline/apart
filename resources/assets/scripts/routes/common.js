import Swiper from 'swiper';
import Tabs from './../components/tabs';
import Floors from './../components/floors';
import lightbox from 'lightbox2';

export default {
  init() {
    // JavaScript to be fired on all pages
    lightbox.option({
      'resizeDuration': 400,
    })

    const tabs = new Tabs('[data-tab-wrapper]','[data-tab-menu]');
    tabs.init();

    const floors = new Floors();
    floors.init();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    var swiper = new Swiper('.swiper-container', {
      loop: true,
      autoHeight: true, //enable auto height
      slidesPerView: 2,
      spaceBetween: 30,
      observer: true,
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },

      // Navigation arrows
      navigation: {
        nextEl: '.slider-button-next',
        prevEl: '.slider-button-prev',
      },
    });

    jQuery('.slider-button-prev').on('click', function (e) {
      e.preventDefault();
      swiper.slidePrev();
    });

    jQuery('.slider-button-next').on('click', function (e) {
      e.preventDefault();
      swiper.slideNext();
    });

    jQuery('.swiper-slide a').magnificPopup({
      type: 'image',

      gallery: {
        enabled: true,
      },
    });
  },
};
