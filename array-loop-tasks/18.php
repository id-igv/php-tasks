<?php
    /**
     *  TASK #18 : Составьте массив дней недели. С помощью цикла foreach 
     *             выведите все дни недели, выходные дни следует вывести жирным.
     */
    
    //error_reporting(E_ALL);
    
    $days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 
                     'Saturday', 'Sunday'];
                     
    foreach ($days_of_week as $day) {
        if ($day == 'Saturday' || $day == 'Sunday') {
            echo "<b>{$day}</b>";
        }
        else {
            echo $day;
        }
        echo '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 18th TASK</title>
</head>
<body>
    
</body>
</html>