const buttons = document.querySelectorAll('.top-right button')
const ajaxContainer = document.querySelector('.example-kitchens-results');
let format = 'new';

buttons && buttons.forEach((button) => {
  button.addEventListener('click', () => {
    startLoader('.example-wrapper-bottom .loader-container')
    format = button.getAttribute('data-format');

    buttons.forEach((button) => {
      button.classList.remove('button-active')
    })
    button.classList.add('button-active')

    ajaxKitchens()
  })
})

function ajaxKitchens()
{
  const url = '/wp-admin/admin-ajax.php';
  const promise = fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
      action: 'example_kitchens',
      format: format,
    })
  })

  return promise.then((response) => {
    response.text()
      .then((resp) => {
        if (ajaxContainer !== null) {
          ajaxContainer.innerHTML = resp;
        }
        return resp
      })
      .then(() => {
        initSliderKitchens()
        stopLoader('.example-wrapper-bottom .loader-container')
      })
  })
}

function initSliderKitchens() {
  new Swiper(".swiper-kitchen", {

    breakpoints: {
      769: {
        slidesPerView: 2,
        spaceBetween: 28,
        slidesPerGroup: 2,
        loopFillGroupWithBlank: true,
        slidesPerColumn: 2,
        slidesPerColumnFill: 'row',
        autoHeight: true,
      },

      1281: {
        slidesPerView: 4,
        spaceBetween: 28,
        slidesPerGroup: 4,
        loopFillGroupWithBlank: true,
      },
    },

    watchOverflow: true,
    slidesPerView: 1,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

  });
}
initSliderKitchens();