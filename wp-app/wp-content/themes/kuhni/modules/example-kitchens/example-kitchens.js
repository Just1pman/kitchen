const buttons = document.querySelectorAll('.top-right button')
const ajaxContainer = document.querySelector('.example-kitchens-results');
let format = 'new';

buttons && buttons.forEach((button) => {
  button.addEventListener('click', () => {
    startLoader()
    format = button.getAttribute('data-format');

    buttons.forEach((button) => {
      button.classList.remove('button-active')
    })
    button.classList.add('button-active')

    ajax()
  })
})

function ajax()
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
        stopLoader()
      })
  })
}

ajax();