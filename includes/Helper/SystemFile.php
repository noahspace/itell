<?php

namespace Itell\Helper;

use Itell\Plugin as ItellPlugin;
use Itell\Widget\Option;

/**
 * 系统文件帮助类
 */
class SystemFile
{
    /**
     * 单例实例
     */
    private static $instance;

    /**
     * 全部插件信息
     */
    private $plugins;

    /**
     * 全部主题信息
     */
    private $themes;

    /**
     * 已启用插件
     */
    private $activatedPlugins;

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
     * 获取插件列表
     */
    public function getPlugins()
    {
        if (empty($this->plugins)) {
            // 已启用插件
            $this->activatedPlugins = ItellPlugin::export();
            // 插件目录列表
            $pluginsDir = glob(ITELL_ROOT_PATH . 'content/plugins/*/');

            // 插件信息
            $pluginsInfo = array_map(function ($pluginDir) {
                $pluginInfo = [];

                // 插件目录
                $pluginInfo['dir'] = basename($pluginDir);

                // 修改启用状态
                $pluginInfo['is_activated'] = in_array($pluginInfo['dir'], array_keys($this->activatedPlugins));

                // 插件是否可配置
                $pluginInfo['is_config'] = false;
                if ($pluginInfo['is_activated']) {
                    $pluginInfo['is_config'] = !empty($this->activatedPlugins[$pluginInfo['dir']]['config']);
                }

                // 判断插件是否完整
                $pluginIndexPath = $pluginDir . '/Plugin.php';
                if (file_exists($pluginIndexPath)) {
                    // 是否完整
                    $pluginInfo['is_complete'] = true;
                    $info = $this->parseHeaderInfo($pluginIndexPath);
                    $pluginInfo = array_merge($pluginInfo, $info);
                } else {
                    $pluginInfo['is_complete'] = false;
                }

                return $pluginInfo;
            }, $pluginsDir);

            $this->plugins =  $pluginsInfo;
        }

        return $this->plugins;
    }

    /**
     * 获取主题列表
     */
    public function getThemes()
    {
        if (empty($this->themes)) {
            // 已启用主题
            $this->theme = Option::alloc()->theme;
            // 主题目录列表
            $themesDir = glob(Option::alloc()->themeRootDir . '*/');

            // 主题信息
            $themesInfo = array_map(function ($themesDir) {
                $themeInfo = [];

                // 主题目录
                $themeInfo['dir'] = basename($themesDir);

                // 修改启用状态
                $themeInfo['is_activated'] = $themeInfo['dir'] === $this->theme['activated'];

                 // 主题是否可配置
                $themeInfo['is_config'] = false;
                if ($themeInfo['is_activated']) {
                    $themeInfo['is_config'] = !empty($this->theme['config']);
                }

                // 判断主题是否完整
                $themeInfo['is_complete'] = false;
                $themeIndexPath = $themesDir . '/index.php';
                if (file_exists($themeIndexPath)) {
                    // 是否完整
                    $themeInfo['is_complete'] = true;
                    $info = $this->parseHeaderInfo($themeIndexPath);
                    $themeInfo = array_merge($themeInfo, $info);
                }

                return $themeInfo;
            }, $themesDir);

            $this->themes =  $themesInfo;
        }

        return $this->themes;
    }

    /**
     * 获取文件头信息
     */
    private function parseHeaderInfo($pluginPath): array
    {
        $tokens = token_get_all(file_get_contents($pluginPath));
        $isDoc = false;
        // 初始数据
        $info = [
            'name' => '未知',
            'url' => '',
            'description' => '未知',
            'version' => '未知',
            'author' => '未知',
            'author_url' => '',
        ];

        foreach ($tokens as $token) {
            if (!$isDoc && $token[0] === T_DOC_COMMENT) {
                if (strpos($token[1], 'name')) {
                    $isDoc = true;

                    // 插件名称
                    preg_match('/name:(.*)[\\r\\n]/', $token[1], $matches);
                    $info['name'] = trim($matches[1] ?? '未知');

                    // 插件地址
                    preg_match('/url:(.*)[\\r\\n]/', $token[1], $matches);
                    $info['url'] = trim($matches[1] ?? '');

                    // 插件描述
                    preg_match('/description:(.*)[\\r\\n]/', $token[1], $matches);
                    $info['description'] = trim($matches[1] ?? '未知');

                    // 版本
                    preg_match('/version:(.*)[\\r\\n]/', $token[1], $matches);
                    $info['version'] = trim($matches[1] ?? '未知');

                    // 作者
                    preg_match('/author:(.*)[\\r\\n]/', $token[1], $matches);
                    $info['author'] = trim($matches[1] ?? '未知');

                    // 作者地址
                    preg_match('/author_url:(.*)[\\r\\n]/', $token[1], $matches);
                    $info['author_url'] = trim($matches[1] ?? '');
                }
            }
        }

        return $info;
    }
}
