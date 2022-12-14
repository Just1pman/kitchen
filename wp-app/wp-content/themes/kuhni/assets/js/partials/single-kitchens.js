class KitchenTabInfo {
  constructor() {
    this.tabs = document.querySelectorAll(`[data-tab]`)

    this.init();

    this.initTabsSlider()
  }

  init() {
    const tabsArray = Array.prototype.slice.call(this.tabs);

    tabsArray.forEach(tab => {
      tab.addEventListener('click', () => {
        const activeTab = tab.dataset.tab;
        this.unsetActiveClasses(tab, tabsArray)
        this.showTabContent(activeTab)
        tab.classList.add('active');
      })
    })
  }

  /** @param {string} tab */
  showTabContent(tab) {
    const tabContentBlock = document.querySelector(`.${tab}`);
    const allTabContentBlocks = document.querySelectorAll('.info-module__tab-content');

    allTabContentBlocks.forEach(item => {
      item.classList.remove('active');
    })

    tabContentBlock.classList.add('active');
  }

  unsetActiveClasses(currentTab, allTabs) {
      allTabs.forEach(tab => {
          tab.classList.remove('active');
      })
  }

  initTabsSlider() {
    new Swiper(".swiper-single-kitchen", {
      slidesPerView: 'auto',

      slidesPerColumn: 1,
      slidesPerGroup: 1,
      slidesPerColumnFill: 'row',
      freeMode: true,
    });
  }
}

new KitchenTabInfo();