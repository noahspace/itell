<?php defined('ITELL_ROOT_PATH') || exit; ?>
<?php $user->hasLogin() || $response->redirect($option->adminUrl('login.php')); ?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <h1 class="navbar-brand mb-0">ITELL</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto left">
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('index.php') ?>">仪表盘</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('post.php') ?>">文章</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('media.php') ?>">文件</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('comment.php') ?>">评论</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('theme.php') ?>">主题</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('plugin.php') ?>">插件</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('user.php') ?>">用户</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $option->adminUrl('general.php') ?>">设置</a></li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $option->adminUrl('profile.php') ?>">您好，<?= $user->username ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $option->siteUrl('action/user-handler?action=logout') ?>">注销</a>
                </li>
                <?php \Itell\Plugin::factory('admin/header.php')->adminHeaderUser() ?>
            </ul>
        </div>
    </div>
</nav>
