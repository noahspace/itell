<?php

/**
 * name: HelloWorld
 * url: http://test.io/
 * description: 这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件这是一个测试插件
 * version: 1.0.0
 * author: Noah Zhang
 * author_url: http://test.io/
 */

namespace Content\Plugins\HelloWorld;

use Itell\Plugin as ItellPlugin;
use Itell\PluginInterface;
use Itell\Widget\Option;

class Plugin implements PluginInterface
{
    /**
     * 激活插件
     */
    public static function activate()
    {
        ItellPlugin::factory('admin/header.php')->adminHeaderUser = __CLASS__ . '::render';
    }

    /**
     * 禁用插件
     */
    public static function deactivate()
    {
    }

    /**
     * 插件配置面板
     */
    public static function config($renderer)
    {
        $renderer->setValue('value', 'Hello World!');
        $renderer->setTemplate(function ($data) {
            include __DIR__ . '/config-template.php';
        });
    }

    /**
     * 个人用户配置面板
     */
    public static function personalConfig()
    {
    }

    /**
     * 插件方法
     */
    public static function render()
    {
        include __DIR__ . '/views/index.php';
    }
}
