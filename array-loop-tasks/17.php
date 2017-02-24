<?php
    /**
     *  TASK #17 : Сосктавьте массив месяцев. С помощью цикла foreach 
     *             выведите все месяцы, а текущий месяц выведите жирным. 
     *             Текущий месяц должен храниться в переменной $month.
     */
    
    //error_reporting(E_ALL);
    
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 
                'July', 'August', 'September', 'October', 'November', 
                'December'];
    
    $month = 'February';
    foreach ($months as $value) {
        if ($value == $month) {
            echo "<b>{$value}</b>";
        }
        else {
            echo $value;
        }
        echo '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 17th TASK</title>
</head>
<body>
    
</body>
</html>