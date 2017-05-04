<?php
    /*
     TASK #13:
        Есть строка $string = 'яблоко черешня вишня вишня черешня груша яблоко 
        черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня 
        вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня 
        черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня 
        вишня';

        Подсчитайте, сколько раз каждый фрукт встречается в этой строке. 
        Выведите в виде списка в порядке уменьшения количества:

        Пример вывода:
        яблоко – 12
        черешня – 8
        груша – 5
        слива - 3 - there are not any 'sliva' =)
    */
    //*************************************************************************
    error_reporting(E_ALL);
    
    function getAdditionalChars() {
        return '0123456789абвгдеёжзиійклмнопрстуфхцчшщъыьэюяєАБВГДЕЁЖЗИІЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯЄ';
    }
    
    function count_similar_words($str) {
        if ($str == null) { return null; }
        // 1 - get array with words from string
        $words = str_word_count($str, 1, getAdditionalChars());
        //out($words);
        
        // 2 - apply to array array_unique function
        $unique_words = array_unique($words);
        //out($unique_words);
        
        // 3 - loop in loop to count the number
        //     of similar to unique words
        $similar_words = null;
        $word_counter = null;
        foreach ($unique_words as $u_word) {
            $word_counter = 0;
            foreach ($words as $word) {
                if ($u_word === $word) {
                    $word_counter++;
                }
            }
            $similar_words[$u_word] = $word_counter;
        }
        arsort($similar_words);
        return $similar_words;
    }
    
    $string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня 
    яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня 
    вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня 
    вишня черешня черешня груша яблоко черешня вишня';
    
    $results = count_similar_words($string);
    foreach ($results as $key => $result) {
        echo "{$key} - $result<br>";
    }
?>