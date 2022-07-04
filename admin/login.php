<?php require __DIR__ . '/common.php'; ?>
<?php $user->hasLogin() && $response->redirect($option->adminUrl('index.php')); ?>
<?php require __DIR__ . '/header.php'; ?>
<div class="signin">
    <form class="form-signin w-100 m-auto" action="<?= $option->siteUrl('action/user-handler?action=login') ?>" method="post">
        <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal text-center">ITELL</h1>
        <div class="form-floating">
            <input type="text" class="form-control" id="account" name="account" placeholder="请输入用户名">
            <label for="account">用户名</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
            <label for="password">密码</label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
            <label class="form-check-label" for="remember">记住密码</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">立即登录</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2022</p>
    </form>
</div>
<?php require __DIR__ . '/common-js.php'; ?>
<?php require __DIR__ . '/footer.php'; ?>
