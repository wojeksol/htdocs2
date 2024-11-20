<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-left"><img src="logo2.png" alt="Mój kalendzarz"></div>
        <div class="header-right">
            <h1>KALENDZARZ</h1>

            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'kalendarz');
            $query1 = 'SELECT miesiąc, rok FROM zadania where dataZadania = "2020-08-01"';
            $result1 = mysqli_fetch_row(mysqli_query($conn, $query1));
            echo '<h3>miesiąc: ' . $result1[0] . ', rok ' . $result1[1] . '</h3>';
        ?>
            
        </div>
    </header>

    <form method="post" action='kalendarz1.php'>

        <?php
            $sql = new mysqli('localhost', 'root', '', 'kalendarz');
            
            if(isset($_POST['kal'])){
                $var2 = $_POST['text'];
                $var4 = $_POST['kal'];
                $pyt1 = "UPDATE zadania SET wpis= '$var2' WHERE dataZadania='$var4';";
            
                mysqli_query($sql, $pyt1);
            };

            $pyt2 ="SELECT dataZadania, wpis, id FROM zadania WHERE miesiąc='sierpień';";
            $wynik = mysqli_query($sql, $pyt2);
            while($var = mysqli_fetch_row($wynik)){
                echo "<p class='div'><input type='radio' name='data' class='block' value=". $var[2] . "><a>".$var[0]."</a> <a>  $var[1]</a></input></p>";
            }

            
            
        ?>

    <footer>
        
        <input type="date" name="kal" id="" value="2020-08-01" min="2020-08-01" max="2020-08-31">
        <input type="text" name="text" id="">
        <input type="submit" value="DODAJ">

        <p>Stronę wykonał: Wojciech Sołdecki</p>
    </footer>

</form>
    
</body>
</html>