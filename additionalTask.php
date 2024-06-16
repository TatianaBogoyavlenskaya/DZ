<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доп. задачи</title>
    <link rel = "stylesheet" href="assets/styles/styleBackground.css">
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
        echo "<h1 $colorClassText>Задания из файла example</h1>";

        //Циклы
        echo "<h2 $colorClassText>Блок 1. Циклы</h2>";
        echo "<p $colorClassText>";
        echo "1. Даны положительные действительные числа A,X,E.
         В последовательности y(1), y(2),... , образованной по закону y(0)=A; y(i)=0.5 [y(i-1)+x/y(i-1)] , i=1,2,3,... , 
        найти первый член y(n), для которого выполнено неравенство yi2-yi-12<E<br>";
        $a = 15;
        $x = 0;
        $e = 5;
        $y0 = $a;
        $y1 = GetY($y0,$x);
        $count = 0;
        echo  "a = $a e = $e<br>";
        while ((abs($y1**2-$y0**2)) > $e)
        {
            $x++;
            $count++;
            $y0 = $y1;
            $y1 = GetY($y1,$x);
            if ($count > 5000) 
            {
                break;
            }
        }
        echo "Первый член y(n) = $count (y($count) = $y1)<br>";
        function GetY($y,$x):float
        {
            $newY = 0.5*($y+$x/$y);
            return $newY;
        }

        echo "<br>2, 3. Были сделаны ранее на уроке<br>";
        echo "<br>4. Дана последовательность, состоящая из дробей: 1/1, 4/2, 9/4, 16/8,...
         Какое минимальное количество элементов последовательности нужно сложить, чтобы сумма превысила заданное число S > 10? <br>";
        $a = 1;
        $b = 1;
        $count = 0;
        $sum = 0;
        while($sum <= 10)
        {
            if ($count > 5000)
            {
                break;
            }
            $sum += ($a**2)/$b;
            $a++;
            $b += $b;
            $count++;
            echo "$sum ";
        }
        echo "<br>Минимальное количество элементов последовательности, которое нужно сложить, чтобы сумма превысила заданное число S > 10 = $count<br>";

        echo "<br>5. Дана  последовательность,  состоящая из дробей: 1/1, 3/2, 5/3, 7/4, ... 
        Какое минимальное количество элементов последовательности нужно сложить, чтобы сумма превысила заданное число S > 10?
        <br>";
        $a = 1;
        $b = 1;
        $count = 0;
        $sum = 0;
        while($sum <= 10)
        {
            if ($count > 5000)
            {
                break;
            }
            $sum += $a/$b;
            $a+=2;
            $b++;
            $count++;
            echo "$sum ";
        }
        echo "<br>Минимальное количество элементов последовательности, которое нужно сложить, чтобы сумма превысила заданное число S > 10 = $count<br>";

        echo "<br>6. Дана  последовательность,  состоящая из дробей: 1/2, 3/4, 5/6, 7/8, ...
         Какое минимальное количество элементов последовательности нужно сложить, чтобы сумма превысила заданное число S > 10?<br>";
        $b = 2;
        $count = 0;
        $sum = 0;
        while($sum <= 10)
        {
            if ($count > 5000)
            {
                break;
            }
            $sum += ($b-1)/$b;
            $b+=2;
            $count++;
            echo "$sum ";
        }
        echo "<br>Минимальное количество элементов последовательности, которое нужно сложить, чтобы сумма превысила заданное число S > 10 = $count<br>";

        echo "<br>7. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от 0 до 50. 
        Найти сумму элементов массива, с начала массива, до первого элемента равного нулю. <br>";
        $min = 0;
        $max = 50;
        $count = 1000;
        $sum = 0;
        $arr = GetRandArr($min, $max, $count);
        for ($index = 0; $index < $count; $index++)
        {
            echo "$arr[$index] ";
            if ($arr[$index] == 0)
            {
                break;
            }
            $sum +=$arr[$index];
        }
        echo "<br>Сумма элементов массива, с начала массива, до первого элемента равного нулю (до элемента $index) = $sum<br>";

        echo "<br>8. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от 0 до 9. 
        Найти произведение элементов массива, с конца массива до первого элемента, равного нулю <br>";
        $min = 0;
        $max = 9;
        $count = 1000;
        $p = 1;
        $arr = GetRandArr($min, $max, $count);
        for ($index = $count-1; $index >= 0; $index--)
        {
            echo "$arr[$index] ";
            if ($arr[$index] == 0)
            {
                break;
            }
            $p *=$arr[$index];
        }
        echo "<br>Произведение элементов массива, с конца массива, до первого элемента равного нулю (после элемента $index) = $p<br>";

        echo "<br>9. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от -5 до 50. 
        Найти сумму элементов массива, с конца массива, до первого отрицательного элемента <br>";
        $min = -5;
        $max = 50;
        $count = 1000;
        $sum = 0;
        $arr = GetRandArr($min, $max, $count);
        for ($index = $count-1; $index >= 0; $index--)
        {
            echo "$arr[$index] ";
            if ($arr[$index] < 0)
            {
                break;
            }
            $sum +=$arr[$index];
        }
        echo "<br>Сумма элементов массива, с конца массива, до первого отрицательного элемента (после элемента $index) = $sum<br>";

        echo "<br>10. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от 1 до 50. 
        Определить, сколько элементов с начала массива нужно сложить, чтобы сумма превысила заданное значение.<br>";
        $min = 1;
        $max = 50;
        $count = 1000;
        $sumMax = 100;
        $sum = 0;
        $countSum = 0;
        $arr = GetRandArr($min, $max, $count);
        for ($index = 0; $index < $count; $index++)
        {
            if ($sum > $sumMax)
            {
                break;
            }
            echo "$arr[$index] ";
            $sum +=$arr[$index];
            $countSum++;
        }
        echo "<br>Количество элементов с начала массива, которые нужно сложить, чтобы сумма ($sum) превысила значение $sumMax (до элемента $index) = $countSum<br>";

        echo "<br>11. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от 1 до 10. 
        Определить, сколько элементов с конца массива нужно перемножить, чтобы произведение превысило заданное значение <br>";
        $min = 1;
        $max = 10;
        $count = 1000;
        $pMax = 100;
        $p = 1;
        $countP = 0;
        $arr = GetRandArr($min, $max, $count);
        for ($index = $count-1; $index >= 0; $index--)
        {
            if ($p > $pMax)
            {
                break;
            }
            echo "$arr[$index] ";
            $p *=$arr[$index];
            $countP++;
        }
        echo "<br>Количество элементов с конца массива, которые нужно перемножить, чтобы произведение ($p) превысило значение $pMax (после элемента $index) = $countP<br>";

        echo "<br>12. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от -5 до 8.
         Найти сумму элементов участка массива, начиная с первого положительного и кончая вторым положительным элементом. <br>";
        $min = -5;
        $max = 8;
        $sum = 0;
        $indexStart = 0;
        $indexFinish = 0;
        $countSum = 0;
        $arr = GetRandArr($min, $max, $count);
        for ($index = 0; $index < $count; $index++)
        {
            if ($countSum  > 0)
            {
                $sum +=$arr[$index];  
                $countSum++;
            }
            if ($countSum > 0 && $arr[$index] > 0)
            {
                echo "$arr[$index])";
                $indexFinish = $index-1;
                break;
            }
            if (($arr[$index] > 0) && ($countSum == 0))
            {
                $sum +=$arr[$index];
                $indexStart  = $index;
                $countSum++;
                echo "(";
            }
            echo "$arr[$index] ";
        }
        echo "<br>Сумма элементов участка массива, начиная с первого положительного ($indexStart) и кончая вторым положительным элементом($indexFinish) = $sum<br>";
        echo "<br>13. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от -6 до 4.
         Найти произведение элементов участка массива, между последним нулевым и предпоследним нулевым элементом.<br>";
        $min = -6;
        $max = 4;
        $count = 1000;
        $p = 1;
        $arr = GetRandArr($min, $max, $count);
        $indexStart = -1;
        $indexFinish = -1;
        for($index = $count-1; $index >= 0; $index--)
        {
            echo "{$arr[$index]} ";
            if ($arr[$index] == 0 && $indexStart > -1)
            {
                $indexFinish = $index;
                break;
            }
            if ($indexStart > -1)
            {
                $p *= $arr[$index];        
            }
            if ($arr[$index] == 0)
            {
                $indexStart = $index;
            }
        }
        echo "<br>Произведение элементов участка массива, между последним нулевым ($indexStart) и предпоследним нулевым элементом ($indexFinish) = $p<br>";

        echo "<br>14. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от -15 до 14.
         Найти сумму элементов участка массива, начиная с последнего отрицательного и кончая предпоследним отрицательным элементом<br>";
        $min = -15;
        $max = 14;
        $count = 1000;
        $arr = GetRandArr($min, $max, $count);
        $indexStart = -1;
        $indexFinish = -1;
        $sum = 0;
        for($index = $count-1; $index >= 0; $index--)
        {
            echo "{$arr[$index]} ";
            if ($arr[$index] < 0 && $indexStart > -1)
            {
                $indexFinish = $index;
                break;
            }
            if ($indexStart > -1)
            {
                $sum += $arr[$index];        
            }
            if ($arr[$index] < 0)
            {
                $indexStart = $index;
            }
        }
        echo "<br>Сумма элементов участка массива, начиная с последнего отрицательного ($indexStart) и кончая предпоследним отрицательным элементом ($indexFinish) = $sum<br>";

        echo "<br>15. Дан одномерный массив из 1000 элементов, состоящий из случайных целых чисел в диапазоне от -5 до 2. 
         Найти произведение элементов массива, с начала массива до первого неотрицательного элемента.<br>";
        $min = -5;
        $max = 2;
        $count = 1000;
        $arr = GetRandArr($min, $max, $count);
        $p = 1;
        $indexElement = 0;
        for($index = 0; $index < $count; $index++)
        {
            echo "{$arr[$index]} ";
            if ($arr[$index] > 0)
            {
                $indexElement = $index;
                break;
            }
            $p *= $arr[$index];        
        }
        echo "<br>Произведение элементов массива, с начала массива до первого неотрицательного элемента ($indexElement) = $p<br>";

        echo "<br>16. Дано произвольное целое положительное число K (). Вывести цифры этого числа в порядке неубывания (например, 546085 =>045568).
         Процедуры и функции работы со строками не использовать.<br>";
        $k = mt_rand(10000,100000); 
        echo "<strong>k = $k </strong><br>";
        $arr = array();
        //формирование массива
        while($k > 0)
        {
            $arr[] = $k % 10;
            $k =(int)($k / 10);
        }
        $arr = array_reverse($arr); //чтобы массив был в обычном порядке, как число,  а не с хвоста (сделано для задачи 18)
        //список вариантов сортировки

        $arr1 = SortArray($arr, Order::increases);
        //вывод масива по возрастанию на экран
        foreach($arr1 as $key => $value)
        {
            echo "$value ";
        }
        echo "<br>";

        echo "<br>17. Вывести цифры этого числа в порядке невозрастания (например, 546085=>865540).<br>";
        $arr2 = SortArray($arr, Order::decrease);
        //вывод масива по убыванию на экран
        foreach($arr2 as $key => $value)
        {
            echo "$value ";
        }
        echo "<br>";

        echo "<br>18. Вывести цифры этого числа в обратном порядке (например, 5485 =>5845).<br>";
        for ($index = count($arr)-1; $index >= 0; $index--)
        {
            echo "{$arr[$index]}";
        }
        echo "<br>";

        echo "<br>19. Вывести это число без первой и последней цифры (например, 234653=> 3465).<br>";
        for ($index = 1; $index < count($arr)-1; $index++)
        {
            echo "{$arr[$index]}";
        }
        echo "<br>";

        echo "<br>20. Вывести новое число, полученное из K вычеркиванием всех четных цифр (например, 234653=>353).<br>";
        $newArr = array();
        for ($index = 0; $index < count($arr); $index++)
        {
            if ($arr[$index] % 2 == 1)
            {
                $newArr[] = $arr[$index];
            }
        }
        foreach($newArr as $key => $value)
        {
            echo "{$newArr[$key]} ";
        }
        echo "<br>";

        echo "<br>21. Найти сумму всех четных цифр этого числа.<br>";
        $sum = 0;
        for ($index = 0; $index < count($arr); $index++)
        {
            if ($arr[$index] % 2 == 0)
            {
                $sum += $arr[$index];
            }
        }
        echo "<br>Сумма четных цифр = $sum<br>";

        echo "<br>22. Найти произведение всех нечетных цифр этого числа.<br>";
        $p = 1;
        for ($index = 0; $index < count($arr); $index++)
        {
            if ($arr[$index] % 2 == 1)
            {
                $p *= $arr[$index];
            }
        }
        echo "<br>Произведение нечетных цифр = $p<br>";

        echo "<br>23. Найти произведение всех цифр этого числа, больших заданного T. <br>";
        $p = 1;
        $t = mt_rand(0,8);
        for ($index = 0; $index < count($arr); $index++)
        {
            if ($arr[$index] > $t)
            {
                $p *= $arr[$index];
            }
        }
        echo "<br>Произведение всех цифр, больших $t = $p<br>";
        echo "</p><br>"; 

        //одномерные массивы
        echo "<h2 $colorClassText>Блок 2. Одномерные массивы</h2>";
        echo "<p $colorClassText>";

        echo "<br>1.  Дано N действительных случайных чисел в диапазоне от -100 до 100. Найти минимальное положительное число и максимальное отрицательное число.";
        echo "Было сделано выше (см. задачу 4 со слайдов)<br>";

        echo "<br>2.  Дано N целых случайных чисел в диапазоне от 1 до 100.  Найти сумму четных и количество нечетных чисел.<br>";
        $min = 1;
        $max = 100;
        $count = mt_rand(10,20);
        $arr = GetRandArr($min, $max, $count);
        $sum = 0;
        $count = 0;
        //вывод на экрам + задача
        foreach($arr as $value) 
        {
            echo "$value ";
            if ($value % 2 == 0)
            {
                $sum +=$value;
            }
            else
            {
                $count++;
            }
        }
        echo "<br> Сумма четных чисел = $sum Количество нечетных чисел = $count<br>";

        echo "<br>3.  Дано N действительных случайных чисел в диапазоне от 1 до 10. Все элементы последовательности, значение которых меньше двух, 
        заменить на ноль, кроме того, получить сумму элементов, находящихся в диапазоне от 3 до 6, а также подсчитать их количество.<br>";
        $min = 1;
        $max = 10;
        $count = mt_rand(10,20);
        $arr = GetRandArr($min, $max, $count);
        $sum = 0;
        $count = 0;
        //вывод + задача
        echo "Массив: <br>";
        foreach ($arr as $key => $value) 
        {
            echo "$value ";
            if ($value < 2)
            {
                $arr[$key] = 0;
            }
            if ($value > 3 && $value < 6)
            {
                $count++;
                $sum += $value;
            }
        }
        //вывод результата
        echo "<br>Новый массив: <br>";
        foreach($arr as $value)
        {
            echo "$value ";
        }
        echo "<br>Сумма элементов, находящихся в диапазоне от 3 до 6 = $sum, количество = $count<br>";

        echo "<br>4.  Дан одномерный массив из N действительных случайных чисел в диапазоне от 1 до 50. 
        Найти минимальный элемент среди элементов с нечетным индексом и максимальный среди элементов с четным.<br>";
        $min = 1;
        $max = 50;
        $count = mt_rand(10,20);
        $arr = GetRandArr($min, $max, $count);
        $minElement = $max;
        $maxElement = $min;
        //вывод + задача
        foreach($arr as $key => $value)
        {
            echo "$key => $value; ";
            if ($key % 2 == 0 && $value > $maxElement)
            {
                $maxElement = $value;
            }
            if ($key % 2 == 1 && $value < $minElement)
            {
                $minElement = $value;
            }
        }    
        echo "<br>Минимальный элемент среди элементов с нечетным индексом = $minElement и максимальный среди элементов с четным = $maxElement<br>";

        echo "<br>5.  Дан одномерный массив из N случайных действительных чисел в диапазоне от -4 до 8 . 
        Вывести в порядке невозрастания (убывания) элементы, модуль которых больше 2.<br>"; 
        $min = -4;
        $max = 8;
        $count = mt_rand(10,20);
        $arr = GetRandArr($min, $max, $count);
        $newArr;
        //вывод + выбор элементов по модулю > 2
        foreach($arr as $value)
        {
            echo "$value ";
            if (abs($value) > 2)
            {
                $newArr[] = $value;
            }
        }
        echo "<br>Итоговый массив<br>";
        $newArr = SortArray($newArr, Order::decrease);
        foreach($newArr as $value)
        {
            echo "$value ";
        }
        echo "</p>"; 
        echo "<br>";

        //Двумерные массивы
        echo "<h2 $colorClassText>Блок 3. Двумерные массивы</h2>";
        echo "<p $colorClassText>";
        echo "<br>1.  Для группы учащихся известны годовые оценки по следующим предметам: математика, физика, химия, информатика. 
        Отобрать кандидатов на олимпиады (с отличными оценками) по каждому из предметов. Отбор кандидатов по предмету оформить в подпрограмме.<br>";
        //формирование массива
        $arr = [
            "pupil1" => [
                "mathematics" => 4,
                "physics" => 4,
                "chemistry" => 5,
                "informatics" => 3
            ],
            "pupil2" => [
                "mathematics" => 5,
                "physics" => 5,
                "chemistry" => 5,
                "informatics" => 5
            ],            
            "pupil3" => [
                "mathematics" => 5,
                "physics" => 5,
                "chemistry" => 5,
                "informatics" => 4
            ],
            "pupil4" => [
                "mathematics" => 5,
                "physics" => 5,
                "chemistry" => 5,
                "informatics" => 5
            ],
            "pupil5" => [
                "mathematics" => 3,
                "physics" => 4,
                "chemistry" => 5,
                "informatics" => 4
            ]
        ];
        echo "Список учеников:<br><strong>";
        WriteDoubleArr($arr, true);
        echo "</strong>";
        $arrNew = GetCandidat($arr);
        WriteArr($arrNew, true);

        echo "<br>2.  Для группы учащихся известны годовые оценки по следующим предметам: математика, физика, химия, информатика. 
        Найти среднюю в группе оценку по каждому из предметов. Суммирование оценок по предмету оформить в подпрограмме.<br>";
        $arrNew = GetAverageValueGrade($arr);
        WriteArr($arrNew, true);

        echo "<br>4.  Для группы учащихся известны годовые оценки по следующим предметам: математика, физика, химия, информатика. 
        Найти в группе среднюю оценку для каждого учащегося. Суммирование оценок учащихся оформить в подпрограмме.<br>";
        $arrNew = GetAverageValueGradePupil($arr);
        WriteArr($arrNew, true);
        
        echo "<br>3.  Спортсмены на соревнованиях совершают 6 попыток в прыжках в длину. Определить лучший результат для каждого участника. 
        Нахождение лучшего результата для спортсмена оформить в подпрограмме.<br>";
        //формирование массива
        $n = 5;
        $m = 6;
        $min = 1;
        $max = 5;        
        $arr = GetRandDoubleArr($n, $m, $min,$max);
        echo "Список спортсменов:<br>";
        WriteDoubleArr($arr, true);
        $newArr = GetMaxWithStr($arr, 0);
        WriteArr($newArr, true);

        echo "<br>5.  Для группы фирм известен курс их акций за каждый из месяцев календарного года. 
        Составить список тех фирм, курс акций которых все время повышался (т.е. курс за каждый последующий месяц больше, чем за предыдущий). 
        Проверку роста курса осуществить в подпрограмме.<br>";
        //формирование массива
        $arr = [
            "firm1" =>[1,2,3,4,5,6,7,8,9,10,11,12],
            "firm2" =>[1,2,3,2,5,6,7,8,9,10,11,12],
            "firm3" =>[1,2,3,4,5,6,5,8,9,10,11,12],
            "firm4" =>[1,2,3,4,5,6,7,1,9,10,11,12],
            "firm5" =>[1,2,3,4,5,6,7,8,9,10,11,10],
            "firm6" =>[2,3,4,5,6,7,8,9,10,11,12,13]
        ];
        echo "Список фирм и их акций:<br>";
        WriteDoubleArr($arr, true);
        $arrNew = GetFirm($arr);
        WriteArr($arrNew);

        echo "<br>6.  Выступления N спортсменов оцениваются M судьями по одной и той же числовой шкале. 
        Нужно узнать конечный результат каждого спортсмена, если он вычисляется так: из всех M оценок удаляются максимальная и минимальная 
        (если таких оценок несколько, то удаляется только одна), затем из оставшихся (M-2) находится их среднее арифметическое. 
        Вычисление конечного результата спортсмена оформить в подпрограмме.<br>";
        //формирование массива
        $n = mt_rand(5,10);
        $m = mt_rand(3,6);
        $min = 0;
        $max = 10;
        echo "Оценки: <br>";
        $arr = GetRandDoubleArr($n, $m, $min,$max);
        WriteDoubleArr($arr);
        $arrNew = GetGradeAthlete($arr);
        WriteArr($arrNew);

        echo "<br>7.  Известна среднемесячная температура воздуха на следующих островах Карибского моря: Куба, Тринидад, Ямайка, Гаити. 
        Определить, на каком из островов среднегодовая температура максимальна. Вычисление среднегодовой температуры оформить в подпрограмме.<br>";
        //формирование массива
        $arr = [
            "Куба" => [1,2,3,4,5,6,2,8,9,10,11,12],
            "Тринидад" => [1,2,3,2,5,6,7,8,9,10,11,12],
            "Ямайка" =>[1,2,3,4,5,22,5,8,9,10,11,12],
            "Гаити" => [1,2,3,4,5,6,7,1,9,10,11,23]
        ];
        echo "Список температур:<br>";
        WriteDoubleArr($arr, true);
        $newArr = GetMaxMinWith($arr);
        $max = $newArr["indexMax"];
        echo "Максимальная температура на острове $max<br>";

        echo "<br>8.  Известна среднемесячная температура воздуха на следующих островах Карибского моря: Куба, Тринидад, Ямайка, Гаити. 
        Определить для каждого из месяцев максимальную температуру. Нахождение максимальной температуры месяца оформить в подпрограмме.<br>";
        //формирование массива
        echo "Список температур:<br>";
        WriteDoubleArr($arr, true);
        $newArr = GetMaxWithStr($arr,0);
        WriteArr($arrNew, true);

        echo "<br>9.  Дан двумерный массив из 5 строк и 6 столбцов. Определить для каждого четного столбца максимальный элемент.
        Найти произведение этих элементов.<br>";
        $n = 5;
        $m = 6;
        $minValue = 0;
        $maxValue = 10;
        //формирование массива
        echo "Массив: <br><strong>";
        $arr = GetRandDoubleArr($n, $m, $minValue,$maxValue);
        WriteDoubleArr($arr);
        $p = 1;
        $elements = "";
        $arrNew = GetMaxWithStolb($arr);
        //расчет произведения элементов
        foreach($arrNew as $key => $value)
        {
            if ($key % 2 == 1)
            {
                continue;
            }
            $p*= $value;
            $elements .=$value." ";
        }
        echo "</strong>Произведение элементов $elements = $p<br>";

        echo "<br>10.  Определить, какая строка массива имеет максимальную сумму элементов 
        (считать, что строк с одинаковой суммой нет).<br>";
        $max = $minValue;
        $index = 0;
        echo "Суммы: ";
        $newArr = SumStr($arr);
        foreach($newArr as $key => $value)
        {           
            //проверка суммы
            if ($value > $max)
            {
                $max = $value;
                $index = $key;
            }
            echo "$key => $value; ";
        }
        echo "<br>Строка $index имеет максимальную сумму элементов ($max)<br>";

        echo "<br>11. Определить, для каждой нечетной строки минимальный элемент. Найти произведение этих элементов.<br>";
        $p = 1;
        $elements = "";
        $newArr = GetMinWithStr($arr,$maxValue);
        foreach($newArr as $key => $value)
        {
            //пропуск четных строк
            if ($key % 2 == 0) 
            {
                continue;
            }
            //нахождение произведения и сохранение перемножаемых элементов
            $p*=$value;
            $elements .=$value." ";
        }
        echo "Произведение элементов $elements = $p<br>";

        echo "<br>12.  Определить для каждой строки минимальный элемент. Среди этих элементов найти максимальный.<br>";
        $elements = "";
        $arrMin = array();
        $newArr = GetMinWithStr($arr,$maxValue);
        $max = $minValue;
        foreach($newArr as $key => $value)
        {           
            //определение максимального значения из минимальных
            if ($value > $max)
            {
                $max = $value;
            }
            $elements .=$value." ";
        }
        echo "Среди минимальных элементов $elements максимальный $max<br>";

        echo "<br>13.  Определить для каждого столбца максимальный элемент. Среди этих элементов найти минимальный.<br>";
        $elements = "";
        $arrMin = array();
        $min = $maxValue;
        $newArr = GetMaxWithStolb($arr);
        //определение минимального элемента
        foreach($newArr as $value)
        {
            if ($value < $min)
            {
                $min = $value;
            }
            $elements .=$value." ";
        }
        echo "Среди максимальных элементов $elements минимальный $min<br>";

        echo "<br>14.  Определить для каждого столбца массива сумму минимального и максимального элементов.  
        Найти произведение этих сумм.<br>";
        $elementsMin = "";
        $elementsMax = "";
        $arrMin = array();
        $min = 10;
        $max = 0;
        $arrMax = [0,0,0,0,0,0];
        $arrMin = [10,10,10,10,10,10];
        foreach($arr as $key => $value)
        {
            //поиск максимального числа в столбиках
            foreach($value as $key1 => $value1)
            {
                //сравнение элемента с минимальным и максимальным на данный момент для соответствующего столбца
                if ($value1 > $arrMax[$key1])
                {
                    $arrMax[$key1] = $value1;
                }
                if ($value1 < $arrMin[$key1])
                {
                    $arrMin[$key1] = $value1;
                }
            }
        }
        //определение минимального элемента
        foreach($arrMin as $value)
        {
            if ($value < $min)
            {
                $min = $value;
            }
            $elementsMin .=$value." ";
        }
        //определение максимального элемента
        foreach($arrMax as $value)
        {
            if ($value > $max)
            {
                $max = $value;
            }
            $elementsMax .=$value." ";
        }
        $p = $min*$max;
        echo "Среди максимальных элементов $elementsMax максимальный $max, минимальных $elementsMin - $min, произведение = $p<br>";




        /////////
        echo "<br>15.  Определить для каждой строки массива произведение минимального и максимального элементов. 
        Найти сумму этих произведений.<br>";
        $newArr = GetMaxMinWithStr($arr, $maxValue, $minValue);
        $sum = 0;
        foreach($newArr as $key => $value)
        {
            //расчет произведения минимального и максимальног значения в строке
            $p = $value["min"] * $value["max"];
            echo "$key => min = {$value["min"]}, max = {$value["max"]}, p = $p <br>";
            $sum += $p;
        }
        echo "<br>Сумма произведений максимального и минимального значений строк = $sum<br>";

        echo "<br>16.   Определить для каждой строки массива произведение элементов. 
        Найти, в какой строке это произведение максимально.<br>";
        $max = 0;
        $index = 0;
        $newArr = MultiplicationStr($arr);
        foreach($newArr as $key => $value)
        {
            //сравнение произведения строки с максимальным значением
            if ($value > $max)
            {
                $max = $value;
                $index = $key;
            }
            echo "$key => $value ";
        }
        echo "<br>Максимальное значение произведений чисел в строке $index<br>";

        echo "<br>17.  Определить, какой столбец массива имеет минимальную сумму элементов 
        (считать, что столбцов с одинаковой суммой нет).<br>";
        $index = 0;
        $arrMin = SumStolb($arr);
        //поиск минимальной суммы столбцов
        $min = $arrMin[0];
        foreach($arrMin as $key => $value)
        {
            echo "$key => $value";
            if ($value < $min)
            {
                $min = $value;
                $index = $key;
            }
        }
        echo "<br>Минимальная сумма элементов чисел в столбце $index<br>";

        echo "<br>18. Известны места 8 лыжников на каждом из 7 стартов Кубка мира. Определить победителя в общем зачете (с минимальной суммой мест).
        Если таких несколько, то победителем считается тот, кто лучше других претендентов на первое место выступил на последнем  этапе. <br>";
        $n = 8;
        $m = 7;
        $min = 1;
        $max = $n;
        //формирование массива
        echo "Массив: <br>";
        $arr = GetRandDoubleArr($n, $m, $min,$max);
        WriteDoubleArr($arr);
        $arrPlace = SumStr($arr);
        //определение минимального значения в массиве
        echo "Общий зачет: <br>";
        $index = 0;
        $min = $arrPlace[0];
        foreach($arrPlace as $key => $value)
        {
            //сравнение последнего этапа
            if ($value == $min)
            {
                if ($arr[$key][$m-1] < $arr[$index][$m-1])
                {
                    $min = $value;
                    $index = $key;
                }
            }
            if ($value < $min)
            {
                $min = $value;
                $index = $key;
            }
            echo "$key => $value ";
        }
        echo "<br>Победитель: $index<br>";
        
        echo "<br>19. По результатам метеорологических наблюдений за 10 последних лет известно количество солнечных дней в году для пяти морских курортов. 
        Кроме этого известны расстояния до них. Определить курорт с наиболее благоприятным климатом (с максимальным суммарным количеством солнечных дней за время наблюдений). 
        Если таких несколько, то вывести ближайший из них.<br>";
        //формирование массива
        $arr = [
            "k1" => [
                "t" => [60,65,70,75,80,85,90,85,98,100],
                "distance" => 40
            ],
            "k2" => [
                "t" => [60,65,70,75,54,85,90,85,98,85],
                "distance" => 15
            ],
            "k3" => [
                "t" => [65,65,70,75,80,85,90,85,98,95],
                "distance" => 20
            ],
            "k4" => [
                "t" => [60,65,70,75,80,85,80,85,70,80],
                "distance" => 25
            ],
            "k5" => [
                "t" => [70,65,70,75,70,85,90,95,98,90],
                "distance" => 30
            ]
        ];

        echo "Массив: <br>";
        $arrTDist = [
            "k1" => ["t" => 0, "dist" => 0],
            "k2" => ["t" => 0, "dist" => 0],
            "k3" => ["t" => 0, "dist" => 0],
            "k4" => ["t" => 0, "dist" => 0],
            "k5" => ["t" => 0, "dist" => 0]
        ]; //массив с суммой солнечных дней и дистанцией
        //рассчет суммы солнечных дней и вывод на экран изначального массива
        foreach($arr as $key => $value)
        {
            //вывод на экран
            echo "$key => dist = {$value["distance"]}; t = ";
            $arrTDist[$key]["dist"] = $value["distance"];
            //суммирование солнечных дней
            foreach($value["t"] as $key1 => $value1)
            {
                $arrTDist[$key]["t"] += $value1;
                echo $value1." ";
            }
            echo "<br>";
        }
        echo "Солнечных дней: <br>";
        $max = 0;
        $index = 0;
        //определение максимального количества солнечных дней
        foreach($arrTDist as $key => $value)
        {
            //сравнение дистанций при одинаковых количествах солнечных дней
            if ($value["t"]== $max)
            {
                if ($arrTDist[$key]["dist"] < $arrTDist[$index]["dist"])
                {
                    $max = $value["t"];
                    $index = $key;
                }
            }
            //сравнение с максимальным количеством солнечных дней
            if ($value["t"] > $max)
            {
                $max = $value["t"];
                $index = $key;
            }
            //вывод сумм солнечных дней
            echo "$key => t = {$value["t"]} dist = {$value["dist"]} ";
        }
        echo "<br>Максимальное количество солнечных дней {$arrTDist[$index]["t"]}, расстояние {$arrTDist[$index]["dist"]}, курорт - $index<br>";

        echo "<br>20. В автопарке находится 10 автомобилей. Известен их пробег в течение каждого из 5 рабочих дней. 
        Определить, какой из автомобилей за рабочую неделю преодолел максимальное расстояние. Если таких несколько, то вывести хотя бы одного из них.<br>";
        $n = 10;
        $m = 5;
        $minValue = 10;
        $maxValue = 20;
        //формирование массива
        $arr = GetRandDoubleArr($n, $m, $minValue, $maxValue);
        WriteDoubleArr($arr,true);
        $max = SumStr($arr);
        //определение макисального значения
        echo "Расстояния: <br>";
        $index = 0;
        foreach ($max as $key => $value)
        {
            if ($value > $max[$index])
            {
                $index = $key;
            }
            echo "$key => $value ";
        }
        echo "<br>Автомобиль $index преодолел расстояние {$max[$index]}<br>";

        echo "<br>21. Бригада рабочих состоит из 8 человек. Известно сколько деталей выпустил каждый из них в течение каждого из 5 рабочих дней. 
        Определить, какой рабочий произвел максимальное количество деталей. Если таких несколько, то вывести хотя бы одного из них.<br>";
        $n = 8;
        $m = 5;
        $minValue = 10;
        $maxValue = 20;
        //формирование массива
        $arr = GetRandDoubleArr($n, $m, $minValue, $maxValue);
        WriteDoubleArr($arr);
        $newArr = SumStr($arr);
        $max = $minValue;
        $indexMax = 0;
        //поиск максимального значения 
        foreach($newArr as $key => $value)
        {
            if ($value > $max)
            {
                $max = $value;
                $indexMax = $key;
            }
            echo "$key => $value ";
        }
        echo "<br>Рабочий $indexMax выпустил $max деталей<br>";

        echo "<br>22. На каждом этаже трехэтажного дома жилых 6 комнат, каждая из которых имеет форму прямоугольника. 
        Длина и ширина каждой комнаты известны. 
        Определить, какой из этажей дома имеет минимальную жилую площадь. Если таких несколько, то вывести хотя бы одного из них.<br>";
        $n = 3;
        $m = 6;
        //формирование массива
        $arr = array();
        for($index = 0; $index < $n; $index++)
        {
            $addArr = array();
            echo "$index => (";
            for ($index1 = 0; $index1 < $m; $index1++)
            {
                $w = mt_rand(3, 10);
                $l = mt_rand(3, 10);
                $addArr[] = ["width" => $w, "length" => $l];
                echo "width => $w, length => $l;";
            }
            echo ")<br>";
            $arr[] = $addArr;
        }
        $newArr = array();
        $max = 0;
        $indexMax = 0;
        foreach($arr as $key => $value)
        {
            //определение площади каждого этажа
            $sum = 0;
            foreach($value as $key1 => $value1)
            {
                $sum += $value1["width"]*$value1["length"];
            }
            //сравнение с максимальной ранее запомненой площадью
            if ($sum > $max)
            {
                $max = $sum;
                $indexMax = $key;
            }
            echo "$key => $sum; ";
        }
        echo "<br>Этаж $indexMax имеет площадь $max<br>";
        
        echo "<br>23. Известны итоги сдачи экзаменов группой из 20 студентов по четырем предметам. 
        Определить, по результатам каких экзаменов в группе максимальный средний балл.<br>";
        $n = 20;
        $m = 4;
        $minValue = 1;
        $maxValue = 5;
        //формирование массива
        $arr = GetRandDoubleArr($n, $m, $minValue, $maxValue);
        WriteDoubleArr($arr);
        $newArr = SumStolb($arr);
        $max = 0;
        $indexMax = 0;
        //определение предмета, по которому максимальный средний балл
        foreach($newArr as $key => $value)
        {
            $srZnach = $value / $m;
            if ($srZnach > $max)
            {
                $max = $srZnach;
                $indexMax = $key;
            }
            echo "$key => $value; ";
        }
        echo "<br>По предмету $indexMax средний балл $max<br>";

        echo "<br>24. В соревнованиях по десятиборью участвуют 8 спортсменов. Известны результаты в баллах по каждому из видов. 
        Вывести фамилии спортсменов и их результаты в сумме в порядке занятых мест.<br>";
        $n = 8;
        $m = 10;
        //формирование массива
        $arr = array();
        for($index = 0; $index < $n; $index++)
        {
            $addArr = array();
            $addArr["name"] = "name".$index;
            $addArr["value"] = array();
            echo "{$addArr["name"]} => (";
            for ($index1 = 0; $index1 < $m; $index1++)
            {
                $value = mt_rand(1, 10);
                $addArr["value"][] = $value;
                echo "$value ";
            }
            echo ")<br>";
            $arr[] = $addArr;
        }
        $newArr = array();
        foreach($arr as $key => $value)
        {
            //определение суммы
            $sum = 0;
            $addArr = array();
            foreach($value["value"] as $key1 => $value1)
            {
                $sum += $value1;
            }
            //сохранение суммы результата с именем
            $addArr["value"] = $sum;
            $addArr["name"] = $value["name"];
            $newArr[] = $addArr;
        }
        rsort($newArr);
        foreach($newArr as $key => $value)
        {
            echo "{$value["name"]} => {$value["value"]}<br>";
        }

        echo "<br>25. Известен курс акций 5 фирм за каждый из месяцев календарного года. За второе полугодие для каждой фирмы
         определить месяц максимального прироста курса. 
        Если таких несколько, то вывести последний из них.<br>";
        //формирование массива
        $arr = [
            "firm1" =>[1,2,3,4,5,6,7,8,9,10,11,12],
            "firm2" =>[1,2,3,2,5,6,7,8,9,89,12,12],
            "firm3" =>[1,2,3,4,5,6,5,14,9,10,11,12],
            "firm4" =>[1,2,3,4,5,6,7,1,9,10,11,12],
            "firm5" =>[1,2,3,4,5,6,7,8,23,10,11,10],
            "firm6" =>[2,3,4,5,6,7,8,9,10,11,12,12]
        ];
        echo "Список фирм и их акций:<br>";
        WriteDoubleArr($arr, true);
        foreach($arr as $key => $value)
        {
            echo "$key => ";
            $max = 0;
            $indexMax = 6;
            foreach($value as $key1 => $value1)
            {
                //пропуск первого полугодия
                if ($key1 < 6)
                {
                    continue;
                }
                //определение месяца с максимальным приростом курса
                if ($value1 >= $max)
                {
                    $max = $value1;
                    $indexMax = $key1;
                }
            }
            echo "месяц $indexMax (прирост = $max)<br>";
        }
        echo "</p>";

        //Моделирование
        echo "<h2 $colorClassText>Блок 4. Моделирование</h2>";
        echo "<p $colorClassText>";
        echo "1. На заводе собирают прибор из трех блоков. Известно, что среди блоков первого типа встречаются 2%
         со скрытыми дефектами, среди блоков второго и третьего типа — соответственно 3% и 5% дефектных. 
         С использованием генератора случайных чисел  промоделировать сборку 1000 деталей и определить, 
         сколько будет собрано приборов без брака.<br>";
        $n = 3;
        $m = 1000;
        $valueMin = 0;
        $valueMax = 100;
        //формирование массива со случайными значениями
        $arr = GetRandDoubleArr($n,$m,$valueMin, $valueMax);
        //вывод на экран количества бракованных блоков
        foreach($arr as $key => $value)
        {
            $count = 0;
            foreach($value as $key1 => $value1)
            {
                //проверка блоков на дефекты
                switch($key)
                {
                    case 0:
                        {
                            if ($value1 < 2)
                            {
                                $count++;
                            }
                            break;
                        }
                    case 1:
                        {
                            if ($value1 < 3)
                            {
                                $count++;
                            }
                            break;
                        }
                    case 2:
                    default:
                        {
                            if ($value1 < 5)
                            {
                                $count++;
                            }
                            break;
                        }
                }
            }
            echo "$key: $count бракованных блоков из $m<br>";
        }
        //определение дефектного прибора
        $count = 0;
        for ($index = 0; $index < $m; $index++)
        {
            if ($arr[0][$index] >= 2 && $arr[1][$index] >= 3 && $arr[2][$index] >= 5)
            {
                $count++;
            }
        }
        echo "Приборов без дефекта $count из $m<br>";

        echo "<br>2. Шахматист A в среднем на каждые 100 партий выигрывает у шахматиста B на 6 партий больше, 
        чем проигрывает, а доля ничьих равна 80%. С использованием генератора случайных чисел промоделировать матч из 24 партий. 
        С каким результатом он закончится?<br>";
        $draw = 80;
        $loss = 7;
        $prize = 13;
        $n = 24;
        //формирование массива
        $arr = GetRandArr($valueMin, $valueMax, $n);
        $lossCount = 0;
        $prizeCount = 0;
        //вывод результатов партий и подсчет побед и поражений
        foreach ($arr as $key => $value)
        {
            //подсчет проигрышей
            if ($value <= $loss)
            {
                $lossCount++;
                echo "<font color = \"red\">партия $key => $value</font><br>";
                continue;
            }
            //подсчет выигрышей
            if ($value >= $draw+$prize)
            {
                $prizeCount++;
                echo "<font color = \"green\">партия $key => $value</font><br>";
                continue;
            }
            echo "партия $key => $value<br>";
        }
        //анализ результата выигрышей и проигрышей   
        if ($lossCount == $prizeCount)
        {
            echo "Матч прошел в ничью (побед и поражений по $lossCount)<br>";
        }
        if ($lossCount > $prizeCount)
        {
            echo "Шахматист А проиграл (поражений - $lossCount, побед - $prizeCount)<br>";
        }
        if ($lossCount < $prizeCount)
        {
            echo "Шахматист А выиграл (поражений - $lossCount, побед - $prizeCount)<br>";
        }

        echo "<br>3. Составить программу, позволяющую промоделировать опрос 100 человек и на его основании выяснить: 
        переименовать село Папинск в село Маминск или оставить за ним прежнее название. 
        Примечание: программа должна генерировать ответы самостоятельно с использованием генератора случайных чисел.<br>";
        $n = 100;
        $valueMax = 1;
        $valueMin = 0;
        //формирование массива
        $arr = GetRandArr($valueMin, $valueMax, $n);
        //анализ результата опроса
        $countYes = 0;
        $countNo = 0;
        foreach($arr as $key => $value)
        {
            if ($value == 1)
            {
                $countYes++;
            }
            else
            {
                $countNo++;
            }
        }
        $result = ($countNo>$countYes) ? "не переименовывать":"переименовать";
        echo "Голосов за - $countYes, голосов против - $countNo. Результат голосования: $result<br>";

        echo "<br>4. Имеется две спичечные коробки, в каждой из которых находится по 10 спичек. 
        Случайным образом выбирается коробка и из нее достается одна спичка. Процесс продолжается до тех пор, 
        пока одна из коробок не опустеет. С использованием генератора случайных чисел промоделировать этот процесс, 
        и ответить на вопрос: сколько спичек будет всего сожжено?<br>";
        $m = 10;
        //количество спичек в коробке
        $countOne = $m;
        $countTwo = $m;
        //выбор коробки и доставание спички
        while ($countOne > 0 && $countTwo > 0)
        {
            $box = mt_rand(0,1);
            if ($box == 0)
            {
                $countOne--;
            }
            else
            {
                $countTwo--;
            }
            echo "Первая коробка - $countOne, вторая коробка - $countTwo<br>";
        }
        $count = 2*$m - $countOne - $countTwo;
        echo "Спичек сожжено $count<br>";

        echo "<br>5. В детском саду имеется группа детей из 20 человек. Каждому ребенку на утреннике Дед Мороз 
        случайным образом дарит одну из следующих игрушек: зайца, мяч или куклу. 
        С использованием генератора случайных чисел промоделировать этот процесс, и ответить на вопрос: сколько игрушек 
        каждого вида было подарено.<br>";
        $n = 20;
        $countRabbit = 0;
        $countBall = 0;
        $countDoll = 0;
        //выбор игрушки
        for($index = 0; $index < $n; $index++)
        {
            $value = mt_rand(0,2);
            echo "$index => ";
            //определение типа игрушки и ее подсчет
            switch($value)
            {
                case 0:
                    {
                        $countRabbit++;
                        echo "<font color = \"grey\">кролик</font><br>";
                        break;
                    }
                case 1:
                    {
                        $countBall++;
                        echo "<font color = \"red\">мяч</font><br>";
                        break;
                    }
                case 2:
                default:
                    {
                        $countDoll++;
                        echo "<font color = \"green\">кукла</font><br>";
                        break;
                    }
            }
        }
        echo "Подарено <font color = \"grey\">$countRabbit кроликов</font>, 
        <font color = \"red\">$countBall мячей</font>, <font color = \"green\">$countDoll кукол</font><br>";

        echo "<br>6. Робот находится в центре окружности радиусом 3.5 метра и в каждый момент времени делает шаг (длиной 1 м)
         в случайном направлении: на север, на юг, на восток или на запад. 
         С использованием генератора случайных чисел промоделировать этот процесс, и ответить на вопрос: хватит ли 12 шагов, 
         чтобы выйти за пределы окружности?<br>";
        $r = 3.5;
        $step = 1;
        $n = 12;
        $positionX = 0;
        $positionY = 0;
        $isStop = false;
        //шагание робота
        for ($index = 0; $index < $n; $index++)
        {
            $direction = mt_rand(0,3); //0 - север, 1 - восток, 2 - юг, 3 - запад
            switch($direction)
            {
                case 0:
                    {
                        $positionY--;
                        break;
                    }
                case 1:
                    {
                        $positionX++;
                        break;
                    }
                case 2:
                    {
                        $positionY++;
                        break;
                    }
                case 3:
                default:
                    {
                        $positionX--;
                        break;
                    }
            }
            echo "Позиция робота: $positionX, $positionY<br>";
            //проверка выхода за окружность
            if ($positionX < -$r || $positionX > $r || $positionY < -$r || $positionY > $r)
            {
                echo "Хватит $index шагов, чтобы выйти из окружности<br>";
                $isStop = true;
                break;
            }
        }
        //при не хватании шагов - вывод текста
        if (!$isStop)
        {
            echo "12 шагов не хватит<br>";
        }

        echo "<br>7. Известно, что в среднем из 100 выстрелов солдат A поражает мишень 75 раз, 
        а солдат B — 80 раз. С использованием генератора случайных чисел промоделировать соревнование между ними, 
        в котором каждому нужно попасть в цель по 10 раз. Кто быстрее поразит все мишени?<br>";
        $countA = 75;
        $countB = 80;
        $valueMin = 0;
        $valueMax = 100;
        $countHitsA = 0;
        $countHitsB = 0;
        //проведение выстрелов
        while ($countHitsA < 10 && $countHitsB < 10)
        {
            //значение в % попадания
            $valueA = mt_rand($valueMin, $valueMax);
            $valueB = mt_rand($valueMin, $valueMax);
            //подсчет значений при значении больше значения не попадания
            if ($valueA > $valueMax-$countA)
            {
                $countHitsA++;
            }
            if ($valueB > $valueMax-$countB)
            {
                $countHitsB++;
            }
            echo "попадания солдата A - $countHitsA, попадания солдата B - $countHitsB<br>";
        }
        $result = ($countHitsA == $countHitsB) ? "солдаты А и В поразят одновременно" : 
        (($countHitsA == 10) ? "солдат A поразит мишени быстрее" : "солдат B поразит мишени быстрее");
        echo "$result<br>";

        echo "<br>8. В среднем из 128 компьютеров в течение месяца на одном выходит из строя дисплей. 
        За тот же период времени на одной из 67 ЭВМ происходит поломка дисковода и на двух из 53 машин происходит 
        крах системы из-за заражения вирусом. С использованием генератора случайных чисел смоделировать работу 
        дисплейного класса из 13 компьютеров за один месяц, и ответить на вопрос: каково общее количество поломок за этот период?<br>";
        $disp = 128;
        $disk = 67;
        $virus = 53;
        $countComp = 13;
        $count = 0;
        //пиребор компов
        for ($index = 0; $index < $countComp; $index++)
        {
            //формиролвание поломок
            $collapseDisp = mt_rand(1, 128);
            $collapseDisk = mt_rand(1, 67);
            $collapseVirus = mt_rand(1, 53);
            //вывод поломок на экран
            $collapseDispResult = ($collapseDisp == 1)? "+":"-";
            $collapseDiskResult = ($collapseDisk == 1)? "+":"-";
            $collapseVirusResult = ($collapseVirus <= 2)? "+":"-";
            echo "Комп 1 поломки: дисплей $collapseDispResult дисковод $collapseDiskResult вирус $collapseVirusResult<br>";
            //при наличии поломок - плюсуем
            if ($collapseDisp == 1 || $collapseDisk == 1 || $collapseVirus <=2)
            {
                $count++;
            }
        }
        echo "Общее количество поломок $count<br>";
        echo "</p>";

        //Функции 
        echo "<h2 $colorClassText>Блок 5. Функции</h2>";
        echo "<p $colorClassText>";

        echo "3.	Дано N десятоков целых чисел. Определить, сколько из них могут составлять ряд Фибоначчи. 
        Первое число Фибоначчи равно 0, второе – 1. Каждое последующее равно сумме двух предыдущих. 
        Проверку оформить в виде функции.<br>";
        $n = 50;
        $valueMin = 0;
        $valueMax = 5;
        //формирование массива
        $arr = GetRandArr($valueMin, $valueMax, $n);
        foreach ($arr as $key => $value)
        {
            echo "$value ";
        }
        //проверка последовательности Фибоначчи
        function CheckedFib($arr)
        {
            $count = 0;
            $oldValue = 0;
            $newValue = 1;
            $isSertch = false;
            foreach($arr as $key => $value)
            {
                //проверка первого элемента (0)
                if ($value == 0 && !$isSertch)
                {
                    $isSertch = true;
                    continue;
                }
                //проверка 1 (если есть, то считаем, что найдена последовательность)
                if ($isSertch && $value == $newValue)
                {
                    $count++;
                    $isSertch = false;
                    continue;
                }
                $isSertch = false;
            }
            echo "<br>Последовательность могут составить $count<br>";
        }
        CheckedFib($arr);

        echo "<br>4.	Дано N пар чисел, представляющих собой координаты точек на плоскости. 
        Найти R — радиус наименьшей окружности с центром в начале координат, в которую попадают все точки. 
        Определение расстояния от точки до начала координат оформить в виде функции.<br>";
        $n = 5;
        $arr = array();
        $valueMax = 10;
        for ($index = 0; $index < $n; $index++)
        {
            //формирование точек
            $valueX = mt_rand(0,$valueMax);
            $valueY = mt_rand(0,$valueMax);
            $arr[] = [$valueX, $valueY];
        }

        //определение расстояния до точки
        function GetRadius($arr):float
        {
            $maxLength = 0;
            foreach($arr as $key => $value)
            {
                $length = sqrt($value[0]**2+$value[1]**2);
                echo "({$value[0]};{$value[1]}) расстояние от (0;0) = $length<br>";
                if ($length > $maxLength)
                {
                    $maxLength = $length;
                }
            }
            return $maxLength;
        }
        $r = GetRadius($arr);
        $r1 = sqrt($valueMax**2+$valueMax**2);
        echo "Минимальный радиус = $r, максимально возможный - $r1<br>";

        echo "5.	Известны оценки группы студентов за сессию. В группе 20 студентов, в сессии 4 экзамена. Определить суммарную стипендию. 
        Считать, что стипендия в размере R рублей начисляется студентам, сдавшим сессию без троек, а отличники получают стипендию, повышенную на 25% . 
        Подсчет стипендии студента оформить в виде функции.<br>";
        $n = 20;
        $m = 4;
        $valueMax = 5;
        $valueMin = 2;
        //формирование массива
        $arr = GetRandDoubleArr($n, $m,$valueMin,$valueMax);
        WriteDoubleArr($arr, true);
        //определение суммарной стипендии
        function GetStip($arr):float
        {
            $r = 1000;
            $count4 = 0;
            $count5 = 0;
            $otl = "";
            $ud = "";
            //подсчет количества ударнков и отличников
            foreach($arr as $key => $value)
            {
                $isOtl = true;
                $isUd = true;
                //определение ударников и отличников
                foreach($value as $value1)
                {
                    if($value1 < 4)
                    {
                        $isOtl = false;
                        $isUd = false;
                        break;
                    }
                    if ($value1 == 4)
                    {
                        $isOtl = false;
                    }
                }
                //подсчет ударников и отличников и запоминание их индексов
                if ($isOtl)
                {
                    $count5++;
                    $otl .= $key." ";
                    continue;
                }
                if ($isUd) 
                {
                    $count4++;
                    $ud .= $key." ";
                }
            }
            echo "Отличников - $count5 ( $otl), ударников - $count4 ( $ud)";
            //вычисление суммы стипендий
            return $count4*$r+$count5*$r*1.25;
        }
        $value = GetStip($arr);
        echo "<br>Суммарная стипендия $value<br>";

        echo "<br>6.	Известен расход электроэнергии по всем квартирам 24-х квартирного дома. Определить суммарную плату за электричество. 
        При расходе до 100 кВт*ч на человека берется тариф R копеек за 1 кВт*ч, в случае превышения нормы тариф возрастает на 20%. 
        Подсчет платы для квартиры  оформить в виде функции.<br>";
        $n = 24;
        //формирование массива расходов электроэнергии по квартирам
        $valueMin = 0; 
        $valueMax = 150;
        $arr = GetRandArr($valueMin, $valueMax, $n);
        WriteArr($arr, true);
        function GetSum($arr): float
        {
            $sum = 0;
            $r = 5;
            $limit = 100;
            $rLimit = $r*1.2;
            //определение суммы оплаты по квартирам
            foreach($arr as $key => $value)
            {
                //определение тарифа
                if ($value < $limit)
                {
                    $sum += $value*$r;
                }
                else 
                {
                    $sum += $value*$rLimit;
                }
            }
            return $sum;
        }
        $value = GetSum($arr);
        echo "<br>Суммарная плата = $value<br>";

        echo "<br>7.	Известна ежемесячная заработная плата персонала предприятия в течение календарного года. Вывести фамилии тех сотрудников, 
        у которых годовая заработная плата выше средней. Считать, что штат предприятия составляет 7 человек. Подсчет годовой зарплаты работника оформить в виде функции.<br>";
        $n = 7;
        $m = 12;
        $valueMin = 30;
        $valueMax = 50;
        $fio = ["Иванов", "Петров","Сидоров","Тюленин","Совин","Кабанин","Моржов"];
        //формирование массива
        $arr= GetRandDoubleArr($n,$m,$valueMin, $valueMax, TypeArray::int, $fio);
        WriteDoubleArr($arr, true);

        //расчет зарплаты за год
        function GetZP($arr): float
        {      
            $sumP = 0;
            foreach($arr as $value1)
            {
                $sumP += $value1;
            }       
            return $sumP;
        }

        //определение средней зарплаты
        $sum = 0;
        $arrZ = array();
        foreach($arr as $key => $value)
        {
            $sumP = GetZP($value);
            $sum+=$sumP;      
            $arrZ[$key] = $sumP/$m;     
        }
        $srZP = $sum / ($n*$m);
        echo "Средняя зарплата = $srZP<br>";
        //поиск сотрудников, у которых зарплата выше средней
        foreach($arrZ as $key => $value)
        {
            if ($value > $srZP)
            {
                echo "$key ($value), ";
            }           
        }
        echo "<br>";

        echo "<br>8.	Известна ежемесячная заработная плата персонала предприятия в течение календарного года. Вывести фамилии сотрудников с минимальной 
        и максимальной годовой заработной платой. Считать, что штат предприятия составляет 8 человек. Подсчет годовой зарплаты работника оформить в виде функции.<br>";
        $n = 8;
        $m = 12;
        $valueMin = 30;
        $valueMax = 50;
        $fio = ["Иванов", "Петров","Сидоров","Тюленин","Совин","Кабанин","Моржов", "Федотов"];
        //формирование массива
        $arr= GetRandDoubleArr($n,$m,$valueMin, $valueMax, TypeArray::int, $fio);
        WriteDoubleArr($arr, true);
        //расчет минимальной и максимальной зарплаты
        function GetMinMaxZP($arr):array
        {
            $minMaxValue = array();
            $minMaxValue["min"] = min($arr);
            $minMaxValue["max"] = max($arr);
            return $minMaxValue;
        }
        //определенеие минимального и максимального значений
        $min = $valueMax;
        $nameMin = "";
        $max = $valueMin;
        $nameMax = "";
        foreach ($arr as $key => $value) 
        {
            $minMax = GetMinMaxZP($value);
            if ($minMax["min"] < $min)
            {
                $min = $minMax["min"];
                $nameMin = $key;
            }
            if ($minMax["min"] == $min)
            {
                $nameMin .= ", ".$key;
            }
            if ($minMax["max"] > $max)
            {
                $max = $minMax["max"];
                $nameMax = $key;
            }
            if ($minMax["max"] > $max)
            {
                $nameMax .= ", ".$key;
            }
        }
        echo "Минимальная зарплата у $nameMin ($min), максимальная - $nameMax ($max)<br>";

        echo "<br>9.	Дан одномерный массив из 100 случайных целых чисел в диапазоне от 5 до 25 включительно. Вывести все числа, которые максимально часто
         встречаются в массиве и количество их повторений. Подсчет количества повторений для числа оформить в виде функции.<br>";
        $n = 100;
        $valueMin = 5;
        $valueMax = 25;
        //формирование массива
        $arr = GetRandArr($valueMin, $valueMax, $n);
        WriteArr($arr);
        //подсчет количества повторений
        function GetCountNumeric($arr, $numeric):int
        {
            $count = 0;
            foreach($arr as $value)
            {
                if ($value == $numeric)
                {
                    $count++;
                }
            }
            return $count;
        }
        $max = 0;
        $maxNumeric = "";
        //проверка каждого значение на количество вхождений в массив и сравнение с максимумом
        for ($index = $valueMin; $index <= $valueMax; $index++)
        {
            $value = GetCountNumeric($arr, $index);
            if ($value > $max)
            {
                $max = $value;
                $maxNumeric = $index;
                continue;
            }
            if ($max == $value)
            {
                $maxNumeric .= ", $index";
            }
        }
        echo "Максимальное количетсво цифр $max (значения $maxNumeric)<br>";

        echo "<br>10.	Дан одномерный массив из 150 случайных целых чисел в диапазоне от 14 до 37 включительно. Вывести те числа, которые наиболее редко 
        встречаются в массиве и количество их повторений. Подсчет количества повторений для числа оформить в виде функции.<br>";
        $n = 150;
        $valueMin = 14;
        $valueMax = 37;
        //формирование массива
        $arr = GetRandArr($valueMin, $valueMax, $n);
        WriteArr($arr);
        //перебор значений и определение минимального количества значений
        $min = $n; 
        $minNumeric = "";
        for ($index = $valueMin; $index <= $valueMax; $index++)
        {
            $value = GetCountNumeric($arr, $index);
            if ($value < $min)
            {
                $min = $value;
                $minNumeric = $index;
                continue;
            }
            if ($value == $min)
            {
                $minNumeric .= ", $index";
            }
        }
        echo "Минимальное количетсво цифр $min (значения $minNumeric)<br>";

        echo "<br>11.	Дан одномерный массив из 50 случайных целых чисел в диапазоне от 10 до 85 включительно. Вывести в порядке возрастания те числа из 
        данного диапазона, которые ни разу не встречаются в массиве. Создать функцию для поиска элемента в массиве.<br>";
        $n = 50;
        $valueMin = 10;
        $valueMax = 85;
        $arr = GetRandArr($valueMin, $valueMax, $n);
        WriteArr($arr);
        //перебор значений и определение количества значений
        $result = "";
        for ($index = $valueMin; $index <= $valueMax; $index++)
        {
            $value = GetCountNumeric($arr, $index);
            if ($value == 0)
            {
                $result .= "$index ";
            }
        }
        echo "<br>В массиве нет значений: $result<br>";

        echo "<br>12.	Дан одномерный массив из 40 случайных целых чисел в диапазоне от 16 до 89 включительно. Вывести минимальное и максимальное числа из
         данного диапазона, которые ни разу не встречаются в массиве. Создать функцию для поиска элемента в массиве.<br>";
        $n = 40;
        $valueMin = 16;
        $valueMax = 89;
        $arr = GetRandArr($valueMin, $valueMax, $n);
        WriteArr($arr);
        //перебор значений и поиск не встречающихся значений
        $result = "";
        $arrNew = array();
        for ($index = $valueMin; $index <= $valueMax; $index++)
        {
            $value = GetCountNumeric($arr, $index);
            if ($value == 0)
            {
                $result .= "$index ";
                $arrNew[] = $index;
            }
        }
        //поиск минимального и максимального значения
        $min = min($arrNew);
        $max = max($arrNew);
        echo "<br>Из значений, не встречающихся в массиве ( $result) минимальное - $min, максимальное - $max<br>";
        echo "</p>";

        //Строки
        echo "<h2 $colorClassText>Блок 6. Строки</h2>";
        echo "<p $colorClassText>";

        echo "1.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке последние слова всех предложений.
         Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
         слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";

        $text = "Дан текст, состоящий из строк. Необходимо вывести в алфавитном порядке последние слова всех предложений. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв, перенос слов по слогам отсутствует.<br> Дан текст, состоящий из строк. Необходимо вывести в обратном алфавитном порядке первые  слова всех предложений. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв, перенос слов по слогам отсутствует.";

        echo "Текст: <strong>".$text."</strong>";
        //получение последнего слова
        function GetWord($str, $word = -1):string
        {
            $value = explode(" ", $str);
            if ($word == -1)
            {
                return $value[count($value)-1];
            }
            else
            {
                for ($index = 0; $index < count($value); $index++)
                {
                    if ($value[$index] != "" && $value[$index] != " " && strpos($str,"<br>",  $index) < -1)
                    {
                        return $value[$index];
                    }
                }
            }
            return "";
        }
        //получение последнего слова в каждом предложении
        $arrString = explode(".",$text);
        $arrNew = array();
        for ($index = 0; $index < count($arrString); $index++)
        {
            if ($arrString[$index] == "") continue;
            $arrNew[] = GetWord($arrString[$index]);
        }
        //сортировка
        sort($arrNew);
        //вывод полученного массива
        echo "<br><br>Последние слова в алфавитном порядке:<br>";
        WriteArr($arrNew);

        echo "<br>2.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в обратном алфавитном порядке первые слова всех предложений.
        Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
        слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arrNew = array();
        for ($index = 0; $index < count($arrString); $index++)
        {
            if ($arrString[$index] == "") continue;
            $value = GetWord($arrString[$index], 1);
            if ($value == "") continue;
            $arrNew[] = $value;
        }
         //сортировка
        rsort($arrNew);
        //вывод полученного массива
        echo "<br>Первые слова в обратном алфавитном порядке:<br>";
        WriteArr($arrNew);


        echo "<br>3.	Дан текст, состоящий из 2 строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке слова,
         присутствующие в обеих строках одновременно. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
         слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arrNew = array();
        $arrStr = explode("<br>", $text);
        $arr1 = explode(" ",(string)($arrStr[0]));
        //поиск слова в строке
        function GetWordInStr(string $value, string $str):bool
        {
            $result = str_contains($str,(string)$value);
            return $result;
        }
        //перебор слов 1 строки 
        foreach($arr1 as $key =>  $value)
        {
            $value = str_replace(" ", "", $value);
            if ($value == "" || $value == " ") unset($arr1[$key]);
            //поиск слов во второй
            if (GetWordInStr($value, $arrStr[1]))
            {
                $arrNew[] = $value;
            }
        }
        sort($arrNew);
        echo "Присутствуют слова: ";
        WriteArr($arrNew);

        echo "<br>4.	Дан текст, состоящий из 2 строк с максимальной длиной 80 символов. Необходимо вывести в обратном алфавитном порядке те слова,
         которые не присутствуют в обеих строках одновременно. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
          слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arrNew = array();
        $arrNew1 = array();
        $arrStr = explode("<br>", $text);
        $arr1 = preg_split("/[ .,]/",$arrStr[0]);
        $arr2 = preg_split("/[ .,]/",$arrStr[1]);
        //перебор слов в 1 строке
        foreach($arr1 as $key => $value)
        {
            //поиск слов во 2 строке
            if (GetWordInStr((string)$value, (string)$arrStr[1]) === false)
            {
                $arrNew[$key] = $value;
            }
        }
        //перебор слов в 2 строке
        foreach($arr2 as  $key => $value)
        {
            //поиск слов во 1 строке
            if (GetWordInStr($value, (string)$arrStr[0])  === false)
            {
                $arrNew1[$key] = $value;
            }
        }
        rsort($arrNew);
        echo "Отсутствуют слова: <br>";
        WriteArr($arrNew, true);
        WriteArr($arrNew1, true);

        //получение массива строк
        function GetOffer($string):array 
        {
            $arr = explode(".", $string);
            return $arr;
        }
        //получение строк
        $arr = GetOffer($text);
        $newArr = array();
        //подсчет длины строки
        foreach($arr as $key => $value)
        {
            $value = trim($value,"<br>");
            if ($value == "") continue; 
            $newArr[] = [mb_strlen($value), $value];
        }
        //сортировака массива
        sort($newArr);
        //вывод результата на экран
        WriteDoubleArr($newArr);

        echo "<br>6.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в обратном алфавитном порядке те слова,
        где количество гласных превышает количество согласных. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
        слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        //получение слова из массива
        function GetWordOne($arr, $index):string
        {
            if ($index >= count($arr)) return "";
            $value = trim($arr[$index],"<br>");
            return $value;
        }
        $arr = explode(" ", $text);
        $newArr = array();
        //определение количества гласных и согласных, их сравнение
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            $countV = 0;
            $countG = 0;
            $arrChar = mb_str_split($str);
            //определение количества гласных и согласных
            foreach($arrChar as $key => $value)
            {
                $res = str_contains("уеаояию", $value);              
                if ($res)
                {
                    $countV++;
                }
                else 
                {
                    $countG++;
                }
            }
            //проверка количества гласных
            if ($countV > $countG)
            {
                $newArr[] = $str;
            }
        }
        rsort($newArr);
        WriteArr($newArr);

        echo "<br>7.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке те слова,
         где количество согласных превышает количество гласных. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
         слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arr = explode(" ", $text);
        $newArr = array();
        //определение количества гласных и согласных, их сравнение
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            $countV = 0;
            $countG = 0;
            $arrChar = mb_str_split($str);
            //определение количества гласных и согласных
            foreach($arrChar as $key => $value)
            {
                $res = str_contains("уеаояию", $value);              
                if ($res)
                {
                    $countV++;
                }
                else 
                {
                    $countG++;
                }
            }
            //проверка количества согласных
            if ($countV < $countG)
            {
                $newArr[] = $str;
            }
        }
        sort($newArr);
        WriteArr($newArr);

        echo "<br>8.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке те слова,
         длина которых превышает K символов. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
         слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $k = 4;
        $arr = explode(" ", $text);
        $newArr = array();
        //определение длины слов, их сравнение
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            if (mb_strlen($str) > $k)
            {
                $newArr[] = $str;
            }
        }
        sort($newArr);
        WriteArr($newArr);


        echo "<br>9.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в обратном алфавитном порядке те слова,
        длина которых не превышает K символов. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
        слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $k = 5;
        $arr = explode(" ", $text);
        $newArr = array();
        //определение длины слов, их сравнение
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            if (mb_strlen($str) < $k && mb_strlen($str) > 0)
            {
                $newArr[] = $str;
            }
        }
        rsort($newArr);
        WriteArr($newArr);

        echo "<br>10.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в обратном алфавитном порядке те слова,
        последняя буква которых является гласной. Считать, текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
         слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arr = explode(" ", $text);
        $newArr = array();
        //определение гласных букв в конце слов
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            if ($str == "") continue;
            $char = str_split($str);
            //определение гласных букв
            $res = str_contains("уеаояию", $char[count($char)-1]);
            if ($res)
            {
                $newArr[] = $str;
            }
        }
        rsort($newArr);
        WriteArr($newArr);

        echo "<br>11.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке те слова,
         последняя буква которых является согласной. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
          слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arr = explode(" ", $text);
        $newArr = array();
        //определение согласных букв в конце слов
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            if ($str == "") continue;
            $char = str_split($str);
            //определение согласных букв
            $res = str_contains("уеаояию", $char[count($char)-1]);
            if (!$res)
            {
                $newArr[] = $str;
            }
        }
        sort($newArr);
        WriteArr($newArr);

        echo "<br>12.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке те слова,
        первая буква которых является согласной, а последняя гласной. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
        слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arr = explode(" ", $text);
        $newArr = array();
        //определение согласных букв в начале слов
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            if ($str == "") continue;
            $char = str_split($str);
            //определение согласных букв
            $res = str_contains("уеаояию", $char[0]);
            if (!$res)
            {
                $newArr[] = $str;
            }
        }
        rsort($newArr);
        WriteArr($newArr);

        echo "<br>13.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. 
        Необходимо вывести в алфавитном порядке предпоследние слова всех предложений.
        Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв, перенос слов
        по слогам отсутствует, минимальная длина предложений — два слова. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arr = explode(" ", $text);
        $newArr = array();
        //определение предпоследних слов
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr, $index);
            if ($str == "") continue;
            $res = str_contains($str,"." );
            if ($res)
            {
                //получение предпоследнего слова
                $i = $index-1; 
                $str = GetWordOne($arr, $i);
                //проверка, чтобы строка не была пусстой, если пустая - беду предыдущий элемент
                while ($str == "")
                {
                    $i--;
                    if ($i < 0 || $i > count($arr))
                    $str = GetWordOne($arr, $i);                    
                }
                $newArr[] = $str;
            }
        }
        sort($newArr);
        WriteArr($newArr);

        echo "<br>14.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке вторые слова всех предложений.
        Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв,
        перенос слов по слогам отсутствует, минимальная длина предложений — два слова. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arr = explode(".", $text);
        $newArr = array();
        //определение второго слова
        for ($index = 0; $index < count($arr); $index++)
        {
            //разбиение предложения на слова
            $arrStr = preg_split("/[ .,]/",$arr[$index]);
            $isSertch = false; //флаг найденого 1 слова (при нескольких пробелах выносит пустоту между ними в отдельный элемент массива, )
            for ($indexWord = 0; $indexWord < count($arrStr); $indexWord++)
            {
                $str = GetWordOne($arrStr, $indexWord);       
                //при найденом 1 слове и не пустом слове - считается, что 2 слово найдено
                if ($isSertch && $str != "")
                {
                    $newArr[] = $str;
                    break;
                }
                if ($str != "")
                {
                    $isSertch = true;
                }  
            }
        }
        sort($newArr);
        WriteArr($newArr);

        echo "<br>15.	Дан текст, состоящий из 3-х строк с максимальной длиной 80 символов. Необходимо вывести в обратном алфавитном порядке те слова,
        которые присутствуют в 3-й строке и не присутствуют в первых двух. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания
        используются точка и запятая, слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $text .= "<br>Дан текст, состоящий из трех строк. Необходимо вывести в обратном алфавитном порядке те слова, которые присутствуют в 3-й строке и не присутствуют в первых двух. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию";
        echo "Текст: <strong>".$text."</strong><br>";
        //разбиение по предложениям
        $arr = explode("<br>", $text);
        $newArr = array();
        //разбиение 3 предложения по строчкам
        $arrStr2 = preg_split("/[ .,]/",$text);
        for ($index = 0; $index < count($arrStr2); $index++)
        {
            //получение проверяемого слова
            $str = GetWordOne($arrStr2,$index);
            //проверка вхлждения слова в первые 2 строчки
            if (!str_contains($arr[0],$str) && !str_contains($arr[1],$str))
            {
                $newArr[] = $str;
            }
        }
        rsort($newArr);
        WriteArr($newArr);

        echo "<br>16.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в алфавитном порядке слова, начинающиеся с прописных букв.
         Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв,
         перенос слов по слогам отсутствует. Для выделения слов из строки создать пользовательскую функцию.<br>";
        $arr = preg_split("/[ .,]/",$text);
        $newArr = array();
        for ($index = 0; $index < count($arr); $index++)
        {
            //получение проверяемого слова
            $str = GetWordOne($arr,$index);
            if ($str == "") continue;
            $firstChar = mb_str_split($str);
            //проверка на заглавную букву в первом символе
            $res = preg_match("/[А-Я]/",$firstChar[0]);
            if (!$res)
            {
                $newArr[] = $str;
            }
        }
        sort($newArr);
        WriteArr($newArr);

        echo "<br>17.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести в обратном алфавитном порядке слова, являющиеся палиндромами.
        Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв,
        перенос слов по слогам отсутствует. Для выделения слов из строки и определения является ли они палиндромами, создать пользовательские функции.<br>";
        $arr = preg_split("/[ .,]/",$text);
        // $arr = ["qwerty", "qwewq", "qqqq"];
        $newArr = array();
        //определение полиндрома
        function CheckedPolindrom($str)
        {
            $word1 = mb_str_split($str);
            $word2 = array_reverse($word1);
            return $word1 == $word2;
        }
        //поиск в предложениях полиндромов
        for ($index = 0; $index < count($arr); $index++)
        {
            //получение проверяемого слова
            $str = GetWordOne($arr,$index);
            if ($str == "") continue;
            //определение полиндрома
            $res = CheckedPolindrom($str);
            if ($res)
            {
                $newArr[] = $str;
            }
        }
        rsort($newArr);
        WriteArr($newArr);

        echo "<br>18.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести все предложения данного текста,
        являющиеся палиндромами, в порядке невозрастания их длины. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
         слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения предложений из строки и определения является ли они палиндромами,
         создать пользовательские функции.<br>";
         //получение предложения из строки
         function GetStr($str, $index):string
         {
            $arr = preg_split("/[.]/",$str);
            if ($index >= count($arr)) 
            {
                return ""; 
            }
            else
            {
                return $arr[$index];
            }
        }
        //определение полиндрома
        function CheckedPolindromStr($str)
        {
            $str1 = preg_split("/[ ,]/",$str);
            $str2 = array_reverse($str1);
            return $str1 == $str2;
        }
        $newArr = array();
        $index = 0;
        // $text = "qwerty lkll qwerty. dsf wrfwe wer.qwertyq lkll qwertyq.";
        $str = GetStr($text, $index);
        //поиск полиндромов
        while ($str != "")
        {
            //определение полиндрома
            $res = CheckedPolindromStr($str);
            if ($res)
            {
                //добавление полиндрома с количеством символов
                $newArr[] = [mb_strlen($str), $str];
            }
            $str = GetStr($text, ++$index);
        }
        sort($newArr);
        WriteDoubleArr($newArr);

        echo "<br>19.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести этот текст, зашифрованный кодом Цезаря.
        (Код Цезаря заменяет одну букву другой, отстоящей от нее на заданное количество позиций в алфавите. Например, при сдвиге, равном 1,
        буква А заменяется на Б, Б — на В, …, Я — на А.) Размер сдвига символов принять равным номеру буквы в слове. Например, слово ДОМ — шифруется как ЕРП.
        Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв,
        перенос слов по слогам отсутствует. Для выделения слов из строки и зашифровки слова создать пользовательские функции.<br>";
        //шифрование/дешифорование слова
        function GetShifrWord($str, $code = true)
        {
            $arr = mb_str_split($str);
            $newStr = "";
            $startCharU = mb_ord("А");
            $startCharL = mb_ord("а");
            $finishCharU = mb_ord("Я");
            $finishCharL = mb_ord("я");
            for ($index = 0; $index < count($arr); $index++)
            {
                if ($arr[$index] == " " || $arr[$index] == "," || $arr[$index] == ".")
                {
                    $newStr.=$arr[$index] ;
                    continue;
                }
                //получить символ в строке
                $char = mb_ord($arr[$index]);
                //сдвинуть код символа на его позицию в слове
                $newIndex = ($code) ? $char+$index+1 : $char-$index-1;
                $newChar = mb_chr($newIndex);
                //проверка заглавной или строчной буквы
                if (preg_match("/[А-Я]/u",$arr[$index]))
                {
                    //проверка - кодирование или декодирование
                    if ($code)
                    {
                        //проверка выхода индекса за границы
                        if ($newIndex > $finishCharU)
                        {
                            $newIndex = $startCharU +($index-($finishCharU - $char));
                        }
                    }
                    else 
                    {
                        if ($newIndex < $startCharU)
                        {
                            $newIndex = $finishCharU - ($index-($char - $startCharU));
                        }
                    }
                    //получение нового символа
                    $newChar = mb_chr($newIndex);
                }
                else
                {
                    if ($code)
                    {
                        if ($newIndex > $finishCharL)
                        {
                            $newIndex = $startCharL +($index-($finishCharL - $char));
                        }
                    }
                    else 
                    {
                        if ($newIndex < $startCharL)
                        {
                            $newIndex = $finishCharL - ($index-($char - $startCharL));
                        }
                    }
                    $newChar = mb_chr($newIndex);
                }
                $newStr.=$newChar;
            }
            return $newStr;
        }
        
        //получить слово
        $arr = preg_split("/[ ]/",$text);
        $newStr = "";
        for ($index = 0; $index < count($arr); $index++)
        {
            $str = GetWordOne($arr,$index);
            //вывести зашифрованое слово
            $newStr .= GetShifrWord($str)." ";
        }
        echo "$newStr<br>";
        
        echo "<br>20.	Составить программу для расшифровки текста, зашифрованного в пункте 19. Для выделения слов из строки и расшифровки слова создать пользовательские функции.<br>";
       
        $arr = preg_split("/[ ]/",$newStr);
        $oldStr = "";
        for ($index = 0; $index < count($arr); $index++)
        {
            //получить слово
            $str = GetWordOne($arr,$index);
            //вывести расшифрованое слово
            $oldStr .= GetShifrWord($str, false)." ";
        }
        echo "$oldStr<br>";

        echo "<br>21.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести этот текст, зашифрованный кодом Цезаря.
        (Код Цезаря заменяет одну букву другой, отстоящей от нее на заданное количество позиций в алфавите. Например, при сдвиге, равном 1,
        буква А заменяется на Б, Б — на В, …, Я — на А.) Размер сдвига символов принять равным номеру буквы в предложении. Например, если предложение начинается со слова ДОМ,
        то оно шифруется как ЕРП. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая, слова состоят только из букв,
         перенос слов по слогам отсутствует. Для выделения предложений из текста и зашифровки предложения создать пользовательские функции.<br>";
         $newStr = "";
         $index = 0;
         //получить предложение
        $str = GetStr($text,$index++);
        while ($str != "")
        {
            //вывести зашифрованое предложение
            $newStr .= GetShifrWord($str).".";
            $str = GetStr($text,$index++);
        }
        echo "$newStr<br>";

        echo "<br>22.	Составить программу для расшифровки текста, зашифрованного в пункте 21. Для выделения предложений из текста и расшифровки предложения
        создать пользовательские функции.<br>";
        $oldStr = "";
        $index = 0;
        $str = GetStr($newStr,$index++);
        while ($str != "")
        {
            //вывести зашифрованое предложение
            $oldStr .= GetShifrWord($str, false).".";
            $str = GetStr($newStr,$index++);
        }
        echo "$oldStr<br>";

        echo "<br>23.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести этот текст, зашифрованный кодом Цезаря.
        (Код Цезаря заменяет одну букву другой, отстоящей от нее на заданное количество позиций в алфавите. Например, при сдвиге, равном 1,
        буква А заменяется на Б, Б — на В, …, Я — на А.) Размер сдвига символов принять равным остатку от деления длины слова на номер буквы в слове плюс единица.
        Например, слово ДОМ — шифруется как ЕРН. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
        слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения слов из строки и зашифровки слова создать пользовательские функции.<br>";
        //шифрование/дешифорование слова
        function GetShiftDelWord($str, $code = true)
        {
            $newStr = "";
            $arr = mb_str_split($str);
            $startCharU = mb_ord("А");
            $startCharL = mb_ord("а");
            $finishCharU = mb_ord("Я");
            $finishCharL = mb_ord("я");
            $length = count($arr);
            for ($index = 0; $index < count($arr); $index++)
            {
                if ($arr[$index] == " " || $arr[$index] == "," || $arr[$index] == "." || $arr[$index] =="")
                {
                    $newStr.=$arr[$index] ;
                    continue;
                }
                //получить символ в строке
                $char = mb_ord($arr[$index]);
                //сдвинуть код символа на его позицию в слове
                $shift = $length%($index+1)+1;
                $newIndex = ($code) ? $char+ $shift: $char-$shift;        
                $newChar = mb_chr($newIndex);
                //проверка заглавной или строчной буквы
                if (preg_match("/[А-Я]/u",$arr[$index]))
                {
                    //проверка - кодирование или декодирование
                    if ($code)
                    {
                        //проверка выхода индекса за границы
                        if ($newIndex > $finishCharU)
                        {
                            $newIndex = $startCharU +($newIndex-$finishCharU-1);
                        }
                    }
                    else 
                    {
                        if ($newIndex < $startCharU)
                        {
                            $newIndex = $finishCharU - ( $startCharU-$newIndex-1);
                        }
                    }
                    //получение нового символа
                    $newChar = mb_chr($newIndex);
                }
                else
                {
                    if ($code)
                    {
                        if ($newIndex > $finishCharL)
                        {
                            $newIndex = $startCharL +($newIndex-$finishCharL-1);
                        }
                    }
                    else 
                    {
                        if ($newIndex < $startCharL)
                        {
                            $newIndex = $finishCharL - ( $startCharL-$newIndex-1);
                        }
                    }
                    $newChar = mb_chr($newIndex);
                }
                $newStr.=$newChar;
            }
            return $newStr;
        }

        $arr = preg_split("/[ ]/",$text);
        $newStr = "";
        for ($index = 0; $index < count($arr); $index++)
        {
            //получить слово
            $str = GetWordOne($arr,$index);
            //вывести зашифрованое предложение
            $newStr .= GetShiftDelWord($str)." ";
        }
        echo "$newStr<br>";

        echo "<br>24.	Составить программу для расшифровки текста, зашифрованного в пункте 23. Для выделения слов из строки и расшифровки слова создать пользовательские функции.<br>";
        $arr = preg_split("/[ ]/",$newStr);
        $oldStr = "";
        for ($index = 0; $index < count($arr); $index++)
        {
            //получить слово
            $str = GetWordOne($arr,$index);
            //вывести зашифрованое предложение
            $oldStr .= GetShiftDelWord($str, false)." ";
        }
        echo "$oldStr<br>";
        
        echo "<br>25.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести этот текст, зашифрованный кодом Цезаря.
        (Код Цезаря заменяет одну букву другой, отстоящей от нее на заданное количество позиций в алфавите. Например, при сдвиге, равном 1,
        буква А заменяется на Б, Б — на В, …, Я — на А.) Размер сдвига символов принять равным остатку от деления количества слов в предложении на номер буквы в слове плюс единица.
        Например, если в предложении 8 слов, слово ДОМ — шифруется как ЕПР. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются
         точка и запятая, слова состоят только из букв, перенос слов по слогам отсутствует. Для выделения предложений из текста и зашифровки предложения
         создать пользовательские функции.<br>";
        //шифрование/дешифорование предложения
        function GetShiftDelStr($str, $code = true)
        {
            $newStr = "";
            //получение массива слов
            $arr = preg_split("/[ ]/",$str);
            $startCharU = mb_ord("А");
            $startCharL = mb_ord("а");
            $finishCharU = mb_ord("Я");
            $finishCharL = mb_ord("я");
            $length = count($arr);
            //цикл по словам
            for($indexW = 0; $indexW < count($arr); $indexW++)
            {
                //получаем массив букв в слове
                $arrWord = mb_str_split($arr[$indexW]);
                //цикл по буквам
                for ($index = 0; $index < count($arrWord); $index++)
                {
                    //прохожу мимо символов
                    if ($arrWord[$index] == " " || $arrWord[$index] == "," || $arrWord[$index] =="")
                    {
                        $newStr.=$arrWord[$index] ;
                        continue;
                    }
                    //получить символ в строке
                    $char = mb_ord($arrWord[$index]);
                    //сдвинуть код символа на его позицию в слове
                    $shift = $length%($index+1)+1;
                    $newIndex = ($code) ? $char+$shift : $char-$shift;        
                    $newChar = mb_chr($newIndex);
                    //проверка заглавной или строчной буквы
                    if (preg_match("/[А-Я]/u",$arrWord[$index]))
                    {
                        //проверка - кодирование или декодирование
                        if ($code)
                        {
                            //проверка выхода индекса за границы
                            if ($newIndex > $finishCharU)
                            {
                                $newIndex = $startCharU +($newIndex-$finishCharU-1);
                            }
                        }
                        else 
                        {
                            if ($newIndex < $startCharU)
                            {
                                $newIndex = $finishCharU - ( $startCharU-$newIndex-1);
                            }
                        }
                        $newChar = mb_chr($newIndex);
                    }
                    else
                    {
                        if ($code)
                        {
                            if ($newIndex > $finishCharL)
                            {
                                $newIndex = $startCharL +($newIndex-$finishCharL-1);
                            }
                        }
                        else 
                        {
                            if ($newIndex < $startCharL)
                            {
                                $newIndex = $finishCharL - ( $startCharL-$newIndex-1);
                            }
                        }
                        $newChar = mb_chr($newIndex);
                    }
                    $newStr.=$newChar;
                }
                if ($indexW < count($arr) -1) $newStr.= " ";
            }
            return $newStr;
        }
        
        $newStr = "";
        $index = 0;
        //получить предложение
        $str = GetStr($text,$index++);
        while ($str != "")
        {
            //вывести зашифрованое предложение
            $newStr .= GetShiftDelStr($str).".";
            //получить предложение
            $str = GetStr($text,$index++);
        }
        echo "$newStr<br>";

        echo "<br>26.	Составить программу для расшифровки текста, зашифрованного в пункте 25. Для выделения предложений из текста и расшифровки предложения создать
         пользовательские функции.<br>";
        $oldStr = "";
        $index = 0;
        //получить предложение
        $str = GetStr($newStr,$index++);
        while ($str != "")
        {
            //вывести зашифрованое предложение
            $oldStr .= GetShiftDelStr($str, false).".";
            //получить предложение
            $str = GetStr($newStr,$index++);
        }
        echo "$oldStr<br>";

        echo "<br>27.	Дан текст, состоящий из N (2≤N≤10) строк с максимальной длиной 80 символов. Необходимо вывести этот текст, зашифрованный кодом Цезаря.
        (Код Цезаря заменяет одну букву другой, отстоящей от нее на заданное количество позиций в алфавите. Например, при сдвиге, равном 1,
         буква А заменяется на Б, Б — на В, …, Я — на А.) Размер сдвига символов принять равным сумме сдвигов двух предыдущих букв. Для первой буквы принять сдвиг равным 0,
         а для второй — 1. Например, слово КОШКА — шифруется как КПЩМГ. Считать, что текст написан синтаксически грамотно, в качестве знаков препинания используются точка и запятая,
         слова состоят только из букв, перенос слов по слогам отсутствует.<br>";
        //шифрование/дешифорование предложения
        function GetShiftFib($str, $code = true)
        {
            $newStr = "";
            //получение массива слов
            $arr = mb_str_split($str);
            $startCharU = mb_ord("А");
            $startCharL = mb_ord("а");
            $finishCharU = mb_ord("Я");
            $finishCharL = mb_ord("я");
            $oldShift0 = 0;
            $oldShift1 = 1;
            $diap = $finishCharL-$startCharL+1;
            //цикл по символам
            for ($index = 0; $index < count($arr); $index++)
            {
                //прохожу мимо символов
                if ( $arr[$index] =="" || $arr[$index] ==" " || $arr[$index] ==","||$arr[$index] ==".")
                {
                    $newStr.=$arr[$index] ;
                    continue;
                }
                //получить символ в строке
                $char = mb_ord($arr[$index]);
                //проверяю индекс символа и сдвигаю его на сумму предыдущих сдвигов
                if ($index == 0)
                {
                    $shift = $oldShift0;
                }
                elseif ($index == 1)
                {
                    $shift = $oldShift1;
                }
                else 
                {            
                    $shift = ($oldShift0+$oldShift1) % $diap;
                    //обновляю сдвиги
                    $oldShift0 = $oldShift1;
                    $oldShift1 = $shift;
                }
                $newIndex = ($code) ? $char+$shift : $char-$shift;  
                //проверка заглавной или строчной буквы
                if (preg_match("/[А-Я]/u",$arr[$index]))
                {
                    //проверка - кодирование или декодирование
                    if ($code)
                    {
                        //проверка выхода индекса за границы
                        if ($newIndex > $finishCharU)
                        {
                            $newIndex = $startCharU + ($newIndex-$startCharU)%$diap;
                        }
                    }
                    else 
                    {
                        if ($newIndex < $startCharU)
                        {
                            $newIndex = $finishCharU - ($finishCharU-$newIndex)%$diap;
                        }
                    }
                }
                else
                {
                    if ($code)
                    {
                        if ($newIndex > $finishCharL)
                        {
                            $newIndex = $startCharL + ($newIndex-$startCharL)%$diap;
                        }
                    }
                    else 
                    {
                        if ($newIndex < $startCharL)
                        {
                            $newIndex = $finishCharL -  ($finishCharL-$newIndex)%$diap;
                        }
                    }
                }
                $newChar = mb_chr($newIndex);
                $newStr.=$newChar;
            }
            return $newStr;
        }
        $newStr = "";
        //вывести зашифрованое предложение
        $newStr .= GetShiftFib($text);
        echo "$newStr<br>";
        
        echo "<br>28.	Составить программу для расшифровки текста, зашифрованного в пункте 29. Для выделения слов из строки и расшифровки слова создать пользовательские  функции.<br>";
        $oldStr = "";
        //вывести зашифрованое предложение
        $oldStr .= GetShiftFib($newStr,false);
        echo "$oldStr<br>";
        echo "</p>";

        //классы
        echo "<h2 $colorClassText>Блок 7. Классы</h2>";
        echo "<p $colorClassText>";
        echo "1.	Создать класс для хранения календарных дат. Обеспечить возможность работы с датами в различных форматах, изменения даты на заданное количество дней. 
        Перегрузить операцию «–» для нахождения разности дат и операции сравнения. Стандартные функции и типы для работы с датами не использовать.<br>";
        echo "2.	Создать класс для хранения одномерных целочисленных массивов. Обеспечить возможность задания количества элементов и базовой индексации. 
        Запрограммировать методы поиска элементов и сортировки. <br>";
        echo "3.	Создать класс для хранения строк. Запрограммировать методы поиска подстроки, копирования, замены и удаления заданной подстроки, определения длины строки.<br>";
        echo "4.	Создать класс для хранения обыкновенных дробей. Запрограммировать метод сокращения дроби. Предусмотреть возбуждение исключительных ситуаций 
        (при делении на ноль, переполнении).<br>";
        echo "</p>";

        //разные задачи
        echo "<h2 $colorClassText>Блок 8. Разные задачи</h2>";
        echo "<p $colorClassText>";
        echo "1. По известному радиусу определить длину окружности, площадь круга, площадь поверхности сферы и объем шара.<br>";
        $r = 10;
        $l = 2*M_PI*$r;
        $s = M_PI*$r**2;
        $sp = 4*M_PI*$r**2;
        $v = 4/3*M_PI*$r**3;
        echo "Радиус = $r. Длина окружности = $l, площадь круга = $s, площадь поверхности сферы = $sp, объем шара = $v<br>";

        echo "<br>2. Дано натуральное K — количество секунд. Определить сколько это составляет часов, минут и секунд. Например, 4000 секунд — это 1 час, 6 минут и 40 секунд.<br>";
        $k = 4000;
        $h = (int)($k / 3600); 
        $m = (int)(($k - $h * 3600) / 60);
        $s = $k % 60;
        echo "$k секунд = $h час $m минут и $s секунд<br>";

        echo "<br>3. Определить сколько лет понадобится России, чтобы собрать урожай зерна, требуемый изобретателем шахмат. Считать, что среднегодовой сбор составляет 70 млн. тонн, 
        а на 1 грамм приходится 10 зерен.<br>";
        $count = 64;
        $countInYear = 70;
        $arr = array();
        $sum = 0;
        $g = 10;
        //определение количества зерен
        for ($index = 0; $index < $count; $index++)
        {
            $arr[] = 2**$index;
            $sum += $arr[$index];
        }
        echo "Необходимо зерен: $sum<br>";
        $t = $sum / $g / 1000 / 1000 / 1000000; //количество млн. тонн зерен (зерна /г/кг/тонн/млн. тонн)
        echo "В млн. тонн: $t<br>";
        $countYear = ceil($t / $countInYear);
        echo "Необходимо $countYear лет для сбора<br>";

        echo "<br>4. Вычислить значение выражения<br>";
        $a = 0.5;
        $b = $a;        

        $step = sin($b)**2+cos($b**3); //синус в квадрате от b + косинус от b в кубе
        $b3 = $b**(2/3);//кубический корень из b в квдрате
        $chisl = $a**$step+$b3; //сумма 
        $chisl2 = $a*tan($b); // а умноженое на тангенс b
        $znam2 = 1-M_E**($a**(1/2)); //1 имнус е в степени корень из а
        $znam = (abs($chisl2/$znam2))**(1/4); //корень 4 степени из модуля частного
        $y = (abs($chisl/$znam))**(1/2); //корень из модуля частного
        echo "При a = $a, b = $b: y = $y<br>";

        echo "<br>5. Дано время — два целых числа количество часов и минут. Необходимо определить меньший угол между часовой и минутной стрелками на циферблате часов.<br>";
        //определение углв между стрелками
        function GetAngle($h24, $m)
        {
            $h = $h24 % 12;
            $hGrad = $h / 12 * 360; //перевод часов в градусы
            $hGrad += 360/12/60*$m; //прибавление к часам сдвига стрелки с учетом минут
            $mGrad = $m / 60 * 360; //перевод минут в градусы
            $angle = abs($mGrad-$hGrad); 
            if ($angle > 180) //расчет меньшего угла
            {
                $angle = 360-$angle;
            }
            printf("Угол при времени %02s:%02s = %s<br>",  $h24,$m,$angle);
        }
        $h24 = 2;
        $m = 43;
        GetAngle($h24, $m);
        $h24 = 11;
        $m = 40;
        GetAngle($h24, $m);
        $h24 = 14;
        $m = 30;
        GetAngle($h24, $m);
        $h24 = 23;
        $m = 40;
        GetAngle($h24, $m);

        $h24 = 0;
        $m = 00;
        GetAngle($h24, $m);
        $h24 = 23;
        $m = 28;
        GetAngle($h24, $m);
        $h24 = 10;
        $m = 02;
        GetAngle($h24, $m);
        $h24 = 19;
        $m = 03;
        GetAngle($h24, $m);

        $h24 = 16;
        $m = 40;
        GetAngle($h24, $m);
        $h24 = 12;
        $m = 18;
        GetAngle($h24, $m);
        $h24 = 5;
        $m = 47;
        GetAngle($h24, $m);
        $h24 = 18;
        $m = 42;
        GetAngle($h24, $m);

        $h24 = 15;
        $m = 29;
        GetAngle($h24, $m);
        $h24 = 16;
        $m = 44;
        GetAngle($h24, $m);
        $h24 = 21;
        $m = 10;
        GetAngle($h24, $m);
        $h24 = 15;
        $m = 48;
        GetAngle($h24, $m);

        $h24 = 22;
        $m = 59;
        GetAngle($h24, $m);
        $h24 = 11;
        $m = 34;
        GetAngle($h24, $m);
        $h24 = 06;
        $m = 52;
        GetAngle($h24, $m);
        $h24 = 13;
        $m = 30;
        GetAngle($h24, $m);


        echo "<br>6. Волшебный мост. Напишите программу, которая по начальной сумме денег у крестьянина определит оптимальное число проходов по мосту для получения наибольшей 
        конечной суммы.<br>";
        //функция кидания монетки
        function GetMoney($r, $k)
        {
            $sum = $r*100+$k;
            $sum -= 29;
            $k = (int)($sum / 100);
            $r = $sum % 100; 
            return ($r*100+$k);
        }
        //функция вычисления количества переходов по мосту
        function Bridge($r, $k)
        {
            $index = 0;
            $max = $r*100+$k;
            $sum = GetMoney($r, $k);
            $count = 0;
            //повторяю кидание монеток, пока не будет 29 
            while($sum > 29)
            {
                $count++;
                //проверка полученной суммы
                if ($sum > $max)
                {
                    $max = $sum;
                    $index = $count;
                }
                $r = (int)($sum / 100);
                $k = $sum % 100;
                $sum = GetMoney($r, $k);
                //при 1000 циклах - выхожу, чтобы не зциклилась
                if ($count > 1000)
                {
                    return [$index,$max];
                }
            }
            return [$index, $sum];
        }
        $r = 46;
        $k = 47;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";
        $r = 76;
        $k = 99;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";
        $r = 11;
        $k = 36;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";
        $r = 35;
        $k = 63;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";
        $r = 62;
        $k = 87;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";
        $r = 70;
        $k = 69;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";
        $r = 35;
        $k = 99;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";
        $r = 70;
        $k = 38;
        $arr = Bridge($r, $k);
        echo "При $r рублей $k копеек оптимальное количество проходов {$arr[0]} ({$arr[1]})<br>";

        echo "<br>7. Разложение. Напишите программу, которая вводит с клавиатуры целое число N (1<=N<=106) и выводит 
        на экран целые значения P и Q.<br>";
        //определение суммы квадратов чисел
        function GetSquare($n)
        {
            for ($p = 1; $p < $n; $p++)
            {
                for ($q = 1; $q < $n; $q++)
                {
                    if ($p**2 + $q**2 == $n)
                    {
                        return [$p, $q];
                    }
                }
            }
            return null;
        }
        //получение p и q
        function GetMinPQ($n)
        {
            $min = $n;
            $indexP = 0;
            $indexQ = 0;
            //перебор возможных p и q
            for ($p = 1; $p < $n; $p++)
            {
                for ($q = 1; $q < $n; $q++)
                {
                    $value = abs($n-$p**2 - $q**2);
                    //при равных значениях - запоминаем значения с минимальным q
                    if ($value == $min)
                    {
                        if ($q < $indexQ)
                        {
                            $min = abs($n-$p - $q);
                            $indexP = $p;
                            $indexQ = $q;
                        }
                    }
                    //при меньшем модуле - запоминаем текущие p и q
                    if ($value < $min)
                    {
                        $min = abs($n-$p - $q);
                        $indexP = $p;
                        $indexQ = $q;
                    }
                }
            }
            return [$indexP, $indexQ];
        }
        //функция разложения
        function Decomposition($n)
        {
            $arr = GetSquare($n);
            if ($arr == null)
            {
                $arr = GetMinPQ($n);
            }
            echo "При $n p = {$arr[0]}, q = {$arr[1]}<br>";
        }
        
        $n = 25;
        Decomposition($n);
        $n = 9;
        Decomposition($n);
        $n = 2581;
        Decomposition($n);
        echo "</p>";
    ?>
</main>
<?php
    include_once "footer.php";
?>
</body>
</html>