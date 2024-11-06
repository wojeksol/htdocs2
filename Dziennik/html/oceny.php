<?php 
    include("../php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="oceny.html"><img src="../img/oceny.jpg" alt=""></a>
            <a href="frekwencja.html"><img src="../img/frek.jpg" alt=""></a>
            <a href="uwagi.html"><img src="../img/uwagi.jpg" alt=""></a>
            <a href="wiadomosci.html"><img src="../img/wiad.jpg" alt=""></a>
        </nav>

    </header>


    <main>

    
    
        
        <?php 
            $conn = new mysqli('localhost', 'root', '', 'dziennik');

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
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
                echo "<span><a title='Kategoria: " . $grade['konazwa'] . "\n" . "Nauczyciel: " . $grade['nimie'] . " " . $grade['nnazwisko'] . "'>" . $grade['ocena'] . " </a></span>";
                    }
                    echo "</td></tr>";
                }
            echo "</tbody></table>";
        } else {
            echo "0 results";
        }

                ?>

    

    </main>

    
</body>
</html>