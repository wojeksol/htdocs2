<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <section class="left"><h1>Internetowy sklep z eko-warzywami</h1></section>
        <section class="right">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl/">soki</a></li>
            </ol>
        </section>
    </header>

    <main>

        

        <?php 
        
            $conn = new mysqli('localhost', 'root', '', 'warzywniak');
            $kw1 ="SELECT p.nazwa, p.opis ,p.ilosc, p.cena, p.zdjecie FROM `produkty` p WHERE p.Rodzaje_id = 1 OR p.Rodzaje_id = 2;";
            $wynik = mysqli_query($conn, $kw1);

            while($row = mysqli_fetch_assoc($wynik)){

                echo "<div class='sk1'>
                 <img src='" .$row['zdjecie'] . "' alt='warzywniak'>
                <h5>" . $row["nazwa"] . "</h5>
                <p>opis: " . $row['opis'] . "</p>
                <p>ilość: " . $row['ilosc'] . "</p>
                <h2>cena: " . $row['cena'] . "</h2>
                </div>";
                
            }

            mysqli_close($conn);
        ?>

    </main>
    
    <footer>
        <form method="post">
            Nazwa: <input type="text" name="n" id="">
            Cena: <input type="text" name="c" id="">
            <input type="submit" name="s" value="Dodaj Produkt">
        </form>

        <?php 
        
            if(isset($_POST['s'])) {
                $conn = new mysqli('localhost', 'root' ,'' ,'warzywniak');
                $nazwa = $_POST['n'];
                $cena = $_POST['c'];
                $kw2 = "INSERT INTO `produkty` VALUES (NULL,1,4, '$nazwa', 10, '', '$cena', 'owoce.jpg');";
                mysqli_query($conn, $kw2);

                mysqli_close($conn);
            }
        
        ?>

        <p>Stronę wykonał: Wojciech Sołdecki</p>
    </footer>


</body>
</html>