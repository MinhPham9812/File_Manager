<?php
    require_once 'config.php';
    require_once 'includes/function.php';
    require_once 'includes/Load.php';
    require_once 'includes/create.php';
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