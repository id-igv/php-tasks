<?php
    /**
     *  TASK #11 : С помощью конструкции switch выведите фразу: 
     *             "Это выходной день", если значение переменной day попадает 
     *             в диапазон чисел от 6 до 7 (включительно).
     */
     
     $day = 6;
     switch ($day) {
         case ($day > 0 && $day <= 5):
             echo 'Это рабочий день ;(';
             break;
         case 6:
         case 7:
             echo 'Это выходной день :)';
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