<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{  
    public function indexAction(Request $request)
    {
        $users = $this->getUserservice()->findUsers();

        return $this->render('AppBundle:Default:index.html.twig', array(
            'users' => $users
        ));
    }

    public function addAction(Request $request)
    {
        if ('POST' == $request->getMethod()) {
            $connection = $request->request->all();
            
            $user = $this->getUserservice()->addUser($connection);
            if (empty($user)){
                throw new \Exception("添加信息有误");
            } else {
            return $this->render('AppBundle:Default:add-view-tr.html.twig',array(
                'user' => $user
            ));           
            }
        } else {
            $result = $this->render('AppBundle:Default:add-view.html.twig');

            return $result;
        }
    }

    public function updateAction(Request $request, $id)
    {
        if ('POST' == $request->getMethod()) {
            $connection = $request->request->all();
            $user = $this->getUserservice()->updateUser($connection['id'], $connection);
            if (empty($user)){
                throw new \Exception("Error Processing Request", 1);
                
            } else {
            return $this->render('AppBundle:Default:add-view-tr.html.twig',array(
                'user' => $user
            ));
            }
        } else {
            $user = $this->getUserservice()->getUser($id);

            $result = $this->render('AppBundle:Default:edit-view.html.twig', array(
                'user' => $user
            ));
            return $result;
        }
    }

    public function deleteAction(Request $request, $id)
    {
        $user = $this->getUserservice()->deleteUser($id);
        if (empty($user)){
            $result = array('status' => 'fail');
             
        } else {
            $result = array('status' => 'success');
        }
        return new JsonResponse($result); 
    }

    public function getUserservice()
    {
        return \Container::getInstance()->UserService;
    }
}