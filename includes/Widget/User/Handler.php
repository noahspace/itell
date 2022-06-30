<?php

namespace Itell\Widget\User;

use Itell\Common;
use Itell\Helper\Cookie;
use Itell\Widget\Base\User;
use Itell\Widget\ActionInterface;
use Itell\Widget\Option;
use Itell\Widget\User as WidgetUser;

/**
 * 用户处理组件
 */
class Handler extends User implements ActionInterface
{
    /**
     * 用户登录
     */
    public function login()
    {
        $user = $this->db->get('users', '*', [
            'OR' => [
                'username' => $this->request->account,
                "email" => $this->request->account,
            ],
        ]);

        if (!empty($user) && Common::hashValidate($this->request->password, $user['password'])) {
            // 生成 token
            $token = Common::randString(32);
            $tokenHash = Common::hash($token);
            $this->db->update('users', ['token' => $token], ['uid' => $user['uid']]);

            Cookie::set('uid', $user['uid']);
            Cookie::set('token', $tokenHash);
            $this->response->redirect(Option::alloc()->adminUrl('index.php'));
        } else {
            Cookie::set('notice', '用户名或密码错误');
            $this->response->redirect(Option::alloc()->adminUrl('login.php'));
        }
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        WidgetUser::alloc()->logout();
        $this->response->redirect(Option::alloc()->adminUrl('login.php'));
    }

    public function action()
    {
        // 用户登录
        $this->on($this->request->is('action=login'))->login();

        // 退出登录
        $this->on($this->request->is('action=logout'))->logout();
    }
}
