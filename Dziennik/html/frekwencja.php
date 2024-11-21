<?php
include("../php/session.php");

function getAttendance($conn, $login_session) {
    $sql = "SELECT f.Data, f.Godzina_lekcyjna, f.typ, u.imie, u.nazwisko 
            FROM frekwencja f 
            JOIN uczen u ON f.id_uczen = u.id 
            JOIN admin a ON u.id = a.id_uczen 
            WHERE a.login = '$login_session'";
    return $conn->query($sql);
}

function displayAttendance($result) {
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Data</th><th>Godzina Lekcyjna</th><th>Typ</th><th>Imię</th><th>Nazwisko</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Data"]. "</td><td>" . $row["Godzina_lekcyjna"]. "</td><td>" . $row["typ"]. "</td><td>" . $row["imie"] . "</td><td>" . $row["nazwisko"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Brak nieobescości";
    }
}

function displayAttendanceForm() {
    echo '<h2>Dodaj nową frekwencję</h2>
          <form method="post" action="dodaj_frekwencje.php">
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
          <label for="data">Data:</label><br>
          <input type="date" id="data" name="data" required><br>
          <label for="godzina">Godzina Lekcyjna:</label><br>
          <select id="godzina" name="godzina" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select><br>
          <label for="typ">Typ:</label><br>
          <select id="typ" name="typ" required>
              <option value="nieobecnosc">Nieobecność</option>
              <option value="spoznienie">Spóźnienie</option>
              <option value="usprawiedliwione">Usprawiedliwione</option>
              <option value="zwolnienie">Zwolnienie</option>
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
$result = getAttendance($conn, $login_session);
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300; url='../php/logout.php'">
    <title>Frekwencja</title>
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
        
        <?php if(like($login_session, 'u')){
            echo "<h1>Frekwencja</h1>";
            displayAttendance($result);} ?>
        <?php if(like($login_session, 'n')){displayAttendanceForm();} ?>
    </main>
</body>
</html>

<?php
$conn->close();
?>