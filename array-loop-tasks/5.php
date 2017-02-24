<?php
    /**
     *  TASK #5 : Дан массив 
     *            $arr с ключами 'Коля', 'Вася', 'Петя' 
     *                 с элементами '200', '300', '400'. 
     *            С помощью цикла foreach выведите на экран столбец строк 
     *            такого формата: 'Коля — зарплата 200 долларов.'.
     */
    
    //error_reporting(E_ALL);
    $employee = array('Коля' => 200, 'Вася' => 300, 'Петя' => 400);
    
    foreach ($employee as $employee_name => $salary) {
        echo "{$employee_name}  -  зарплата {$salary}<br>";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 5th TASK</title>
</head>
<body>
</body>
</html>