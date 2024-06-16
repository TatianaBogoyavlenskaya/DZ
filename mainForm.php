<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/styles/styleAuthorization.css">
</head>
<body>
    <form method="post">
        <label data-tooltip = "1"><!--Для простоты ввела подсказку логина и пароля-->
            Логин <input type="text" name="login">
        </label><br>
        <label data-tooltip = "1">
            Пароль <input type="password" name="password">
        </label><br>
        <input type="submit" value="Авторизоваться">
    </form>
</body>
</html>
<?php
    //проверка на наличие данных
    if (!isset($_POST["login"]) || !isset($_POST["password"])) return;
    $login = $_POST["login"];
    $password = $_POST["password"];
    $dB = "myDB";
    $loginDB = "fact";
    $passwordDB = "fact";
    $hostName = "localhost";
    $connect = new mysqli($hostName,$loginDB, $passwordDB,$dB); //соединение с бд
    $select = "select login, password from users where (login like ? and password like ?);"; //запрос
    $qw = $connect->prepare($select); //подготавливаем запрос
    $qw->bind_param("ss", $login, $password); //задаем параметры
    $qw->execute(); //отправляем запрос
    $qw->bind_result($loginRead, $passwordRead); //читаем результат
    if ($qw->fetch()) //при наличии результата
    {
        header("Location: aboutMe.php"); //отображаем форму
    }
    else
    {
        echo "<p>Вход не выполнен! Проверьте корректность введенных данных</p>"; //выводим ошибку
    }
?>