<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Регистрация на выставку</title>
</head>
<body>
<form class="transparent" action="" method="post">
    <div class="form-inner">
        <h2>Список шеф-поваров</h2>
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

    h2.resultLabel{
        padding: 10px 460px;
        margin: 2px auto 0;
    }

    table{
        width: 100%;
        border-radius: 10px;
        border-spacing: 0;
        padding: 10px 200px;
        margin: 20px auto 0;
        color: #1762EE;
        font-size: 18px;
        text-align: center;
        font-family: 'Roboto', sans-serif;
    }
    th{
        background: #7b59a6;
        color: white;
        width: 100%;
        text-shadow: 0 1px 1px 0;
        border-color: white;
        border-style: solid;
        border-width: 0 1px 1px 0;
        text-align: center;
    }
    td{
        border: 1px solid gray;
        text-align: center;
        background: #8cc8ff;
    }

</style>

<?php
//data for connection
$servername = "localhost";
$username = "root";
$passwordBD = "New";
$dbName = "base_for_lab_5";

mysqli_report(MYSQLI_REPORT_OFF);
try {
    $conn = new mysqli($servername, $username, $passwordBD, $dbName);
     $conn->set_charset("utf8mb4");
    $chefs = $conn->query('SELECT * FROM `chefs` ORDER BY Surname'); // запрос на выборку

    while ($row = $chefs->fetch_assoc())// получаем все строки в цикле по одной
    {
        echo "<table><tr> <th style='width: 15%'>Имя</th><th style='width: 15%'>Фамилия</th><th style='width: 15%'>Блюдо</th><th style='width: 45%'>Рецепт</th><th style='width: 10%'>Почта</th></tr>";
        foreach($chefs as $row){
            $recipe_in_table = false;
            echo "<tr>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Surname"] . "</td>";
            echo "<td>" . $row["Dish"] . "</td>";
            $dishes = $conn->query('SELECT * FROM `dishes`');
            while($row_dish = $dishes->fetch_assoc()){
                foreach($dishes as $row_dish) {
                    if ($row['Dish'] == $row_dish['Dish']) {
                        echo "<td>" . $row_dish['Recipe'] . "</td>";
                        $recipe_in_table = true;
                    }
                }
            }
            if(!$recipe_in_table){
                echo "<td> - </td>";
            }
            echo "<td>" . $row["Email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} catch(mysqli_sql_exception $e){
    error_log($e->__toString());
}