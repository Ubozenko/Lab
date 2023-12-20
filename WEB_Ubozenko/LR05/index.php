<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <div>
    <?php
    $login = "";
    $password = "";

    if (isset($_POST['login'])) $login = $_POST['login'];
    if (isset($_POST['password'])) $password = $_POST['password'];

    echo "Ваш логін: $login <br> Ваш пароль: $password";
    ?>
    </div>
    <h3>Вхід на сайт</h3>
    <form method="POST">
        Логін: <input type="text" name="login">
        Пароль: <input type="text" name="password">
        <input type="submit" value="Увійти">
    </form>
</body>
</html>
