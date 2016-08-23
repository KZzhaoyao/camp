<?php
include "UserManager.php";
$userManager = new UserManager();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addUser = $_POST;
    $userManager->addUser($addUser);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>list-user</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>
<body>
    <h3  align="center">用户管理系统</h3>
    <table class="table" align="center">
        <tr>
            <th width="20%">姓名</th>
            <th width="20%">性别</th>
            <th width="20%">年龄</th>
            <th width="20%">个人简介</th>
            <th width="20%">操作</th>
        </tr>
        <?php
        $users = $userManager->listUsers();
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>$user[name]</td>";
            echo "<td>$user[sex]</td>";
            echo "<td>$user[age]</td>";
            echo "<td>$user[about]</td>";

            echo "<td><a href = 'modify-user.php?id={$user['id']}'>修改</a>&nbsp;<a href = 'del-user.php?id={$user['id']}'>删除</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>