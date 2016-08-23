<?php
namespace ZhaoYao\UserSystem\controller;

use ZhaoYao\UserSystem\common\Connection;
use ZhaoYao\UserSystem\Service\UserService;

class UserController
{
    public function listAction()
    {
        $users = $this->getUserService()->findUsers();
        echo $this->render('list-view.html.twig', array(
            'users' => $users
        ));
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->getUserService()->addUser($_POST);
            header('Location: index.php?action=list');
        } else {
            echo $this->render('add-view.html.twig');
        }
    }

    public function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->getUserService()->updateUser($_POST['id'], $_POST);

            header('Location: index.php?action=list');
        } else {
            $user = $this->getUserService()->getUser($_GET['userId']);

            echo $this->render('edit-view.html.twig', array(
                'user' => $user
            ));
        }
    }

    public function deleteAction()
    {
        $user = $this->getUserService()->deleteUser($_GET['userId']);
    }

    protected function getUserService()
    {
        $userService = new UserService();

        return $userService;
    }

    protected function render($template, $parameter = array())
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../Views');
        $twig = new \Twig_Environment($loader, array());

        return $twig->render($template, $parameter);
    }
}