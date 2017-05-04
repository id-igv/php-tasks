<?php
    /*
     TASK #5:
        Написать функцию, которая выводит список файлов в заданной директории. 
        Директория задается как параметр функции.
    */
    //**************************************************************************
    
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
    
    //getting current directory from previous script execution
    if (isset($_GET['crntdir'])) { chdir($_GET['crntdir']); }
    $flashMsg = isset($_GET['flash']) ? getFlashMsg($_GET['flash']) : null;
    
    if ((bool)$_POST) {
        if (isset($_POST['dir'])) {
            
            if (is_dir($_POST['dir'])) {
                chdir($_POST['dir']);
                redirect("4.php", "crntdir=".getcwd()."&flash=1");
            }
            else {
                redirect("4.php", "crntdir=".getcwd()."&flash=2");
            }
        }
        else {
            $flashMsg = 'Fill in field!';
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>TASK #4</title>
</head>
<body>
    <div class="warning"><p><?=$flashMsg?></p></div>
    <div class="container">
        <form method="post">
            <input type="text" name="dir" autofocus/>
            <input type="submit" value="Submit"/>
        </form>
    </div>
    <!--Displaying current dir-name and file list-->
    <div class="info"><b>Current directory:</b><br><?=getcwd()?></div>
    <div class="info"><?=getFilesList(getcwd())?></div>
</body>
</html>