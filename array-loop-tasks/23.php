<?php
    /**
     *  TASK #23 : Вам нужно разработать программу, которая считала бы 
     *             сумму цифр числа введенного пользователем. Например: есть 
     *             число 123, то программа должна вычислить сумму цифр 
     *             1, 2, 3, т. е. 6.
     *             По желанию можете сделать проверку на корректность 
     *             введения данных пользователем.
     */
    
    //error_reporting(E_ALL);
    
    $str = $_POST['number'];
    
    $sum = 0;
    $start_pos = 0;
    if ($str[0] == '-' || $str[0] == '+') {
        $start_pos = 1;
    }
    for ($i = $start_pos, $str_length = strlen($str); $i < $str_length; $i++) {
        if (!is_numeric($str[$i])) {
            $sum = 'Not a Number';
            break;
        }
        else {
            $sum += $str[$i];
        }
    }
    
    //echo "Sum: {$sum}<br>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 23th TASK</title>
</head>
<body>
    <form method="post">
        <input type="text" name="number" value=<?=$str?>>
        <input type="submit" value="Submit"/>
    </form>
    <?="Sum: {$sum}<br>"?>
</body>
</html>