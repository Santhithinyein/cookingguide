<?php
    session_start();
    $method = $_GET['method'];
    unset($_SESSION['auth']);
    if ($method == 'ajax') {
        header("location: index_data.php");
        exit();
    }
    header("location: index.php");
?>