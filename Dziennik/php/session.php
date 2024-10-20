<?php 
    session_start();

    if(!isset($_SESSION['login'])){
        header("location: ../html/login.php");
        die();
    }
    $login_session = $_SESSION['login'];
?>