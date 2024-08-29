<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

function check_emails($emails){
    if(strlen($emails) != 0){
        $emails = $emails.' ';
        $are_emails_correct = true;
        $emails_arr = array();
        $length = strlen($emails);
        $buff = substr($emails, 0);
        for ($i = 0; $i < $length; $i++) {
            $oneWord = substr($buff, 0, stripos($buff, ' '));
            $buff = substr($buff, strlen($oneWord) + 1, strlen($buff) - strlen($oneWord) - 1);
            //if($buff != ' ')
                array_push($emails_arr, $oneWord);
            if ((strpos($buff, ' ') == 0) && (strlen($buff) != 0)) {
                array_push($emails_arr, $buff);
                $i += strlen($buff);
            }
            $i += strlen($oneWord);
        }
        foreach($emails_arr as $email){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo"<h2>Проверьте корректность набранных email-ов!</h2>";
                $are_emails_correct = false;
            }
        }
        if($are_emails_correct){
            return $emails_arr;
        } else{
            return false;
        }
    }else{
        echo "<h2>Вы не ввели ни одной электронной почты!</h2>";
        return false;
    }
}

function check_text($text){
    if(strlen($text) == 0){
        echo"<h2>Вы не ввели сообщение!</h2>";
        return false;
    } else
        return true;
}
function check_topic($topic){
    if(strlen($topic) == 0){
        echo"<h2>Вы не ввели тему сообщения!</h2>";
        return false;
    } else
        return true;

}

function write_receivers($arr){
    if (!$file = fopen("receivers.txt", 'a')) {
        echo "Не могу открыть файл";
        exit;
    }else {
        foreach ($arr as $email) {
            if (fwrite($file, $email) === FALSE) {
                echo "Не могу произвести запись в файл ";
                exit;
            }
            fwrite($file, ' ');

        }
        fclose($file);
    }
}

if(isset($_POST['submit']) && ( check_emails($_POST['usernames'])) && (check_text($_POST['text'])) && (check_topic($_POST['topic']))){
    $mail_arr = check_emails($_POST['usernames']);
    write_receivers($mail_arr);
    foreach($mail_arr as $email_one) {
        //if (!error_get_last()) {
            $name = "Lika";
            $email = $email_one;
            $text = $_POST['text'];
            $topic = $_POST['topic'];
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
            $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};

            // Настройки вашей почты
            $mail->Host = 'smtp.gmail.com'; // SMTP сервера вашей почты
            $mail->Username = 'likashim7'; // Логин на почте
            $mail->Password = 'dygm vllp fvrr oobp'; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('likashim7@gmail.com', 'Lika'); // Адрес самой почты и имя отправителя

            // Получатель письма
            $mail->addAddress($email_one);

            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $body;
            if ($mail->send()) {
                echo "<h2>Ваше письмо отправлено(".$email_one.")!</h2>";
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
        }
   // }

}
?>