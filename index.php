<?php
#----------------------------------INDEX.PHP-----------------------------------#
    error_reporting(E_ALL);
    require('lib.php');
    
    // constants
    define('PATHTO_TASKS', realpath('function-form-tasks'));
    define('PATHTO_STYLE', 'style.css');
    
    if ((bool)$_GET) {
        if (isset($_GET['task_id'])) {
            // $task_dir = './' . PATHTO_TASKS . '/' . $_GET['task_id'];
            
            $task_text = getTaskText($_GET['task_id']-1, PATHTO_TASKS . DIRECTORY_SEPARATOR . 'tasks.txt');
            
            ob_start();
                require(PATHTO_TASKS . '/' . $_GET['task_id']
                        . '/' . $_GET['task_id'] . '.php');
            $form = ob_get_clean();
        }
    }
    
    require('layout.php');
?>