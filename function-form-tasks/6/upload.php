<?php
    /*
     TASK #6:
        Создать страницу, на которой можно загрузить несколько фотографий 
        в галерею. Все загруженные фото должны помещаться в папку gallery и 
        выводиться на странице в виде таблицы.
    */
    //**************************************************************************
    error_reporting(E_ALL);
    define('UPLOAD_FOLDER', './gallery/');
    
    function redirect($to, $params = null) {
        if ($params != null) {
            header("Location: {$to}?{$params}");
            die;
        }
        else {
            header("Location: {$to}");
            die;
        }
    }
    
    function timeOffset($offset) {
        return time() + $offset;
    }
    
    //**************************************************************************
    // echo '<pre>';
    // var_dump($_FILES);
    // echo '<hr>';
    // print_r($_FILES);
    // echo '<hr>';
    // echo getcwd();
    // echo '<hr>';
    // echo pathinfo($_FILES['uploadedFile']['tmp_name'], PATHINFO_EXTENSION);
    // echo '</pre>';
    //**************************************************************************
    
    if ((bool)$_FILES) {
        $upload_file_to = UPLOAD_FOLDER . basename($_FILES['uploadedFile']['name']);
        $file_ext = $_FILES['uploadedFile']['type'];
        
        if (isset($_POST['submit'])) {
            //
            if (file_exists($upload_file_to)) {
                setcookie('msg_id', '2', timeOffset(3600*24), '/');
                redirect('/', 'task_id=6');
            }
            //
            else if ($_FILES['uploadedFile']['size'] > 10000000) {
                setcookie('msg_id', '3', timeOffset(3600*24), '/');
                redirect('/', 'task_id=6');
            }
            //
            else if ($file_ext != 'image/jpg' && $file_ext != 'image/png' && 
                     $file_ext != 'image/jpeg' && $file_ext != 'image/gif' && 
                     $file_ext != 'image/bmp') {
                setcookie('msg_id', '4', timeOffset(3600*24), '/');
                redirect('/', 'task_id=6');
            }
            //
            else {
                $is_uploaded = move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $upload_file_to);
                if ($is_uploaded) {
                    setcookie('msg_id', '1', timeOffset(3600*24), '/');
                }
                else {
                    setcookie('msg_id', '0', timeOffset(3600*24), '/');
                }
                redirect('/', 'task_id=6');
            }
        }
    }
    else {
        setcookie('msg_id', '5', timeOffset(3600*24), '/');
        redirect('/', 'task_id=6');
    }
?>