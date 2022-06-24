<?php
// 根路径
define('ITELL_ROOT_PATH', __DIR__ . '/');

// 调试模式
define('DEBUG', true);

// 数据库配置
define('DB_CONFIG', [
    // [必填]
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'itell',
    'username' => 'root',
    'password' => 'root',

    // [可选]
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'port' => 3306,

    // [可选] 表前缀
    'prefix' => '',
]);

// 加载公共类
require ITELL_ROOT_PATH . 'includes/Common.php';

// 初始化
\Itell\Common::init();
