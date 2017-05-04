<?php
    /*
     TASK #8:
        Создать гостевую книгу, где любой человек может оставить комментарий 
        в текстовом поле и добавить его. Все добавленные комментарии выводятся 
        над текстовым полем. Реализовать проверку на наличие в тексте 
        запрещенных слов, матов. При наличии таких слов - выводить сообщение 
        "Некорректный комментарий". Реализовать удаление из комментария всех 
        тегов, кроме тега <b>.
    */
    error_reporting(E_ALL);
    define('FILE_PATH', './comments.html');
    define('WANTEDWORDS_PATH', './wanted_words.txt');
    //**************************************************************************
    
    function checkUserMsg($text) {
        $is_correct = true;
        
        $wanted_words = file(WANTEDWORDS_PATH, FILE_SKIP_EMPTY_LINES); // getting list of badwords
        foreach($wanted_words as $word) {
            if ($word[0] == '#') { continue; } // skipping comments
            $word = trim($word);
            if (stripos($text, $word) !== false) { // looking for badword
                $is_correct = false; // if it is, telling about that
                break; // stopping cycle
            }
        }
        
        return $is_correct;
    }
    
    function setComments($comment) {
        // array structure: {
        //                     sender => value,
        //                     message => value,
        //                     date => value
        //                  }
        if ($comment == null) { return false; }
        $data = "<p class='col-12 comment_title'><i>" . $comment['sender'] . "</i> | <b>"
        . $comment['date'] . "</b></p><pre><p>" . $comment['message'] . "</p></pre>";
        file_put_contents(FILE_PATH, $data . PHP_EOL, FILE_APPEND);
        return  true;
    }
    
    //**************************************************************************
    
    $flashMsg = null;
    if ((bool)$_POST) {
        if (isset($_POST['message']) && $_POST['message'] != null) {
            // code
            if (checkUserMsg($_POST['message'])) {
                $comment = ['sender' => null, 
                            'message' => null, 
                            'date' => null];
                            
                $comment['sender'] = isset($_POST['user_name']) ? $_POST['user_name'] : 'unnamed';
                $comment['message'] = strip_tags($_POST['message'], '<b>');
                $comment['date'] = date('d.m.Y  G:i');
                
                if (setComments($comment)) { 
                    setcookie('msg_id', '71', time()+3600*24, '/');
                }
                else {
                    setcookie('msg_id', '70', time()+3600*24, '/');
                }
            }
            else { setcookie('msg_id', '73', time()+3600*24, '/'); }
        }
        else { setcookie('msg_id', '72', time()+3600*24, '/'); }
        header('Location: /?task_id=8');
        die;
    }
    // echo var_dump($log);
    //**************************************************************************
?>