<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        .$servername = "localhost";
        .$username = "root";
        .$password = "";
        .$dbname = "wycieczki";

        .// Tworzenie połączenia
        .$conn = new mysqli($servername, $username, $password, $dbname);

        .// Sprawdzanie połączenia
        .if ($conn->connect_error) {     .
    die("Błąd połączenia: " . $conn->connect_error);
        .}

        .$sql = "SELECT * FROM wycieczki";
        .$result = $conn->query($sql);

        .if ($result->num_rows > 0) {
        .while($row = $result->fetch_assoc()) {      .
    echo "ID: " . $row["id"] . " " . $row["zdjecia_id"] . " " . $row["cel"] . " " . $row["cena"] . " " . $row["dataWyjazdu"] ."<br>";
        .}
        .} else {
        .echo "Brak wyników";
        .}
        .echo "<br>";

        .$sql = "SELECT * FROM zdjecia";
        .$result = $conn->query($sql);

        .if ($result->num_rows > 0) {
        .while($row = $result->fetch_assoc()) {
            .echo "<table>";
            .echo "<tr><td>ID: " . $row["id"] . "</td> " . "<td>" . $row["nazwaPliku"] . "</td> " . "<td>" .  $row["podpis"] . "</td></tr>";
            .echo "</table>";
        .}

        .} else {
    echo "Brak wyników";
        .}

        .$conn->close();
?>
</body>
</html>