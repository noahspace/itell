(() => {
    // 激活菜单路由
    let currentPageName = /\/([_0-9a-zA-Z-]+).php/.exec(location.href)[1];
    document.querySelectorAll('.navbar .left .nav-link').forEach(el => {
        if (new RegExp(currentPageName).test(el.href)) {
            el.classList.add('active');
        }
    });

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
