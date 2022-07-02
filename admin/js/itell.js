(() => {
    /**
     * 激活菜单路由
     */
    let currentPageName = /\/([_0-9a-zA-Z-]+).php/.exec(location.href)[1];
    document.querySelectorAll('.header-item-menu .subitem-link').forEach(el => {
        if (new RegExp(currentPageName).test(el.href)) {
            el.parentElement.classList.add('active');
        }
    })
    const menuMap = {
        'console': ['index', 'plugin', 'theme'],
        'setting': ['profile', 'general'],
    }
    document.querySelectorAll('.header-item-menu .item-link').forEach(el => {
        if (menuMap[el.parentElement.dataset.action].includes(currentPageName)) {
            el.parentElement.classList.add('active');
        }
    })

    /**
     * 通知
     */
    let notice = Cookies.get('notice');
    if (notice) {
        let noticeEl = document.createElement('div');
        noticeEl.classList.add('itell-notice');
        noticeEl.innerText = notice;
        document.body.append(noticeEl);
        Cookies.remove('notice');
    }
})();
