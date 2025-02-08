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
            <hr>
            <details class="main-three">
                <summary>Formularz</summary>
                <div class="form-one">

                <h3>Wybierz markę</h3>
                <form method="post">
                    <select name="select_one">
                        <?php
                        $kw3 = "SELECT nazwa FROM marki";
                        $result = mysqli_query($conn, $kw3);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value=" . $row['nazwa'] . ">" . $row['nazwa'] . "</option>";
                        }
                        ?>
                    </select> <br><br>

                    <input type="submit" value="Zatwierdź" name="input_submit_form_one"><br><hr><br>



                </form></div>
                
                <details><br>
                    <summary>Formularz do dodawnia nowego samochodu</summary><br>
                    <div class="from-two">
                <form method="post" action="script.php">

                <h3>Wybierz markę</h3>

                <select name="select_marka">
                        <?php
                        $kw3 = "SELECT nazwa FROM marki";
                        $result = mysqli_query($conn, $kw3);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value=" . $row['nazwa'] . ">" . $row['nazwa'] . "</option>";
                        }
                        ?>
                    </select>

                    <h3>Wpisz model</h3>

                    <input type="text" name="input_model" placeholder="nazwa modelu"> <br>

                    <h3>Wpisz rocznik</h3><br>
                    <input type="number" name="input_rocznik" placeholder="rocznik"> <br>
                    <h3>Wpisz prrzbieg w km</h3><br>
                    <input type="text" name="input_przebieg" placeholder="przbieg w km"> <br>
                    <h3>Wybierz rodzaj paliwa</h3><br>
                    <select name="select_paliwo">
                        <?php
                        $kw5 = "SELECT DISTINCT paliwo FROM samochody; ";
                        $result = mysqli_query($conn, $kw5);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value=" . $row['paliwo'] . ">" . $row['paliwo'] . "</option>";
                        }
                        ?>
                    </select><br>
                    <h3>Wybierz zdjecie</h3><br>
                    <select name="select_zdjecie">
                        <?php
                        $kw6 = "SELECT DISTINCT zdjecie FROM samochody";
                        $result = mysqli_query($conn, $kw6);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value=" . $row['zdjecie'] . ">" . $row['zdjecie'] . "</option>";
                        }
                        ?>
                    </select><br>

                    <h3>Wpisz Cene</h3><br>

                    <input type="number" name="input_cena" id="" placeholder="Wpisz cene"><br>

                    <input type="submit" value="Zatwierdź" name="input_submit_form_two">


                </form>
            </div>
                </details>
                
            </details><hr>


            <?php
            if (isset($_POST['input_submit_form_one'])) {
                $select = $_POST["select_one"];
                //echo $select;
                $kw4 = "SELECT model, cena, zdjecie, nazwa FROM samochody JOIN marki ON marki.id=samochody.marki_id WHERE nazwa ='$select'";
                $result = mysqli_query($conn, $kw4);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='block'>
                                <img src=" . $row['zdjecie'] . " alt=" . $row['model'] . ">
                                <h4>" . $row['nazwa'] . " " . $row['model'] . "</h4>
                                <h4>Cena: " . $row['cena'] . "</h4>
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