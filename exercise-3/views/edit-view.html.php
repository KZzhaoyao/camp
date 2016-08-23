<!DOCTYPE html>
<html>
<head>
    <title>用户管理系统-修改</title>
</head>
<body>
    <form action="UserController.php?action=modify" method="post">
        <p>姓名:
            <input type="text" name="name" value="<?php echo $user['name']?>">
        </p>
        <p>性别:
            <input name="sex" type="radio" value="男" checked="<?php $user['sex']=='男' ?>">男
            <input name="sex" type="radio" value="女" checked="<?php $user['sex']=='女' ?>">女
        </p>
        <p>年龄:
            <input type="text" name="age" value="<?php echo $user['age'] ?>"></input>
        </p>
        <p>简介:
            <textarea name="about"><?php echo $user['about'] ?></textarea>
        </p>
        <input name="userId" type="hidden" value="<?php echo $user['id'] ?>">
        <input type="submit"></input>
    </form>
</body>
</html>