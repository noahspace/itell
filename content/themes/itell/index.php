<?php

/**
 * name: itell 主题
 * url: http://test.io/
 * description: 这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档这是一款测试主题，带有中文翻译，支持文档
 * version: 1.0.0
 * author: Noah Zhang
 * author_url: http://test.io/
 */
$this->need('header.php');
?>
<div class="main">
    这是自定义主题
</div>

<!-- 插件钩子 -->
<?php \Itell\Plugin::factory('admin/menu.php')->navBar(); ?>
<?php $this->need('footer.php'); ?>
