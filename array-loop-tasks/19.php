<?php
    /**
     *  TASK #19 : Составьте массив дней недели. С помощью цикла foreach 
     *             выведите все дни недели, а текущий день выведите курсивом. 
     *             Текущий день должен храниться в переменной $day.
     */
    
    //error_reporting(E_ALL);
    
    
    $days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 
                     'Saturday', 'Sunday'];
                     
    date_default_timezone_set('Europe/Kiev');                 
    $day = date('l');
    
    foreach ($days_of_week as $value) {
        if ($value == $day) {
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
    <title>ARRAYS, LOOPS, 19th TASK</title>
</head>
<body>
    
</body>
</html>