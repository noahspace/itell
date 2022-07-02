<!-- <div class="itell-admin-header-wrap">
    <h1 class="header-item-logo"><a href="<?= $option->adminUrl('index.php'); ?>">Itell</a></h1>
    <ul class="header-item-menu">
        <li class="item" data-action="console">
            <a class="item-link" href="<?= $option->adminUrl('index.php'); ?>">控制台</a>
            <ul class="item-submenu">
                <li class="subitem"><a class="subitem-link" href="<?= $option->adminUrl('index.php'); ?>">网站概要</a></li>
                <li class="subitem"><a class="subitem-link" href="<?= $option->adminUrl('plugin.php'); ?>">插件</a></li>
                <li class="subitem"><a class="subitem-link" href="<?= $option->adminUrl('theme.php'); ?>">主题</a></li>
            </ul>
        </li>
        <li class="item" data-action="setting">
            <a class="item-link" href="<?= $option->adminUrl('profile.php'); ?>">设置</a>
            <ul class="item-submenu">
                <li class="subitem"><a class="subitem-link" href="<?= $option->adminUrl('profile.php'); ?>">个人资料</a></li>
                <li class="subitem"><a class="subitem-link" href="<?= $option->adminUrl('general.php'); ?>">基本设置</a></li>
            </ul>
        </li>
    </ul>
    <div class="header-item-user">
        <?php if ($user->hasLogin()) : ?>
            <a class="username user-item"><?= $user->username ?></a>
            <a href="<?= $option->siteUrl('action/user-handler?action=logout') ?>" class="username user-item">退出登录</a>
        <?php else : ?>
            <a href="<?= $option->adminUrl('login.php') ?>" class="username user-item">登录</a>
        <?php endif; ?>
        <a href="<?= $option->siteUrl() ?>" class="user-item">返回首页</a>
    </div>
</div> -->

<div class="itell-menu-wrap">
    <ul class="itell-menu">
        <li class="itell-menu-item active">
            <a class="itell-menu-link" href="<?= $option->adminUrl('index.php') ?>">
                <i class="icon material-symbols-rounded">home</i>
                <span class="title">仪表盘</span>
            </a>
        </li>
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('theme.php') ?>">
                <i class="icon material-symbols-rounded">format_paint</i>
                <span class="title">主题</span>
            </a>
        </li>
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('plugin.php') ?>">
                <i class="icon material-symbols-rounded">extension</i>
                <span class="title">插件</span>
            </a>
        </li>
    </ul>
</div>
