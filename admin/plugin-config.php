<?php require __DIR__ . '/common.php'; ?>
<?php require __DIR__ . '/header.php'; ?>
<?php require __DIR__ . '/navbar.php'; ?>
<div class="itell-main">
    <?php require __DIR__ . '/menu.php'; ?>
    <div class="itell-content-wrap">
        <h2 class="itell-page-title">插件 / 设置</h2>
        <?php Itell\Widget\Plugin\Config::alloc(); ?>
    </div>
</div>
<?php require __DIR__ . '/common-js.php'; ?>
<?php require __DIR__ . '/footer.php'; ?>
