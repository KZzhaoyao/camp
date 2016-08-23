<?php
namespace ZhaoYao\UserSystem\Service\Impl;

use ZhaoYao\UserSystem\Common\ArrayToolkit;
use ZhaoYao\UserSystem\Service\UserService;
use ZhaoYao\UserSystem\Common\UserDaoFactory;

class UserServiceImpl implements UserService
{
    private static $instance;

    public function addUser($user)
    {
        $user = ArrayToolkit::parts($user, array('no', 'name', 'sex', 'age', 'about'));
        $message = $this->validateUser($user);
        if ($message == 'true') {
            return $this->getUserDao()->addUser($user);
        } else {
            throw new \Exception($message);
        }
    }

    public function updateUser($id, $user)
    {
        unset($user['id']);
        return $this->getUserDao()->updateUser($id, $user);
    }

    public function deleteUser($id)
    {
        return $this->getUserDao()->deleteUser($id);
    }

    public function getUser($id)
    {
        return $this->getUserDao()->getUser($id);
    }

    public function findUsers()
    {
        return $this->getUserDao()->findUsers();
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
        
        $users = $this->getUserDao()->findUsers();
        foreach ($users as $user) {
            if ($_POST['no'] == $user['no']) {
                $message = '员工编号不能重复';

                return $message;
            }
        }
        return true;
    }

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    protected function getUserDao()
    {
        $config = include 'config/config.php';

        $class = "ZhaoYao\\UserSystem\\Common\\".ucfirst($config['type']);
        $userDaoFactory = new $class();

        return $userDaoFactory->createUserDao();

        // return UserDaoFactory::createUserDao($config['type']);
    }
}