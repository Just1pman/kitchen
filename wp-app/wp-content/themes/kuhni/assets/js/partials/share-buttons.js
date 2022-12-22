class ShareButtons {
  constructor() {
    this.button = document.querySelector('.characteristics-block__info-share');
    this.yandexSharePluginUrl = 'https://yastatic.net/share2/share.js';
    this.loadScriptByScroll();
    this.init();
  }

  init() {
    this.button && this.button.addEventListener('click', () => {
      this.loadScript();
      const buttonsWrapper = document.querySelector('.share-buttons');

      const wrapper = buttonsWrapper.closest('.kitchen-share-wrapper');


      wrapper.classList.toggle('show');
    })
  }

  loadScriptByScroll() {
    window.addEventListener('scroll', () => {
      this.loadScript()
    }, {once: true});
  }

  loadScript () {
    if (window.isLoadingScript) {
      return;
    }

    const script = document.createElement('script');

    script.onload = function () {
      window.isLoadingScript = true;
      console.log('script was loading');
    };
    script.src = this.yandexSharePluginUrl;


    document.head.appendChild(script);
  }
}

new ShareButtons();