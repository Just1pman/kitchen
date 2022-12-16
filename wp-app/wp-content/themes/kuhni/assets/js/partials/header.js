const burgerMenu = document.querySelector('.header-mobile-burger svg');
const htmlBurger = document.querySelector('html');

burgerMenu && burgerMenu.addEventListener('click', () => {
  htmlBurger.classList.toggle('js-menu-active')
})