<?php
    /**
     *  TASK #26 : Вам нужно создать массив и заполнить его случайными 
     *             числами от 1 до 100 (ф-я rand). Далее, вычислить 
     *             произведение тех элементов, которые больше ноля и у 
     *             которых парные индексы. После вывести на экран элементы, 
     *             которые больше ноля и у которых не парный индекс.
     */
    //error_reporting(E_ALL);
    
    $array_size = 10;
    
    for ($i = 0; $i < $array_size; $i++) {
        $numbers[] = rand(1, 100);
    }
    
    echo '<pre>';
    print_r($numbers);
    echo '</pre>';
    
    echo '<hr>';
    $product = 1;
    
    for ($i = 1; $i < $array_size; $i++) {
         if (($i % 2) == 0 && $i != 0) {
             $product *= $numbers[$i];
         }
         else {
             echo "[$i] => " . $numbers[$i] . "<br>";
         }
    }
    
    echo "Product: $product";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 26th TASK</title>
</head>
<body>
</body>
</html>