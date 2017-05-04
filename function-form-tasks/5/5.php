<?php
    /*
     TASK #5:
        Написать функцию, которая выводит список файлов в заданной директории, 
        которые содержат искомое слово. Директория и искомое слово задаются как 
        параметры функции.
    */
    //**************************************************************************
    
    error_reporting(E_ALL);
    define('FILE_FILTER_NAME', 'byname');
    define('FILE_FILTER_CONTENT', 'bycontent');
    
    // flash-message id handler
    function getFlashMsg($id = null) {
        if ($id != null) {
            switch ($id) {
                case '50':
                    return array('class' => 'warning', 'msg_text' => null);
                case '51':
                    return array('class' => 'notice', 'msg_text' => 'Changed!');
                case '52':
                    return array('class' => 'warning', 'msg_text' => 'No such file or directory');
                case '53':
                    return array('class' => 'warning', 'msg_text' => 'Empty field!');
                default:
                    return array('class' => 'warning', 'msg_text' => null);
            }
        }
        return array('class' => 'warning', 'msg_text' => null);
    }
    
    // function to get list of files
    // $filter = null   => all files in dir
    // if $filter != null function will try to find matches in file list
    // $mode: FILE_FILTER_CONTENT - func searches in file content
    // $mode: FILE_FILTER_NAME - func searches in file name
    function getFilesList($dir = '.', $filter, $mode = FILE_FILTER_CONTENT) {
        $files = scandir($dir);
        if ($files !== false) {
            $tmp = false;
            if ($filter != null && $filter != '') {
                // applying filter
                if ($mode == FILE_FILTER_CONTENT) {
                    $tmp = findFileByContent($dir, $filter);
                }
                elseif ($mode == FILE_FILTER_NAME || $mode == null || $mode == '') {
                    $tmp = findFileByName($dir, $filter);
                }
                else {
                    echo 'Wrong filter type';
                }
            }
            // getting file-list
            if ($tmp !== false) {
                $files = $tmp;
            }
            if ($files != null) {
                foreach ($files as $file) {
                    echo "> $file<br>";
                }
            }
            else { echo 'No matches';}
        }
        else {
            echo 'No such file or directory';
        }
    }
    
    // function to find files which contain $key in...
    // ... file's name
    function findFileByName($dir = '.', $filter) {
        $files_names = scandir($dir);
        if ($files_names !== false && $filter != null) {
            $sought_files = null;
            foreach ($files_names as $file_name) {
                if (strpos($file_name, $filter) !== false) {
                    $sought_files[] = $file_name;
                }
            }
            return $sought_files;
        }
        else {
            return false;
        }
    }
    
    // ... file's content
    function findFileByContent($dir = '.', $filter) {
        $files_names = scandir($dir);
        if ($files_names !== false && $filter != null) {
            $sought_files = null;
            foreach ($files_names as $file_name) {
                if (is_file($file_name)) {
                    $file_content = file_get_contents($file_name);
                    if (strpos($file_content, $filter) !== false) {
                        $sought_files[] = $file_name;
                    }
                }
            }
            return $sought_files;
        }
        else {
            return false;
        }
    }
    
    //**************************************************************************
    
    //getting current directory from previous script execution
    if (requestCookie('crntdir')) { chdir(requestCookie('crntdir')); }
    
    $flashMsg_id = '50';
    
    if ((bool)$_POST) {
        if (isset($_POST['dir']) && $_POST['dir'] != '') {
            
            if (is_dir($_POST['dir'])) {
                chdir($_POST['dir']); // changing current dir
                $flashMsg_id = '51';
            }
            else {
                $flashMsg_id = '52';
            }
        }
        elseif (!isset($_POST['filter']) || $_POST['filter'] == '') {
            $flashMsg_id = '53';
        }
        
    }
    setcookie('crntdir', getcwd(), time()+3600*24, '/');
    $flashMsg = getFlashMsg($flashMsg_id);
?>

<div class="col-12 <?=$flashMsg['class']?>"><p><?=$flashMsg['msg_text']?></p></div>

<form class="col-4 center" method="post">
    Select search mode:<br>
    <select class="col-12" name="filtertype">
        <option value="bycontent">Search in file content</option>
        <option value="byname">Search in fiel name</option>
    </select>
    <input class="col-12" type="text" name="dir" placeholder="Type here dir name to open..."/>
    <input class="col-12" type="text" name="filter" placeholder="Type here key to find..."/>
    <input class="col-12" type="submit" value="Submit"/>
</form>
    
<!--Displaying current dir-name and file list-->
<div class="col-8 info center">
    <div class="col-6 left">
        <hr>
        <b>Current directory:</b>
        <br>
        <?=getcwd()?>
        <hr>
        <?=getFilesList(getcwd(), null)?>
    </div>
    <div class="col-6 right">
        <hr>
        <b>Filtered file list:</b>
        <br>
        <?=getcwd()?>
        <hr>
        <?=getFilesList(getcwd(), requestPost('filter'), requestPost('filtertype'))?>
    </div>
</div>