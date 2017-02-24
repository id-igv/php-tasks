<?php
    /**
     *  TASK #8 : Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. 
     *            С помощью цикла foreach создайте строку '123456789'.
     */
    
    //error_reporting(E_ALL);
    $digits = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    
    foreach ($digits as $digit) {
        $result_string .= $digit;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 8th TASK</title>
</head>
<body>
    <?=$result_string?>
</body>
</html>