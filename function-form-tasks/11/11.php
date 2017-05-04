<?php
    /*
     TASK #11:
        Написать функцию, которая в качестве аргумента принимает строку, 
        и форматирует ее таким образом, что каждое новое предложение начиняется 
        с большой буквы.
        
        String for tests:
        returns a string with the first character of str capitalized, if that character is alphabetic. note that 'alphabetic' is determined by the current locale. for instance, in the default "C" locale characters such as umlaut-a (ä) will not be converted.
        а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.
    */
    //*************************************************************************
    
    $log = null;
    error_reporting(E_ALL);
    
    function addLog($logstr, $logtitle) {
        $GLOBALS['log'] .= "<br>{$logtitle}\n => {$logstr}<br><hr>";
    }
    
    // each sentence starts with upper
    function eswu($text) {
        // 1 - split with delimiter
        $sentences = preg_split('/([.?!]+)/', $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
        addLog(print_r($sentences, true), 'Exploded text');
       
        // 2 - first letter to upper
        foreach($sentences as $key => &$sentence) {
            $sentence = trim($sentence);
            $sentence = mb_strtoupper(mb_substr($sentence, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($sentence, 1, null, 'UTF-8');
        }
        addLog(print_r($sentences, true), 'Uppered text');
        
        // 3 - gather sentences into one text-string
        foreach ($sentences as $key => &$sentence) {
            if (preg_match('/([.!?]+)/', $sentence) === 1) {
                $sentences[$key] .= ' ';
            }
        }
        
        return implode('', $sentences);
    }
    
    //**************************************************************************
    
    $flashMsg = null;
    $result_msg = $formated_text = null;
    if ((bool)$_POST) {
        if (isset($_POST['string']) && $_POST['string'] != null) {
            $formated_text = eswu($_POST['string']);
            $result_msg = "Yours text:<br>" . $_POST['string'] . "<br>Formated text:<br>{$formated_text}";
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