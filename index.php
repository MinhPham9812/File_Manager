<?php
    require_once 'blocks/header.php';

    if (isset($_GET['module'])) {
        $module = $_GET['module'];
    } else {
        $module = 'home';
    }

    $path = 'modules/' . $module . '.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        require_once 'modules/404.php';
    }
    require_once 'blocks/footer.php';
?>