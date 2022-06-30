<?php

namespace Itell\Widget;

use Itell\Common;
use Itell\Helper\Cookie;
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
            $uid = Cookie::get('uid');
            if ($uid !== null) {
                $user = $this->db->get('users', '*', ['uid' => $uid]);
                if (Common::hashValidate($user['token'], Cookie::get('token'))) {
                    foreach ($user as $key => $value) {
                        $this->$key = $value;
                    }
                    return $this->hasLogin = true;
                } else {
                    return $this->hasLogin = false;
                }
            }

            return $this->hasLogin = false;
        }
    }

    /**
     * 用户登出函数
     */
    public function logout()
    {
        Cookie::delete('uid');
        Cookie::delete('token');
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
