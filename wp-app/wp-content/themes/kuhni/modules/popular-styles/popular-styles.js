const kitchensTabs = document.querySelectorAll('.kitchen-style-tab');
const kitchensAjaxContainer = document.querySelector('.kitchen-style-results');
let termId;

kitchensTabs && kitchensTabs.forEach((tab) => {
  tab.addEventListener('click', () => {
    startLoader('.kitchen-style-wrapper .loader-container')
    termId = tab.getAttribute('data-term-id');

    kitchensTabs.forEach((tab) => {
      tab.classList.remove('js-active-tab')
    })
    tab.classList.add('js-active-tab')

    ajaxKitchensStyle()
  })
})

function ajaxKitchensStyle()
{
  const url = '/wp-admin/admin-ajax.php';
  const promise = fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: new URLSearchParams({
      action: 'popular_styles',
      termId: termId,
    })
  })

  return promise.then((response) => {
    response.text()
      .then((resp) => {
        if (kitchensAjaxContainer !== null) {
          kitchensAjaxContainer.innerHTML = resp;
        }
        return resp
      })
      .then(() => {
        initSliderKitchenStyle()
        stopLoader('.kitchen-style-wrapper .loader-container')
      })
  })
}

function initSliderKitchenStyle() {
  new Swiper(".swiper-style", {

    breakpoints: {
      993: {
        slidesPerView: 2,
        spaceBetween: 37,
        slidesPerGroup: 2,
        loopFillGroupWithBlank: true,
      },
    },

    slidesPerView: 1,
    pagination: {
      el: ".swiper-pagination",
    },
  });
}

initSliderKitchenStyle();