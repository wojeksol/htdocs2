<?php
    require "connect.php";
    $conn = new connect("portal");
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
                    $result = $conn->query("SELECT COUNT(*) FROM uzytkownicy");
                    $row = $result->fetch_array();
                    echo "<h5>Liczba uZytkowników portalu: $row[0]</h5>";
                ?>
            </div>
        </header>
        <main>
            <h3>Wizytówka</h3>
            <div class="Card">
                <?php 
                    $query = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id=dane.id WHERE login = '$login';";
                    $result = $conn->query($query);
                    $row = $result->fetch_array();
                    $age = date("Y") - $row[1];
                    echo "<img src='../img/$row[4]' alt='osoba' />";
                    echo "<h4>$row[0]($age)</h4>";
                    echo "<p>hobby: $row[3]</p>";
                    echo "<h1><img src='../img/icon-on.png' alt='on' />$row[2]</h1>";
                    echo "<button id='btn'>Więcej informacji</button>";
                ?>
            </div>
            <div>
                <button id="logout-btn"><a href="logout.php">Wyloguj się</a></button>
            </div>
        </main>
        <footer>
            <p>Stronę wykonał: WS</p>
        </footer>
    <script>
        document.querySelector('#btn').addEventListener('click', cos)

        function cos(){
            location.href = "https://google.com";
        }
    </script>
    </body>
</html>
