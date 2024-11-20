<?php
include("../php/session.php");

function getRemarks($conn, $login_session) {
    $sql = "SELECT u.imie, u.nazwisko, uw.tresc, uw.data 
            FROM uwagi uw 
            JOIN uczen u ON uw.id_uczen = u.id 
            JOIN admin a ON u.id = a.id_uczen 
            WHERE a.login = '$login_session'";
    return $conn->query($sql);
}

function displayRemarks($result) {
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Imię</th><th>Nazwisko</th><th>Treść</th><th>Data</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["imie"]. "</td><td>" . $row["nazwisko"]. "</td><td>" . $row["tresc"]. "</td><td>" . $row["data"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Brak uwag";
    }
}

function displayRemarkForm() {
    echo '<h2>Dodaj nową uwagę</h2>
          <form method="post" action="dodaj_uwage.php">
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
          <label for="tresc">Treść:</label><br>
          <textarea id="tresc" name="tresc" rows="4" cols="50" required></textarea><br>
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
$result = getRemarks($conn, $login_session);
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300; url='../php/logout.php'">
    <title>Uwagi</title>
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
        <h1>Uwagi</h1>
        <?php displayRemarks($result); ?>
        <?php if(like($login_session, 'n')){displayRemarkForm();} ?>
    </main>
</body>
</html>

<?php
$conn->close();
?>