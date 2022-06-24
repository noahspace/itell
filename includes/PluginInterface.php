<?php

namespace Itell;

/**
 * 插件接口
 */
interface PluginInterface
{
    /**
     * 启用插件方法
     */
    public static function activate();

    /**
     * 禁用插件方法
     */
    public static function deactivate();

    /**
     * 插件配置面板
     */
    public static function config($renderer);
}
