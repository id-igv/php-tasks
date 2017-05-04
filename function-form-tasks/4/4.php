<?php
    /*
     TASK #5:
        Написать функцию, которая выводит список файлов в заданной директории. 
        Директория задается как параметр функции.
    */
    //**************************************************************************
    
    // flash-message id handler
    function getFlashMsg($id = null) {
        if ($id != null) {
            switch ($id) {
                case '40':
                    return array('class' => 'warning', 'msg_text' => null);
                case '41':
                    return array('class' => 'notice', 'msg_text' => 'Changed!');
                case '42':
                    return array('class' => 'warning', 'msg_text' => 'No such file or directory');
                case '43':
                    return array('class' => 'warning', 'msg_text' => 'Empty field!');
                default:
                    return array('class' => 'warning', 'msg_text' => 'Unknown message id');
            }
        }
        return array('class' => 'warning', 'msg_text' => null);
    }
    
    // function to get list of files
    function getFilesList($dir = '.') {
        $files = scandir($dir);
        if ($files !== false) {
            foreach ($files as $file) {
                echo "> $file<br>";
            }
        }
        else {
            echo 'No such file or directory';
        }
    }
    
    //**************************************************************************
    $flashMsg_id = '40';
    
    //getting current directory from previous script execution
    if (isset($_COOKIE['crntdir'])) { chdir($_COOKIE['crntdir']); }
    
    if ((bool)$_POST) {
        if (isset($_POST['dir']) && $_POST['dir'] != '') {
            
            if (is_dir($_POST['dir'])) {
                chdir($_POST['dir']);
                $flashMsg_id = '41';
                // setcookie('msg_id', '41', time()+3600*24, '/');
            }
            else {
                $flashMsg_id = '42';
                // setcookie('msg_id', '42', time()+3600*24, '/');
            }
        }
        else {
            $flashMsg_id = '43';
            // setcookie('msg_id', '43', time()+3600*24, '/');
        }
    }
    setcookie('crntdir', getcwd(), time()+3600*24, '/');
    $flashMsg = getFlashMsg($flashMsg_id);
?>

<div class="col-12 <?=$flashMsg['class']?>"><p><?=$flashMsg['msg_text']?></p></div>

<form class="col-4 center" method="post">
    <input class="col-12" type="text" name="dir" autofocus/>
    <input class="col-12" type="submit" value="Submit"/>
</form>

<!--Displaying current dir-name and file list-->
<div class="col-4 center">
    <div class="info"><b>Current directory:</b><br><?=getcwd()?></div>
    <div class="info"><?=getFilesList(getcwd())?></div>
</div>