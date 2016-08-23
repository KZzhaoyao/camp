<?php
namespace ZhaoYao\UserSystem\controllers;

use ZhaoYao\UserSystem\common\Connection;
use ZhaoYao\UserSystem\Models\UserModel;

class UserController
{
    public function listAction()
    {
        $users = $this->getUserModel()->listUsers();
        echo $this->render('list-view.html.twig', array(
            'users' => $users
        ));
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!preg_match('/^tx?/', $_POST['no'])) {
                echo '员工编号以tx开头';

                return ;
            }
            $number = substr($_POST['no'], -4);
            if (!(strlen($_POST['no']) == 6)||!is_numeric($number)) {
                echo '添加错误';

                return;
            }
            
            $users = $this->getUserModel()->listUsers();
            foreach ($users as $user) {
                if ($_POST['no'] == $user['no']) {
                    echo '员工编号不能重复';

                    return ;
                }
            }

            $this->getUserModel()->addUser($_POST);

            header('Location: index.php?action=list');
        } else {
            echo $this->render('add-view.html.twig');
        }
    }

    public function modifyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->getUserModel()->modifyUser($_POST);

            header('Location: index.php?action=list');
        } else {
            $user = $this->getUserModel()->getUserById($_GET['userId']);

            echo $this->render('edit-view.html.twig', array(
                'user' => $user)
            );
        }
    }

    public function delAction()
    {
        $this->getUserModel()->deleteUser($_GET['userId']);
        
        header('Location: index.php?action=list');
    }

    protected function getUserModel()
    {
        $pdo = new Connection();
        $userModel = new UserModel($pdo);

        return $userModel;
    }

    protected function render($template, $parameter = array())
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../Views');
        $twig = new \Twig_Environment($loader,array());

        return $twig->render($template, $parameter);
    }
}