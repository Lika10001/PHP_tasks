<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../secLab/style.css">
    <title>Формы</title>
</head>
<body>
<form class="transparent" action="" method="get">
    <div class="form-inner">
        <h3>Задание 4</h3>
        <label for="userdata">Введите число, цифры которого хотите посчитать:</label>
        <input type="text" id="userdata" name="number">
        <input type="submit" value="Отправить" name="done">
    </div>
</form>

<style>
    h2{
        padding: 10px 450px;
        margin: 20px auto 0;
        color: #1762EE;
        font-family: 'Roboto', sans-serif;
    }

    h2.resultLabel{
        padding: 10px 50%;
        margin: 20px auto 0;
    }

</style>
<?php

$error_line = "";
$input_line ="";
$digits="0123456789";
$sum = 0;
$isValid = true;

function printResult(int $resultNumber){

    echo "<h2>Полученная сумма цифр числа:</h2>";
    echo "<h2 class='resultLabel'>$resultNumber</h2>";
}

// Если кнопка нажата, то выполняет тело условия
if (isset($_GET['done'])) {
    // Если поле пустое, тогда выводит сообщение
    if ($_GET['number'] == '') {
        echo "<h2>Вы не ввели число!</h2>";
    } else
            // Если все ок
            if (!empty($_GET['number'])) {
                $input_line = strtolower($_GET['number']);
                $i = 0;
                //проверяем, а цифры ли ввел пользователь
                while(($isValid)&&($i < strlen($input_line))){
                    if(stripos($digits,$input_line[$i]) > 0){
                        $sum += ord($input_line[$i]) - 48;
                        $i++;
                    }else{
                        $isValid = false;
                        echo "<h2>Ваше число содержит посторонние символы!</h2>";
                    }
                }
                //вывод
                switch($isValid) {
                    case true:
                        printResult($sum);
                }
            }
}
?>
</body>
</html>