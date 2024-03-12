<?php 

$sql = new mysqli('localhost', 'root', '', 'ankieta');

if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}

 if(isset($_POST['18']) && isset($_POST['plec']) && isset($_POST['fiz']) && isset($_POST['zaw']) && isset($_POST['spo']) && isset($_POST['hobby']) && isset($_POST['got']) && isset($_POST['komp']) && isset($_POST['zwierz']) && isset($_POST['rodz'])) {


    $on = $_POST['18'];
    $plec = $_POST['plec'];
    $fiz = $_POST['fiz'];
    $zaw = $_POST['zaw'];
    $spo = $_POST['spo'];
    $hobby = $_POST['hobby'];
    $got = $_POST['got'];
    $komp = $_POST['komp'];
    $zwierz = $_POST['zwierz'];
    $rodz = $_POST['rodz'];

    $sql -> query("INSERT INTO `pytania` VALUES (NULL, '$on', '$plec', '$fiz', '$zaw', '$spo', '$hobby', '$got', '$komp', '$zwierz', '$rodz')");

    echo "Dziękujemy za wypełnienie ankiety!<br>Twoje odpowiedzi zostały zapisane w bazie danych.<br><br>Wyniki ankiety:<br>";

    // Count participants with specific answer

    $questionAnswer = $_POST['18'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 1` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 1<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['plec'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 2` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 2<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['fiz'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 3` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 3<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['zaw'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 4` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 4<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['spo'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 5` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 5<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    // Count participants with specific answer
    $questionAnswer = $_POST['hobby'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 6` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 6<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['got'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 7` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 7<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['komp'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 8` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 8<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['zwierz'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 9` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 9<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }

    $questionAnswer = $_POST['rodz'];
    $query = "SELECT COUNT(*) AS count FROM pytania WHERE `Pytanie 9` = '$questionAnswer'";
    $result = $sql->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['count'];
        echo "Liczba uczestników, którzy udzielili odpowiedzi '$questionAnswer': $count na pytanie 10<br>";
    } else {
        echo "Błąd w zapytaniu: " . $sql->error;
    }
 
 }
$sql->close();

?>