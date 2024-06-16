<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
</head>

<body>
<?php
    include_once "getTime.php";
    if ($hours > 8 && $hours < 20)
    {
        echo "<footer class = \"footerWhite\">";
    }
    else
    {
        echo "<footer class = \"footerBlack\">";
    }
    include_once "getTime.php";
?>    
        <p <?php echo $colorClassText ?>>Телефон: 89089222218</p> 
        <p <?php echo $colorClassText ?>>В соц. сетях:    
        </p> 
        <a href="" target="_blank" title="Вконтакте">
            <div class="imgFooter"></div>
        </a>
    </footer>
</body>

</html>