<?php
include("../php/session.php");

function getMessages($conn, $login_session) {
    $sql = "SELECT w.tytul, w.tresc, w.data, n.imie, n.nazwisko 
            FROM wiadomosci w 
            JOIN uczen u ON w.id_uczen=u.id 
            JOIN admin a ON w.id_uczen = a.id_uczen
            JOIN nauczyciel n ON w.id_nauczyciel = n.id
            WHERE a.login = '$login_session';";
    return $conn->query($sql);
}

function getMessages2($conn, $login_session) {
    $sql = "SELECT w.tytul, w.tresc, w.data, u.imie, u.nazwisko 
            FROM wiadomosci w 
            JOIN nauczyciel n ON w.id_nauczyciel = n.id 
            JOIN admin a ON w.id_nauczyciel = a.id_nauczyciel
            JOIN uczen u ON w.id_uczen=u.id
            WHERE a.login = '$login_session';";
    return $conn->query($sql);
}

function displayMessages($result) {
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Tytuł</th><th>Treść</th><th>Data</th><th>Uczeń</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["tytul"]. "</td><td>" . $row["tresc"]. "</td><td>" . $row["data"]. "</td><td>" . $row["imie"] . " " . $row["nazwisko"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Brak wiadomości";
    }
}

function displayMessages2($result) {
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Tytuł</th><th>Treść</th><th>Data</th><th>Nauczyciel</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["tytul"]. "</td><td>" . $row["tresc"]. "</td><td>" . $row["data"]. "</td><td>" . $row["imie"] . " " . $row["nazwisko"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Brak wiadomości";
    }
}

function displayMessageForm() {
    echo '<h2>Dodaj nową wiadomość</h2>
          <form method="post" action="dodaj_wiadomosc.php">
              <label for="nauczyciel">Nauczyciel:</label>
              <select id="nauczyciel" name="nauczyciel">';
    
    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, imie, nazwisko FROM nauczyciel";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["imie"] . " " . $row["nazwisko"] . "</option>";
    }
    $conn->close();

    echo '</select><br>
          <label for="tytul">Tytuł:</label><br>
          <input type="text" id="tytul" name="tytul" required><br>
          <label for="tresc">Treść:</label><br>
          <textarea id="tresc" name="tresc" rows="4" cols="50" required></textarea><br>
          <input type="submit" value="Dodaj">
          </form>';
}


function displayMessageForm2() {
    echo '<h2>Dodaj nową wiadomość</h2>
          <form method="post" action="dodaj_wiadomosc2.php">
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
          <label for="tytul">Tytuł:</label><br>
          <input type="text" id="tytul" name="tytul" required><br>
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
$result = getMessages2($conn, $login_session);
$result2 = getMessages($conn, $login_session);
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300; url='../php/logout.php'">
    <title>Wiadomości</title>
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
        <h1>Wiadomości</h1>
        <?php if(like($login_session, 'n')){displayMessages($result);} ?>
        <?php if(like($login_session, 'u')){displayMessages2($result2);} ?>
        <?php if(like($login_session, 'u')){displayMessageForm();} ?>
        <?php if(like($login_session, 'n')){displayMessageForm2();} ?>
    </main>
</body>
</html>

<?php
$conn->close();
?>