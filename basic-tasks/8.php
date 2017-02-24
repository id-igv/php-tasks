<?php
    /**
     *  TASK #8 : Расширьте конструкцию if из п.5-7, выводя фразу: 
     *            "Неизвестный возраст" при условии, что значение переменной age 
     *            является отрицательным числом, или вовсе числом не является.
     */
     $age = 'rabota';
     if (!is_numeric($age) || $age < 0) { echo 'Неизвестный возраст. O_O'; }
     elseif ($age >= 0 && $age <= 17) { echo 'Вам еще рано работать :)'; }
     elseif ($age >= 18 && $age <= 59) { echo 'Вам еще работать и работать  :('; }
     elseif ($age > 59) { echo 'Вам пора на пенсию ;('; }
     
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
</html>