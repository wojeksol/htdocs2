<?php
include("../php/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uczen_id = $_POST['uczen'];
    $przedmiot_id = $_POST['przedmiot'];
    $kategoria_id = $_POST['kategoria'];
    $ocena = $_POST['ocena'];

    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO ocena (ocena, id_nauczyciel, id_przedmiot, id_kategoria_ocen, id_uczen) 
            VALUES ('$ocena', (SELECT id FROM nauczyciel WHERE id = (SELECT id_nauczyciel FROM admin WHERE login = '$login_session')), '$przedmiot_id', '$kategoria_id', '$uczen_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Nowa ocena została dodana pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: oceny.php");
}
?>