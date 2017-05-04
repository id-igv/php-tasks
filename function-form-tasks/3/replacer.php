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
    if ((bool)$_POST) {
        if (isset($_POST['number'])) {
            $number = (int)$_POST['number'];
            if ($number > 0) {
                $file_path = 'files/' . $_POST['files_list'];
                if (file_exists($file_path)) {
                    $str = file_get_contents($file_path);
                    rewriteFile($file_path, strFilter($str, $number));
                    setcookie('msg_id', '31', time()+3600*24, '/');
                    
                }
                else {
                    setcookie('msg_id', '33', time()+3600*24, '/');
                }
            }
            else {
                setcookie('msg_id', '32', time()+3600*24, '/');
            }
        }
        else {
            setcookie('msg_id', '30', time()+3600*24, '/');
        }
    }
    header('Location: /?task_id=3');
?>