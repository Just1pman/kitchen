window.addEventListener('DOMContentLoaded', () => {
  const range = document.querySelector(".dual-range");

  if (range) {
    const leftValue = Number(range.querySelector('.handle.left').getAttribute('data-value'));
    const rightValue = Number(range.querySelector('.handle.right').getAttribute('data-value'))
    new dualRangeSlider(range, leftValue, rightValue)
  }
})

class dualRangeSlider {
  constructor(rangeElement, leftValue, rightValue) {
    this.range = rangeElement
    this.min = Number(rangeElement.dataset.min)
    this.max = Number(rangeElement.dataset.max)
    this.valueLeft = leftValue
    this.valueRight = rightValue
    this.leftInput = document.querySelector('.range-inputs-left');
    this.rightInput = document.querySelector('.range-inputs-right');
    this.handles = [...this.range.querySelectorAll(".handle")]
    this.startPos = 0;
    this.activeHandle;

    this.handles.forEach(handle => {
      handle.addEventListener("mousedown", this.startMove.bind(this))
      handle.addEventListener("touchstart", this.startMoveTouch.bind(this))
    })

    window.addEventListener("mouseup", this.stopMove.bind(this))
    window.addEventListener("mouseup", this.stopMove.bind(this))
    window.addEventListener("touchend", this.stopMove.bind(this))
    window.addEventListener("touchcancel", this.stopMove.bind(this))
    window.addEventListener("touchleave", this.stopMove.bind(this))

    const rangeRect = this.range.getBoundingClientRect();
    const handleRect = this.handles[0].getBoundingClientRect()
    this.handles[0].dataset.value = this.valueLeft;
    this.handles[1].dataset.value = this.valueRight;

    const dualRange = document.querySelector('.dual-range');
    const percentLeft = (this.valueLeft / this.max) * 100
    let newXLeft = (dualRange.offsetWidth / 100) * percentLeft;
    this.leftInput.value = new Intl.NumberFormat('ru-RU').format(this.valueLeft);
    this.range.style.setProperty("--x-1", newXLeft+ "px");

    const percentRight = (this.valueRight / this.max) * 100
    let newXRight = (dualRange.offsetWidth / 100) * percentRight;
    this.rightInput.value = new Intl.NumberFormat('ru-RU').format(this.valueRight);
    this.range.style.setProperty("--x-2", newXRight + "px");

    this.rightInput.placeholder = new Intl.NumberFormat('ru-RU').format(this.max);

    this.leftInput.addEventListener("input", () => {
      let value = this.leftInput.value
      value = Number(value.replace(/\s/g, ''))
      const left = document.querySelector('.handle.left');
      const dualRange = document.querySelector('.dual-range');
      const percent = (value / this.max) * 100
      let newX = (dualRange.offsetWidth / 100) * percent;

      if (value > this.max) {
        this.leftInput.value = 0
      } else {
        this.leftInput.value = new Intl.NumberFormat('ru-RU').format(value)
      }

      if (newX >= dualRange.offsetWidth) {
        newX = 0;
      }

      if (isNaN(value)) {
        this.leftInput.value = 0
        newX = 0;
      }

      left.setAttribute('data-value', value);
      this.range.style.setProperty('--x-1', newX + "px");
    })

    this.rightInput.addEventListener("input", () => {
      let value = this.rightInput.value
      value = Number(value.replace(/\s/g, ''))
      const right = document.querySelector('.handle.right');
      const dualRange = document.querySelector('.dual-range');
      const percent = (value / this.max) * 100
      let newX = (dualRange.offsetWidth / 100) * percent;

      if (value >= this.max) {
        this.rightInput.value = new Intl.NumberFormat('ru-RU').format(this.max)
      } else {
        this.rightInput.value = new Intl.NumberFormat('ru-RU').format(value)
      }

      if (newX >= dualRange.offsetWidth) {
        newX = dualRange.offsetWidth;
      }

      if (isNaN(value)) {
        this.rightInput.value = new Intl.NumberFormat('ru-RU').format(this.max)
        newX = dualRange.offsetWidth;
      }

      right.setAttribute('data-value', value);
      this.range.style.setProperty('--x-2', newX + "px");
    })
  }

