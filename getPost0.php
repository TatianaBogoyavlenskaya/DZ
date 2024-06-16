<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="styleSheet" href="assets/styles/styleBackground.css">
    <link rel="stylesheet" href="assets/styles/styleTransform.css">
    <title>Задания по теме Get/Post. Слайд 15</title>
</head>
<body>
<?php
    include_once "function.php";
    include_once "getTime.php";
    GetClassBody($hours);
    include_once "header.php";
?>
    <form method="post">
        <fieldset>
            <legend <?=$colorClassText?>>Задача 1. Создайте форму, состоящую из текстового поля, многострочного поля, группы выключателей, группы переключателей</legend>
            <input type="text" name = "text"><br>
            <textarea name="textArea"></textarea><br>
            <label <?=$colorClassText?>>1:
                <input type="checkbox" name="checkBox[]" value="checkbox1">
            </label>
            <label <?=$colorClassText?>>2:
                <input type="checkbox" name="checkBox[]" value="checkbox2">
            </label>
            <label <?=$colorClassText?>>3:
                <input type="checkbox" name="checkBox[]" value="checkbox3"><br>
            </label>
            <label <?=$colorClassText?>>1:
                <input type="radio" name="radio" value="radio1">
            </label>
            <label <?=$colorClassText?>>2:
                <input type="radio" name="radio" value="radio2">
            </label>
            <label <?=$colorClassText?>>3:
                <input type="radio" name="radio" value="radio3"><br>
            </label>
            <input type="submit" value="Отправить">
        </fieldset>
    </form>

    <form method="post">   
        <fieldset>
            <legend <?=$colorClassText?>>Задача 2. Дана форма для ввода логина и пароля. Необходимо вывести на экран имя пользователя, а пароль захешировать и сохранить его в массив _POST</legend>
            <label <?=$colorClassText?>>
                Логин:
                <input type="text" name="login">
            </label><br>
            <label <?=$colorClassText?>>
                Пароль:
                <input type="password" name="password">
            </label>
            <input type="submit" value="Отправить">
        </fieldset>
    </form>
    <br>
    
    <form method="post">   
        <fieldset>
            <legend <?=$colorClassText?>>Задача 3. Создать страницу для ввода имени пользователя (login) и пароля (passwd). 
        Если пользователь вводит правильную пару (login/passwd), то сервер выдает страницу с сообщением, 
        что доступ к секретным страницам открыт. Login предлагается выбирать из списка.</legend>
            <label <?=$colorClassText?>>
                Логин:
            <select type="combobox" name="login">
                <option value="name111">111</option>
                <option value="name11111">11111</option>
                <option value="name222">222</option>
            </select>
            </label><br>
            <label <?=$colorClassText?>>
                Пароль:
                <input type="password" name="passwd">
            </label>
            <input type="submit" value="Отправить">
        </fieldset>
    </form>
    <form method="get">   
        <fieldset>
            <legend <?=$colorClassText?>>Задача 4. Создайте форму генерации ссылки с параметром</legend>
            <select name="l" <?=$colorClassText?>>
                <option value="1">Лаб1</option>
                <option value="2">Лаб2</option>
                <option value="3">Лаб3</option>
                <option value="4">Лаб4</option>
            </select>
            <input type="submit">
        </fieldset>
    </form>
<?php 
    //обработка данных 1 задачи
    function Task1()
    {
        if (!isset($_POST["text"])) return;
        echo "1. Создайте форму, состоящую из текстового поля, многострочного поля, группы выключателей, группы переключателей. Выведите на экран значения, которые ввел/выбрал пользователь.<br>";        
        $text = $_POST["text"];
        $textArea =  isset($_POST["textArea"]) ? $_POST["textArea"] : "";
        $checkBox =  isset($_POST["checkBox"]) ? $_POST["checkBox"] : "";
        $radio = isset($_POST["radio"]) ? $_POST["radio"] : "";
        echo "text = $text, textArea = $textArea, radio = $radio, checkBox = ";
        var_dump($checkBox);
    }
    //обработка данных 2 задачи
    function Task2()
    {
        if (!isset($_POST["login"]) || !isset($_POST["password"])) return;
        echo "2. Дана форма для ввода логина и пароля. Необходимо вывести на экран имя пользователя, а пароль захешировать и сохранить его в массив _POST.<br>";
        $login = (isset($_POST["login"])? $_POST["login"] : "");
        $password = (isset($_POST["password"])? $_POST["password"] : "");
        echo "login = $login";
        if ($password != "") 
        {
            $_POST["password"] = md5($password);
            echo "; passwordHash = {$_POST["password"]}";
        }
    }
    //обработка данных 3 задачи
    function Task3()
    {
        if (!isset($_POST["passwd"])) return;
        echo "3. Создать страницу для ввода имени пользователя (login) и пароля (passwd). 
        Если пользователь вводит правильную пару (login/passwd), то сервер выдает страницу с сообщением, 
        что доступ к секретным страницам открыт. Login предлагается выбирать из списка.<br>";
        $login = (isset($_POST["login"])? $_POST["login"] : "");
        $password = (isset($_POST["passwd"])? $_POST["passwd"] : "");
        $loginRight = 0;
        $passwordRight = "11111";
        if ($login == $loginRight && $password == $passwordRight)
        {
            echo "$login: Доступ открыт";
        }
        else 
        {
            echo "$login: Ошибка!";
        }
    }
    Task1();
    Task2();
    Task3();
?>
<?php
    include_once "footer.php";
?>
</body>
</html>