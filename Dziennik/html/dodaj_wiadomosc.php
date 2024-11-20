<?php
include("../php/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nauczyciel_id = $_POST['nauczyciel'];
    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];

    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO wiadomosci 
            VALUES (NULL, '$tytul', '$tresc', NOW(), '$nauczyciel_id', (SELECT id_uczen FROM admin WHERE login = '$login_session'))";

    if ($conn->query($sql) === TRUE) {
        echo "Nowa wiadomość została dodana pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: wiadomosci.php");
}
?>