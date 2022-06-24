<?php

namespace Itell\Widget\Plugin;

use Itell\Helper\SystemFile;
use Itell\Widget;

/**
 * 插件列表组件
 */
class Rows extends Widget
{
    public function execute()
    {
        // 获取全部插件信息
        $plugins = SystemFile::getInstance()->getPlugins();

        if ($this->request && $this->request->status === 'activated') {
            // 已启用插件
            foreach ($plugins as $plugin) {
                if ($plugin['is_activated']) {
                    $this->push($plugin);
                }
            }
        } else {
            // 全部插件
            $this->stack = $plugins;
        }
    }
}
