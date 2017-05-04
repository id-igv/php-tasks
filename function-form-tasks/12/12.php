<?php
    /*
     TASK #12:
        Написать функцию, которая в качестве аргумента принимает строку, 
        и форматирует ее таким образом, что предложения идут в обратном порядке.
    */
    //**************************************************************************
    $log = null;
    error_reporting(E_ALL);
    
    function addLog($logstr, $logtitle) {
        $GLOBALS['log'] .= "<br>{$logtitle}\n => {$logstr}<br><hr>";
    }
    
    function reverse_sentences($text) {
        // 1 - splitting with delimeter as reg exp
        $sentences = preg_split('/([.?!]+)/', $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
        addLog(print_r($sentences, true), 'Exploded text');
        
        // 2 - copying
        $reversed = null; // here will be reversed sentences
        // this 'if' and 'offset' i need to check for the end of the last sentence
        $offset = 1;
        // if the last sentence doesn't have any delimiter [.!?] i'll copy it
        // without loop. because loop is working if the last sentence is ending 
        // with delimiter
        if (preg_match('/([.!?]+)/', $sentences[count($sentences)-1]) !== 1) {
            $reversed[] = trim($sentences[count($sentences)-1]);
            $reversed[] = '.';
            $offset = 2;
        }
        
        for ($i = count($sentences)-$offset; $i >= 0; $i-=2) {
            $reversed[] = trim($sentences[$i-1]);
            $reversed[] = $sentences[$i];
        }
        addLog(print_r($reversed, true), 'Reversed text');
        
        // 3 - adding spaces to delimeters
        foreach ($reversed as $key => &$sentence) {
            if (preg_match('/([.!?]+)/', $sentence) === 1) {
                $reversed[$key] .= ' ';
            }
        }
        
        return implode('', $reversed);
    }
    
    //**************************************************************************
    
    $flashMsg = null;
    $result_msg = $formated_text = null;
    if ((bool)$_POST) {
        if (isset($_POST['string']) && $_POST['string'] != null) {
            $formated_text = reverse_sentences($_POST['string']);
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