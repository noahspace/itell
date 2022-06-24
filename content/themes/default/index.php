<?php

/**
 * name: default
 * url: http://test.io/
 * description: 默认主题
 * version: 1.0.0
 * author: Noah Zhang
 * author_url: http://test.io/
 */

use Itell\Widget\Option;

$this->need('header.php');
?>
<div class="main">
    <a href="<?= Option::alloc()->adminUrl() ?>">后台首页</a>
</div>

<!-- 插件钩子 -->
<?php \Itell\Plugin::factory('index.php')->main(); ?>
<?php $this->need('footer.php'); ?>
