<?php
    /*
     TASK #10:
        Написать функцию, которая считает количество уникальных слов в тексте. 
        Слова разделяются пробелами. Текст должен вводиться с формы.
    */
    //*************************************************************************
    $log = null;
    error_reporting(E_ALL);
    
    function addLog($logstr, $logtitle) {
        $GLOBALS['log'] .= "<br>{$logtitle}\n => {$logstr}<br><hr>";
    }
    
    function getAdditionalChars() {
        return '0123456789абвгдеёжзиійклмнопрстуфхцчшщъыьэюяєАБВГДЕЁЖЗИІЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯЄ';
    }
    
    function count_unique($str) {
        if ($str == null) { return null; }
        // 1 - get array with words from string
        $words = str_word_count($str, 1, getAdditionalChars());
        addLog(print_r($words, true), 'After str_word_count function');
        // 2 - apply to array array_unique function
        $unique_words = array_unique($words);
        addLog(print_r($unique_words, true), 'Unique words');
        // 3 - return counted unique words
        return count($unique_words);
    }
    
    //**************************************************************************
    $flashMsg = null;
    $unique_words = $result_msg = null;
    if ((bool)$_POST) {
        if (isset($_POST['string']) && $_POST['string'] != null) {
            $unique_words = count_unique($_POST['string']);
            $result_msg = "The number of unique words in <b>string</b>:<br>" . $_POST['string'] . "<br>is <b>{$unique_words}</b>";
        }
    }
?>

<div class="warning">
    <p><?=$flashMsg?></p>
</div>

<div class="info">
    <p><?=$result_msg?></p>
    <p><hr><pre><?=$log?></pre></p>
</div>

<form class="col-6 center" method="post">
    <input class="col-12" type="text" name="string" placeholder="Type text here"/>
    <input class="col-12" type="submit" name="send_btn" value="Send"/>
</form>