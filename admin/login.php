<?php
require __DIR__ . '/common.php';

if ($user->hasLogin()) {
    $response->redirect($option->adminUrl('index.php'));
} ?>
<div class="container">
    <form action="<?= $option->siteUrl('action/user-handler?action=login') ?>" method="post">
        <div>
            <label for="account">用户名/邮箱</label>
            <input type="text" name="account" id="account">
        </div>
        <div>
            <label for="password">密码</label>
            <input type="text" name="password" id="password">
        </div>
        <button type="submit">登录</button>
    </form>
</div>

<?php require __DIR__ . '/common-js.php'; ?>
