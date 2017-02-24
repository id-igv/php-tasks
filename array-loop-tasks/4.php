<?php
    /**
     *  TASK #4 : Дан массив $arr. 
     *            С помощью первого цикла foreach выведите на экран 
     *            столбец ключей, с помощью второго — столбец элементов.
     *            
     *            $arr = array('green'=>'зеленый', 
     *                         'red'=>'красный',
     *                         'blue'=>'голубой'); 
     */
    
    error_reporting(E_ALL);
    $arr = array('green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой');
    
    echo 'Keys column: <br>';
    foreach ($arr as $key => $value) {
        echo '-  ' . $key . '<br>';
    }
    
    echo 'Values column: <br>';
    foreach ($arr as $value) {
        echo '-  ' . $value . '<br>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 4th TASK</title>
</head>
<body>
    
</body>
</html>