<?php
$conn = new mysqli('localhost', 'root', '', 'kupauto');
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodow</h1>
    </header>

    <main>
        <section class="main-one">
            <?php
            $kw1 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id=10;";
            $result = mysqli_query($conn, $kw1);
            while ($row = mysqli_fetch_array($result)) {
                echo "
                            <img src=" . $row['zdjecie'] . " class='img' alt='oferta dnia'>
                            <h4>Oferta Dnia: Toyota" . $row['model'] . "</h4>
                            <p>Rocznik: " . $row['rocznik'] . " przebieg: " . $row['przebieg'] . " rodzaj plaiwa: " . $row['paliwo'] . "</p>
                            <h4>Cena: " . $row['cena'] . "</h4>
                    
                        ";
            }


            ?>
        </section>
        <section class="main-two">
            <h2>Oferty Wyróżnione</h2>
            <?php
            $kw2 = "SELECT m.nazwa, s.model, s.rocznik, s.cena, s.zdjecie FROM marki m JOIN samochody s ON m.id=s.marki_id LIMIT 4;";
            $result = mysqli_query($conn, $kw2);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='block'>
                                <img src=" . $row['zdjecie'] . " alt=" . $row['model'] . ">
                                <h4>" . $row['nazwa'] . " " . $row['model'] . "</h4>
                                <p>Rocznik: " . $row['rocznik'] . "</p>
                                <h4>Cena: " . $row['cena'] . "</h4>
                        </div>";
            }
            ?>
        </section>
        <section class="main-three">
            <h2>Wybierz markę</h2>
            <form method="post">
                <select name="select">
                    <?php
                    $kw3 = "SELECT nazwa FROM marki";
                    $result = mysqli_query($conn, $kw3);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="submit" value="Wyszukaj">
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $select = $_POST["select"];
                //echo $select;
                $kw4 = "SELECT model, cena, zdjecie, nazwa FROM samochody JOIN marki ON marki.id=samochody.marki_id WHERE nazwa ='$select'";
                $result = mysqli_query($conn, $kw4);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='block'>
                                <img src=" . $row[2] . " alt=" . $row[0] . ">
                                <h4>" . $row[3] . " " . $row[0] . "</h4>
                                <h4>Cena: " . $row[1] . "</h4>
                        </div>
                        ";
                }
                mysqli_close($conn);
            }

            ?>

        </section>
    </main>

    <footer>
        <section class="f-one">
            <p>Stronę wykonał Wojciech Sołdekci</p>
        </section>
        <section class="f-two"><a href="http://firmy.pl/komis">Znajdź nas także</a></section>
    </footer>

</body>

</html>