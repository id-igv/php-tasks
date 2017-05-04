<?php
    /*
     TASK #7:
        Создать гостевую книгу, где любой человек может оставить комментарий в 
        текстовом поле и добавить его. Все добавленные комментарии выводятся 
        над текстовым полем.
    */
    error_reporting(E_ALL);
    define('FILE_PATH', './test7.txt');
    //**************************************************************************
    
    // array structure: {
    //                     sender => value,
    //                     message => value,
    //                     date => value
    //                  }
    
    function getComments() {
        // извлекаем комментарии
        $file_data = file(FILE_PATH);
        $comments = null;
        foreach ($file_data as $str_data) {
            $comments[] = unserialize($str_data);
        }
        return $comments;
    }
    
    function setComments($data) {
        $comment = serialize($data);
        file_put_contents(FILE_PATH, $comment . PHP_EOL, FILE_APPEND);
    }
    
    //**************************************************************************
    
    $flashMsg = null;
    if ((bool)$_POST) {
        if (isset($_POST['message']) && $_POST['message'] != null) {
            // code
            // if ($_POST['message'] != null) {
                setComments($_POST['message']);
                $flashMsg = 'Sent!';
            // }
            // else {
            //     $flashMsg = 'Fill in field!';
            // }
        }
        else {
            $flashMsg = 'Fill in field!';
        }
    }
    
    //**************************************************************************
    
    $comments = getComments();
?>

<div class="warning"><p><?=$flashMsg?></p></div>
<!--Messages-->

<?php
    if ($comments != null) : 
        foreach ($comments as $comment) : 
?>
    <div class="info">
        <?=$comment . '<hr>'?>
    </div>
<?php
        endforeach; 
    endif; 
?>

<form method="post">
    <textarea name="message" placeholder="Type your message here..."/></textarea>
    <input type="submit" value="Send"/>
</form>