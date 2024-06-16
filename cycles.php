<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <link rel="stylesheet" href="assets/styles/styleTransform.css">
    <title>Cycles</title>
</head>
<?php
include_once "getTime.php";
GetClassBody($hours);
include_once "header.php";
?>
    <main>
    <?php 
    //ДЗ
        echo "<h1 $colorClassText>Слайд № 25</h1>";
        echo "<p $colorClassText >";
        echo "1. Выведите столбец чисел от 5 до 13.<br>";
        for ($index = 5; $index <= 13; $index++)
        {
            echo "$index<br>";
        }

        echo "<br>2. Дано число num=1000. Делите его на 2 столько раз, пока результат деления 
        не станет меньше 50. Какое число получится? Посчитайте количество итераций, необходимых для этого 
        (итерация - это проход цикла). Решите задачу сначала через цикл while, а потом через цикл for.<br>";

        echo "<br>while: <br>";
        $num = 1000;
        $count = 0;
        while ($num > 50)
        {
            $count++;
            $num /= 2;
        }
        echo "count = $count<br>";
        echo "<br>for: <br>";
        $num = 1000;
        $count = 0;
        for ($index = 0; $index < $num; $index++)
        {
            if ($num < 50)
            {
                break;
            }
            $count++;
            $num /= 2;
        }
        echo "count = $count <br>";

        echo "<br>3. Необходимо создать переменную (i) и передавать в нее значение. 
        Если в переменную положить 0, то на экране должна отображаться строка со значением «0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10». 
        Если переменная равна 1, то на экране отображается строка «0, 1, 2, 3, 4, 5, 6, 7, 8, 9». 
        Если переменная равна 2, то на экране отображается строка «0, 1, 2, 3, 4, 5, 6, 7, 8».
         Если переменная равна 3, то на экране отображается строка «0, 1, 2, 3, 4, 5, 6, 7» и так далее, до i=10 <br>";
        $i = mt_rand(0,10);
        echo "i = $i <br>";
    
        for ($index = 0; $index <= 10-$i; $index++)
        {
            echo "$index";
            if($index < 10-$i)
            {
                echo ", ";
            }
        }
        echo "</p>";
        ?>
    </main>
    <?php
        include_once "footer.php";
    ?>
</body>
</html>