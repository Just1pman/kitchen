function initReviewSlider () {
  new Swiper(".swiper-reviews", {
    slidesPerView: 'auto',

    slidesPerColumn: 1,
    slidesPerGroup: 1,
    spaceBetween: 28,
    slidesPerColumnFill: 'row',
    observer: true,
    grabCursor: true,

    navigation: {
      nextEl: ".reviews__button-next",
      prevEl: ".reviews__button-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 'auto',
      },
      768: {
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      },
    },
  });
}

class ReviewsControl {
  constructor() {
    this.controlBtns = document.querySelectorAll('.reviews__button');
    this.init();
  }

  init() {
    this.controlBtns.forEach(button => {
      button.addEventListener('click', this.getReviews);
    })

    initReviewSlider();
  }

  getReviews(e) {
    this.container = document.querySelector('.swiper-wrapper');
    const { type } = this.dataset;

    const url = '/wp-admin/admin-ajax.php';
    const promise = fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        action: 'reviews',
        type: type,
      })
    })

    return promise.then((response) => {
      response.text()
          .then((resp) => {
            if (this.container !== null) {
              this.container.innerHTML = resp;
            }
          })
          .then(() => {
            initReviewSlider()
            stopLoader();
          })
    })
  }
}

new ReviewsControl();
