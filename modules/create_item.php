<?php
    $type = filter_input(INPUT_POST, 'item_type', FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'item_name', FILTER_SANITIZE_SPECIAL_CHARS);

    $msg = null;

    if($type=='file'){
        if(!empty($name)){
            $pattern = '~^[\w\s]+\.[a-z]+$~';
            if(preg_match($pattern, $name)){
                $parentDir = Load::getParentDir();

                Create::createFile($parentDir, $name);

                redirect('?path=' . $parentDir);
            }
            else{
                $msg = 'Invalid file name';
            }
        }else{
            $msg = 'Please enter file name';
        }
    }else if($type=='folder'){
        if(!empty($name)){
            $pattern = '~^[\w\s]+$~';
            if(preg_match($pattern, $name)){
                $parentDir = Load::getParentDir();
                Create::createFolder($parentDir, $name);
                redirect('?path=' . $parentDir);
            }else{
                $msg = 'Invalid folder name';
            }
        }else{
            $msg = 'Please enter folder name';
        }
    }

    if(!empty($msg)){
        ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo $msg; ?>
        </div>
        <?php
    }
