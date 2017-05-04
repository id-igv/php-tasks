<?php
    /*
     TASK #5:
        Написать функцию, которая выводит список файлов в заданной директории, 
        которые содержат искомое слово. Директория и искомое слово задаются как 
        параметры функции.
    */
    //**************************************************************************
    
    error_reporting(E_ALL);
    define('FILE_FILTER_NAME', 'filter by file name');
    define('FILE_FILTER_CONTENT', 'filter by file\'s conente');
    
    // flash-message id handler
    function getFlashMsg($id) {
        switch ($id) {
            case '0':
                return null;
            case '1':
                return 'Changed!';
            case '2':
                return 'No such file or directory';
            default:
                return 'Unknown message id';
        }
    }
    
    
    function redirect($to, $params) {
        header("Location: {$to}?{$params}");
        die;
    }
    
    // function to get list of files
    function getFilesList($dir = '.', $filter, $mode = FILE_FILTER_CONTENT) {
        $files = scandir($dir);
        if ($files !== false) {
            $tmp = false;
            if ($filter != null && $filter != ' ') {
                // applying filter
                if ($mode == FILE_FILTER_CONTENT) {
                    $tmp = findFileByContent($dir, $filter);
                }
                elseif ($mode == FILE_FILTER_NAME) {
                    $tmp = findFileByName($dir, $filter);
                }
                else {
                    echo 'Wrong filter...';
                }
            }
            // getting file-list
            if ($tmp !== false || $tmp != null) {
                $files = $tmp;
            }
            foreach ($files as $file) {
                echo "> $file<br>";
            }
        }
        else {
            echo 'No such file or directory';
        }
    }
    
    // function to find files which contain $key in...
    // ... file's name
    function findFileByName($dir = '.', $filter) {
        $files_names = scandir($dir);
        if ($files_names !== false) {
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
        if ($files_names !== false) {
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
    if (isset($_GET['crntdir'])) { chdir($_GET['crntdir']); }
    $flashMsg = isset($_GET['flash']) ? getFlashMsg($_GET['flash']) : null;
    
    if ((bool)$_POST) {
        if (isset($_POST['dir']) && $_POST['dir'] != null) {
            
            if (is_dir($_POST['dir'])) {
                chdir($_POST['dir']); // changing current dir
                redirect("5.php", "crntdir=".getcwd()."&flash=1");
            }
            else {
                redirect("5.php", "crntdir=".getcwd()."&flash=2");
            }
        }
        else {
            $flashMsg = 'Empty dir name!';
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>TASK #5</title>
</head>
<body>
    <div class="warning"><p><?=$flashMsg?></p></div>
    <div class="container">
        <form method="post">
            <input type="text" name="dir" placeholder="Type here dir name to open..."/>
            <input type="text" name="filter" placeholder="Type here key to find..." autofocus/>
            <input type="submit" value="Submit"/>
        </form>
    </div>
    <!--Displaying current dir-name and file list-->
    <div class="info">
        <div class="half left">
            <hr>
            <b>Current directory:</b>
            <br>
            <?=getcwd()?>
            <hr>
            <?=getFilesList(getcwd(), null)?>
        </div>
        <div class="half right">
            <hr>
            <b>Filtered file list:</b>
            <br>
            <?=getcwd()?>
            <hr>
            <?=getFilesList(getcwd(), isset($_POST['filter']) ? $_POST['filter'] : null)?>
        </div>
    </div>
</body>
</html>