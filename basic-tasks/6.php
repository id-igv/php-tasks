<?php
    /**
     *  TASK #6 : Расширьте конструкцию if из п.5, выводя фразу: 
     *            "Вам пора на пенсию" при условии, что значение 
     *            переменной age больше 59.
     */
     $age = 62;
     if ($age >= 18 && $age <= 59) { echo 'Вам еще работать и работать  :('; }
     if ($age > 59) { echo 'Вам пора на пенсию ;('; }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
</html>