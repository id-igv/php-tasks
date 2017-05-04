<?php
    /*
     TASK #1:
        Создать форму с двумя элементами textarea. При отправке формы скрипт 
        должен выдавать только те слова, которые есть и в первом и во втором 
        поле ввода. Реализацию это логики необходимо поместить в функцию 
        getCommonWords($a, $b), которая будет возвращать массив с общими словами.
    */
    
    //error_reporting(E_ALL);
    
//******************************************************************************
    // function requestPost($key) {
    //     return isset($_POST[$key]) ? $_POST[$key] : null;
    // }
    
    // Проверка полученых POSTом данных
    function isFormValid() {
        return (bool)requestPost('area_1') && (bool)requestPost('area_2');
    }
    
    function getAdditionalChars() {
        return '0123456789абвгдеёжзиійклмнопрстуфхцчшщъыьэюяєАБВГДЕЁЖЗИІЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯЄ';
    }
    
    // Ф-я, которую собсно указали в ТЗ
    function getCommonWords($str1, $str2) {
        if ($str1 == $str2) { // проверяем на равенство строки
            return 1; // если равны сразу выходим
        }
        else { // иначе
            // выбираем слова из строк в массивы
            $words1 = str_word_count($str1, 1, getAdditionalChars());
            $words2 = str_word_count($str2, 1, getAdditionalChars());
            
            
            // ищем пересечения в массивах слов и возвращаем 
            // результирующий массив
            return array_intersect($words1, $words2);
        }
    }
    
    // Проверка найденых (или нет) пересечений
    function matchesHandler($matches) {
        if ($matches == -1) {
            return '';
        }
        if ($matches == null) { // пересечений нет, значит и совпадений тоже
            return 'No matches!';
        }
        elseif ($matches === 1) { // строки равны
            return 'These texts are similar.';
        }
        else {
            $matches = array_unique($matches); // уберем все повторы
            $result = null;
            // ниже делаем с массива красивую строку
            foreach ($matches as $match) {
                $result .= "{$match}\n"; 
            }
            return $result; // вернем результирующую строку
        }
    }
//******************************************************************************
    
//*******************PROCESSING*************************************************
    
    $flashMsg = null;
    $matches = -1;
    if ((bool)$_POST) {
        if (isFormValid()) {
            // handle text from post
            $matches = getCommonWords($_POST['area_1'], $_POST['area_2']);
        }
        else {
            //$matches = -1;
            $flashMsg = 'Empty field/s!';
        }
    }
?>
<div class="warning">
    <p><?=$flashMsg?></p>
</div>
<form method="post" class="col-12">
    <div class="input-data left col-7">
        <textarea class="col-12" name="area_1" placeholder="Type text here..."><?=requestPost('area_1')?></textarea><br>
        <textarea class="col-12" name="area_2" placeholder="Type text here..."><?=requestPost('area_2')?></textarea>
        <input class="col-12" type="submit" value="Find"/>
    </div>
    <div class="result right col-4">
        <div class="result-title col-12">
            Result:<br>
        </div>
        <pre><?=matchesHandler($matches)?></pre>
    </div>
</form>