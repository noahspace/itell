<?php
require __DIR__ . '/common.php';

if ($user->hasLogin()) {
    $response->redirect($option->adminUrl('index.php'));
} ?>
<div class="container">
    <form action="<?= $option->siteUrl('action/user-handler?action=register') ?>" method="post">
        <div>
            <label for="username">用户名</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">邮箱</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">密码</label>
            <input type="text" name="password" id="password">
        </div>
        <button type="submit">登录</button>
    </form>
</div>
