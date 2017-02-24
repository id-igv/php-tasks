<?php
    /**
     *  TASK #6 : Дан массив $arr. 
     *            С помощью цикла foreach запишите английские названия 
     *            в массив $en, а русские — в массив $ru. 
     *            $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой'); 
     *            $en = array('green', 'red','blue'); 
     *            $ru = array('зеленый', 'красный', 'голубой');
     */
    
    //error_reporting(E_ALL);
    $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
    
    foreach ($arr as $key_en => $value_ru) {
        $en[] = $key_en;
        $ru[] = $value_ru;
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 6th TASK</title>
</head>
<body>
</body>
</html>