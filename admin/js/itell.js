(() => {
    // 激活菜单路由
    let currentPageName = /\/([_0-9a-zA-Z-]+).php/.exec(location.href)[1];
    document.querySelectorAll('.itell-menu .itell-menu-link').forEach(el => {
        if (new RegExp(currentPageName).test(el.href)) {
            el.parentElement.classList.add('active');
        }
    });

    // 菜单展开
    let toogleMenuEl = document.querySelector('.itell-navbar .menu-toggle');
    if (toogleMenuEl) {
        toogleMenuEl.addEventListener('click', function () {
            let menuEl = document.querySelector('.itell-menu-wrap');
            menuEl.classList.toggle('collapse');
        });
    }


    // 通知
    let notice = Cookies.get('notice');
    if (notice) {
        let noticeEl = document.createElement('div');
        noticeEl.classList.add('itell-notice');
        noticeEl.innerText = notice;
        document.body.append(noticeEl);
        Cookies.remove('notice');
    }
})();
