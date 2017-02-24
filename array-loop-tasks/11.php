<?php
    /**
     *  TASK #11 : Выведите столбец четных чисел в промежутке от нуля до 100.
     */
    
    //error_reporting(E_ALL);
    
    //Вывести можно двумя способами
    //**** Первый (надежный и универсальный):
    for ($i = 0; $i <= 100; $i++) {
         if (($i % 2) == 0) { echo $i . '<br>';}
    }
    
    echo '<hr>';
    
    //**** Второй (верный, когда промежуток начинается с четного или ноля):
    for ($i = 0; $i <= 100; $i+=2) {
         echo $i . '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 8th TASK</title>
</head>
<body>
    
</body>
</html>