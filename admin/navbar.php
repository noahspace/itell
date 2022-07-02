<?php defined('ITELL_ROOT_PATH') || exit; ?>
<?php $user->hasLogin() || $response->redirect($option->adminUrl('login.php')); ?>
<div class="itell-navbar">
    <div class="area">
        <button class="menu-toggle">
            <span class="material-symbols-rounded">menu</span>
        </button>
        <a class="action" href="">
            <div class="logo"></div>
            <h1 class="title">ITELL</h1>
        </a>
    </div>
    <div class="area">
        <a class="action" href="">
            <div class="avatar"></div>
            <div class="username">您好，Admin</div>
        </a>
        <a class="action" href="<?= $option->siteUrl('action/user-handler?action=logout') ?>">注销</a>
        <?php \Itell\Plugin::factory('admin/header.php')->adminHeaderUser() ?>
    </div>
</div>
