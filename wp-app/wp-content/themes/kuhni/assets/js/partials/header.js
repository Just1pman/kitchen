const burger = document.querySelector('.header-mobile-burger svg');
const html = document.querySelector('html');

burger && burger.addEventListener('click', () => {
  html.classList.toggle('js-menu-active')
})