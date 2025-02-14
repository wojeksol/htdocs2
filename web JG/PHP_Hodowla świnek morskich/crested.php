<?php 
    $conn = new mysqli('localhost', 'root', '', 'hodowla');
    $conn->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>

        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>

    </header>

    <main>
        <section class="left-menu">
            
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        
        </section>

        <section class="right">

            <h3>Poznaj wszystkie rasy świnek morskich</h3>

            <ol>
                <?php
                    $kw1 = "SELECT rasa FROM rasy;";
                    $result = mysqli_query($conn, $kw1);
                    while($row = mysqli_fetch_array($result)){
                        echo "<li>" . $row['rasa'] . "</li>";
                    }  
                ?>
            </ol>

        </section>

        <section class="left-main">

            <img src="crested.jpg" alt="Świnka morska rasy crested">
            <?php 
                $kw2 = "SELECT DISTINCT data_ur, miot, rasa from swinki JOIN rasy ON swinki.rasy_id=rasy.id WHERE rasy.id=7;";
                $result = mysqli_query($conn, $kw2);
                while($row = mysqli_fetch_array($result)){
                    echo "<br><h2>Rasa: ". $row['rasa'] . "</h2><br><p>Data urodzenia: " . $row['data_ur'] . "</p><br><p>Oznaczenie miotu: " . $row['miot'] . "</p>";
                }
            ?>
            <br>
            <hr>

            <h2>Świnki w tym miocie</h2><br>
            <?php 
                $kw3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id=7;";
                $result = mysqli_query($conn, $kw3);
                while($row = mysqli_fetch_array($result)){
                    echo "<h3>". $row["imie"] . " - " . $row['cena'] . " zł</h3><br><p>". $row['opis'] . "</p><br>";

                }
                mysqli_close($conn);
            ?>

        </section>

        
    </main>

    <footer>

        
        
        <p>Strone wykonał: WS</p><br>

    </footer>
    
</body>
</html>