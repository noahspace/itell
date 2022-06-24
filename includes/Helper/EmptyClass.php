<?php

namespace Itell\Helper;

/**
 * 创建一个空对象
 */
class EmptyClass
{
    /**
     * 单例实例
     */
    private static $instance;

    /**
     * 获取单例实例
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 调用方法直接返回
     */
    function __call($name, $arguments)
    {
    }
}
