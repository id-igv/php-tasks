<?php
    /**
     *  TASK #14 : Дан массив с элементами 4, 2, 5, 19, 13, 0, 10. 
     *             С помощью цикла foreach и оператора if проверьте есть ли 
     *             в массиве элемент со значением $e, равном 2, 3 или 4. 
     *             Если есть — выведите на экран 'Есть!', иначе выведите 'Нет!'.
     */
    
    //error_reporting(E_ALL);
    
    $numbers = [4, 2, 5, 19, 13, 0, 10];
    
    $contain = false;
    foreach ($numbers as $e) {
        if ($e == 2 || $e == 3 || $e == 4) {
            $contain = true;
            break;
        }
    }
    
    if ($contain) {
        echo 'Есть!';
    }
    else {
        echo 'Нет!';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 14th TASK</title>
</head>
<body>
    
</body>
</html>