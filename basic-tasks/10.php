<?php
    /**
     *  TASK #10 : С помощью конструкции switch выведите фразу: 
     *             "Это рабочий день", если значение переменной day 
     *             попадает в диапазон чисел от 1 до 5 (включительно).
     */
     
     $day = 4;
     switch ($day) {
         case ($day > 0 && $day <= 5):
             echo 'Это рабочий день';
             break;
         default:
             echo "Not handled value. \$day = {$day}";
     }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
</html>