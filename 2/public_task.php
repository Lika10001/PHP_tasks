<?php
$color_f=false;
$color_s=false;
$color_th=false;
$color_ft=false;

    if(isset($_GET['firstLink'])) {
        $color_f="style=\"color: skyblue;\"";

    }
    if(isset($_GET['secLink'])) {
        $color_s="style=\"color: green;\"";
    }
    if(isset($_GET['thirdLink'])) {
        $color_th="style=\"color: magenta;\"";
    }

    if(isset($_GET['fourthLink'])) {
        $color_ft="style=\"color: yellow;\"";
    }

    ?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
  <!--  <link rel="stylesheet" href="navstyle.css">-->

    <title>Ссылки</title>
</head>
<body>
    <nav role="navigation" class="ui-section-header--nav ui-layout-flex">
        <a href="?firstLink" <?=$color_f?> role="link" aria-label="#" class="ui-section-header--nav-link">Меню</a>
        <a href="?secLink" <?=$color_s?> role="link" aria-label="#" class="ui-section-header--nav-link">Вакансии</a>
        <a href="?thirdLink" <?=$color_th?> role="link" aria-label="#" class="ui-section-header--nav-link">Доставка</a>
        <a href="?fourthLink" <?=$color_ft?> role="link" aria-label="#" class="ui-section-header--nav-link">О проекте</a>
    </nav>
</body>
</html>