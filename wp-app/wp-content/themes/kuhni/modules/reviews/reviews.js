function initReviewSlider () {
  new Swiper(".swiper-reviews", {
    slidesPerView: 'auto',

    slidesPerColumn: 1,
    slidesPerGroup: 1,
    spaceBetween: 28,
    slidesPerColumnFill: 'row',
    observer: true,
    grabCursor: true,
    watchOverflow: true,

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
          el: ".reviews .swiper-pagination",
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
    this.initWindowRemoveActiveClass()
  }

  init() {
    this.controlBtns.forEach(button => {
      button.addEventListener('click', this.getReviews);
    })

    initReviewSlider();
  }

  initWindowRemoveActiveClass() {
    window.removeActiveClass = () => this.removeActiveClass()
  }
  removeActiveClass() {
    const buttons = document.querySelectorAll('.reviews__button');

    buttons.forEach(btn => btn.classList.remove('active'))
  }

  getReviews (e) {
    const tab = e.target;
    window.removeActiveClass();

    tab.classList.add('active')
    this.container = document.querySelector('.reviews .swiper-wrapper');
    const { type } = tab.dataset;

    const url = '/wp-admin/admin-ajax.php';
    startLoader('.reviews-loader_wrapper .loader-container')
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
            initReviewSlider();
            stopLoader('.reviews-loader_wrapper .loader-container')
          })
    })
  }
}

new ReviewsControl();
