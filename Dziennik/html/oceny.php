<?php
include("../php/session.php");

function getGrades($conn, $login_session) {
    $sql = "SELECT o.ocena, p.nazwa as pnazwa, ko.nazwa as konazwa, n.imie as ni, n.nazwisko as nn, u.imie, u.nazwisko 
            FROM ocena o 
            JOIN przedmiot p ON o.id_przedmiot = p.id 
            JOIN kategorie_ocen ko ON o.id_kategoria_ocen = ko.id 
            JOIN nauczyciel n ON o.id_nauczyciel = n.id 
            JOIN uczen u ON o.id_uczen = u.id 
            JOIN admin a ON u.id = a.id_uczen 
            WHERE a.login = '$login_session'";
    return $conn->query($sql);
}

function displayGrades($result) {
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Przedmiot</th><th>Ocena</th><th>Kategoria</th><th>Nauczyciel</th><th>Uczeń</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["pnazwa"]. "</td><td>" . $row["ocena"]. "</td><td>" . $row["konazwa"]. "</td><td>" . $row["ni"] . " " . $row["nn"] . "</td><td>" . $row["imie"] . " " . $row["nazwisko"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Brak ocen";
    }
}

function displayGradeForm() {
    echo '<h2>Dodaj nową ocenę</h2>
          <form method="post" action="dodaj_ocene.php">
              <label for="uczen">Uczeń:</label>
              <select id="uczen" name="uczen">';
    
    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, imie, nazwisko FROM uczen";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["imie"] . " " . $row["nazwisko"] . "</option>";
    }
    $conn->close();

    echo '</select><br>
          <label for="przedmiot">Przedmiot:</label><br>
          <select id="przedmiot" name="przedmiot">';
    
    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, nazwa FROM przedmiot";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["nazwa"] . "</option>";
    }
    $conn->close();

    echo '</select><br>
          <label for="kategoria">Kategoria:</label><br>
          <select id="kategoria" name="kategoria">';
    
    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, nazwa FROM kategorie_ocen";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["nazwa"] . "</option>";
    }
    $conn->close();

    echo '</select><br>
          <label for="ocena">Ocena:</label><br>
          <select name="ocena" id="ocena" >
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          </select><br>
          <input type="submit" value="Dodaj">
          </form>';
}

function connectToDatabase() {
    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function like($str, $searchTerm) {
    $searchTerm = strtolower($searchTerm);
    $str = strtolower($str);
    $pos = strpos($str, $searchTerm);
    if ($pos === false)
        return false;
    else
        return true;
}


$conn = connectToDatabase();
$result = getGrades($conn, $login_session);
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300; url='../php/logout.php'">
    <title>Oceny</title>
    <link rel="stylesheet" href="../css/style4.css">
</head>
<body>
    <header>
        <nav class="h-left">
            <img src="../img/logo.png" alt="logo">
        </nav>
        <nav class="h-up">
            <a href="../php/logout.php">Wyloguj</a>
        </nav>
        <nav class="h-right">
            <a href="main.php"><img src="../img/home.jpg" alt=""></a>
            <a href="oceny.php"><img src="../img/oceny.jpg" alt=""></a>
            <a href="frekwencja.php"><img src="../img/frek.jpg" alt=""></a>
            <a href="uwagi.php"><img src="../img/uwagi.jpg" alt=""></a>
            <a href="wiadomosci.php"><img src="../img/wiad.jpg" alt=""></a>
        </nav>
    </header>
    <main>
        <h1>Oceny</h1>
        <?php if(like($login_session, 'u')){displayGrades($result);} ?>
        <?php if(like($login_session, 'n')){displayGradeForm();} ?>
    </main>
</body>
</html>

<?php
$conn->close();
?>