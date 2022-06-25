<?php

namespace Itell;

class Response
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
     * 返回
     */
    public function back()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    // 重定向
    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}
