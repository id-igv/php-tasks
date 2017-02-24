<?php
    /**
     *  TASK #20 : Нарисуйте пирамиду, как показано на рисунке, 
     *             только у вашей пирамиды должно быть 20 рядов, а не 5.
     * x
     * xx
     * xxx
     * xxxx
     * xxxxx
     */
    
    //error_reporting(E_ALL);
    
    for ($row = 1; $row <= 20; $row++) {
        for ($x_counter = 1; $x_counter <= $row; $x_counter++) {
            echo 'x';
        }
        echo '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 20th TASK</title>
</head>
<body>
    
</body>
</html>