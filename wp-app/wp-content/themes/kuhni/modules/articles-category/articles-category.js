class ArticlesCategory {
  constructor() {
    this.initSlider()
  }

  initSlider () {
    new Swiper(".swiper-article__category", {
      slidesPerView: 'auto',

      slidesPerColumn: 1,
      slidesPerGroup: 1,
      spaceBetween: 32,
      grabCursor: true,
      watchOverflow: true,


      navigation: {
        nextEl: ".swiper-article__category-next",
        prevEl: ".swiper-article__category-prev",
      },
    });
  }
}

new ArticlesCategory()