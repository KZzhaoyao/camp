<?php
$fields = $_GET;
$userId = $fields['id'];
include "UserManager.php";
$userManager = new UserManager();
$userManager->deleteUser($userId);
?>
<!DOCTYPE html>
<html>
<head>
  <title>del-user</title>
</head>
<body>
</body>
</html>