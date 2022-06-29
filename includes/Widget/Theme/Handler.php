<?php

namespace Itell\Widget\Theme;

use Itell\Widget\Base\Option;
use Itell\Widget\ActionInterface;
use Itell\Widget\Option as WidgetOption;
use Itell\Helper\Renderer;
use Exception;

/**
 * 主题处理组件
 */
class Handler extends Option implements ActionInterface
{
    /**
     * 启用插件
     */
    private function activate($themeName)
    {
        // 已启用主题
        $theme = WidgetOption::alloc()->theme['activated'];
        if ($themeName === $theme) {
            throw new Exception('不能重复启用主题', 500);
        }

        // 获取主题配置
        $themeConfig = [];
        $themeFunctionsFile = WidgetOption::alloc()->themeRootDir . $themeName . '/' . 'functions.php';
        if (file_exists($themeFunctionsFile)) {
            require $themeFunctionsFile;
            if (function_exists('theme_config')) {
                $renderer = new Renderer();
                theme_config($renderer);
                $themeConfig = $renderer->getData();
            }
        }

        $themeOption = [
            'activated' => $themeName,
            'config' => $themeConfig,
        ];
        $this->updateTheme($themeOption);

        // 重定向
        $this->response->back();
    }

    /**
     * 更新主题配置
     */
    private function config($themeName)
    {
        // 已启用主题
        $activatedTheme = WidgetOption::alloc()->theme;

        // 判断组件是否已启用
        if ($themeName !== $activatedTheme['activated']) {
            throw new Exception('主题未启用', 500);
        }

        // 主题配置项
        $themeConfig = [];
        // 更新插件配置
        foreach ($this->request->getPost() as $key => $value) {
            $themeConfig[$key] = $value;
        }
        // 重新插入插件
        $activatedTheme['config'] = $themeConfig;

        // 提交修改
        $this->updateTheme($activatedTheme);

        // 重定向
        $this->response->redirect(WidgetOption::alloc()->adminUrl('theme.php'));
    }

    public function action()
    {
        // 启用主题
        $this->on($this->request->is('activate'))->activate($this->request->activate);

        // 修改主题
        $this->on($this->request->is('config'))->config($this->request->config);
    }
}
