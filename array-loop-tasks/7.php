<?php
    /**
     *  TASK #7 : Дан массив с элементами 2, 5, 9, 15, 0, 4. 
     *            С помощью цикла foreach и оператора if выведите на экран 
     *            столбец тех элементов массива, которые больше 3х, но меньше 10.
     */
    
    //error_reporting(E_ALL);
    $numbers = [2, 5, 9, 15, 0, 4];
    
    foreach ($numbers as $number) {
        if ($number > 3 && $number < 10) {
            echo $number . '<br>';
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 7th TASK</title>
</head>
<body>
</body>
</html>