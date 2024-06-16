<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transform</title>
    <link rel="stylesheet" href="assets/styles/styleBackground.css">
    <link rel="stylesheet" href="assets/styles/styleTransform.css">
</head>
<?php
    include_once "getTime.php";
    GetClassBody($hours);
    include_once "header.php";
?>
    <main>
        <img class="transformImg" src="assets/picture/image.jpg">
        <table <?php echo $colorClassText?>>
            <tr class="row1">
                <td>11</td>
                <td>12</td>
                <td>13</td>
            </tr>
            <tr class="row2">
                <td>21</td>
                <td>Хомяк</td>
                <td>23</td>
            </tr>
            <tr class="row3">
                <td>31</td>
                <td>32</td>
                <td>33</td>
            </tr>
        </table>
    </main>
    <?php 
        include_once "footer.php";
    ?>
</body>
</html>