<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<table>
    <tr>
        <th>姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>个人简介</th>
        <th>操作</th>
    </tr>

    <?php
    foreach ($users as $user) {
    ?>
    <tr>
        <td><?php echo $user['name'] ?></td>
        <td><?php echo $user['sex'] ?></td>
        <td><?php echo $user['age'] ?></td>
        <td><?php echo $user['about'] ?></td>
        <td>
        <a href="UserController.php?action=add">添加</a><a href="UserController.php?action=modify&userId=<?php echo $user['id'] ?>">修改</a><a href="UserController.php?action=del&userId=<?php echo $user['id'] ?>">删除</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>