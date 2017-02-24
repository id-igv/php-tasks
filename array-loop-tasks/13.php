<?php
    /**
     *  TASK #13 : Вывести таблицу умножения
     */
    
    //error_reporting(E_ALL);
    
    echo '0 * any_number = 0';
    
    echo '<table style="border-spacing:10px;"><tr>';
    for ($a = 1; $a < 10; $a++) {
        echo '<td>';
         for ($b = 1; $b < 10; $b++) {
              echo "{$a} * {$b} = " . ($a * $b) . "<br>";
         }
        echo '</td>';
    }
    echo '</tr></table>';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 13th TASK</title>
</head>
<body>
    
</body>
</html>