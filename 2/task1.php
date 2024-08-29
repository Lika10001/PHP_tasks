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
            <h3>Задание 1</h3>
            <label for="userdata">Названия городов:</label>
            <input type="text" id="userdata" name="cities">
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

        li.resultLabel{
            padding: 10px 450px;
            color: fuchsia;
            font-size: 21px;

        }

    </style>

    <?php

    $error_line = "";
    $input_line ="";
    $rusAlfabet="АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ";
    $engAlfabet="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $specialSymbols=" .!:;?";
    $digits="0123456789";
    $otherSymbols="/\-+=<>";
    $oneCity="";
    $citiesArray = array();
    $isValid = true;


    function quickSort(array $arr) {
        $count= count($arr);
        if ($count <= 1) {
            return $arr;
        }

        $first_val = $arr[0];
        $left_arr = array();
        $right_arr = array();

        for ($i = 1; $i < $count; $i++) {
            if (strcmp($arr[$i],$first_val) <= 0) {
                array_push($left_arr, $arr[$i]);
            } else {
                array_push($right_arr, $arr[$i]);
            }
        }

        $left_arr = quickSort($left_arr);
        $right_arr = quickSort($right_arr);

        return array_merge($left_arr, array($first_val), $right_arr);
    }

    function printCities(array $citiesArray){
        echo "<h2> Список городов:</h2>";
        $city = $citiesArray[1];
        echo "<li class='resultLabel'>";
        echo ucfirst($citiesArray[1]);
        echo "</li>";
        for ($i = 2; $i < count($citiesArray); $i++) {
            if(strcasecmp($city, $citiesArray[$i]) != 0) {
                echo "<li class='resultLabel'>";
                if (is_array($citiesArray[$i])) {
                    printCities($citiesArray[$i]);
                } else {
                    echo ucfirst($citiesArray[$i]);
                }
                echo "</li>";
            }
            $city = $citiesArray[$i];
        }
    }

    // Если кнопка нажата, то выполняет тело условия
    if (isset($_GET['done'])) {
        // Если список пуст, тогда выводит сообщение
        if ($_GET['cities'] == '') {
            echo "<h2>Список пуст!</h2>";
        } else
            // а сколько городов
            if (!empty($_GET['cities']) && strpos($_GET['cities'], ',') <= 0) {
                echo "<h2>Здесь только одно слово! Сортировка не имеет смысла</h2>";
            }else

        // Если все ок
        if (!empty($_GET['cities'])) {
            $input_line = strtolower($_GET['cities']);

            //убрать лишние знаки-разделители
            for($i = 0; $i < strlen($specialSymbols); $i++){
                $input_line = str_replace($specialSymbols[$i], '', $input_line);
            }

            //убрать лишние запятые
            for($i = 0; $i < strlen($input_line) - 1; $i++){
                if($input_line[$i] == ',' && $input_line[$i+1] == ','){
                    $input_line = substr($input_line, 0, $i ) . substr($input_line, $i+1, strlen($input_line) - $i);
                }
            }
            //все ли символы корректны
            $i = 0;
            while(($isValid)&&($i < strlen($input_line))){
                if(stripos($otherSymbols,$input_line[$i]) > 0 && stripos($digits,$input_line[$i]) > 0) {
                    $isValid = false;
                }
                $i++;
            }
            if($isValid == false){
                echo "<h2>Скорее всего, введены цифры или специальные символы!</h2>";
            }else {

                ///add cities to array
                $length = strlen($input_line);
                $buffString = substr($input_line, 0, strlen($input_line));
                for ($i = 0; $i < $length; $i++) {
                    if (stripos($rusAlfabet, $input_line[$i]) > 0 || stripos($engAlfabet, $input_line[$i]) > 0) {
                        $oneCity = substr($buffString, 0, stripos($buffString, ','));
                        $buffString = substr($buffString, strlen($oneCity) + 1, strlen($buffString) - strlen($oneCity));
                        if (array_search($oneCity, $citiesArray) == false) {
                            array_push($citiesArray, $oneCity);
                        }
                        $i += strlen($oneCity);
                        $oneCity = "";
                        if ((strpos($buffString, ',') == 0) && (strlen($buffString) != 0) && (array_search($oneCity, $citiesArray) == false)) {
                            array_push($citiesArray, $buffString);
                        }
                    }
                }
                //сортировка и вывод
                $citiesArray = quickSort($citiesArray);
                printCities($citiesArray);
            }
        }
    }
    ?>
   </body>
</html>