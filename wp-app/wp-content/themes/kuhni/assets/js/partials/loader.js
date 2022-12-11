function startLoader(containerClass) {
  const loader = document.querySelector(containerClass);
  if (loader) {
    loader.style.display = "flex";
  }
}

function stopLoader(containerClass) {
  const loader = document.querySelector(containerClass);
  if (loader) {
    loader.style.display = "none";
  }
}