<?php
include("../php/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uczen_id = $_POST['uczen'];
    $tresc = $_POST['tresc'];

    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO uwagi (id_uczen, tresc, data) VALUES ('$uczen_id', '$tresc', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Nowa uwaga została dodana pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: uwagi.php");
}
?>