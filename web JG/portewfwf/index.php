<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Portal Ogłoszeniowy</h1></header>
    <main>
        <nav class="left">
            <h2>Kategorie ogłoszeń</h2>
            <ol>
                <li>Książki</li>
                <li>Muzyka</li>
                <li>Filmy</li>
            </ol>
            <img src="ksiazki.jpg" alt="Kupie / sprzedam książkę">
            <table>
                <tr>
                    <th>Liczba ogłozeń</th>
                    <th>Cena ogłoszeń</th>
                    <th>Bonus</th>
                </tr>
                <tr>
                    <td>1-10</td>
                    <td>1 PLN</td>
                    <td rowspan="3">Subskrypcja newslettera to upust 0.20 PLN na ogłoszenie</td>
                </tr>
                <tr>
                    <td>11-50</td>
                    <td>0.80 PLN</td>
                </tr>
                <tr>
                    <td>51 i więcej</td>
                    <td>0.60 PLN</td>
                </tr>
            </table>
        </nav>
        <nav class="right">
            <h2>Ogłoszenia kategorii książki</h2>

            <?php 
                $sql = new mysqli('localhost', 'root', '', 'portal ogłoszeniowy');

                $kw1 = "SELECT ogloszenie.id, ogloszenie.tytul, ogloszenie.tresc FROM ogloszenie WHERE ogloszenie.kategoria = 1;";
                $kw2 = "SELECT uzytkownik.telefon FROM uzytkownik, ogloszenie WHERE uzytkownik.id = ogloszenie.uzytkownik_id;";


                $result1 = mysqli_query($sql, $kw1);
                $result2 = mysqli_query($sql, $kw2);


                while($tablica1 = mysqli_fetch_row($result1)) {
                    $tablica2 = mysqli_fetch_row($result2);
                    echo "<br><h3>$tablica1[0] $tablica1[1]</h3>";
                    echo "<p>$tablica1[2]</p>";
                    echo "<p>telefon kontaktowy: $tablica2[0]</p>";
                }

                mysqli_close($sql);

            ?>
        </nav>
    </main>
    <footer>Portal ogłoszniowy zaprojektował: Wojciech Sołdecki</footer>
</body>
</html>