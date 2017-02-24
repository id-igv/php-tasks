<?php
    /**
     *  TASK #16 : Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. 
     *             С помощью цикла foreach и оператора if выведите на экран 
     *             столбец элементов массива, как показано на картинке. 
     *             1, 2, 3 4, 5, 6 7, 8, 9
     */
    
    //error_reporting(E_ALL);
    
    $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    
    foreach ($numbers as $number) {
        $to_display .= (string)$number;
        if ($number != 3 && $number != 6 && $number != 9) {
            $to_display .= ", ";
        } 
        else {
            $to_display .= "<br>";
        }
    }
    
    echo $to_display;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 16th TASK</title>
</head>
<body>
    
</body>
</html>