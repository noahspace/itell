<?php

namespace Itell\Widget;

use Itell\Widget\Base\Base;

/**
 * 登陆组件
 */
class Login extends Base implements ActionInterface
{
    public function action()
    {
        echo 'login';
    }
}
