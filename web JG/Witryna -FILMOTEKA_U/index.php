<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    

    <main>

        <header><h1>Filmoteka</h1></header>

        <nav class="left">
            <h3>Dostępne gatunki filmu</h3><br>
            <ol>
                <li>Sci-Fi</li>
                <li>aniamcja</li>
                <li>dramat</li>
                <li>horror</li>
                <li>komedia</li>
            </ol><br>

            <p><a href="kadr.jpg">Pobierz obraz</a></p><br>

            <p><a href="http://repertuar-kin.pl" target="_blank" rel="noopener noreferrer">Sprawdż repertuar kin</a></p>
                
        </nav>

        <nav class="up">
            <form method="post" action="dodaj.php">
                Tytuł: <input type="text" name="title"><br>
                Gatunek Filmu: <input type="number" name="gat" id=""><br>
                Rok produkcji: <input type="number" name="rok" id=""><br>
                Ocena: <input type="number" name="rank" id=""><br>
                <input type="reset" value="CZYŚĆ">
                <input type="submit" value="DODAJ">
            </form>
        </nav>

        <nav class="down">
            <img src="kadr.jpg" alt="zdjęcia filmowe">
        </nav>
    </main>

    <footer>
        <p>Autor strony: Wojciech Sołdecki</p>
    </footer>
    
</body>
</html>