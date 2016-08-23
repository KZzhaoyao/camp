<?php
namespace ZhaoYao\UserSystem\controller;

class UserController
{
    private $container;

    function __construct($container)
    {
        $this->container = $container;
    }

    public function listAction()
    {
        $users = $this->container->UserService->findUsers();
        echo $this->render('list-view.html.twig', array(
            'users' => $users
        ));
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->container->UserService->addUser($_POST);
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
            $user = $this->container->UserService->updateUser($_POST['id'], $_POST);
            if (empty($user)){
                $result = array('status' => 'fail');
            } else {
                $result = array('status' => 'success');
            }
            echo json_encode($result);  
        } else {
            $user = $this->container->UserService->getUser($_GET['userId']);

            echo $this->render('edit-view.html.twig', array(
                'user' => $user
            ));
        }
    }

    public function deleteAction()
    {
        $user = $this->container->UserService->deleteUser($_GET['userId']);
        if (empty($user)){
            $result = array('status' => 'fail');
             
        } else {
            $result = array('status' => 'success');
        }
        echo json_encode($result);
    }

    protected function render($template, $parameter = array())
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../Views');
        $twig = new \Twig_Environment($loader, array());

        return $twig->render($template, $parameter);
    }
}