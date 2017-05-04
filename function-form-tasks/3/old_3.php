<?php
    /*
     TASK #3:
        Есть текстовый файл. Необходимо удалить из него все слова, длина 
        которых превышает N символов. Значение N задавать через форму. 
        Проверить работу на кириллических строках - найти ошибку, найти решение.
    */
    //**************************************************************************
    
    error_reporting(E_ALL);
    
    function getAdditionalChars() {
        return '0123456789абвгдеёжзиійклмнопрстуфхцчшщъыьэюяєАБВГДЕЁЖЗИІЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯЄ@#$^&*<>[]{}';
    }
    
    function arrayToStrBySplitter($array, $split_str = "\n") {
        $str = null;
        foreach ($array as $element) {
            $str .= $element . $split_str;
        }
        return $str;
    }
    
    function strFilter($str, $length_limit) {
        if ($str == null || $length_limit < 1) {
            return false;
        }
        
        $words = str_word_count($str, 1, getAdditionalChars());
        foreach ($words as /*$key =>*/ $word) {
            if (grapheme_strlen($word) > $length_limit) {
                // unset($words[$key]);
                $str = str_replace($word, null, $str);
            }
        }
        
        return trim($str);
    }
    
    function rewriteFile($file_path, $content) {
        if ($content != null) {
            $file = fopen($file_path, "w+");
            fwrite($file, $content);
            fclose($file);
            return true;
        }
        return false;
    }
    
    //**************************************************************************
    
    $flashMsg = null;
    if ($_POST) {
        if (isset($_POST['number'])) {
            $number = (int)$_POST['number'];
            if ($number > 0) {
                $file_path = './files/test3.txt';
                if (file_exists($file_path)) {
                    $str = file_get_contents($file_path);
                    rewriteFile($file_path, strFilter($str, $number));
                    $flashMsg = "Success!";
                }
                else {
                    $flashMsg = "No such file!";
                }
            }
            else {
                $flashMsg = "Cannot accept zero or string!\nFloat values would be converted to integer";
            }
        }
        else {
            $flashMsg = "Fill in field!";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>TASK #3</title>
</head>
<body>
    <div class="warning">
        <p><?=$flashMsg?></p>
    </div>
    <div class="container">
        <form method="post">
            <input type="text" name="number" placeholder="Type here..." value="<?=isset($_POST['number']) ? $_POST['number'] : null?>"/>
            <input type="submit" value="Replace"/>
        </form>
    </div>
    <div class="info"></div>
</body>
</html>