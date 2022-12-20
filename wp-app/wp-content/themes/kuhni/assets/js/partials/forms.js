document.addEventListener( 'wpcf7mailsent', function( event ) {
  const closeBtn = document.querySelector('.carousel__button.is-close');
  const endOrderForm = document.querySelector('.end-order')
  closeBtn.click()
  endOrderForm.click()
}, false );