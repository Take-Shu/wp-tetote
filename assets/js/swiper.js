const swiperFv = new Swiper(".p-fv__slide", {
  loop: true,
  effect: "fade",
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  speed: 3000,
});

const swiperCareer = new Swiper(".p-career__slide", {
  loop: true,
  speed: 10000,
  slidesPerView: 1.3,
  centeredSlides: true,
  spaceBetween: 0,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 2.67,
    },
  },
});

const swiperEmployee = new Swiper(".p-employee__slide", {
  loop: true,
  speed: 1000,
  slidesPerView: 2.84,
  spaceBetween: 23,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".p-employee__slide-button_next",
    prevEl: ".p-employee__slide-button_prev",
  },
  breakpoints: {
    768: {
      speed: 600,
      slidesPerView: 3.62,
      spaceBetween: 43,
      autoplay: false,
    },
    1052: {
      speed: 600,
      slidesPerView: 3.62,
      spaceBetween: 43,
      autoplay: false,
    }
  },
});
