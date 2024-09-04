<?php
    $load = new Load();
    
    $parentDir = Load::getParentDir();
    
    $dataScan = $load->scanDir($parentDir);
?>
<table id="myTable">
    <thead>
        <tr>
            <th class="text-center"><input type="checkbox" id="checkAll" /></th>
            <th>Name</th>
            <th>Size</th>
            <th>Modified</th>
            <th>Perms</th>
            <th>Owner</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(!empty($dataScan)):
                foreach($dataScan as $item):
                    if($item !== '.DS_Store'):
                    $path = $load->getPath($item);
                    if($load->isType($path) == 'folder'){
                        $parentDir = str_replace(_DATA_DIR.'/', '', $path);
                    }else{
                        $parentDir = '';
                    }
        ?>
        <tr>
            <td class="text-center"><input type="checkbox" class="check-item" /></td>
            <td><a href="?path=<?php echo urlencode($parentDir); ?>"><?php echo $load->getTypeIcon($item) .' ' . $item; ?></a></td>
            <td><?php echo $load->getSize($item);?></td>
            <td><?php echo $load->getTimeModify($item); ?></td>
            <td><?php echo $load->getPermission($item); ?></td>
            <td class="text-center"><?php echo $load->getOwner($item); ?></td>
            <td>
                <?php if($load->isType($path) == 'file'): ?>
                    <a href="#" class="btn btn-primary btn-sm mx-1">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
                <a href="#" class="btn btn-primary btn-sm mx-1">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
                <a href="#" class="btn btn-primary btn-sm mx-1">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <a href="#" class="btn btn-primary btn-sm mx-1">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                </a>
                <a href="#" class="btn btn-primary btn-sm mx-1">
                    <i class="fa fa-link" aria-hidden="true"></i>
                </a>
                <?php if($load->isType($path) == 'file'): ?>
                    <a href="#" class="btn btn-primary btn-sm mx-1">
                        <i class="fa fa-upload" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php
                    endif; 
                endforeach;
            endif;
        ?>
    </tbody>
</table>