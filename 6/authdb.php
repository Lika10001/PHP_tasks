<?php
if (isset($_POST['submit'])) {
    $mistakes = false;
    if (empty($_POST['login'])) {
        echo "<h2>Вы не ввели имя!</h2>";
        $mistakes = true;
    } else {
        if (empty($_POST['password'])) {
            echo "<h2>Вы не ввели пароль!</h2>";
            $mistakes = true;
        }
    }
    if (!$mistakes) {
        $database = new mysqli('localhost', 'root', 'New', 'base_for_lab_6');
        $database->set_charset("utf8mb4");
        $loginsDB = $database->query("SELECT user_name FROM users_passwords");
        $passwordsDB = $database->query("SELECT user_password FROM users_passwords");
        $logins = [];
        $passwords = [];
        while ($row = $loginsDB->fetch_assoc()) {
            $logins[] = $row['user_name'];
        }
        while ($row = $passwordsDB->fetch_assoc()) {
            $passwords[] = $row['user_password'];
        }
        $login = $_POST['login'];
        $pass = $_POST['password'];
        if (in_array($login, $logins) && in_array($pass, $passwords) && (array_search($login, $logins) == array_search($pass, $passwords))) {
            header("Location: load.php");
        } else {
            if (!in_array($login, $logins)) {
                echo "<h2>У такого пользователя нет доступа!</h2>";
            } else
                if (!in_array($pass, $passwords))
                    echo "<h2>Пароль пользователя введен неправильно!</h2>";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../lab6/style.css">
    <title>Аутентификация</title>
</head>
<body>
<form class="transparent"  action="" method="post">
    <div class="form-inner">
        <h3>Вход в аккаунт</h3>
        <label for="user_name">Введите Ваш логин:</label>
        <input type="text"  id="user_name" name="login">
        <label for="user_passw">Введите Ваш пароль:</label>
        <input type="password"  id="user_passw" name="password">
        <input type="submit" name="submit" value="Подтвердить">
    </div>
</form>
</body>
</html>
<style>
    h2{
        padding: 10px 500px;
        margin: 20px auto 0;
        color: #1762EE;
        font-family: 'Roboto', sans-serif;
    }
    h2.resultlabel{
        padding: 10px 460px;
        margin: 2px auto 0;
    }
</style>
