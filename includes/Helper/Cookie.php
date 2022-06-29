<?php

namespace Itell\Helper;

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
}
