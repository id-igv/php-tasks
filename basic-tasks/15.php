<?php
    /**
     *  TASK #15 : Написать калькулятор. 
     *             Переменная $a = изменяемое число. 
     *             Переменная $b = изменяемое число. 
     *             Переменная $operator = ‘+’ или ‘-’ или ‘/’ или ‘*’ 
     *             или '%' (остаток от деления). 
     *             На экран выводить результат в зависимости от 
     *             значений этих переменных. 
     *             Не забудьте про деление на 0, если надо - выдавать 
     *             ошибку что на 0 делить нельзя. 
     */
     
    function calculate($a, $b, $operator) {
        switch ($operator) {
             case '+':
                 return $a + $b;
             case '-':
                 return $a - $b;
             case '*':
                 return $a * $b;
             case '/':
                 if ($b != 0) { return $a / $b; }
                 else { return 'Can not divide by zero';}
             case '%':
                 if ($b != 0) { return $a % $b; }
                 else { return 'Can not divide by zero';}
             default:
                 return 'Undefined operator';
        }
    }
    
    if (is_numeric($_POST['a_num']) && is_numeric($_POST['b_num'])) {
        $result = calculate($_POST['a_num'], $_POST['b_num'], $_POST['operator']);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BASICS, 15TH TASK</title>
</head>
<body>
    <form method='post'>
        <input type="text" name="a_num" placeholder="A" autofocus style="width:50px;" value="<?=$_POST['a_num']?>"/>
        <input type="text" name="operator" placeholder="+, -, *, /, %" style="width:25px;align:center;" value="<?=$_POST['operator']?>"/>
        <input type="text" name="b_num" placeholder="B" style="width:50px;" value="<?=$_POST['b_num']?>"/>
        =
        <?=$result?>
        <br><input type="submit" value="Calculate"/>
    </form>
</body>
</html>