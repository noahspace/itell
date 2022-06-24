<?php

namespace Itell\Widget;

use Itell\Widget;

/**
 * 入口组件
 */
class Index extends Widget
{
    /**
     * 模版渲染
     */
    public function render()
    {
        include Option::alloc()->themeDir . 'index.php';
    }

    /**
     * 获取主题文件
     *
     * @param string $fileName 主题文件名称
     */
    public function need($fileName)
    {
        include Option::alloc()->themeDir . $fileName;
    }
}
