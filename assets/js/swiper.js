const swiperCareer = new Swiper(".p-career__slide", {
  loop: true,
  speed: 6000,
  slidesPerView: 1.4,
  spaceBetween: 16,
  centeredSlides: true,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  breakpoints: {
    425: {
      speed: 8000,
      slidesPerView: 1.4,
      spaceBetween: 25,
    },
    768: {
      slidesPerView: 1.5,
      spaceBetween: 34,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 34,
    },
    1440: {
      slidesPerView: 2.7,
      spaceBetween: 34,
    },
    1920: {
      slidesPerView: 3.5,
      spaceBetween: 52,
    },
  }
});

const swiperFv = new Swiper(".p-fv__slide", {
  loop: true,
  effect: "fade",
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  speed: 3000,
});
