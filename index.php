<?php
// 载入配置
require  __DIR__ . '/config.php';

// 初始化
\Itell\Common::init();

// 注册一个开始插件
\Itell\Plugin::factory('index.php')->begin();

// 路由分发
\Itell\Router::dispatch();

// 注册一个结束插槽
\Itell\Plugin::factory('index.php')->end();
