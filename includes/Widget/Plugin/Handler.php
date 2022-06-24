<?php

namespace Itell\Widget\Plugin;

use Itell\Helper\Renderer;
use Itell\Plugin;
use Itell\Widget\ActionInterface;
use Itell\Widget\Base\Option;
use Itell\Widget\Option as WidgetOption;
use Exception;

/**
 * 插件处理组件
 */
class Handler extends Option implements ActionInterface
{
    /**
     * 启用插件
     */
    public function activate($pluginName)
    {
        // 已启用插件
        $plugins = WidgetOption::alloc()->plugins;

        // 判断组件是否已启用
        if (array_key_exists($pluginName, $plugins)) {
            throw new Exception('不能重复启用插件', 500);
        }

        // 判断插件是否存在异常
        $className = 'Content\Plugins\\' . $pluginName . '\Plugin';
        if (!class_exists($className) || !method_exists($className, 'activate')) {
            throw new Exception('无法启用插件', 500);
        }

        // 获取插件配置
        $renderer = new Renderer();
        call_user_func([$className, 'config'], $renderer);
        $pluginConfig = $renderer->getData();

        // 获取插件选项
        call_user_func([$className, 'activate']);
        Plugin::activate($pluginName, $pluginConfig);

        // 提交修改
        $pluginOption = Plugin::export();
        $this->updatePlugin($pluginOption);

        // 重定向
        $this->response->back();
    }

    /**
     * 停用插件
     */
    public function deactivate($pluginName)
    {
        // 已启用插件
        $plugins = WidgetOption::alloc()->plugins;

        // 判断组件是否已停用
        if (!isset($plugins[$pluginName])) {
            throw new Exception('不能重复停用插件', 500);
        }

        // 判断插件是否存在异常
        $className = $plugins[$pluginName]['class_name'];
        if (!class_exists($className) || !method_exists($className, 'activate')) {
            throw new Exception('无法停用插件', 500);
        }

        // 获取插件选项
        call_user_func([$className, 'deactivate']);
        Plugin::deactivate($pluginName);

        // 提交修改
        $pluginOption = Plugin::export();
        $this->updatePlugin($pluginOption);

        // 重定向
        $this->response->back();
    }

    /**
     * 更新插件配置
     */
    public function config($pluginName)
    {
        // 已启用插件
        $plugins = WidgetOption::alloc()->plugins;

        // 判断组件是否已启用
        if (!isset($plugins[$pluginName])) {
            throw new Exception('插件未启用', 500);
        }

        // 插件配置项
        $pluginConfig = $plugins[$pluginName]['config'];

        // 更新插件配置
        foreach ($this->request->getPost() as $key => $value) {
            if (isset($pluginConfig[$key])) {
                $pluginConfig[$key] = $value;
            }
        }

        // 重新插入插件
        $plugins[$pluginName]['config'] = $pluginConfig;

        // 提交修改
        $this->updatePlugin($plugins);

        // 重定向
        $this->response->back();
    }

    public function action()
    {
        // 启用插件
        $this->on($this->request->is('activate'))->activate($this->request->activate);

        // 停用插件
        $this->on($this->request->is('deactivate'))->deactivate($this->request->deactivate);

        // 修改配置
        $this->on($this->request->is('config'))->config($this->request->config);
    }
}
