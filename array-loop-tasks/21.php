<?php
    /**
     *  TASK #21 : Нарисуйте пирамиду, как показано на рисунке, только 
     *             у вашей пирамиды должно быть 9 рядов, а не 5.
     * 1
     * 22
     * 333
     * 4444
     * 55555
     */
    
    //error_reporting(E_ALL);
    
    for ($row = 1; $row <= 9; $row++) {
        for ($x_counter = 1; $x_counter <= $row; $x_counter++) {
            echo $row;
        }
        echo '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 21th TASK</title>
</head>
<body>
    
</body>
</html>