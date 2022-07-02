<?php
require __DIR__ . '/common.php';
require __DIR__ . '/header.php';
require __DIR__ . '/navbar.php';

if (!$user->hasLogin()) {
    $response->redirect($option->adminUrl('login.php'));
}
?>
<div class="itell-wrap">
    <?php require __DIR__ . '/menu.php'; ?>
</div>
<?php require __DIR__ . '/footer.php'; ?>
