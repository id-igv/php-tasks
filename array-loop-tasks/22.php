<?php
    /**
     *  TASK #22 : Нарисуйте пирамиду, как показано на рисунке, 
     *             воспользовавшись циклом for или while.
     * xx
     * xxxx
     * xxxxxx
     * xxxxxxxx
     * xxxxxxxxxx
     */
    
    //error_reporting(E_ALL);
    
    for ($row = 1; $row <= 5; $row++) {
        for ($x_counter = 1; $x_counter <= $row*2; $x_counter++) {
            echo 'x';
        }
        echo '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 22th TASK</title>
</head>
<body>
    
</body>
</html>