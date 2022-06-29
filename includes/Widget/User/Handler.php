<?php

namespace Itell\Widget\User;

use Itell\Widget\Base\User;
use Itell\Widget\ActionInterface;

/**
 * 用户处理组件
 */
class Handler extends User implements ActionInterface
{
    public function action()
    {
        $this->on($this->request->is('activate'))->activate($this->request->activate);
    }
}
