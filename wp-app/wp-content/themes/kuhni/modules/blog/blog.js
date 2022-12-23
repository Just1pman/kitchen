class Blog {
  constructor() {
    this.initSlider();

    console.log('init')
  }

  initSlider() {
    new Swiper(".swiper-blog", {
      slidesPerView: 'auto',

      slidesPerColumn: 1,
      slidesPerGroup: 1,
      spaceBetween: 24,
      slidesPerColumnFill: 'row',
      observer: true,
      grabCursor: true,
      direction: 'vertical',
      watchOverflow: true,
      breakpoints: {
        480: {
          spaceBetween: 35,
        },
        768: {
          spaceBetween: 40,
          direction: 'horizontal',
        },
      },
    });
  }
}

new Blog();