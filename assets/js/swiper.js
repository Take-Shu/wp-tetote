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
  spaceBetween: 16,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  breakpoints: {
    769: {
      slidesPerView: 2.67,
    },
  },
});

const swiperEmployee = new Swiper(".p-employee__slide", {
  loop: true,
  speed: 600,
  slidesPerView: 2.85,
  spaceBetween: 23,
  navigation: {
    nextEl: ".p-employee__slide-button_next",
    prevEl: ".p-employee__slide-button_prev",
  },
  breakpoints: {
    769: {
      speed: 600,
      slidesPerView: 3.62,
      spaceBetween: 43,
      // autoplay: false,
    },
  },
});
