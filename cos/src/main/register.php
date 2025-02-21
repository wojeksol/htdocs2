<?php
    require "connect.php";
    $conn = new connect("portal");
    session_start();
    if (!empty($_POST['login2']) && !empty($_POST['pass2']) && !empty($_POST['pass3'])) {
        $login = $_POST['login2'];
        $result = $conn->query("SELECT login FROM uzytkownicy WHERE login = '$login';");
        $_POST['pass2'] === $_POST['pass3'] ? $validPass = true : $validPass = false;
        $result->num_rows == 0 ? $validLogin = true : $validLogin = false;
        if ($validPass && $validLogin) {
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $_POST['pass2'];
            header('location: register_form.php');
        }else if ($validLogin){
            $_SESSION['error'] = "Hasła się nie zgadzają";
            header('location: index.php');
        }else{
            $_SESSION['error'] = "Taki login już istnieje";
            header('location: index.php');
        }

    }



