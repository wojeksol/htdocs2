<?php
require "connect.php";
$conn = new connect("portal");
session_start();

if (!empty($_POST['login']) && !empty($_POST['pass'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $query = $conn->query("SELECT * FROM uzytkownicy WHERE login = '$login'");
    $count = $query->num_rows;
    $row = $query->fetch_assoc();
    $count === 1 ? $validLogin = true : $validLogin = false;
    Sha1($pass) == $row['pass'] ? $validPass = true : $validPass = false;
    if($validLogin && $validPass){
        $_SESSION['login'] = $login;
        header('Location: main.php');
    }
    else if (!$validLogin){
        $_SESSION['error'] = "Nieprawidłowy login";
        header('Location: index.php');
    }
    else if (!$validPass){
        $_SESSION['error'] = "Nieprawidłowe hasło";
        header('Location: index.php');
    }
}
