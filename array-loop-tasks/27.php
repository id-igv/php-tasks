<?php
    /**
     *  TASK #27 : Создать генератор случайных таблиц. Есть переменные: 
     *             $row - кол-во строк в таблице, $cols - кол-во столбцов 
     *             в таблице. Есть список цветов, в массиве: 
     *             $colors = array('red','yellow','blue','gray','maroon',
     *                              'brown','green').
     *             Необходимо создать скрипт, который по заданным условиям 
     *             выведет таблицу размера $rows на $cols, в которой все ячейки 
     *             будут иметь цвета, выбранные случайным образом из массива 
     *             $colors. В каждой ячейке должно находиться случайное число. 
     */
    //error_reporting(E_ALL);
    
    function getRandomArrayElem($array) {
        return $array[rand(0, count($array)-1)];
    }
    
    $row = rand(1, 51);
    $col = rand(1, 51);
    $colors = ['red', 'yellow', 'blue', 'gray', 'maroon', 'brown', 'green'];
    
    //echo getRandomArrayElem($colors);
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 27th TASK</title>
</head>
<body>
    <table>
        <?php
            for ($crnt_row = 0; $crnt_row < $row; $crnt_row++) {
                 echo '<tr>';
                     for ($crnt_col = 0; $crnt_col < $col; $crnt_col++) {
                          echo "<td style='background-color:" . getRandomArrayElem($colors) . ";'>";
                            echo rand(0, 999999);
                          echo '</td>';
                     }
                 echo '</tr>';
            }
        ?>
    </table>
</body>
</html>