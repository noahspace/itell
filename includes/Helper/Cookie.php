<?php

namespace Itell\Helper;

use Itell\Response;

class Cookie
{
    /**
     * 前缀
     */
    private static $prefix = '';

    /**
     * 路径
     */
    private static $path = '/';

    /**
     * 域
     */
    private static $domain = '';

    private static $secure = false;

    private static $httponly = false;

    /**
     * 设置前缀
     *
     * @param string $url
     */
    public static function setPrefix($url)
    {
        self::$prefix = md5($url);
        self::$domain = parse_url($url)['host'];
    }

    /**
     * 设置额外选项
     *
     * @param array $options
     */
    public static function setOptions($options)
    {
        self::$secure = $options['secure'] ? $options['secure'] : false;
        self::$httponly = $options['httponly'] ? $options['httponly'] : false;
    }

    /**
     * 获取指定的 cookie
     *
     * @param string $key 指定的键
     * @param string|null $default 默认的值
     */
    public static function get($key, $default = null)
    {
        $key = self::$prefix . $key;
        $value = $_COOKIE[$key] ?? $default;
        return is_array($value) ? $default : $value;
    }

    /**
     * 设置指定的 cookie
     *
     * @param string $key 指定的键
     * @param mixed $value 设置的值
     * @param integer $expire （秒）过期时间，默认为 0，表示随会话时间结束
     */
    public static function set($key, $value, $timeout = 0)
    {
        $key = self::$prefix . $key;
        $_COOKIE[$key] = $value;
        Response::getInstance()->setCookie($key, $value, $timeout, self::$path, self::$domain, self::$secure, self::$httponly);
    }

    /**
     * 删除指定的 cookie
     *
     * @param string $key 指定的键
     */
    public static function delete($key)
    {
        $key = self::$prefix . $key;
        Response::getInstance()->setCookie($key, '', -1, self::$path, self::$domain, self::$secure, self::$httponly);
        unset($_COOKIE[$key]);
    }
}
