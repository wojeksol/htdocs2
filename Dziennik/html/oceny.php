<?php
include("../php/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300; url='../php/logout.php'">
    <title>Oceny</title>
    <link rel="stylesheet" href="../css/style1.css">
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




        <?php
        function like($str, $searchTerm) {
            $searchTerm = strtolower($searchTerm);
            $str = strtolower($str);
            $pos = strpos($str, $searchTerm);
            if ($pos === false)
                return false;
            else
                return true;
        }
        $found = like($login_session, 'n'); //sprawdza czy login zawiera 'n'

        $conn = new mysqli('localhost', 'root', '', 'dziennik');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $kw1 = "SELECT o.ocena, p.nazwa as pnazwa, ko.nazwa as konazwa, n.imie as ni, n.nazwisko as nn, o.id_uczen, u.imie, u.nazwisko, a.login 
                FROM nauczyciel n 
                JOIN ocena o ON n.id=o.id_nauczyciel 
                JOIN przedmiot p ON o.id_przedmiot=p.id 
                JOIN kategorie_ocen ko ON o.id_kategoria_ocen=ko.id 
                JOIN uczen u ON o.id_uczen=u.id 
                JOIN admin a ON u.id=a.id_uczen 
                WHERE a.login='$login_session';";

        $result = mysqli_query($conn, $kw1);

        if (mysqli_num_rows($result) > 0) {
            $grades = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $grades[$row['pnazwa']][] = ['ocena' => $row['ocena'], 'konazwa' => $row['konazwa'], 'nimie' => $row['ni'], 'nnazwisko' => $row['nn']];

            }

            echo "<table><thead><tr><td>Przedmiot</td><td>Oceny</td></tr></thead><tbody>";

            foreach ($grades as $subject => $subject_grades) {
                echo "<tr><td>" . $subject . "</td><td>";
                foreach ($subject_grades as $grade) {
                    echo "<span class='gr'><a title='Kategoria: " . $grade['konazwa'] . "\n" . "Nauczyciel: " . $grade['nimie'] . " " . $grade['nnazwisko'] . "'>" . $grade['ocena'] . " </a></span>";
                }
                echo "</td></tr>";
            }
            echo "</tbody></table>";
        } else if($found){
            echo "
            <button onclick=AddGrade()>Dodaj Ocene</button>
            <button onclick=DeleteGrade()>Usuń ocene</button>
            <button onclick=EditGrade()>Edytuj ocene</button>
            <nav class='p' id='p'></nav>
            ";
        }
        else {
            echo "Brak ocen";
        }
        ?>



    </main>


</body>

</html>

<script>

function AddGrade() {
    document.getElementById('p').innerHTML = "<form method='post'>" +
    "<select id='Grade' name='Grade'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option></select>" +
    "<select id='kategoria' name='kat'><option value='Odpowiedź ustna'>Odpowiedź ustna</option><option value='Zadanie domowe'>Zadanie domowe</option><option value='Zadanie praktyczne'>Zadanie praktyczne</option><option value='Praca na lekcji'>Praca na lekcji</option><option value='Kartkówka'>Kartkówka</option><option value='Sprawdzian'>Sprawdzian</option><option value='Egzamin'>Egzamin</option><option value='Projekt'>Projekt</option></select>" +
    "<select id='subject' name='subject'><option value='język polski'>język polski</option><option value='język angielski'>język angielski</option><option value='język niemiecki'>język niemiecki</option><option value='wiedza o kulturze'>wiedza o kulturze</option><option value='historia'>historia</option><option value='wiedza o społeczeństwie'>wiedza o społeczeństwie</option><option value='podstawy przedsiębiorczości'>podstawy przedsiębiorczości</option><option value='geografia'>geografia</option><option value='biologia'>biologia</option><option value='chemia'>chemia</option><option value='fizyka'>fizyka</option><option value='matematyka'>matematyka</option><option value='informatyka'>informatyka</option><option value='wychowanie fizyczne'>wychowanie fizyczne</option><option value='edukacja dla bezpieczeństwa'>edukacja dla bezpieczeństwa</option></select>" +
    "<input type='text' name='imie' placeholder='imie ucznia'>" +
    "<input type='text' name='nazwisko' placeholder='nazwisko ucznia'>" +
    "<input type='submit' value='Dodaj'></form>";
}
</script>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grade = $_POST['Grade'];
    $category = $_POST['kat'];
    $subject = $_POST['subject'];
    $name = $_POST['imie'];
    $secondname = $_POST['nazwisko'];

    $conn = new mysqli('localhost', 'root', '', 'dziennik');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $kw1 = "SELECT n.id FROM nauczyciel n JOIN admin a ON n.id=a.id_nauczyciel WHERE a.login='$login_session';";

    $result1 = mysqli_query($conn ,$kw1);

    while ($row1 = mysqli_fetch_array($result1)) {
        $id_nauczyciel = $row1['id'];
    }

    $kw2 = "SELECT id FROM przedmiot WHERE nazwa='$subject';";

    $result2 = mysqli_query($conn ,$kw2);

    while ($row2 = mysqli_fetch_array($result2)) {
        $id_przedmiot = $row2["id"];
    }

    $kw3 = "SELECT id FROM kategorie_ocen WHERE nazwa='$category';";

    $result3 = mysqli_query($conn ,$kw3);

    while ($row3 = mysqli_fetch_array($result3)) {
        $id_kategoria_ocen = $row3["id"];
    }

    $kw4 = "SELECT id FROM uczen WHERE nazwisko='$secondname' AND imie='$name';";

    $result4 = mysqli_query($conn ,$kw4);

    while ($row4 = mysqli_fetch_array($result4)) {
        $id_uczen = $row4["id"];
    }

    

    $sql = "INSERT INTO ocena (ocena, id_nauczyciel, id_przedmiot, id_kategoria_ocen, id_uczen) VALUES ('$grade', '$id_nauczyciel', '$id_przedmiot', '$id_kategoria_ocen', '$id_uczen')";

    if ($conn->query($sql) === TRUE) {
        echo "Ocena została dodana pomyślnie";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>