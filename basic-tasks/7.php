<?php
    /**
     *  TASK #7 : Расширьте конструкцию if из п.5-6, выводя фразу: 
     *            "Вам еще рано работать" при условии, что значение 
     *            переменной age попадает в диапазон чисел от 0 до 17 
     *            (включительно).
     */
     $age = 5;
     if ($age >= 0 && $age <= 17) { echo 'Вам еще рано работать :)'; }
     else if ($age >= 18 && $age <= 59) { echo 'Вам еще работать и работать  :('; }
     else if ($age > 59) { echo 'Вам пора на пенсию ;('; }
     else { echo 'Rly? R ur age less then zero? OK then.'; }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
</html>