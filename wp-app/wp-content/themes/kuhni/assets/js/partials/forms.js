document.addEventListener('wpcf7mailsent', function (event) {
  const closeBtn = document.querySelector('.carousel__button.is-close');
  const endOrderForm = document.querySelector('.end-order')
  closeBtn.click()
  endOrderForm.click()
}, false);

const quizSend = document.querySelector('.form-pick-up .send-btn input')
quizSend && quizSend.addEventListener('click', () => {
  const activeItems = document.querySelectorAll('.form-pick-up .checkbox.js-active')
  const height = document.querySelector('.step-2 .height');
  const length = document.querySelector('.step-2 .length');
  let data = '';

  activeItems.forEach((item) => {
    const value = item.querySelector('p').textContent;
    const slide = item.closest('.swiper-slide');
    const headline = slide.querySelector('h4').textContent

    if (data.includes(headline)) {
      data += ',   ' + value;
    } else {
      data += "\r\n" + headline + ': ' + value;
    }
  })

  if (height.value || length.value) {
    data += "\r\n" + 'Укажите примерные размеры кухни: ' + height.value + 'х' + length.value
  }

  document.querySelector('.hidden-data').value = data;
})

const slider = new Swiper(".swiper-pick-up", {
  allowTouchMove: false,
  autoHeight: true,
  speed: 100,
  noSwiping: true,

  navigation: {
    nextEl: ".swiper-pick-up .next",
    prevEl: ".swiper-pick-up .prev",
  },
});

document.querySelector('#pick-up').style.display = "none";

const next = document.querySelector('.swiper-pick-up .next');
const prev = document.querySelector('.swiper-pick-up .prev');
const step1Checkboxes = document.querySelectorAll('.step-items .checkbox')

next && next.addEventListener('click', setNumberSlide)
prev && prev.addEventListener('click', setNumberSlide)

function setNumberSlide() {
  const activeSlide = document.querySelector('.swiper-pick-up .swiper-slide-active');
  const numberSlide = activeSlide.getAttribute('data-number');
  const currentSlide = document.querySelector('.current-slide');

  if (numberSlide == 6) {
    document.querySelector('.swiper-pick-up h5').style.display = "none";
    document.querySelector('.swiper-pick-up .navigation').style.display = "none";
  }

  currentSlide.textContent = numberSlide;
}

step1Checkboxes && step1Checkboxes.forEach((checkbox) => {
  checkbox && checkbox.addEventListener('click', () => {
    checkbox.classList.toggle('js-active');
  })
})

const step2Height = document.querySelector('.step-2 .height')
const step2Length = document.querySelector('.step-2 .length')

step2Height && step2Height.addEventListener('input', () => {
  document.querySelector('.step-2-top > span').textContent = step2Height.value
})

step2Length && step2Length.addEventListener('input', () => {
  document.querySelector('.step-2-bottom div > span').textContent = step2Length.value
})

