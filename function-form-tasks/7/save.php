<?php
    /*
     TASK #7:
        Создать гостевую книгу, где любой человек может оставить комментарий в 
        текстовом поле и добавить его. Все добавленные комментарии выводятся 
        над текстовым полем.
    */
    error_reporting(E_ALL);
    define('FILE_PATH', './comments.html');
    //**************************************************************************
    
    function setComments($comment) {
        // array structure: {
        //                     sender => value,
        //                     message => value,
        //                     date => value
        //                  }
        if ($comment == null) { return false; }
        $data = "<hr><p class='col-12'><i>" . $comment['sender'] . "</i> | <b>"
        . $comment['date'] . "</b></p><pre><p>" . $comment['message'] . "</p></pre>";
        file_put_contents(FILE_PATH, $data . PHP_EOL, FILE_APPEND);
        return  true;
    }
    
    //**************************************************************************
    
    $flashMsg = null;
    if ((bool)$_POST) {
        if (isset($_POST['message']) && $_POST['message'] != null) {
            // code
            $comment = ['sender' => null, 
                        'message' => null, 
                        'date' => null];
            $comment['sender'] = isset($_POST['user_name']) ? $_POST['user_name'] : 'unnamed';
            $comment['message'] = $_POST['message'];
            $comment['date'] = date('d.m.Y  G:i');
            
            if (setComments($comment)) { 
                setcookie('msg_id', '71', time()+3600*24, '/');
            }
            else {
                setcookie('msg_id', '70', time()+3600*24, '/');
            }
        }
        else {
            setcookie('msg_id', '72', time()+3600*24, '/');
        }
        header('Location: /?task_id=7');
        die;
    }
    
    //**************************************************************************
?>