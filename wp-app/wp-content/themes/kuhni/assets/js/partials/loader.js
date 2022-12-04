function startLoader() {
  const loader = document.querySelector('.loader-container');
  if (loader) {
    loader.style.display = "flex";
  }
}

function stopLoader() {
  const loader = document.querySelector('.loader-container');
  if (loader) {
    loader.style.display = "none";
  }
}