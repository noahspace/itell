<?php

namespace Itell\Widget;

use Itell\Widget\Base\Base;

/**
 * 系统选项
 */
class Option extends Base
{
    // public $routingTable = [
    //     [
    //         'regx' => '/^[\/]?$/',
    //         'widget' => '\Itell\Widget\Index',
    //         'action' => 'render',
    //     ],
    //     [
    //         'regx' => '/^\/action\/([_0-9a-zA-Z-]+)[\/]?$/',
    //         'widget' => '\Itell\Widget\Action',
    //         'params' => ['action'],
    //     ],
    // ];

    public function execute()
    {
        // 压入配置
        $options = $this->db->select('options', '*');
        foreach ($options as $option) {
            $this->{$option['name']} = $option['value'];
        }

        // 路由表反序列化
        $this->routingTable = unserialize($this->routingTable) ?: [];

        // 激活主题反序列化
        $this->theme = unserialize($this->theme) ?: ['activated' => 'itell', 'config' => []] ?: [];

        // 激活插件反序列化
        $this->plugins = unserialize($this->plugins) ?: [];
    }

    /**
     * 获取插件配置
     */
    public function plugin($pluginName)
    {
        return $this->plugins[$pluginName]['config'];
    }

    /**
     * 获取主题配置
     */
    public function theme($key)
    {
        return $this->theme['config'][$key];
    }

    /**
     * 获取主题根路径
     */
    public function ___themeRootDir()
    {
        return ITELL_ROOT_PATH . 'content/themes/';
    }

    /**
     * 获取当前主题路径
     */
    public function ___themeDir()
    {
        return $this->themeRootDir . $this->theme['activated'] . '/';
    }

    /**
     * 获取站点地址
     *
     * @param $uri URI 字符串
     */
    public function siteUrl($uri = '')
    {
        return $this->request->getUrlPrefix() . ($this->rewrite === '0' ? '/index.php' : '') . rtrim('/' . trim($uri, '/'), '/');
    }

    /**
     * 获取后台站点地址
     *
     * @param $uri URI 字符串
     */
    public function adminUrl($uri = 'index.php')
    {
        return $this->request->getUrlPrefix() . '/admin' . rtrim('/' . trim($uri, '/'), '/');
    }
}
