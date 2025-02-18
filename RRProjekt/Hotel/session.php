<?php 
    session_start();

    if(!isset($_SESSION['login'])){
        header("location: index.php");
        die();
    }
    $login_session = $_SESSION['login'];
