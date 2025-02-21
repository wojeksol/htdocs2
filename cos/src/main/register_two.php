<?php
    require "connect.php";
    $conn = new connect("portal");
    session_start();
    if (!empty($_POST['brith_year']) && !empty($_POST['hobby']) && !empty($_POST['foto'])){
        $conn->query("SELECT * FROM dane")->num_rows == $conn->query("SELECT * FROM uzytkownicy")->num_rows ? $valid = true : $valid = false;

//       echo $valid;

        if ($valid){
            $login = $_SESSION['login'];
            $pass = Sha1($_SESSION['pass']);
            $brith_year = $_POST['brith_year'];
            $hobby = $_POST['hobby'];
            $foto = $_POST['foto'];
            $conn->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$pass');");
            $conn->query("INSERT INTO dane VALUES (NULL, $brith_year, 20, '$hobby', '$foto');");
            $_SESSION['error'] = "Zarejestrowano";
            header('location: index.php');

        }else{
            echo "cos";
        }


    }