<?php
    /**
     *  TASK #24 : Вам нужно разработать программу, которая считала бы 
     *             количество вхождений какой-нибуть выбранной вами цифры в 
     *             выбранном вами числе. Например: цифра 5 в числе 
     *             442158755745 встречается 4 раза.
     */
    //error_reporting(E_ALL);
    
    function charCounter($string, $number) {
        $sum = 0;
        $pos = 0;
        do {
            $pos = strpos($string, $number, $pos);
            if ($pos !== false) {
                $sum++;
                $pos++;
            }
            else {
                break;
            }
        } while (true);
        
        return $sum;
    }
    
    function getPostParam($name) {
        return $_POST[$name] ? $_POST[$name] : '';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ARRAYS, LOOPS, 24th TASK</title>
</head>
<body>
    <form method="post">
        <input type="text" name="string" value=<?=getPostParam('string')?>>
        <input type="text" name="number" value=<?=getPostParam('number')?>>
        <input type="submit" value="Submit"/>
    </form>
    <?php
        if ($_POST['string'] != null && $_POST['number'] != null) {
            echo "Sum of '" . $_POST['number'] . "': " . charCounter($_POST['string'], $_POST['number']);
        }
    ?>
</body>
</html>