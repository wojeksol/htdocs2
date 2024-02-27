<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep Muzyczny</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
            <h1>SKLEP MUZYCZNY</h1>
        </header>

        <main>
            <nav class="left">
                <h2>NASZA OFERTA</h2><br>
                <ol>
                    <li>Instrumenty muzyczne</li>
                    <li>Sprzęt audio</li>
                    <li>Płyty CD</li>
                </ol>
            </nav>

            <nav class="right">
                <?php

                    $sql = new mysqli('127.0.0.1','root','','sklep');

                    if(isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["adres"]) && isset($_POST["telefon"]) && isset($_POST["login"]) && isset($_POST["haslo"]))
                    {
                        $imie = $_POST["imie"];
                        $nazwisko = $_POST["nazwisko"];
                        $adres = $_POST["adres"];
                        $telefon = $_POST["telefon"];
                        $login = $_POST["login"];
                        $haslo = $_POST["haslo"];

                        $kw1 = "INSERT INTO uzytkownicy VALUES (NULL, '$imie', '$nazwisko', '$adres', '$telefon')";

                        $kw2 = "INSERT INTO konta VALUES (NULL, '$login', '$haslo')";

                        mysqli_query($sql, $kw1);

                        mysqli_query($sql, $kw2);

                        echo"konto $imie $nazwisko zostało zrejestrowane w sklepie muzycznym!";

                        $sql -> close();
                    }


                ?>


            </nav>
        
        </main

    
</body>
</html>