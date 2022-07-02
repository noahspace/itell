<?php
if (!defined('ITELL_ROOT_PATH')) exit;

function theme_config($renderer)
{
    $renderer->setValues([
        'val1' => '默认值1',
        'val2' => '默认值2',
    ]);
    $renderer->setTemplate(function ($data) {
        include __DIR__ . '/config-template.php';
    });
}
