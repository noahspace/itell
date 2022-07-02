<?php require __DIR__ . '/common.php'; ?>
<?php $user->hasLogin() && $response->redirect($option->adminUrl('index.php')); ?>
<?php require __DIR__ . '/header.php'; ?>
<div class="login-wrap">
    <h1 class="logo">ITELL</h1>
    <form class="login-form" action="<?= $option->siteUrl('action/user-handler?action=register') ?>" method="post">
        <div class="login-input">
            <input type="text" name="username" id="username" placeholder="用户名">
        </div>
        <div class="login-input">
            <input type="email" name="email" id="email" placeholder="邮箱">
        </div>
        <div class="login-input">
            <button class="login-btn" type="button">发送验证码</button>
        </div>
        <div class="login-input">
            <input type="text" name="emailCode" id="emailCode" placeholder="邮箱验证码">
        </div>
        <div class="login-input">
            <input type="password" name="password" id="password" placeholder="密码">
        </div>
        <div class="login-input">
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="确认密码">
        </div>
        <button class="login-btn" type="submit">登录</button>
    </form>
</div>
<?php require __DIR__ . '/common-js.php'; ?>
<?php require __DIR__ . '/footer.php'; ?>
