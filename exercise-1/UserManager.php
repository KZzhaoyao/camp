<?php
class UserManager
{
  public function listUsers()
  {
    $data = file_get_contents("user.txt");
    $rows = explode("\n", $data);

    $users = array();
    foreach ($rows as $row) {
      $user = explode("|", $row);
      $users[] = array(
        "id" => $user[0],
        "name" => $user[1],
        "sex" => $user[2],
        "age" => $user[3],
        "about" => $user[4],
      );
    }
    return $users;
  }

  public function getUserById($userId)
  {
    $users = $this->listUsers();
    $modifyUser = array();
    foreach ($users as $user) {
      if ($user['id']==$userId) {
    return $user;
      }
    }
    return null;
  }

  public function deleteUser($userId)
  {
    $users = $this->listUsers();
    foreach ($users as &$user) {
      if ($user['id'] == $userId) {
    unset($user);
      }
    }
    $this->saveUserToFile($users);  

  }

  public function modifyUser($fields)
  {
    $users = $this->listUsers();
    foreach ($users as &$user) {
      if ($user['id'] == $fields['id']) {
        $user['name'] = $fields['name'];
        $user['sex'] = $fields['sex'];
        $user['age'] = $fields['age'];
        $user['about'] = $fields['about'];
      }
    }
    $this->saveUserToFile($users);    
  }

  public function addUser($addUser)
  {
    $users = $this->listUsers();
    $addUser['id'] = count($users)+1;
    $users[] = array(
      "id" => count($users)+1,
      "name" => $addUser['name'],
      "sex" => $addUser['sex'],
      "age" => $addUser['age'],
      "about" => $addUser['about'],
    );
    $this->saveUserToFile($users);
  }

  public function saveUserToFile($users)
  {
    $userId = 1;
    foreach ($users as &$user) {
      $user['id'] = $userId;
      $userId++;
      $user = implode('|', $user);
    }
    $users = implode("\n", $users);   
    file_put_contents("user.txt", $users);
  }
}

?>
