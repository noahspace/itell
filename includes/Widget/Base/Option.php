<?php

namespace Itell\Widget\Base;

/**
 * 选项抽象组件
 */
abstract class Option extends Base
{
    /**
     * 更新插件
     */
    public function updatePlugin($pluginOption)
    {
        $this->db->update('options', ['value' => serialize($pluginOption)], ['name' => 'plugins']);
    }

    /**
     * 更新主题
     */
    public function updateTheme($themeOption)
    {
        $this->db->update('options', ['value' => $themeOption], ['name' => 'theme']);
    }
}
