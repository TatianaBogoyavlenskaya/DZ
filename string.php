<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <title>String</title>
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
        echo "<h1 $colorClassText>Слайд 22</h1>";
        echo "<p $colorClassText>";
        echo "1. Дана строка «fact». Привести строку к виду «Fact»<br>";
        $str3 = "fact";
        echo $str3."=>".ucfirst($str3)."<br>";

        echo "<br>2. Дана строка, в которой содержится «фамилия, имя, отчество». Преобразовать строку к виду «имя, фамилия».
         Например, исходная строка «Закирова Регина Артуровна», результирующая «Регина Закирова»<br>";
        $str = "Закирова Регина Артуровна";
        $arr = explode(" ", $str);
        $str = $arr[1]." ".$arr[0];
        echo $str."<br>";

        echo "<br>3. Дана строка «Привет, мир». Найти количество символа «и» в строке (регистр учитывать)<br>";
        $str = "Привет, мир";
        $count = 0;
        for ($index= 0; $index < mb_strlen($str); $index++)
        {
            $indexNew = mb_strpos($str, 'и',$index);
            if ( $indexNew== -1)
            {
                break;
            }
            $index = $indexNew+1;
            $count++;
        }
        echo "$count<br>";

        echo "<br>4. Дана строка ‘html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'<br>";
        $str = "html css php";
        echo  mb_substr($str, 0,4)."<br>";
        echo  mb_substr($str, 5,3)."<br>";
        echo  mb_substr($str, -3,3)."<br>";

        echo "<br>5. Дана строка. Проверьте, что она заканчивается на '.png'. Если это так, выведите 'да', если не так - 'нет'<br>";

        function CheckStr($str)
        {
            $arr = explode(".", $str);
            echo $str.":<br>";
            if ($arr[count($arr)-1]== "png")
            {
                echo "да<br>";
            }
            else
            {
                echo "нет<br>";
            }
        }
        $str = "1.png";   
        CheckStr($str);
        $str = "1.pm.png";   
        CheckStr($str);
        $str = "1.phg";   
        CheckStr($str);
        $str = "1dfadf";   
        CheckStr($str);
        echo "</p>";

        echo "<h1 $colorClassText>Слайд 23</h1>";
        echo "<p $colorClassText>";
        echo "1. Дана строка. Если в этой строке более 5-ти символов - вырежьте из нее первые 5 символов, добавьте 
        троеточие в конец и выведите на экран. 
        Если же в этой строке 5 и менее символов - необходимо вывести эту строку на экран<br>";
        function GetNewStr($str)
        {
            if (mb_strlen($str) > 5)
            {
                $strDel = mb_substr($str,0,5);
                $str = str_replace($strDel,"",$str)."...";
                echo $str."<br>";
            }
            else
            {
                echo $str."<br>";
            }        
        }
        $str = "fdfgrgo";
        GetNewStr($str);
        $str = "fdfg";
        GetNewStr($str);

        echo "<br>2. Дана строка str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3<br>";
        $str = "fabcihbaiycgaly";
        for($index = 0; $index <mb_strlen($str); $index++)
        {
            if ($str[$index]== "a") 
            {
                $str[$index] = 1;
            }
            if ($str[$index]== "b") 
            {
                $str[$index] = 2;
            }
            if ($str[$index]== "c") 
            {
                $str[$index] = 3;
            }
        }
        echo "$str<br>";

        echo "<br>3. Дана строка 'abc abc abc'. Определите позицию последней буквы 'b'<br>";
        $str = "abc abc abc";
        echo mb_strripos($str,"b")."<br>";

        echo "<br>4. Дана строка 'html css php'. С помощью функции explode запишите каждое слово этой строки 
        в отдельный элемент массива<br>";
        $str = "html css php";
        $arr = array();
        $arr[] = explode(" ", $str)[0];
        $arr[] = explode(" ", $str)[1];
        $arr[] = explode(" ", $str)[2];
        var_dump($arr);

        echo "<br><br>5. В двух строках содержатся даты вида День-Месяц-Год (например, 10-02-2015). 
        Определите количество дней между датами.<br>";
        $str1 = "10-02-2024";
        $str2 = "12-03-2024";
        $data1 = strtotime($str1);
        $data2 = strtotime($str2);
        echo ($data2-$data1)/60/60/24;
        echo "</p>";

        //Задания из файла example
        echo "<h1 $colorClassText>Задания из файла example</h1>";
        echo "<h1 $colorClassText>Блок 2. Одномерные массивы</h1>";
        echo "<p $colorClassText>";

        echo "<br>6.  Дан одномерный массив из N случайных действительных чисел в диапазоне от 11 до 22. 
        Вывести в порядке невозрастания (убывания) элементы, находящиеся в диапазоне между A и B.<br>";
        $min = 11;
        $max = 22;
        $count = 10;
        $a = 13;
        $b = 20;
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //выбор элементов бльше А и мешьше В
        foreach ($arr as $value)
        {
            if (($value > $a && $value < $b) || ($value < $a && $value > $b))
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::decrease);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>7.  Дан одномерный массив из N случайных действительных чисел в диапазоне от -5 до 5.  
        Вывести в порядке неубывания (возрастания) отрицательные элементы этого массива.<br>";
        $min = -5;
        $max = 5;
        $count = 10;
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //выбор отрицательных элементов
        foreach ($arr as $value) 
        {
            if ($value < 0)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::increases);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>8.  Дан одномерный массив из N случайных действительных чисел в диапазоне от 1 до 10.  
        Вывести в порядке неубывания (возрастания) те элементы, дробная часть которых меньше 0.5.<br>";
        $min = 1;
        $max = 10;
        $count = 10;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();    
        //поиск элементов с дробной частью меньше 0,5
        foreach ($arr as $value) 
        {
            //определение дробной части    
            $fractional = "0.".explode(".", (float)$value)[1];
            if ( $fractional < 0.5)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::increases);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>9.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от -35 до 50. 
        Вывести в порядке неубывания (возрастания) те положительные элементы этого массива, которые меньше заданного числа Х (0<X<50).<br>";
        $min = -35;
        $max = 50;
        $count = 100;
        $x = mt_rand(1,49);
        echo "x = $x<br>";
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //определение элементов меньших Х
        foreach ($arr as $value) 
        {
            if ($value < $x)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::increases);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>10.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от -45 до 25. 
        Вывести в порядке невозрастания (убывания) те отрицательные элементы этого массива, которые больше заданного числа Х (-45<X<0).<br>";
        $min = -45;
        $max = 25;
        $count = 100;
        $x = mt_rand(-44,1);
        echo "x = $x<br>";
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //определение отрицательных элементов больших Х
        foreach ($arr as $value) 
        {
            if ($value < 0 && $value > $x)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::decrease);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>11.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от 5 до 25. 
        Вывести в порядке невозрастания (убывания) те элементы этого массива, целая часть которых — четное число.<br>";
        $min = 5;
        $max = 25;
        $count = 100;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //определение элементов с четной целой частью 
        foreach ($arr as $value) 
        {
            //определение целой части
            $newValue = explode(".", (float)$value)[0];
            if ($newValue % 2 == 0)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::decrease);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>12.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от -15 до 38. 
        Вывести в порядке неубывания (возрастания) те положительные элементы этого массива, индекс которых — четное число.<br>";
        $min = -15;
        $max = 38;
        $count = 100;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr,true);
        $newArr = array();
        //определение положительных элементов с четным индексом
        foreach ($arr as $key => $value) 
        {
            if ($value > 0 && $key % 2 == 0)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::increases);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>13.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от -55 до 16. 
        Вывести в порядке невозрастания (убывания) те отрицательные элементы этого массива, индекс которых — нечетное число.<br>";
        $min = -55;
        $max = 16;
        $count = 100;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr,true);
        $newArr = array();
        //определение отрицательных элементов с нечетным индексом
        foreach ($arr as $key => $value) 
        {
            if ($value < 0 && $key % 2 == 1)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::decrease);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>14.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от 3 до 23.  
        Вывести в порядке неубывания (возрастания) те элементы этого массива, целая часть которых кратна трем.<br>";
        $min = 3;
        $max = 23;
        $count = 100;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //определение элементов с целой частью кратной 3
        foreach ($arr as $key => $value) 
        {
            //определение целой части
            $newValue = explode(".", (float)$value)[0];
            if ($newValue % 3 == 0)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::increases);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>15.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от -3 до 34. 
        Вывести в порядке убывания (невозрастания) те элементы этого массива, которые отличаются от заданного Р не больше, чем на величину E.<br>";
        $min = -3;
        $max = 34;
        $count = 100;
        $p = 10;
        $e = 2;
        echo "p = $p, e = $e<br>";
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //определение элементов в диапазоме p +- e
        foreach ($arr as $key => $value) 
        {            
            if ($value > $p-$e && $value < $p+$e)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::decrease);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>16.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от 4 до 16. 
        Вывести в порядке убывания (невозрастания) те элементы этого массива, дробная часть которых начинается с четной цифры.<br>";
        $min = 4;
        $max = 16;
        $count = 100;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //определение элементов с дробной частью, начинающейчя с четной цифры
        foreach ($arr as $key => $value) 
        {
            $newValue = explode(".", (float)$value)[1];
            if (((mb_str_split($newValue))[0]) % 2 == 0)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::decrease);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>17.  Дан одномерный массив из 100 элементов, состоящий из случайных вещественных чисел в диапазоне от 3 до 35.  
        Вывести в порядке неубывания (возрастания) те элементы этого массива, целая часть которых — нечетное число.<br>";
        $min = 3;
        $max = 35;
        $count = 100;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $newArr = array();
        //определение элементов с нечетной целой частью
        foreach ($arr as $key => $value) 
        {
            //определение целой части
            $newValue = explode(".", (float)$value)[0];
            if ($newValue % 2 == 1)
            {
                $newArr[] = $value;
            }
        }
        //сортировка массива
        $newArr = SortArray($newArr, Order::increases);
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>18.  Даны два одномерных массива из действительных чисел. Первый массив состоит из N элементов, а второй из M элементов. 
        Сформировать третий массив, записав в его начало элементы первого массива с четными индексами, а в конец элементы второго массива с нечетными индексами. 
        Перестановка элементов не допускается.<br>";
        $min = 1;
        $max = 10;
        $n = 10;
        $m = 10;
        //формирование массива
        $arr1 = GetRandArr($min,$max,$n);
        $arr2 = GetRandArr($min,$max,$m);
        echo "Массив 1: <br>";
        WriteArr($arr1, true);        
        echo "Массив 2: <br>";
        WriteArr($arr2, true);
        $newArr = array();
        //добавление элементов первого массива
        foreach ($arr1 as $key => $value) 
        {
            if ($key % 2 == 0)
            {
                $newArr[] = $value;
            }
        }
        //добавление элементов второго массива
        foreach ($arr2 as $key => $value) 
        {
            if ($key % 2 == 1)
            {
                $newArr[] = $value;
            }
        }
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>19.  Дано N действительных случайных чисел в диапазоне от 2 до 10. Определить, какое из них на числовой оси лежит ближе к целому числу.<br>";
        $min = 2;
        $max = 10;
        $count = 5;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $result = $arr[0]; //ближайшее число - по умолчанию первый элемент
        //определение ближайшего числа к целому
        foreach ($arr as $key => $value) 
        {
            //определение дробной части чисел
            $newValue = "0.".(explode(".", (float)$value))[1];
            $fractionalResult = "0.".(explode(".", (float)$result))[1];
            //при запомненом ближайшем числе, с дробью ближе к максимальному 
            if ($fractionalResult > 0.5) 
            {
                $fractionalResult = 1- $fractionalResult;
            }
            //проверка значения напрямую, либо, если дробь больше 0,5, то обратное значение 
            if ($newValue < $fractionalResult || 1-$newValue < $fractionalResult)
            {
                $result = $value;
            }
        }
        echo "Результат: $result<br>";

        echo "<br>20.  Дано N действительных случайных чисел в диапазоне от 3 до 10. Определить, какое из них на числовой оси лежит ближе к их среднему арифметическому.<br>";
        $min = 3;
        $max = 10;
        $count = 5;
        //формирование массива
        $arr = GetRandArr($min,$max,$count, TypeArray::float);
        echo "Массив: <br>";
        WriteArr($arr);
        $result = $arr[0];
        $sum = 0;
        //поиск суммы
        foreach ($arr as $key => $value) 
        {
            $sum += $value;
        }
        $srZnach = $sum / $count;
        echo "Среднее значение $srZnach<br>";
        $razn = abs($srZnach - $result); //значение до среднего арифметического от первого элемента массива
        //определение ближайшего числа к среднему значению
        foreach ($arr as $key => $value) 
        {
            if (abs($srZnach - $value) < $razn)
            {
                $result = $value;
                $razn = abs($srZnach - $result);
            }
        }
        echo "Результат: $result<br>";

        echo "<br>21.  Даны два одномерных массива из N действительных чисел и натуральные числа A,B,C,D < N. 
        Сформировать третий массив, взяв из первого массива элементы, начиная с элемента с индексом A по элемент с индексом B, 
        и добавить элементы из второго массива, начиная с элемента с индексом C по элемент с индексом D. Перестановка элементов не допускается.<br>";
        $min = 1;
        $max = 10;
        $n = 10;
        //формирование массива
        $arr1 = GetRandArr($min,$max,$n);
        $arr2 = GetRandArr($min,$max,$n);
        $a = 1;
        $b = 5;
        $c = 3;
        $d = 8;
        echo "Массив 1: <br>";
        WriteArr($arr1, true);        
        echo "Массив 2: <br>";
        WriteArr($arr2, true);
        echo "Индексы с $a по $b и с $c по $d<br>";
        $newArr = array();
        //первый массив
        foreach ($arr1 as $key => $value) 
        {
            if ($key >= $a && $key <= $b)
            {
                $newArr[] = $value;
            }
        }
        //второй массив
        foreach ($arr2 as $key => $value) 
        {
            if ($key >= $c && $key <= $d)
            {
                $newArr[] = $value;
            }
        }
        echo "Результат: <br>";
        WriteArr($newArr);

        echo "<br>22.  Дан одномерный массив из N натуральных чисел не больших 10. Найти наибольший участок массива, состоящий из одинаковых чисел.
        Вывести длину  этого участка.<br>";
        $min = 0;
        $max = 10;
        $count = 20;
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        $countCircl = 0;
        $maxCountCircl = 0;
        $element = $arr[0]; //по умолчанию запоминаю первый элемент массива и его же делаю максимальным по количеству
        $maxElement = $arr[0];
        $indexStart = 0;
        $indexFinish = 0;
        //определение наибольшего участка массива
        foreach ($arr as $key => $value) 
        {
            //проверка равности элементов запомненому
            if ($value == $element)
            {
                $countCircl++;
                //при последнем элементе завершаю все приплюсовки
                if ($key+1 == count($arr))
                {
                    $maxCountCircl = $countCircl;
                    $maxElement = $element;
                    $indexStart = $key-$maxCountCircl;
                    $indexFinish = $key-1;
                }
                continue;
            }
            //при элементе не равном, проверка количества посчитанных элементов с максимальным и обновление значения
            if ($countCircl > $maxCountCircl)
            {
                $maxCountCircl = $countCircl;
                $maxElement = $element;
                $indexStart = $key-$maxCountCircl;
                $indexFinish = $key-1;
            }
            //запоминание нового элемента и обнуление количества элементов
            $element = $value;
            $countCircl = 1;
        }
        echo "Результат: участок с $indexStart по $indexFinish имеет длину $maxCountCircl элементов ($maxElement)<br>";

        echo "<br>23.  Дан одномерный массив из N целых чисел в диапазоне от -5 до 5. Найти наибольший участок массива, в котором положительные и отрицательные числа чередуются. 
        Участок может начинаться как с положительного, так и с отрицательного числа.  Вывести длину этого участка.<br>";
        $min = -5;
        $max = 5;
        $count = 20;
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        $countCircl = 0;
        $maxCountCircl = 0;
        $element = ($arr[0]>0); //по умолчанию проверяю на положительность элемент 
        $maxElement =  ($arr[0]>0);
        $indexStart = 0;
        $indexFinish = 0;
        //определение чередования элементов положительный/отрицательный
        foreach ($arr as $key => $value) 
        {
            //определение знака числа
            $valueBool = $value >= 0;
            //сравненеие знака с предыдущим
            if ($valueBool != $element)
            {
                $countCircl++;
                $element = !$element;
                //при последнем элементе завершаю все приплюсовки
                if ($key+1 == count($arr))
                {
                    $maxCountCircl = $countCircl;
                    $maxElement = $element;
                    $indexStart = $key-$maxCountCircl;
                    $indexFinish = $key-1;
                }
                continue;
            }
            //при элементе с тем же знаком, проверка количества посчитанных элементов с максимальным и обновление значения
            if ($countCircl > $maxCountCircl)
            {
                $maxCountCircl = $countCircl;
                $maxElement = $element;
                $indexStart = $key-$maxCountCircl;
                $indexFinish = $key-1;
            }
            //запоминание нового значение знака и обнуление количества элементов
            $element = $valueBool;
            $countCircl = 1;
        }
        echo "Результат: участок с $indexStart по $indexFinish имеет длину $maxCountCircl элементов<br>";

        echo "<br>24.  Дан одномерный массив из N натуральных чисел не больших 20. 
        Найти наибольший участок массива, в котором его элементы следуют подряд в порядке возрастания (например, 2, 3, 4, 5, ...). Вывести длину этого участка.<br>";
        $min = 0;
        $max = 10;
        $count = 20;
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        $countCircl = 0;
        $maxCountCircl = 0;
        $element = $arr[0];//по умолчанию запоминаю первый элемент массива и его же делаю максимальным по количеству
        $maxElement =  $arr[0];
        $indexStart = 0;
        $indexFinish = 0;
        //определение количества элементов в порядке возрастания
        foreach ($arr as $key => $value) 
        {
            //сравнение элемента сзапомненым
            if ($value > $element)
            {
                $countCircl++;
                $element = $value;
                //при последнем элементе завершаю все приплюсовки
                if ($key+1 == count($arr))
                {
                    $maxCountCircl = $countCircl;
                    $maxElement = $element;
                    $indexStart = $key-$maxCountCircl;
                    $indexFinish = $key-1;
                }
                continue;
            }
            //при элементе меньшем предыдущего, проверка количества посчитанных элементов с максимальным и обновление значения
            if ($countCircl > $maxCountCircl)
            {
                $maxCountCircl = $countCircl;
                $maxElement = $element;
                $indexStart = $key-$maxCountCircl;
                $indexFinish = $key-1;
            }
            //запоминание нового элемента и обнуление количества элементов
            $element = $value;
            $countCircl = 1;
        }
        echo "Результат: участок с $indexStart по $indexFinish имеет длину $maxCountCircl элементов<br>";

        echo "<br>25.  Дан одномерный массив из N натуральных чисел не больших 20.
        Найти наибольший участок массива, в котором чередуются два заданных числа A и B, принадлежащих этому массиву. Вывести длину этого участка.<br>";
        $min = 1;
        $max = 5;
        $count = 20;
        $a = 2;
        $b = 5;
        //формирование массива
        $arr = GetRandArr($min,$max,$count);
        echo "Массив: <br>";
        WriteArr($arr);
        echo "чередуются числа $a и $b<br>";
        $countCircl = 0;
        $maxCountCircl = 0;
        $element = $arr[0];//по умолчанию запоминаю первый элемент массива и его же делаю максимальным по количеству
        $maxElement =  $arr[0];
        $indexStart = 0;
        $indexFinish = 0;
        //определение количества чередующихся элементов 
        foreach ($arr as $key => $value) 
        {
            //проверка на искомые переменные
            if ($value == $a || $value == $b)
            {
                //проверка чередования переменных
                if (($value == $a && $element ==$b) || ($value == $b && $element ==$a) )
                {
                    $countCircl++;
                    $element = $value;
                    //при последнем элементе завершаю все приплюсовки
                    if ($key+1 == count($arr))
                    {
                        $maxCountCircl = $countCircl;
                        $maxElement = $element;
                        $indexStart = $key-$maxCountCircl;
                        $indexFinish = $key-1; 
                    }
                    continue;
                }
            }
            //при элементе не равном, проверка количества посчитанных элементов с максимальным и обновление значения
            if ($countCircl > $maxCountCircl)
            {
                $maxCountCircl = $countCircl;
                $maxElement = $element;
                $indexStart = $key-$maxCountCircl;
                $indexFinish = $key-1;
            }
            //запоминание нового элемента и обнуление количества элементов
            $element = $value;
            $countCircl = 1;
        }
        $str = ($indexFinish == 0)? "чередования не найдены":"участок с $indexStart по $indexFinish имеет длину $maxCountCircl элементов<br>";
        echo "Результат: ".$str;
        echo "</p>";
    ?>
</main>
<?php
    include_once "footer.php";
?>
</body>
</html>