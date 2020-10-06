export default class Tabs {
  constructor(tabs, menu) {
    this.tabs = document.querySelector(tabs);
    this.menu = document.querySelector(menu);
    this.activ_class_name = 'active';
  }

  init() {
    if(!this.tabs || !this.menu) {
      return false;
    }

    let hash = window.location.hash;
    hash = hash.toLocaleLowerCase().substring(1);

    if(hash) {
      this.loadHash(hash);
    } else {
      this.loadDefault();
    }

    this.tabMenuListeners();
  }

  tabMenuListeners() {
    const buttons = this.menu.querySelectorAll('button');

    for (let i = 0; i < buttons.length; i++) {
      const element = buttons[i];
      element.addEventListener('click', (e) => {
        e.preventDefault();
        const tab_name = element.dataset.openTabName;
        this.openTab(tab_name);
      })
    }
  }

  openTab(param) {
    const button = this.menu.querySelector('[data-open-tab-name = "'+param+'"]');
    const tab = this.tabs.querySelector('[data-tab-name = "'+param+'"]');
    if(!button || !tab) {
      return false;
    }

    this.hideActive();

    button.classList.add(this.activ_class_name);
    tab.classList.add(this.activ_class_name)
  }

  hideActive() {
    this.menu.getElementsByClassName(this.activ_class_name)[0].classList.remove(this.activ_class_name);
    this.tabs.getElementsByClassName(this.activ_class_name)[0].classList.remove(this.activ_class_name);
  }

  loadHash(param) {
    const button = this.menu.querySelector('[data-open-tab-name = "'+param+'"]');
    const tab = this.tabs.querySelector('[data-tab-name = "'+param+'"]');
    if(!button || !tab) {
      this.loadDefault();
      return false;
    }
    button.classList.add(this.activ_class_name);
    tab.classList.add(this.activ_class_name);
  }

  loadDefault() {
    this.menu.querySelectorAll('button')[0].classList.add(this.activ_class_name);
    this.tabs.querySelectorAll('[data-tab-name]')[0].classList.add(this.activ_class_name);
  }

  changeHash(param) {
    if(param) {
      window.location.hash = param;
    } else {
      window.location.href.split('#')[0]
    }
  }
}
