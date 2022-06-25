<?php

/**
 * name: HelloWorld1
 * url: http://test.io/
 * description: 这是一个测试插件
 * version: 1.0.0
 * author: Noah Zhang
 * author_url: http://test.io/
 */

namespace Content\Plugins\HelloWorld1;

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
        ItellPlugin::factory('admin/header.php')->brief = __CLASS__ . '::render';
        ItellPlugin::factory('index.php')->main =  __CLASS__ . '::main';
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

    public static function main()
    {
    }
}
