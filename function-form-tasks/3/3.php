<?php
    /*
     TASK #3:
        Есть текстовый файл. Необходимо удалить из него все слова, длина 
        которых превышает N символов. Значение N задавать через форму. 
        Проверить работу на кириллических строках - найти ошибку, найти решение.
    */
    //**************************************************************************
    
    error_reporting(E_ALL);
    define('PATHTO_FILES', PATHTO_TASKS . '/3/files');
    
    function getFlashMsg($id = null) {
        if ($id != null) {
            switch ($id) {
                case '30':
                    return array('class' => 'warning', 'msg_text' => 'Empty field!');
                case '31':
                    return array('class' => 'notice', 'msg_text' => 'Replaced!');
                case '32':
                    return array('class' => 'warning', 
                                 'msg_text' => 'Cannot accept zero, less then zero or string!
                                                <br>Float values would be converted to integer');
                case '33':
                    return array('class' => 'notice', 'msg_text' => 'No such file!');
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
    
    $files_toreplace = scandir(PATHTO_FILES);
    if ($files_toreplace != false) {
        // ignore dirs
        foreach ($files_toreplace as $key => $file) {
            if (is_dir(PATHTO_FILES . '/' . $file)) { unset($files_toreplace[$key]); }
        }
    }
    
?>

<div class="<?=$flashMsg['class']?> col-12">
    <p><?=$flashMsg['msg_text']?></p>
</div>

<form class="col-12" method="post" action="function-form-tasks/3/replacer.php">
    <div class="col-3 center">
    Enter limitation for words in file:
    <input class="col-12" type="text" name="number" placeholder="Characters limit..." value="<?=isset($_POST['number']) ? $_POST['number'] : null?>"/>
    <?php if ($files_toreplace != null) :?>
        Choose file to apply filter:<br>
        <select class="col-12" name="files_list">
        <?php foreach ($files_toreplace as $file) :?>
            <option value="<?=$file?>"><?=$file?></option>
        <?php endforeach;?>
        </select>
    <?php endif;?>
    <input class="col-12" type="submit" value="Replace"/>
    </div>
</form>