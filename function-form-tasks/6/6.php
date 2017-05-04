<?php
    /*
     TASK #6:
        Создать страницу, на которой можно загрузить несколько фотографий 
        в галерею. Все загруженные фото должны помещаться в папку gallery и 
        выводиться на странице в виде таблицы.
    */
    //**************************************************************************
    
    error_reporting(E_ALL);
    
    function getFlashMsg($id = null) {
        if ($id != null) {
            switch ($id) {
                case '0':
                    return array('class' => 'warning', 'msg_text' => 'Upload failed');
                case '1':
                    return array('class' => 'notice', 'msg_text' => 'Uploaded successfully!');
                case '2':
                    return array('class' => 'warning', 'msg_text' => 'File with that name exists already');
                case '3':
                    return array('class' => 'warning', 'msg_text' => 'File is to large');
                case '4':
                    return array('class' => 'warning', 'msg_text' => 'Wrong file type');
                case '5':
                    return array('class' => 'warning', 'msg_text' => 'No chosen file - nothing to upload');
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
    $gallery_dir = './function-form-tasks/6/gallery'; // path to gallery with images
    $imgs = null; // array with path to images
    
    $files = scandir($gallery_dir, SCANDIR_SORT_ASCENDING);
    
    if (sizeof($files) > 2) {
        $img_path = null; // path to image
        
        // form $imgs array
        foreach ($files as $file) {
            $img_path = $gallery_dir . '/' . $file;
            if ($file != '.' && $file != '..' && is_file($img_path)) {
                $imgs[] = $img_path;
            }
        }
    }
?>

<div class="<?=$flashMsg['class']?>">
    <p><?=$flashMsg['msg_text']?></p>
</div>

<form class="col-4 center" method="post" action="./function-form-tasks/6/upload.php" enctype="multipart/form-data">
    <input class="col-12" type="file" name="uploadedFile" value="value"/>
    <input class="col-12" type="submit" value="Click to upload file" name="submit"/>
</form>

<div class="img-container col-12">
    <!--Displaying pictures-->
    <?php
        if ($imgs != null) :
            foreach ($imgs as $img_path) :
    ?>
        <img src="<?=$img_path?>"></img>
    <?php
            endforeach;
        endif;
    ?>
    <!--|FUNNY**PIC**ENDED|-->
</div>