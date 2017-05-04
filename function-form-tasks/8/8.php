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
    
    //**************************************************************************
    error_reporting(E_ALL);
    // array structure: {
    //                     sender => value,
    //                     message => value,
    //                     date => value
    //                  }
    
    define('FILE_PATH', PATHTO_TASKS . '/8/comments.html');
    
    function getFlashMsg($id = null) {
        if ($id != null) {
            switch ($id) {
                case '70':
                    return array('class' => 'warning', 'msg_text' => 'Failed!');
                case '71':
                    return array('class' => 'notice', 'msg_text' => 'Sent!');
                case '72':
                    return array('class' => 'warning', 'msg_text' => 'Empty text of message');
                case '73':
                    return array('class' => 'warning', 'msg_text' => 'Uncorrect message!');
                default:
                    return array('class' => 'warning', 'msg_text' => 'Unknown message id');
            }
        }
        return array('class' => 'warning', 'msg_text' => null);;
    }
    
    //**************************************************************************
    
    $flashMsg_id = requestCookie('msg_id');
    if ($flashMsg_id != null) { rmCookie('msg_id'); }
    
    $flashMsg = getFlashMsg($flashMsg_id);
    
    //**************************************************************************
    
    
?>

<div class="<?=$flashMsg['class']?>"><p><?=$flashMsg['msg_text']?></p></div>
<!--Messages-->

<div class="info col-12">
    <?php
        // да, я понимаю, что данный способ не идеальный
        require('comments.html');
    ?>
</div>

<form class="col-4 center" method="post" action="function-form-tasks/8/save.php">
    <input class="col-12 left" type="text" name="user_name" placeholder="Your nickname"/>
    <!--<input class="col-6 left" type="email" name="user_email" placeholder="Your email"/>-->
    <textarea class="col-12" name="message" placeholder="Type your message here..."/></textarea>
    <input class="col-12" type="submit" name="send_btn" value="Send"/>
</form>