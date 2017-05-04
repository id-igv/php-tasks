<?php
    /*
     TASK #7:
        Создать гостевую книгу, где любой человек может оставить комментарий в 
        текстовом поле и добавить его. Все добавленные комментарии выводятся 
        над текстовым полем.
    */
    
    //**************************************************************************
    error_reporting(E_ALL);
    // array structure: {
    //                     sender => value,
    //                     message => value,
    //                     date => value
    //                  }
    
    define('FILE_PATH', PATHTO_TASKS . '/7/comments.html');
    
    function getFlashMsg($id = null) {
        if ($id != null) {
            switch ($id) {
                case '70':
                    return array('class' => 'warning', 'msg_text' => 'Failed!');
                case '71':
                    return array('class' => 'notice', 'msg_text' => 'Sent!');
                case '72':
                    return array('class' => 'warning', 'msg_text' => 'Empty text of message');
                default:
                    return array('class' => 'warning', 'msg_text' => 'Unknown message id');
            }
        }
        return array('class' => 'warning', 'msg_text' => null);
    }
    
    //**************************************************************************
    
    $flashMsg_id = requestCookie('msg_id');
    if ($flashMsg_id != null) { rmCookie('msg_id'); }
    
    $flashMsg = getFlashMsg($flashMsg_id);
    //**************************************************************************
    
    echo realpath(PATHTO_TASKS . '/7/save.php');
?>

<div class="<?=$flashMsg['class']?>"><p><?=$flashMsg['msg_text']?></p></div>
<!--Messages-->

<div class="info col-12">
    <?php
    // и да, я понимаю, что подобная конструкция не удобна тем, что
    // будет неприятно реализовывать разбитие сообщений постранично
    // в случае надобности
        require('comments.html');
    ?>
</div>

<form class="col-6 center" method="post" action="function-form-tasks/7/save.php">
    <input class="col-12 left" type="text" name="user_name" placeholder="Your nickname"/>
    <!--<input class="col-6 left" type="email" name="user_email" placeholder="Your email"/>-->
    <textarea class="col-12" name="message" placeholder="Type your message here..."/></textarea>
    <input class="col-12" type="submit" name="send_btn" value="Send"/>
</form>