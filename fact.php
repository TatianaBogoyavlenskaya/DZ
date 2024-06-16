<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <link rel="stylesheet" href="assets/styles/styleTransform.css">
    <title>Fact</title>
</head>
<?php
    session_start();
    include_once "getTime.php";
    GetClassBody($hours);
    include_once "header.php";
?>
<main>
    <h1 <?=$colorClassText?>>Страница Fact</h1>   
    <?=PasteSelect()?>
</main>
<?php 
    include_once "footer.php";
?>
</body>
</html>
<?php 
    GetColor();
    GetLastPage($colorClassText);
    //изменение предыдущей страницы
    setcookie("page", "fact", time()+3600*24);
?>