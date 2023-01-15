class TaxonomyArticlesCategory {
  constructor() {
    this.result = document.querySelector('.articles-category--articles-result');

    if (!this.result) {
      return;
    }
    this.termId = this.result.dataset.termId;

    this.initSlider()
    this.initPagination();
  }

  initSlider () {
    new Swiper(".swiper-article__category", {
      slidesPerView: 'auto',

      slidesPerColumn: 1,
      slidesPerGroup: 1,
      spaceBetween: 32,
      grabCursor: true,
      watchOverflow: true,

      navigation: {
        nextEl: ".swiper-article__category-next",
        prevEl: ".swiper-article__category-prev",
      },
    });
  }

  initPagination() {
    document.addEventListener('click', async (e) => {
      const item = e.target;
      if (item.classList.contains('current') || !item.classList.contains('page-numbers')) {
        return;
      }

      np = item.textContent.trim();
      await this.filterAjax()
    })
  }

  filterAjax()
  {
    startLoader('.articles-category--articles-container .loader-container')

    let params = `?np=${np}`;
    
    if (!!this.termId) {
      params += `&term_id=${this.termId}`;
    }
    const articleSection = document.querySelector('.articles-category');

    const { isDiscount } = articleSection.dataset
    if (!!isDiscount) {
      params += `&discount=1`;
    }

    console.log(params)
    const url = '/wp-admin/admin-ajax.php' + params + `&action=article_categories`;
    const promise = fetch(url, {
      method: 'GET',
    })

    return promise.then((response) => {
      response.text()
        .then((resp) => {
          console.log(resp)
          this.result.innerHTML = resp;

          return resp
        })
        .then(() => {
          filterPagination()
          stopLoader('.articles-category--articles-container .loader-container')
        })
    })
  }
}

new TaxonomyArticlesCategory()