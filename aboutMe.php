<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о Богоявленской Т.А.</title>
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<?php
    include_once "function.php";
    include_once "getTime.php";
    GetClassBody($hours);
    include_once "header.php";
?>
    <main>
        <!-- Основная информация -->
        <div class="infoBlock">
            <div class="photo">                
                <div class="photoImg <?php echo $classThime?>"></div>
            </div>
            <div class="info">
                <div class="fio <?php echo $colorText?>">
                    <h2 <?php echo $colorClassText?>>
                        <?php
                        $countWord = 0;
                        $countVowel= 0;
                        $str = "Богоявленская Татьяна";
                        GetCountWordAndVowel($str);
                        echo $str;
                    ?>
                    </h2>
                </div>
                <div class="aboutMe">
                    <p <?php echo $colorClassText?>>  
                        <?php
                        echo $color1;
                        $date = "11.10.1997";           
                        $str ="<b>Дата рождения:</b><br>$date.<br>
                        <b>Город:</b><br>
                        Каменск-Уральский.<br>
                        <b>Место работы:</b><br>
                        Оборонное предприятие.<br>
                        <b>Род деятельности:</b><br>
                        Разработка прикладных и системных приложений на C# и C++ и моделирование в среде MatLab.<br>
                        <b>Образование:</b><br>
                        Закончила магистратуру в УрФУ по специальности \"Программная инжененрия\".<br></font>
                        <b>Цели в жизни:</b><br>";
                        GetCountWordAndVowel($str);
                        echo $str;
                        ?>
                    </p>
                    <ul <?php echo $colorClassText?>>
                        <?php 
                        $str = "
                            <li>создание семьи</li>
                            <li>развитие в профиссиональном плане</li>
                            <li>изучение нового</li>";
                            GetCountWordAndVowel($str);
                            echo $str;
                        ?>
                    </ul>
                    <p <?php echo $colorClassText?>>
                        <?php 
                        $str ="
                            <b>Хобби:</b><br>
                            В свободное время люблю:";
                        GetCountWordAndVowel($str);
                        echo $str;
                        ?>
                    </p>
                    <ul <?php echo $colorClassText?>>
                        <?php 
                        $str = "
                            <li>читать</li>
                            <li>рисовать</li>
                            <li>вязать</li>
                            <li>шить</li>
                            <li>валять шерстяные игрушки</li>
                            <li>рыбачить</li>";
                        GetCountWordAndVowel($str);
                        echo $str;
                        ?>
                    </ul>
                    <?php
                        echo "<p $colorClassText>";
                        echo "<br>"; 
                        echo "Количество дней: ".GetDifferenceDate($date)."</p>"; 
                        GetCountWordAndVowel($str);  
                    ?>
                </div>
                <div class="aboutCourse">
                    <p <?php echo $colorClassText?>>
                        <?php                     
                        $str = "<b>Что понравилось на занятиях:</b><br>
                        Преподаватель Ирина при объяснении вариантов решения какой-либо задачи
                        рассказывает все возможные варианты, но при этом
                        обращает особое внимания на то, как принято писать код,
                        что является очень хорошим подспорьем для дальнейшей работы<br>";
                        $arr = explode(" ", $str);
                        $newStr = "";                        
                        $colorEnd = "</font>";
                        for ($index = 0; $index < count($arr); $index++)
                        {
                            if ($index % 2 == 0)
                            {
                                echo $color1.$arr[$index].$colorEnd." ";
                            }
                            else
                            {
                                echo $color2.$arr[$index].$colorEnd." ";
                            }
                        }
                        GetCountWordAndVowel($str);
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <?php 
            echo "<br><p $colorClassText> Количество слов на странице = $countWord, количество гласных букв на странице =  $countVowel<br></p>"; 
        ?>
        <!-- Картинки -->
        <div class="imageBlock">
            <p class="headerPhoto <?php echo $colorText?>">Домашний питомец</p>
            <div class="blockImage1">
                <?php 
                for ($index = 1; $index <= 4; $index++)
                {
                    switch ($index)
                    {
                        case 2 :
                            {
                                $text = "В игрушках";
                                break;
                            }
                        case 3 :
                            {
                                $text = "Просит погладить";
                                break;
                            }
                        case 4 :
                            {
                                $text = "Не понимает, зачем ее позвали";
                                break;
                            }
                        default:
                            {
                                $text = "На охоте";
                                break;
                            }
                    }
                    echo "<div class=\"container1 $classThime\">
                    <div class=\"image$index $classThime\"></div>
                    <div class=\"signature1 $classThime\"><p $colorClassText>$text</p></div>
                    </div>";
                }
                ?>
            </div>
            <p class="headerPhoto <?php echo $colorText?>" >Фото природы в черте города</p>
            <div class="blockImage2">
                <?php 
                for ($index = 5; $index <= 8; $index++)
                {
                    switch ($index)
                    {
                        case 5 :
                            {
                                $text = "Река Исеть";
                                break;
                            }
                        case 6 :
                            {
                                $text = "Река Каменка";
                                break;
                            }
                        case 7 :
                            {
                                $text = "Деревья";
                                break;
                            }
                        default:
                            {
                                $text = "Река Исеть";
                                break;
                            }
                    }
                    echo "<div class=\"container2 $classThime\">
                    <div class=\"image$index $classThime\"></div>
                    <div class=\"signature1 $classThime\"><p $colorClassText>$text</p></div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </main>
    <?php 
        include_once "footer.php";
    ?>
</body>

</html>