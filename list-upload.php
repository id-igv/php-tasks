<?php
    // getting filelist from task folder
    $tasks = scandir(PATHTO_TASKS);
    $tasks = array_slice($tasks, 2);
    
    // rming not-dir files
    foreach ($tasks as $key => $task) {
        if (is_dir(PATHTO_TASKS . '/' . $task) === false) {
            unset($tasks[$key]);
        }
    }
    sort($tasks, SORT_NUMERIC);
?>