<?php
require __DIR__ . '/common.php';
require __DIR__ . '/header.php';
?>
<div class="container">
    <h2 class="itell-title">主题配置</h2>
    <?php Itell\Widget\Theme\Config::alloc(); ?>
</div>
<?php require __DIR__ . '/footer.php'; ?>
