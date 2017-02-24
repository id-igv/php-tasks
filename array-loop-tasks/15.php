<?php
    /**
     *  TASK #15 : Дан массив $arr. С помощью цикла foreach и переменной 
     *             $count подсчитайте количество элементов этого массива. 
     *             Проверьте работу скрипта на примере массива с элементами 
     *             4, 2, 5, 19, 13, 0, 10.
     */
    
    //error_reporting(E_ALL);
    
    $arr = [4, 2, 5, 19, 13, 0, 10];
    
    $count = 0;
     if ($arr != null) {
         foreach ($arr as $element) {
             $count++;
         }
         echo 'Length of array: ' . $count;
     }
     else {
         echo 'Array is empty';
     }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 15th TASK</title>
</head>
<body>
    
</body>
</html>