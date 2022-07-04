<?php
// 载入配置
require dirname(__DIR__) . '/config.php';

// 初始化
\Itell\Common::init();

\Itell\Widget\Option::alloc()->to($option);
\Itell\Widget\User::alloc()->to($user);

$request = $option->request;
$response = $option->response;
