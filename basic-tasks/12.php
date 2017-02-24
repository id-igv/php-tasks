<?php
    /**
     *  TASK #12 : С помощью конструкции switch выведите фразу: 
     *             "Неизвестный день", если значение переменной day 
     *             не попадает в диапазон чисел от 1 до 7 (включительно).
     */
     
     $day = 10;
     switch ($day) {
         case ($day > 0 && $day <= 5):
             echo 'Это рабочий день ;(';
             break;
         case 6:
         case 7:
             echo 'Это выходной день :)';
             break;
         default:
             echo "Неизвестный день. \$day = {$day}";
     }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
</html>