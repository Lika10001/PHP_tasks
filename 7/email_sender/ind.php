<?php

require 'email_sender/Exception.php';
require 'email_sender/PHPMailer.php';
require 'email_sender/SMTP.php';
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

    if(isset($_POST['submit']) && ( check_emails($_POST['usernames'])) && (check_text($_POST['text'])) && (check_topic($_POST['topic']))){
        $mail_arr = check_emails($_POST['usernames']);
        var_dump($mail_arr);
        foreach($mail_arr as $mail){
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'likashim7@gmail.com';                 // SMTP username
            $mail->Password = 'secret';                           // SMTP password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587 ;// Enable encryption, 'ssl' also accepted

            $mail->setFrom('likashim7@gmail.com', "Lika"); // sender's email and name
            $mail->addAddress($mail);  // receiver's email and name

            $mail->Subject = $_POST['topic'];
            $mail->Body    = $_POST['text'];
            if($mail->send()){
                echo"<h2>Ваше письмо отправлено!</h2>";
            }else{
                echo"<h2>Что-то пошло не так..</h2>";
            }
        }

    }