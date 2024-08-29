<?php
    $load = new Load();
    $dataScan = $load->scanDir();
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
                foreach($dataScan as $itme):
                    $path = $load->getPath($itme);
        ?>
        <tr>
            <td class="text-center"><input type="checkbox" class="check-item" /></td>
            <td><a href="?path=<?php echo $path; ?>"><?php echo $load->getTypeIcon($itme) .' ' . $itme; ?></a></td>
            <td><?php echo $load->getSize($itme);?></td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
        </tr>
        <?php
                endforeach;
            endif;
        ?>
    </tbody>
</table>