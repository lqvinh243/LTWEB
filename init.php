<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once 'function.php';
    $url_sever = $_SERVER['REQUEST_URI'];
    $arr_url = explode('/',$url_sever);
    $str_url = explode('.',$arr_url[2]);
    $page= $str_url[0];
    
    $user = null;
    try{
        $db = new PDO('mysql:host=localhost;dbname=qluser','root','');
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    

    if(isset($_SESSION["userid"]))
    {
        $user = FindUserbyId($_SESSION["userid"]);
    }
 ?>
 