<?php
    /**
     *  TASK #25 : Ваше задание создать массив, наполнить это случайными 
     *             значениями (функция rand), найти максимальное и 
     *             минимальное значение и поменять их местами.
     */
    error_reporting(E_ALL);
    
    $array_size = 10;
    
    for ($i = 0; $i < $array_size; $i++) {
        $numbers[] = rand();
    }
    
    echo '<pre>';
    print_r($numbers);
    echo '</pre>';
    
    $max_num = max($numbers);
    $min_num = min($numbers);
    
    echo "Max: {$max_num} <br>Min: {$min_num}<br>";
    
    echo '<hr>';
    
    foreach ($numbers as &$number) {
        if ($number == $max_num) {
            $number = $min_num;
        } 
        elseif ($number == $min_num) {
            $number = $max_num;
        }
    }
    
    echo '<hr>';
    echo '<pre>';
    print_r($numbers);
    echo '</pre>';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 25th TASK</title>
</head>
<body>
</body>
</html>