// const ajaxResult = document.querySelector('.catalog-ajax-container');
// const checkboxes = document.querySelectorAll('.taxonomy-container-checkbox');
// const apply = document.querySelector('.filter-apply');
// const reset = document.querySelector('.filter-reset');
// const sortingItems = document.querySelectorAll('.sorting-item');
// const filterShowAll = document.querySelector('.filter-show-all');
// const filterTitleMobile = document.querySelector('.catalog-filter-left-filters-wrapper h3');
// const categoryTitleMobile = document.querySelector('.catalog-filter-left-categories-wrapper h3');
// const queryString = window.location.search;
// const urlParams = new URLSearchParams(queryString);


class GlobalPagination {
  /** @param {string} url */
  constructor() {
    this.paginationButtonClass = 'page-numbers'
    this.wrapper = document.querySelector('.catalog-filter-wrapper-results');
    this.container = this.wrapper && this.wrapper.querySelector('.catalog-ajax-container');

    this.onPage = 1;

    this.init()
  }

  init() {
    this.initPaginationButtonsEvents();
  }

  getUrl() {
    const params = this.getParams();

    const {action} = this.wrapper.dataset

    return `/wp-admin/admin-ajax.php?&action=${action}&${params}`;
  }

  getParams () {
    let params = `onpage=${this.onPage}`;

    const {termId, taxanomy} = this.wrapper.dataset;

    console.log(termId, taxanomy)

    if (!!termId) {
      params += `&termId=${termId}`
    }

    if (!!taxanomy) {
      params += `&taxonomy=${taxanomy}`
    }

    return params;
  }

  initPaginationButtonsEvents() {
    window.addEventListener('click', (e) => {
      /** @type {HTMLElement} */
      const clickedTarget = e.target;

      if (
        (!clickedTarget.classList.contains(this.paginationButtonClass)
        && clickedTarget.classList.contains('.dots'))
        || clickedTarget.classList.contains('current')
      ) {
        return;
      }
      this.onPage = clickedTarget.innerText.trim();

      this.getCards()
    })
  }

  async getCards() {
    console.log('get cards')
    const url = this.getUrl();
    this.startLoader();
    const response = await fetch(url, {
      method: 'GET',
    })

    const htmlCards = await response.text();
    this.insertHtmlInContainer(htmlCards)

    await this.stopLoader();
  }


  /** @param {string} html */
  insertHtmlInContainer(html) {
    this.container.innerHTML = html
  }

  startLoader() {
    startLoader('.catalog-filter-wrapper-results .loader-container')
  }

  stopLoader() {
    stopLoader('.catalog-filter-wrapper-results .loader-container')
  }
}


new GlobalPagination()

