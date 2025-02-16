<?php 
    include 'db.php';
    session_start();

    if(!isset($_SESSION['login'])){
        header("location: ../html/index.php");
        die();
    }
    $login = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portal społecznościowy</title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <header>
            <div class="h-left">
                <h2>Nasze osiedle</h2>
            </div>
            <div class="h-right">
                <?php
                    $query = "SELECT COUNT(*) FROM dane;";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    echo "<h5>Liczba uZytkowników portalu: $row[0]</h5>";
                ?>
            </div>
        </header>
        <main>
            <h3>Wizytówka</h3>
            <div class="Card">
                <?php 
                    $query = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id=dane.id WHERE login = '$login';";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                    $age = date("Y") - $row[1];
                    echo "<img src='../img/$row[4]' alt='osoba' />";
                    echo "<h4>$row[0]($age)</h4>";
                    echo "<p>hobby: $row[3]</p>";
                    echo "<h1><img src='../img/icon-on.png' alt='on' />$row[2]</h1>";
                    echo "<button href='dane.html'>Więcej informacji</button>";
                ?>
            </div>
        </main>
        <footer>
            <p>Stronę wykonał: WS</p>
        </footer>
    </body>
</html>
