<?php

namespace Itell\Widget\Base;

/**
 * 用户抽象组件
 */
abstract class User extends Base
{
    /**
     * 判断用户名称是否存在
     *
     * @param string $name 用户名称
     */
    public function nameExists($name)
    {
        $select = $this->db->select()
            ->from('table.users')
            ->where('name = ?', $name)
            ->limit(1);

        if ($this->request->uid) {
            $select->where('uid <> ?', $this->request->uid);
        }

        $user = $this->db->fetchRow($select);
        return !$user;
    }

    /**
     * 判断电子邮件是否存在
     *
     * @param string $mail 电子邮件
     */
    public function mailExists($mail)
    {
        $select = $this->db->select()
            ->from('table.users')
            ->where('mail = ?', $mail)
            ->limit(1);

        if ($this->request->uid) {
            $select->where('uid <> ?', $this->request->uid);
        }

        $user = $this->db->fetchRow($select);
        return !$user;
    }

    /**
     * 判断用户昵称是否存在
     *
     * @param string $screenName 昵称
     */
    public function screenNameExists($screenName)
    {
        $select = $this->db->select()
            ->from('table.users')
            ->where('screenName = ?', $screenName)
            ->limit(1);

        if ($this->request->uid) {
            $select->where('uid <> ?', $this->request->uid);
        }

        $user = $this->db->fetchRow($select);
        return !$user;
    }
}
