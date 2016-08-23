<?php
namespace ZhaoYao\UserSystem\Service;

use ZhaoYao\UserSystem\Service\Impl\UserServiceImpl;
use ZhaoYao\UserSystem\Dao\Impl\UserDatabaseDaoImpl;
use ZhaoYao\UserSystem\Common\DaoHelper;
use ZhaoYao\UserSystem\Common\Connection;


class UserServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testAddUser()
    {
        $user = array(
            'no' => 'tx0007',
            'name' => 'zhaoyao',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd'
        );
        $add = $this->getUserService()->addUser($user);
        $this->assertEquals($user['no'], $add['no']);
        $this->assertEquals($user['name'], $add['name']);
        $this->assertEquals($user['sex'], $add['sex']);
        $this->assertEquals($user['age'], $add['age']);
        $this->assertEquals($user['about'], $add['about']);

        $result = $this->getUserService()->deleteUser($add['id']);
    }

    /**
    *@expectedException \Exception
    */
    public function testAddUserWithNoSame()
    {
        $user = array(
            'no' => 'tx0105',
            'name' => 'zhaoyao',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd'
        );
        $add = $this->getUserService()->addUser($user);
        $this->assertEquals(array(),$add);

    }

    public function testUpdateUser()
    {
        $user1 = array(
            'no' => 'tx0007',
            'name' => 'zhaoyao',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd'
        );
        $user2 = array(
            'name' => 'zhaoyao1',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd1'
        );
        $add = $this->getUserService()->addUser($user1);         
        $updateUser = $this->getUserService()->updateUser($add['id'], $user2);

        $this->assertEquals($user2['name'], $updateUser['name']);
        $this->assertEquals($user2['sex'], $updateUser['sex']);
        $this->assertEquals($user2['age'], $updateUser['age']);
        $this->assertEquals($user2['about'], $updateUser['about']);

        $result = $this->getUserService()->deleteUser($add['id']);
    }

    public function testDeleteUser()
    {
        $user = array(
            'no' => 'tx0007',
            'name' => 'zhaoyao',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd'
        );
        $add = $this->getUserService()->addUser($user);
        $result = $this->getUserService()->deleteUser($add['id']);
        $this->assertEquals(true, $result);
    }

    public function testGetUser()
    {
        $user = array(
            'no' => 'tx0007',
            'name' => 'zhaoyao',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd'
        );
        $add = $this->getUserService()->addUser($user);
        $result = $this->getUserService()->getUser($add['id']);
        $this->assertTrue($result != false);       
        $result = $this->getUserService()->deleteUser($add['id']); 
    }

    public function testFindUsers()
    {
        $user1 = array(
            'no' => 'tx0007',
            'name' => 'zhaoyao',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd'
        );
        $user2 = array(
            'no' => 'tx0123',
            'name' => 'zhaoyao',
            'sex' => 'nan',
            'age' => 18,
            'about' => 'abcd'            
        );
        $add1 = $this->getUserService()->addUser($user1);
        $add2 = $this->getUserService()->addUser($user2);
        $users = $this->getUserService()->findUsers();  
        $this->assertEquals(3, count($users));
        $result = $this->getUserService()->deleteUser($add1['id']);   
        $result = $this->getUserService()->deleteUser($add2['id']);  
    }

    public function getUserService()
    {
        return new UserServiceImpl(new UserDatabaseDaoImpl(new DaoHelper(new Connection())));
    }
}