<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../lab5/style.css">
    <title>Регистрация</title>
</head>
<body>
<form class="transparent" action="" method="post">
    <div class="form-inner">
        <h3>Регистрация</h3>
        <label for="user_data">Введите Ваше имя:</label>
        <input type="text" id="user_data" name="username">
        <label for="user_data">Придумайте пароль:</label>
        <input type="password" id="user_data" name="user_password">
        <label for="user_data">Подтвердите пароль:</label>
        <input type="password" id="user_data" name="user_password_verif">
        <input type="submit" name="submit" value="Подтвердить">
        <a class="button" href="change_pass.php" target="">У меня уже есть аккаунт</a>
    </div>
</form>
</body>
</html>

<style>
    a.button {
        border: 1px solid #808080;
        background: #1762EE;
        font-size: 18px;
        position: relative;
        display: block;
        width: 100%;
        padding: 0px 0px 0px 45px;
        margin: 60px 0 15px;
        line-height: 40px;
        border-radius: 20px;
        color: white;
        background: rgba(255, 255, 255, .2);
        font-family: 'Roboto', sans-serif;
    }

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

<?php
//data for connection
$servername = "localhost";
$username = "root";
$passwordBD = "New";
$dbName = "base_for_lab_5";


if(isset($_POST['submit'])){
    $mistakes = false;
    if(empty($_POST['username'])){
        echo "<h2>Вы не ввели имя!</h2>";
        $mistakes = true;
    }
    if(!empty($_POST['user_password']) && !empty($_POST['user_password_verif'])&&($_POST['user_password'] != $_POST['user_password_verif'])){
        echo"<h2>Пароль и пароль для подтверждения не совпадают!</h2>";
        $mistakes = true;
    }else {
        if(empty($_POST['user_password'])) {
            echo "<h2>Вы не ввели пароль!</h2>";
            $mistakes = true;
        }
        if(empty($_POST['user_password_verif'])){
            echo"<h2>Вы не подтвердили пароль!</h2>";
            $mistakes = true;
        }
    }
    if(!$mistakes) {
        //data for table
        $username = $_POST['username'];
        $password = $_POST['user_password'];
        //
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = new mysqli($servername, $username, $passwordBD, $dbName);
        if (!$conn) {
            echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        } else {
            $conn->set_charset("utf8mb4");
            $user_exists = false;
            $result = $conn->query('SELECT * FROM `users`'); // запрос на выборку
            while ($row = $result->fetch_assoc())// получаем все строки в цикле по одной
            {
                if ($_POST['username'] == $row['username']) {
                    echo "<h2>Такой пользователь уже существует!</h2>";
                    $user_exists = true;
                }

            }
            if (!$user_exists) {
                $password = sha1($password);
                $sql = "INSERT INTO users (username, password)
    VALUES('$username', '$password')";
                if ($conn->query($sql) === TRUE) {
                    echo "<h2>Ваша регистрация прошла успешно!</h2>";
                }
            }
        }
    }
}


