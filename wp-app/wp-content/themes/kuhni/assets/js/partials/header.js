const burgerMenu = document.querySelector('.header-mobile-burger svg');
const html = document.querySelector('html');

burgerMenu && burgerMenu.addEventListener('click', () => {
  html.classList.toggle('js-menu-active')
})