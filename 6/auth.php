<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (array_key_exists("flag", $_COOKIE)){
        setcookie("flag", false);
    }
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $fp = @fopen("loginpass.txt", 'r');
    if ($fp) {
        $string = str_replace("\n", " ", fread($fp, filesize("loginpass.txt")));
        $string = str_replace("\r", "", $string);
        $array = explode(" ", $string);
    }
    for ($i = 0; $i < count($array); $i++){
        if ($i%2!==0){
            $passwords[] = $array[$i];
        }
        else {
            $logins[] = $array[$i];
        }
    }
    if (in_array($login, $logins) && in_array($pass, $passwords) && (array_search($login, $logins) == array_search($pass, $passwords))){
        header("Location: load.php");
    } else {
        echo "Неправильно введены данные";
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
