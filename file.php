<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <link rel="stylesheet" href="assets/styles/styleTransform.css">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "function.php";
    include_once "getTime.php";
    GetClassBody($hours);
    include_once "header.php";
?>
<main>
    <?php 
        echo "<h1 $colorClassText>Слайд 12</h1>";
        echo "<p $colorClassText>";
        echo "3. Дан текстовый документ, в котором есть: имя, фамилия, обратная связь. Вывести на экран только имя и фамилию<br>";
        $file = fopen("file1.txt", "r");
        $str = fread($file,1);
        $name = "";
        $familia = "";
        $value = "";
        //чтение посимвольно
        while ($str != "")
        {
            //сохранение имени при нахождении первого пробела
            if ($str == " " && $name == "")
            {
                $name = $value;
                $value = "";
                $str = fread($file,1);           
                continue;
            }
            //сохранение фамилии при нахождении второго пробела и выход из цикла
            if ($str == " " && $name != "")
            {
                $familia = $value;
                $value = "";
                break;
            }
            $value .= $str;
            $str = fread($file,1);            
        } 
        echo "Имя = $name, фамилия - $familia<br>";

        echo "4. Даны два файла, состоящие из предложений. Создать третий файл, содержащий все предложения, которые есть хотя бы в одном из файлов. Повторы не добавлять в третий файл<br>";
        $file1 = fopen("file2.txt", "r");
        $file2 = fopen("file3.txt", "r");
        $file3 = fopen("file4.txt", "w");
        $text1 = "";
        //чтение первого файла
        $str1 = fread($file1, 1);
        while ($str1 != "")
        {
            $text1 .= $str1;
            $str1 = fread($file1,1);
        } 
        echo "Файл 1: $text1<br>";
        $text2 = "";
        //чтение второго файла
        $str2 = fread($file2, 1);
        while ($str2 != "")
        {
            $text2 .= $str2;
            $str2 = fread($file2,1);
        } 
        echo "Файл 2: $text2<br>";

        $arr1 = explode(".", $text1);
        $arr2 = explode(".", $text2);
        $arr3 = array();
        //записавание предлжений из первого файла
        for ($index = 0; $index < count($arr1); $index++)
        {
            if (!in_array($arr1[$index],$arr3))
            {
                $arr3[] = $arr1[$index];
            }
        }
        //записавание предлжений из второго файла
        for ($index = 0; $index < count($arr2); $index++)
        {
            if (!in_array($arr2[$index],$arr3))
            {
                $arr3[] = $arr2[$index];
            }
        }
        //преобразование в строку и запись полученного текста в файл
        $str = implode(".", $arr3);
        fwrite($file3, $str);
        fclose($file3);

        $file3 = fopen("file4.txt", "r");
        $text3 = "";
        //чтение третьего файла
        $str3 = fread($file3, 1);
        while ($str3 != "")
        {
            $text3 .= $str3;
            $str3 = fread($file3,1);
        } 
        echo "Файл 3: $text3<br>";

        echo "5. Даны два файла, состоящие из предложений. Создать третий файл, содержащий все повторяющиеся предложения<br>";
        $file1 = fopen("file2.txt", "r");
        $file2 = fopen("file3.txt", "r");
        $file3 = fopen("file5.txt", "w");
        $text1 = "";
        //чтение первого файла
        $str1 = fread($file1, 1);
        while ($str1 != "")
        {
            $text1 .= $str1;
            $str1 = fread($file1,1);
        } 
        echo "Файл 1: $text1<br>";
        $text2 = "";
        //чтение второго файла
        $str2 = fread($file2, 1);
        while ($str2 != "")
        {
            $text2 .= $str2;
            $str2 = fread($file2,1);
        } 
        echo "Файл 2: $text2<br>";

        $arr1 = explode(".", $text1);
        $arr2 = explode(".", $text2);
        $arr3 = array();
        //записавание предлжений, если они есть во 2 файле
        for ($index = 0; $index < count($arr1); $index++)
        {
            if (in_array($arr1[$index],$arr2))
            {
                $arr3[] = $arr1[$index];
            }
        }
        //преобразование в строку и запись полученного текста в файл
        $str = implode(".", $arr3);
        fwrite($file3, $str);
        fclose($file3);

        $file3 = fopen("file5.txt", "r");
        $text3 = "";
        //чтение третьего файла
        $str3 = fread($file3, 1);
        while ($str3 != "")
        {
            $text3 .= $str3;
            $str3 = fread($file3,1);
        } 
        echo "Файл 3: $text3<br>";
        echo "</p>";
    ?>
</main>
<?php
    include_once "footer.php";
?>
</body>
</html>