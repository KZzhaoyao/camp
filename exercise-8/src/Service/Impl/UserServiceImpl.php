<?php
namespace ZhaoYao\UserSystem\Service\Impl;

use ZhaoYao\UserSystem\Common\ArrayToolkit;
use ZhaoYao\UserSystem\Service\UserService;

class UserServiceImpl implements UserService
{
    private $container;

    function __construct($container)
    {
        $this->container = $container;
    }

    public function addUser($user)
    {
        $user = ArrayToolkit::parts($user, array('no', 'name', 'sex', 'age', 'about'));
        $message = $this->validateUser($user);
        if ($message == 'true') {
            return $this->container->addUser($user);
        } else {
            throw new \Exception($message);
        }
    }

    public function updateUser($id, $user)
    {
        unset($user['id']);
        return $this->container->updateUser($id, $user);
    }

    public function deleteUser($id)
    {
        return $this->container->deleteUser($id);
    }

    public function getUser($id)
    {
        return $this->container->getUser($id);
    }

    public function findUsers()
    {
        return $this->container->findUsers();
    }

    private function validateUser($user)
    {
        if (!preg_match('/^tx?/', $_POST['no'])) {
            $message = '员工编号以tx开头';

            return $message;
        }
        $number = substr($_POST['no'], -4);
        if (!(strlen($_POST['no']) == 6)||!is_numeric($number)) {
            $message = '员工编号共6个字符且后四位必须为数字';

            return $message;
        }
        
        $users = $this->container->findUsers();
        foreach ($users as $user) {
            if ($_POST['no'] == $user['no']) {
                $message = '员工编号不能重复';

                return $message;
            }
        }
        return true;
    }
}