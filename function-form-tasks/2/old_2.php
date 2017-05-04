<?php
    /*
     TASK #2:
        Создать форму с элементом textarea. При отправке формы скрипт должен 
        выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.
    */
    //**************************************************************************
    
    define('TOP_COUNT', 3);
    $log = null;
    error_reporting(E_ALL);
    
    function addLog($logstr, $logtitle) {
        $GLOBALS['log'] .= "<br>{$logtitle}\n => {$logstr}<br><hr>";
    }
    
    function requestPost($key) {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
    
    function getAdditionalChars() {
        return '0123456789абвгдеёжзиійклмнопрстуфхцчшщъыьэюяєАБВГДЕЁЖЗИІЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯЄ';
    }
    
    function findTheLongestWord($text, $number = 1) {
        $words = str_word_count($text, 1, getAdditionalChars()); // getting words array
        addLog(print_r($words, true), 'Splited words array');
        
        $words = array_unique($words); // removing repeatable words
        addLog(print_r($words, true), 'Removed repeats');
        
        if (count($words) <= 3) {
            return $words;
        }
        
        $words_lengths = null;
        foreach ($words as $word) {
            $words_lengths[$word] = strlen($word);
        }
        addLog(print_r($words_lengths, true), 'words_lengths arrray');
        
        arsort($words_lengths);
        addLog(print_r($words_lengths, true), 'Sorted array');
        
        return array_slice(array_keys($words_lengths), 0, 3);
    }
    
    function arrayToStrBySplitter($array, $split_str = "\n") {
        $str = null;
        foreach ($array as $element) {
            $str .= $element . $split_str;
        }
        return $str;
    }
    
    //**************************************************************************

    $flashMsg = null;
    $result = null;
    
    //var_dump($_POST);
    
    if ((bool)$_POST) {
        //var_dump(isset($_POST['text']));
        //if ()
        if (isset($_POST['text']) && $_POST['text'] != null) {
            $result = findTheLongestWord($_POST['text']);
        }
        else {
            $flashMsg = 'Empty field!';
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>TASK #2</title>
</head>
<body>
    <div class="warning">
        <p><?=$flashMsg?></p>
    </div>
    <div class="container">
        <form method="post">
            <div class="input-data left">
                <textarea name="text" placeholder="Type text here..."><?=requestPost('text')?></textarea>
                <input type="submit" value="Find"/>
            </div>
            <div class="result right">
                <font style="text-align:center;display:inline-block;width:100%;">TOP<?=TOP_COUNT?> the longest words:</font>
                <pre><?=isset($result) ? arrayToStrBySplitter($result) : ''?></pre>
            </div>
        </form>
    </div>
    <div class="info">
        <pre><?=isset($log) ? $log : '';?></pre>
    </div>
</body>
</html>