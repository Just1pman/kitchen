let slider = null;

function clearAllSlides() {

    slider.removeSlide(1);

    slider.update()
}

function initSlider () {
  slider = new Swiper(".swiper-reviews", {
    slidesPerView: 'auto',
    // slidesPerColumn: 1,
    // slidesPerGroup: 1,
    spaceBetween: 28,
    // slidesPerColumnFill: 'row',
    observer: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
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
              slider.addSlide(1, [
                '<div class="swiper-slide">Slide 10"</div>',
                // '<div class="swiper-slide">Slide 11"</div>'
              ])
              this.container.innerHTML = resp;
            }
            return resp
          })
          .then(() => {
            // clearAllSlides();
            // initSlider()
            stopLoader()
          })
    })
  }

}

new ReviewsControl();
initSlider();