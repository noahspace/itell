<?php
// 载入配置
require dirname(__DIR__) . '/config.php';

\Itell\Widget\Option::alloc()->to($option);
\Itell\Widget\User::alloc()->to($user);

$request = $option->request;
$response = $option->response;
