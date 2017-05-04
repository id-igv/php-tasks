<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>TASKS</title>
</head>
<body>
    
    <!--CONTAINER-->
    <div class="container col-9">
        <!--CONTROL-->
        
        <div class="control left col-2">
            
            <!--TITLE-->
            <div class="title col-12">
                <b>TASKS</b>
            </div>
            <!--*****-->
            
            <!--TASK-LIST-->
            <div class="task-nav col-12">
                <ul>
                <?php 
                    require('list-upload.php');
                    foreach ($tasks as $task) :
                ?>
                    <li>
                        <a href="/?task_id=<?=$task?>">
                            Task #<?=$task?>
                        </a>
                    </li>
                <?php
                    endforeach;
                ?>
                </ul>
            </div>
            <!--*********-->
        </div>
        <!--*******-->
        
        <!--TASK-CONTAINER-->
        <div class="task-container left col-10">
            <!--TASK-MESSAGE-->
            <!--FROM-TASK-LIST-->
            <div class="task-text col-12">
                <?=isset($task_text) ? $task_text : null?>
            </div>
            <!--************-->
            
            <!--TASK-SOLUTION-->
            <!--REQUIRE-->
            <div class="task-solution col-12">
                <?=isset($form) ? $form : null?>
            </div>
            <!--*************-->
        </div>
        <!--**************-->
    </div>
    <!--*********-->
    
</body>
</html>