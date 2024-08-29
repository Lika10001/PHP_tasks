<?php
require 'script.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../email_sender/style.css">
    <title>Рассылка</title>
</head>
<body>
<form class="transparent"  method="post" id="form" autocomplete="on" onsubmit="" action="">
    <div class="form-inner">
        <h3>Рассылка</h3>
        <label for="user_data1">Получатели:</label>
        <textarea id="user_data1" name="usernames"></textarea>
        <label for="user_data2" >Тема:</label>
        <input type="text" id="user_data2" name="topic">
        <label for="user_data3">Текст сообщения:</label>
        <textarea id="user_data3" name="text" rows="4" cols="20"></textarea>
        <input type="submit" name="submit" value="Отправить">
    </div>
</form>
</body>

<script>
    async function submitForm(event) {
        //event.preventDefault(); // отключаем перезагрузку/перенаправление страницы
        try {
            // Формируем запрос
            const response = await fetch(event.target.action, {
                method: 'POST',
                body: new FormData(event.target)
            });
            // проверяем, что ответ есть
            if (!response.ok) throw (`Ошибка при обращении к серверу: ${response.status}`);
            // проверяем, что ответ действительно JSON
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw ('Ошибка обработки. Ответ не JSON');
            }
            // обрабатываем запрос
            const json = await response.json();
            if (json.result === "success") {
                // в случае успеха
                alert(json.info);
            } else {
                // в случае ошибки
                console.log(json);
                throw (json.info);
            }
        } catch (error) { // обработка ошибки
            alert(error);
        }
    }
</script>

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







