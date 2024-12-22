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
  speed: 6000,
  slidesPerView: 1.4,
  spaceBetween: 16,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      speed: 8000,
      slidesPerView: 2,
      spaceBetween: 25,
    },
    1024: {
      speed: 15000,
      slidesPerView: 2.7,
      spaceBetween: 34,
    },
    1920: {
      speed: 15000,
      slidesPerView: 3.3,
      spaceBetween: 43,
    }
  }
});

const swiperEmployee = new Swiper(".p-employee__slide", {
  loop: true,
  speed: 8000,
  slidesPerView: 1.4,
  spaceBetween: 23,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".p-employee__slide-button_next",
    prevEl: ".p-employee__slide-button_prev",
  },
  breakpoints: {
    425: {
      slidesPerView: 1.5,
      spaceBetween: 23,
    },
    576: {
      slidesPerView: 1.8,
      spaceBetween: 23,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 23,
    },
    768: {
      speed: 1000,
      slidesPerView: 2.2,
      spaceBetween: 43,
      autoplay: false,
    },
    1024: {
      speed: 1000,
      slidesPerView: 2.8,
      spaceBetween: 43,
      autoplay: false,
    },
    1440: {
      speed: 1000,
      slidesPerView: 3.6,
      spaceBetween: 43,
      autoplay: false,
    },
    1920: {
      speed: 1000,
      slidesPerView: 4.2,
      spaceBetween: 43,
      autoplay: false,
    }
  }
})