//
//
//
//
// let sizes = [];
// let cheap;
// let expensive;
// let np = 1;
// let sort = 'new';
//
// function filterAjax()
// {
//   startLoader('.catalog-filter-wrapper-results .loader-container')
//   sizes = getDataFilter('tax-sizes', sizes)
//
//   let params = `?np=${np}`;
//   params = addParam(params, 'cheap', cheap)
//   params = addParam(params, 'expensive', expensive)
//   params = addParam(params, 'sizes', sizes)
//   params = addParam(params, 'sort', sort)
//
//   updateURL(params);
//   const url = '/wp-admin/admin-ajax.php' + params + `&action=kitchen_filter`;
//   const promise = fetch(url, {
//     method: 'GET',
//   })
//
//   return promise.then((response) => {
//     response.text()
//       .then((resp) => {
//         if (ajaxResult !== null) {
//           ajaxResult.innerHTML = resp;
//         }
//
//         return resp
//       })
//       .then(() => {
//         moneyFormat()
//         filterPagination()
//         stopLoader('.catalog-filter-wrapper-results .loader-container')
//       })
//   })
// }
//
// checkboxes && checkboxes.forEach((checkbox) => {
//   checkbox.addEventListener('click', () => {
//     checkbox.classList.toggle('js-active-checkbox')
//   })
// })
//
// apply && apply.addEventListener('click', async () => {
//   cheap = (document.querySelector('.range-inputs-left').value).replace(/\s/g, '');
//   expensive = (document.querySelector('.range-inputs-right').value).replace(/\s/g, '');
//   np = 1
//
//   await filterAjax()
// })
//
// function getDataFilter(containerClass, result) {
//   const activeItems = document.querySelectorAll(`.${containerClass} .taxonomy-container-checkbox.js-active-checkbox`)
//   result = [];
//
//   activeItems && activeItems.forEach((item) => {
//     const termId = item.getAttribute('data-term-id');
//
//     result.push(termId)
//   })
//
//   return result;
// }
//
// function updateURL(params) {
//   if (history.pushState) {
//     const baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
//     const newUrl = baseUrl + params;
//     history.pushState(null, null, newUrl);
//   }
// }
//
// function addParam(params, key, value) {
//   if (value && value.length > 0) {
//     return  params + `&${key}=${value}`
//   }
//
//   return params;
// }
//
// sortingItems && sortingItems.forEach((item) => {
//   item.addEventListener('click', async () => {
//     sortingItems.forEach((item) => {
//       item.classList.remove('js-active-sort')
//     })
//
//     item.classList.add('js-active-sort')
//     sort = item.getAttribute('data-type');
//     np = 1;
//
//     await filterAjax()
//   })
// })
//
// function moneyFormat() {
//   const prices = document.querySelectorAll('.kitchen-bottom-price p');
//
//   prices && prices.forEach((price) => {
//     price.textContent = new Intl.NumberFormat('ru-RU').format(price.textContent) + ' ₽';
//   })
// }
//
// moneyFormat()
//
// reset && reset.addEventListener('click', async () => {
//   checkboxes && checkboxes.forEach((checkbox) => {
//     checkbox.classList.remove('js-active-checkbox')
//   })
//
//   materials = [];
//   sizes = [];
//   const dualRange = document.querySelector(".dual-range");
//   cheap = 0;
//   expensive = dualRange.getAttribute('data-max');
//   new dualRangeSlider(dualRange, cheap, expensive)
//
//   await filterAjax()
// })
//
// function filterPagination() {
//   const paginationItems = document.querySelectorAll('.catalog-kitchen-pagination .page-numbers:not(.dots)');
//
//   paginationItems && paginationItems.forEach((item) => {
//     item.addEventListener('click', async () => {
//       np = item.textContent.trim();
//
//       await filterAjax()
//     })
//   })
// }
//
// filterPagination()
//
// filterShowAll && filterShowAll.addEventListener('click', () => {
//   const container = filterShowAll.closest('.taxonomy-container-checkbox-wrapper')
//   container.classList.add('js-full-list');
//
//   checkboxes && checkboxes.forEach((checkbox) => {
//     checkbox.classList.remove('js-hidden')
//   })
// })
//
// filterTitleMobile && filterTitleMobile.addEventListener('click', () => {
//   const container = filterShowAll.closest('.catalog-filter-left-filters-wrapper')
//
//   container.classList.toggle('js-open');
// })
//
// categoryTitleMobile && categoryTitleMobile.addEventListener('click', () => {
//   const container = categoryTitleMobile.closest('.catalog-filter-left-categories-wrapper')
//
//   container.classList.toggle('js-open');
// })
//
// if (urlParams.get('sort')) {
//   sortingItems.forEach((item) => {
//     item.classList.remove('js-active-sort')
//   })
//
//   sortingItems.forEach((item) => {
//     const dataSort = item.getAttribute('data-type')
//
//     if (dataSort && dataSort === urlParams.get('sort')) {
//       item.classList.add('js-active-sort')
//     }
//   })
// }
//
// if (urlParams.get('sort')) {
//   sortingItems.forEach((item) => {
//     item.classList.remove('js-active-sort')
//   })
//
//   sortingItems.forEach((item) => {
//     const dataSort = item.getAttribute('data-type')
//
//     if (dataSort && dataSort === urlParams.get('sort')) {
//       item.classList.add('js-active-sort')
//     }
//   })
// }