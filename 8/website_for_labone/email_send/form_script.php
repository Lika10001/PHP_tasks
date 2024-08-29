<?php

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

function check_email($email){
    if(strlen($email) != 0){
        $email = trim($email,' ');
        $is_email_correct = true;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo"<h2>Проверьте корректность набранного email-а!</h2>";
            $is_email_correct = false;
        }
        if($is_email_correct){
            return $email;
        } else{
            return false;
        }
    }else{
        echo "<h2>Вы не ввели ни одной электронной почты!</h2>";
        return false;
    }
}


function check_text($text)
{
    if (strlen($text) == 0) {
        echo "<h2>Вы не ввели сообщение!</h2>";
        return false;
    } else
        return true;
}

function check_topic($topic)
{
    if (strlen($topic) == 0) {
        echo "<h2>Вы не ввели тему сообщения!</h2>";
        return false;
    } else
        return true;

}

function save_to_bd($user_name, $email, $des_name, $des_count){
    $mysqli = new mysqli("localhost", "root", "New", "base_for_lab_8");
    $mysqli->set_charset("utf8mb4");
    $mysqli->query("INSERT INTO `orders_for_website` (`name`, `email`, `dish`, `amount`) VALUES ('$user_name', '$email', '$des_name','$des_count')");
    $mysqli->close();
}

if (isset($_POST['submit'])) {
    $email = check_email($_POST['order_email']);
    $user_name = $_POST['order_name'];
    $des_name = $_POST['des_name'];
    $des_count = $_POST['des_count'];
    save_to_bd($user_name, $email, $des_name, $des_count);
        $name = "Website Ponchik";
        $text = "<br>Hello, " . $user_name . "!This is a message from website Ponchik. <br> You have reserved " . $des_name . " in amount of ". $des_count.". Your order is confirmed.<br> We will email you when your order be done.<br>With warm wishes, your Ponchik)" ;
        $topic = "The order from Ponchik";
        // Формирование самого письма
        $title = $topic;
        $body = "
            <h2>Новое письмо</h2>
            <b>Имя:</b> $name<br>
            <b>Отправитель:</b> 'likashim7@gmail.com'<br><br>           
            <b>Сообщение:</b><br>$text";

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth = true;
        //$mail->SMTPDebug = 2;
        $mail->Debugoutput = function ($str, $level) {
            $GLOBALS['data']['debug'][] = $str;
        };

        // Настройки вашей почты
        $mail->Host = 'smtp.gmail.com'; // SMTP сервера вашей почты
        $mail->Username = 'likashim7'; // Логин на почте
        $mail->Password = 'dygm vllp fvrr oobp'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('likashim7@gmail.com', 'Website Ponchik'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $body;
        if ($mail->send()) {
            echo "<h2>Ваше письмо отправлено(" . $email . ")!</h2>";
            $data['result'] = "success";
            $data['info'] = "Сообщение успешно отправлено!";
        } else {
            echo "<h2>Что-то пошло не так..</h2>";
            $data['result'] = "error";
            $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
            $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
        }
        // Отправка результата
        // header('Content-Type: application/json');
        //echo json_encode($data);

        //} else {
        //  $data['result'] = "error";
        //$data['info'] = "В коде присутствует ошибка";
        //$data['desc'] = error_get_last();
    // }

}

