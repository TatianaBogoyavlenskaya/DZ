<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <link rel="stylesheet" href="assets/styles/styleTransform.css">
    <title>Bitrix</title>
</head>
<?php
    session_start();
    include_once "getTime.php";
    GetClassBody($hours);
    include_once "header.php";
?>
<main>
    <h1 <?=$colorClassText?>>Страница Bitrix</h1>
</main>
<?php 
    include_once "footer.php";
?>
</body>
</html>
<?php 
    GetLastPage($colorClassText);
    //изменение предыдущей страницы
    setcookie("page", "bitrix", time()+3600*24);
?>