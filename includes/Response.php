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

    /**
     * 重定向
     *
     * @param string $url 重定向地址
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
    }

    /**
     * 设置指定的 cookie 值
     *
     * @param string $key 指定的键
     * @param mixed $value 设置的值
     * @param integer $timeout 过期时间，默认为 0，表示随会话时间结束
     * @param string $path 路径信息
     * @param string|null $domain 域名信息
     * @param bool $secure 是否仅可通过安全的 HTTPS 连接传给客户端
     * @param bool $httponly 是否仅可通过 HTTP 协议访问
     */
    public function setCookie($key, $value, $timeout = 0, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        setrawcookie($key, rawurlencode($value), $timeout, $path, $domain, $secure, $httponly);
        return $this;
    }
}
