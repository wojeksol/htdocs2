<?php
include("../php/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uczen_id = $_POST['uczen'];
    $data = $_POST['data'];
    $godzina = $_POST['godzina'];
    $typ = $_POST['typ'];

    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO frekwencja (Data, Godzina_lekcyjna, typ, id_uczen) 
            VALUES ('$data', '$godzina', '$typ', '$uczen_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Nowa frekwencja została dodana pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: frekwencja.php");
}
?>