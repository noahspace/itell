<?php
require __DIR__ . '/common.php';
require __DIR__ . '/header.php';
// 判断是否登录
if (!$user->hasLogin()) {
    $response->redirect($option->adminUrl('login.php'));
}
?>
<div class="container">
    <h2 class="itell-title">网站概要</h2>
</div>
<?php require __DIR__ . '/footer.php'; ?>
