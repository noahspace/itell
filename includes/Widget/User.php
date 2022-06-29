<?php

namespace Itell\Widget;

use Itell\Widget\Base\User as BaseUser;

class User extends BaseUser
{
    /**
     * 是否已登录
     */
    private $hasLogin = null;

    /**
     * 执行函数
     */
    public function execute()
    {
    }

    /**
     * 验证是否登录
     */
    public function hasLogin()
    {
        if ($this->hasLogin !== null) {
            return $this->hasLogin;
        } else {
        }
    }

    /**
     * 用户登出函数
     */
    public function logout()
    {
    }

    /**
     * 用户登录函数
     */
    public function login()
    {
    }

    /**
     * 判断用户是否具备某角色权限
     *
     * @param string $group 用户组
     */
    public function pass($group)
    {
    }
}