  startMoveTouch(e) {
    const handleRect = e.target.getBoundingClientRect()
    this.startPos = e.touches[0].clientX - handleRect.x;
    this.activeHandle = e.target;
    this.moveTouchListener = this.moveTouch.bind(this)
    window.addEventListener("touchmove", this.moveTouchListener);
  }

  startMove(e) {
    this.startPos = e.offsetX;
    this.activeHandle = e.target;
    this.moveListener = this.move.bind(this)
    window.addEventListener("mousemove", this.moveListener);
  }

  moveTouch(e) {
    this.move({clientX: e.touches[0].clientX})
  }

  move(e) {
    const isLeft = this.activeHandle.classList.contains("left")
    const property = isLeft ? "--x-1" : "--x-2";
    const parentRect = this.range.getBoundingClientRect();
    const handleRect = this.activeHandle.getBoundingClientRect();
    let newX = e.clientX - parentRect.x - this.startPos;
    if (isLeft) {
      const otherX = parseInt(this.range.style.getPropertyValue("--x-2"));
      newX = Math.min(newX, otherX - handleRect.width)
      newX = Math.max(newX, 0 - handleRect.width / 2)
      const value = this.calcHandleValue((newX + handleRect.width / 2) / parentRect.width);
      this.leftInput.value = new Intl.NumberFormat('ru-RU').format(value);
    } else {
      const otherX = parseInt(this.range.style.getPropertyValue("--x-1"));
      newX = Math.max(newX, otherX + handleRect.width)
      newX = Math.min(newX, parentRect.width - handleRect.width / 2)
      const value = this.calcHandleValue((newX + handleRect.width / 2) / parentRect.width);
      this.rightInput.value = new Intl.NumberFormat('ru-RU').format(value)
    }
    this.activeHandle.dataset.value = this.calcHandleValue((newX + handleRect.width / 2) / parentRect.width)
    this.range.style.setProperty(property, newX + "px");

  }

  calcHandleValue(percentage) {
    return Math.round(percentage * (this.max - this.min) + this.min)
  }

  stopMove() {
    window.removeEventListener("mousemove", this.moveListener);
    window.removeEventListener("touchmove", this.moveTouchListener);
  }
}

new Swiper(".materials-swiper", {
  breakpoints: {
    0: {
      slidesPerView: 2,
    },

    681: {
      slidesPerView: 3,
    },

    993: {
      slidesPerView: 5,

    },
  },
  navigation: {
    nextEl: ".swiper-button-next-materials",
    prevEl: ".swiper-button-prev-materials",
  },
  spaceBetween: 32,
});

const ajaxResult = document.querySelector('.catalog-ajax-container');
const checkboxes = document.querySelectorAll('.taxonomy-container-checkbox');
const apply = document.querySelector('.filter-apply');
const reset = document.querySelector('.filter-reset');
const sortingItems = document.querySelectorAll('.sorting-item');
const filterShowAll = document.querySelector('.filter-show-all');
const filterTitleMobile = document.querySelector('.catalog-filter-left-filters-wrapper h3');
const categoryTitleMobile = document.querySelector('.catalog-filter-left-categories-wrapper h3');
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

let materials = [];
let sizes = [];
let cheap;
let expensive;
let np = 1;
let sort = 'new';

