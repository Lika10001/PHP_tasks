<?php
$userhash = 0;
if (!isset($_COOKIE["userhash"])) {
    $userhash = uniqid();
    setcookie("userhash", $userhash, time()+ 3600);
} else
    $userhash= $_COOKIE["userhash"];
$ip = ip2long($_SERVER["REMOTE_ADDR"]);
$uri = $_SERVER["REQUEST_URI"];
$ref = $_SERVER["HTTP_REFERER"];
$mysqli = new mysqli("localhost", "root", "New", "base_for_lab_6"); // Соединяемся с базой
$mysqli->query("INSERT INTO `users_info` (`userhash`, `ip`, `uri`, `ref`) VALUES ('$userhash', '$ip', '$uri', '$ref')"); // Добавляем запись
$mysqli->close();
?>