<?php defined('ITELL_ROOT_PATH') || exit; ?>
<div class="itell-menu-wrap">
    <ul class="itell-menu">
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('index.php') ?>">
                <i class="icon material-symbols-rounded">home</i>
                <span class="title">仪表盘</span>
            </a>
        </li>
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('profile.php') ?>">
                <i class="icon material-symbols-rounded">manage_accounts</i>
                <span class="title">个人资料</span>
            </a>
        </li>
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('post.php') ?>">
                <i class="icon material-symbols-rounded">article</i>
                <span class="title">文章</span>
            </a>
        </li>
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('media.php') ?>">
                <i class="icon material-symbols-rounded">attach_file</i>
                <span class="title">文件</span>
            </a>
        </li>
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('comment.php') ?>">
                <i class="icon material-symbols-rounded">mode_comment</i>
                <span class="title">评论</span>
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
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('user.php') ?>">
                <i class="icon material-symbols-rounded">person</i>
                <span class="title">用户</span>
            </a>
        </li>
        <li class="itell-menu-item">
            <a class="itell-menu-link" href="<?= $option->adminUrl('general.php') ?>">
                <i class="icon material-symbols-rounded">settings</i>
                <span class="title">设置</span>
            </a>
        </li>
    </ul>
</div>
