<?php

namespace Itell;

class Router
{
    /**
     * 路由表
     */
    private static $routingTable = [];

    /**
     * 请求分发
     */
    public static function dispatch()
    {
        $pathInfo = Request::getInstance()->getPathInfo();

        // 路由解析
        foreach (self::$routingTable as $route) {
            if (preg_match($route['regx'], $pathInfo, $matches)) {
                $params = null;
                // 解析参数
                if (!empty($route['params'])) {
                    unset($matches[0]);
                    $params = array_combine($route['params'], $matches);
                }

                // 实例化组件
                $widget = Widget::factory($route['widget'], $params);

                // 执行组件方法
                if (isset($route['action'])) {
                    $widget->{$route['action']}();
                }
            }
        }
    }

    /**
     * 设置路由器配置
     *
     * @param array $routes 配置信息
     */
    public static function setRoutes($routes)
    {
        self::$routingTable = $routes;
    }
}
