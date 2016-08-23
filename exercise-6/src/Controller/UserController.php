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
            if (empty($user)){
                $result = array('status' => 'fail');
                 
            } else {
                $result = array('status' => 'success');
            }
            echo json_encode($result);            
        } else {
            $result = $this->render('add-view.html.twig');
            echo $result;
        }
    }

    public function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->getUserService()->updateUser($_POST['id'], $_POST);
            if (empty($user)){
                $result = array('status' => 'fail');
            } else {
                $result = array('status' => 'success');
            }
            echo json_encode($result);  
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
        if (empty($user)){
            $result = array('status' => 'fail');
             
        } else {
            $result = array('status' => 'success');
        }
        echo json_encode($result);
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