<?php

namespace Itell\Widget\Plugin;

use Itell\Helper\Renderer;
use Itell\Plugin;
use Itell\Widget\Base\Option;
use Itell\Widget\Option as WidgetOption;
use Exception;

/**
 * 插件配置组件
 */
class Config extends Option
{
    public function execute()
    {
        // 插件名称
        $pluginName = $this->request->config;

        // 已启用插件
        $activatedPlugins = Plugin::export();

        if (!isset($activatedPlugins[$pluginName])) {
            throw new Exception('插件未启用', 500);
        }

        // 判断插件是否具备配置功能
        if (empty($activatedPlugins[$pluginName]['config'])) {
            throw new Exception('配置功能不存在', 404);
        }

        $renderer = new Renderer();
        call_user_func([$activatedPlugins[$pluginName]['class_name'], 'config'], $renderer);
        $renderer->render($activatedPlugins[$pluginName]['config']);
    }
}
