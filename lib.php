<?php
    function requestPost($key) {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
    
    function requestGet($key) {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    
    function requestCookie($key) {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }
    
    function rmCookie($cookie_name) {
        setcookie($cookie_name, "", time()-1);
    }
    
    function out($variable) {
        echo '<hr>';
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
        echo '<hr>';
    }
    
    function getTaskText($number, $pathto_file) {
        $tasks = file_get_contents($pathto_file);
        $tasks = explode('[END_OF_TASK]', $tasks);
        return $tasks[$number];
    }
?>