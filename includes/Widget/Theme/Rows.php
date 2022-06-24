<?php

namespace Itell\Widget\Theme;

use Itell\Helper\SystemFile;
use Itell\Widget;

/**
 * 主题列表组件
 */
class Rows extends Widget
{
    /**
     * 主题列表
     */
    public function execute()
    {
        $themes = SystemFile::getInstance()->getThemes();

        foreach ($themes as $theme) {
            $this->push($theme);
        }
    }
}
