<!DOCTYPE html>
<html>
<head>
    <title>用户管理系统-添加</title>
</head>
<body>
    <form action="list-user.php" method="post">
        <p>姓名:
            <input type="text" name="name" value=""></input>
        </p>
        <p>性别:
            <input name="sex" type="radio" value="男">男</input>
            <input name="sex" type="radio" value="女">女</input>
        </p>
        <p>年龄:
            <input type="text" name="age" value=""></input>
        </p>
        <p>简介:
            <textarea name="about"></textarea>
        </p>
        <input type="submit"></input>
    </form>
</body>
</html>