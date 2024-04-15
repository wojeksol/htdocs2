<?php 
    $sql = new mysqli('localhost', 'root', '', 'formularz');

    if(isset($_POST['submit'])){
    
        $firstn = $_POST['firstn'];
        $lastn = $_POST['lastn'];
        $wiek = $_POST['wiek'];
        $plec = $_POST['plec'];
        $tele = $_POST['tele'];
        $adres = $_POST['adres'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $kw = "INSERT INTO dane VALUES (NULL, '$firstn', '$lastn', '$wiek', '$plec', '$tele', '$adres', '$email', '$pass')";

        mysqli_query($sql, $kw);
    }
    

    mysqli_close($sql);
?>