function filterAjax()
{
  startLoader('.catalog-filter-wrapper-results .loader-container')
  materials = getDataFilter('tax-materials', materials)
  sizes = getDataFilter('tax-sizes', sizes)

  let params = `?np=${np}`;
  params = addParam(params, 'cheap', cheap)
  params = addParam(params, 'expensive', expensive)
  params = addParam(params, 'materials', materials)
  params = addParam(params, 'sizes', sizes)
  params = addParam(params, 'sort', sort)

  updateURL(params);
  const url = '/wp-admin/admin-ajax.php' + params + `&action=kitchen_filter`;
  const promise = fetch(url, {
    method: 'GET',
  })

  return promise.then((response) => {
    response.text()
      .then((resp) => {
        if (ajaxResult !== null) {
          ajaxResult.innerHTML = resp;
        }

        return resp
      })
      .then(() => {
        moneyFormat()
        filterPagination()
        stopLoader('.catalog-filter-wrapper-results .loader-container')
      })
  })
}

checkboxes && checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('click', () => {
    checkbox.classList.toggle('js-active-checkbox')
  })
})

apply && apply.addEventListener('click', async () => {
  cheap = (document.querySelector('.range-inputs-left').value).replace(/\s/g, '');
  expensive = (document.querySelector('.range-inputs-right').value).replace(/\s/g, '');
  np = 1

  await filterAjax()
})

function getDataFilter(containerClass, result) {
  const activeItems = document.querySelectorAll(`.${containerClass} .taxonomy-container-checkbox.js-active-checkbox`)
  result = [];

  activeItems && activeItems.forEach((item) => {
    const termId = item.getAttribute('data-term-id');

    result.push(termId)
  })

  return result;
}

function updateURL(params) {
  if (history.pushState) {
    const baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    const newUrl = baseUrl + params;
    history.pushState(null, null, newUrl);
  }
}

function addParam(params, key, value) {
  if (value && value.length > 0) {
    return  params + `&${key}=${value}`
  }

  return params;
}

sortingItems && sortingItems.forEach((item) => {
  item.addEventListener('click', async () => {
    sortingItems.forEach((item) => {
      item.classList.remove('js-active-sort')
    })

    item.classList.add('js-active-sort')
    sort = item.getAttribute('data-type');
    np = 1;

    await filterAjax()
  })
})

function moneyFormat() {
  const prices = document.querySelectorAll('.kitchen-bottom-price p');

  prices && prices.forEach((price) => {
    price.textContent = new Intl.NumberFormat('ru-RU').format(price.textContent) + ' ₽';
  })
}

moneyFormat()

reset && reset.addEventListener('click', async () => {
  checkboxes && checkboxes.forEach((checkbox) => {
    checkbox.classList.remove('js-active-checkbox')
  })

  materials = [];
  sizes = [];
  const dualRange = document.querySelector(".dual-range");
  cheap = 0;
  expensive = dualRange.getAttribute('data-max');
  new dualRangeSlider(dualRange, cheap, expensive)

  await filterAjax()
})

function filterPagination() {
  const paginationItems = document.querySelectorAll('.catalog-kitchen-pagination .page-numbers:not(.dots)');

  paginationItems && paginationItems.forEach((item) => {
    item.addEventListener('click', async () => {
      np = item.textContent.trim();

      await filterAjax()
    })
  })
}

filterPagination()

filterShowAll && filterShowAll.addEventListener('click', () => {
  const container = filterShowAll.closest('.taxonomy-container-checkbox-wrapper')
  container.classList.add('js-full-list');

  checkboxes && checkboxes.forEach((checkbox) => {
    checkbox.classList.remove('js-hidden')
  })
})

filterTitleMobile && filterTitleMobile.addEventListener('click', () => {
  const container = filterShowAll.closest('.catalog-filter-left-filters-wrapper')

  container.classList.toggle('js-open');
})

categoryTitleMobile && categoryTitleMobile.addEventListener('click', () => {
  const container = categoryTitleMobile.closest('.catalog-filter-left-categories-wrapper')

  container.classList.toggle('js-open');
})

if (urlParams.get('sort')) {
  sortingItems.forEach((item) => {
    item.classList.remove('js-active-sort')
  })

  sortingItems.forEach((item) => {
    const dataSort = item.getAttribute('data-type')

    if (dataSort && dataSort === urlParams.get('sort')) {
      item.classList.add('js-active-sort')
    }
  })
}