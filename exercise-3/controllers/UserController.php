<?php
include '../common/common.php';

$userController = new UserController();
$action = $_GET['action']."Action";

$userController->$action();

class UserController
{
    public function listAction()
    {
        $users = $this->getUserModel()->listUsers();

        include '../views/list-view.html.php';
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->getUserModel()->addUser($_POST);

            header('Location: UserController.php?action=list');
        } else {
            include '../views/add-view.html.php';
        }
    }

    public function modifyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->getUserModel()->modifyUser($user);

            header('Location: UserController.php?action=list');
        }else{
            $user = $this->getUserModel()->getUserById($_GET['userId']);

            include "../views/edit-view.html.php";
        }
    }

    public function delAction()
    {
        $this->getUserModel()->deleteUser($_GET['userId']);

        header('Location: UserController.php?action=list');
    }

    protected function getUserModel()
    {
        $pdo = new PdoUtil();
        $userModel = new UserModel($pdo);

        return $userModel;
    }
}