<?php
include("../php/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uczen_id = $_POST['uczen'];
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];

    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO wiadomosci 
            VALUES (NULL, '$tytul', '$tresc', NOW(), (SELECT id_nauczyciel FROM admin WHERE login = '$login_session') , '$uczen_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Nowa wiadomość została dodana pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: wiadomosci.php");
}
?>