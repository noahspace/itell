<?php

namespace Itell\Widget;

use Itell\Widget;

/**
 * 执行组件
 */
class Action extends Widget
{
    /**
     * 路由映射
     */
    private $map = [
        'user-handler' => '\Itell\Widget\User\Handler',
        'plugin-handler' => '\Itell\Widget\Plugin\Handler',
        'theme-handler' => '\Itell\Widget\Theme\Handler',
    ];

    public function execute()
    {
        $action = $this->params['action'];

        if (isset($this->map[$action])) {
            $widget = self::factory($this->map[$action]);
            // 实现该接口的类调用 action 方法
            if ($widget instanceof ActionInterface) {
                $widget->action();
            }
        }
    }
}
