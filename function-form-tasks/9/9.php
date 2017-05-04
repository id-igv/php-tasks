<?php
    /*
    TASK #9:
        Написать функцию, которая переворачивает строку.
        Было "abcde", должна выдать "edcba".
        Ввод текста реализовать с помощью формы.
    */
    
    error_reporting(E_ALL);
    //**************************************************************************
    
    // dummy's method
    function rstr1($text) {
        $result = ['text' => null, 'exec_time' => 0];
        
        if ($text != null) {
            $reverse_str = null;
            
            $start = microtime(true);
            for ($i = grapheme_strlen($text) - 1; $i >= 0; $i--) {
                 $reverse_str .= $text[$i];
            }
            $end = microtime(true) - $start;
            
            $result['text'] = $reverse_str;
            $result['exec_time'] = $end;
        }
        
        return $result;
    }
    
    // not much better but...
    function rstr2($text) {
        $result = ['text' => null, 'exec_time' => 0];
        
        if ($text != null) {
            $reverse_str = null;
            $lower = 0;
            $upper = grapheme_strlen($text) - 1;
            $tmp_ch = null;
            
            $start = microtime(true);
            while ($lower < $upper) {
                $tmp_ch = $text[$lower];
                $text[$lower] = $text[$upper];
                $text[$upper] = $tmp_ch;
                $lower++;
                $upper--;
            }
            $end = microtime(true) - $start;
            
            $result['text'] = $text;
            $result['exec_time'] = $end;
        }
        
        return $result;
    }
    
    function printResult($result) {
        echo '<hr>';
        echo '<p>';
        echo $result['text'] . "<br>";
        echo "Time: " . $result['exec_time'];
        echo '</p>';
        echo '<hr>';
    }
    
    //**************************************************************************
?>

<!--<div class=""><p></p></div>-->
<!--Messages-->

<div class="info col-12">
    <?php
        if ((bool)$_POST) {
            if (isset($_POST['string']) && $_POST['string'] != '') {
                $result = rstr1($_POST['string']);
                if ($result != null) {
                    echo 'rstr1:<br>';
                    printResult($result);
                }
                
                $result = rstr2($_POST['string']);
                if ($result != null) {
                    echo 'rstr2:<br>';
                    printResult($result);
                }
            }
        }
    ?>
</div>

<form class="col-6 center" method="post">
    <input class="col-12" type="text" name="string" placeholder="Type text here"/>
    <input class="col-12" type="submit" name="send_btn" value="Send"/>
</form>