<?php 
    ob_start();
    require_once "init.php";
    unset($_SESSION['userid']);
    header('location: index.php');
    ob_end_flush();
?>



