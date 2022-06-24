<?php

namespace Itell\Widget\Theme;

use Itell\Helper\Renderer;
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
        // 主题名称
        $themeName = $this->request->config;

        // 已启用主题
        $activatedTheme = WidgetOption::alloc()->theme;

        if ($themeName !== $activatedTheme['activated']) {
            throw new Exception('主题未启用', 500);
        }

        // 判断插件是否具备配置功能
        if (empty($activatedTheme['config'])) {
            throw new Exception('配置功能不存在', 404);
        }

        require WidgetOption::alloc()->themeDir . 'functions.php';
        $renderer = new Renderer();
        theme_config($renderer);
        $renderer->render($activatedTheme['config']);
    }
}
