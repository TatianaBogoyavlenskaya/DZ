<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <title>function</title>
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
        echo "<h1 $colorClassText>Слайды 15-16</h1>";
        echo "<p $colorClassText>";
        //задача 1
        echo "<br>1 Создать функцию, которая сравнивает два числа и возвращает наибольшее.<br>";
        function Comparison($a, $b): float
        {
            return ($a > $b) ? $a : $b;
        }
        $a = 5.5;
        $b = 6;
        echo "Числа $a и $b: большее - ".Comparison($a, $b)."<br>";
        //задача 2
        echo "<br>2 Создать функцию, которая принимает длину двух катетов и возвращает значение гипотенузы прямоугольного 
        треугольника.<br>";
        function GetGip($kat1, $kat2):float
        {
            return sqrt($kat1**2 + $kat2**2);
        }
        $kat1 = 3;
        $kat2 = 4;
        echo "Гипотенуза при $kat1 и $kat2 = ".GetGip($kat1, $kat2)."<br>";
        //задача 3
        echo "<br>3 Создать функцию, которая принимает одно число (10). В функции создать цикл, который будет увеличивать
        число в 10 раз и выводить его на экран.
        Когда число будет больше 1 000 000, на экране должно появляться сообщение, что вы достигли предела.<br>";
        function Multiplication($index)
        {
           echo $index."<br>";
           $index *= 10;
           if ($index <= 1000000)
           {
               Multiplication($index);
           }
           else
           {
               echo "вы достигли предела";
           }
        }
        Multiplication(10);
        echo "<br>";
    
        //задача 4
        echo "<br>4 Создать функцию, в которой объявляется массив и случайными элементами.<br>";
        function GetArr():array
        {
            $n = mt_rand(5,10);
            $arr = array();
            //создание массива
            for($index = 0; $index < $n; $index++)
            {
                $arr[] = mt_rand(1,10);
            }
            //выввод массива
            foreach ($arr as $key => $value)
            {
                echo "$key => $value<br>";
            }
            return $arr; //возврат, чтобы в задаче 6 заново писать данный код
        }
        $arr = GetArr();
    
        //задача 5
        echo "<br>5 Создать функцию, которая принимает массив и возвращает среднеарифметическое значение массива.<br>";
        function GetSrZnach($arr):float
        {
            $sum = 0;        
            foreach ($arr as $value)
            {
                $sum+=$value;
            }
            return $sum/count($arr);
        }
        echo "Среднее значение = ".GetSrZnach($arr)."<br>";
    
        //задача 6
        echo "<br>6 Создать функцию, которая принимает строку. Вернуть количество слов в строке.<br>";
        function GetCountWord($string):int
        {
            $arr = explode(" ",$string);
            return count($arr);
        }
        $string = "d adfaf afaff aqw";
        echo "В строке \"$string\"  количество слов = ".GetCountWord($string)."<br>";
    
        //задача 7
        echo "<br>7* Написать функцию, которая рассчитывает последовательность чисел Фибоначчи.";
        function GetFib($count, $value1 = 0, $value2 = 1):int
        {
            $sum = $value1+$value2;
            echo "$value1 ";
            $count--;
            if ($count > 0)
            {
                return GetFib($count, $value2, $sum);
            }
            else
            {
                return $sum;
            }
        }
        $count = 15;
        echo "<br>Для последовательности из $count чисел: ";
        GetFib($count);
        echo "</p>";
    
        //слайд 17
        echo "<h1 $colorClassText>Слайд 17</h1>";
        echo "<p $colorClassText>";
        //задача 1
        echo "<br>1 Создайте функцию, которая принимает одномерный массив и возвращает массив, заполненный случайными числами. <br>";
        function SetValue(&$arr)
        {
            foreach($arr as $key => $value)
            {
                $arr[$key] = mt_rand(1,20);
            }
        }
        $arr = [0,0,0,0,0,0,0,0];
        echo "Изначальный массив: <br>";
        WriteArr($arr);
        SetValue($arr);
        echo "Заполненный массив: <br>";
        WriteArr($arr);
    
        //задача 2
        echo "<br>2 Дана строка «HTML, CSS, PHP, BITRIX». Написать функцию, которая определит количество слов строке.<br>";
        $string = "HTML, CSS, PHP, BITRIX";
        function CountWord($string): int
        {
            $arr = explode(" ", $string);
            return count($arr);
        }
        echo "В строке \"$string\" количество слов = ".CountWord($string)."<br>";
    
        //задача 3
        echo "<br>3 Дана строка «HTML, CSS, PHP, BITRIX». Написать функцию, которая выведет в обратном порядке буквы («XIRTIB ,PHP … »).<br>";
        function ReverseWord($string)
        {
            for ($index = mb_strlen($string)-1; $index >= 0; $index--)
            {
                echo $string[$index];
            }
        }
        ReverseWord($string);
    
        //задача 4
        echo "<br><br>4 Дана строка «HTML, CSS, PHP, BITRIX». Написать функцию, которая выводит на экран длину строки.<br>";
        function LengthString($string) 
        {
            echo "Длина строки \"$string\" = ".mb_strlen($string);
        }
        LengthString($string);
    
        //задача 5
        echo "<br>5 Дана строка «HTML, CSS, PHP, BITRIX». Написать функцию, которая выводит каждую букву на новую строку<br>";
        function EnterChar($string)
        {
            for($index = 0; $index < mb_strlen($string); $index++)
            {
                echo $string[$index]."<br>";
            }
        }
        EnterChar($string);
        echo "</p>";

        echo "<h1 $colorClassText>Задания из файла example</h1>";
        echo "<h1 $colorClassText>Блок 3. Двумерные массивы</h1>";
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
    ?>
</main>
<?php
    include_once "footer.php";
?>
</body>
</html>