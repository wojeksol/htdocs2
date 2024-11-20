<?php 
    include('../php/session.php');
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300; url='../php/logout.php'">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="../css/style4.css">
</head>
<body>

    <header>

        <nav class="h-left">
            <img src="../img/logo.png" alt="logo">
        </nav>


        <nav class="h-up">
            <a href="../php/logout.php">Wyloguj</a>
        </nav>

        
        

        <nav class="h-right">
            <a href="main.php"><img src="../img/home.jpg" alt=""></a>
            <a href="oceny.php"><img src="../img/oceny.jpg" alt=""></a>
            <a href="frekwencja.php"><img src="../img/frek.jpg" alt=""></a>
            <a href="uwagi.php"><img src="../img/uwagi.jpg" alt=""></a>
            <a href="wiadomosci.php"><img src="../img/wiad.jpg" alt=""></a>
        </nav>

    </header>

    <main>
        <section>
            <h1>
                <?php  
                $conn = new mysqli('localhost', 'root', '', 'dziennik');

                $kw1 = "SELECT u.imie, u.nazwisko from uczen  u Join admin a on u.id=a.id_uczen where a.login = '$login_session'";

                $kw2 = "SELECT n.imie, n.nazwisko from nauczyciel n Join admin a on n.id=a.id_nauczyciel where a.login = '$login_session'";
            
                $result1 =  mysqli_query($conn, $kw1);

                $result2 =  mysqli_query($conn, $kw2);
            
                if(mysqli_num_rows($result1) > 0){
                    while($row =mysqli_fetch_assoc($result1)){
                        echo "<h1>Witaj w swoim dzienniku " . $row['imie'] . " " . $row['nazwisko'] . " Uczeń" ."</h1>";
                    }
                }
                else{
                    while($row =mysqli_fetch_assoc($result2)){
                        echo "<h1>Witaj w swoim dzienniku " . $row['imie'] . " " . $row['nazwisko'] . " Nauczyciel" . "</h1>";
                    }
                }

                mysqli_close($conn);

                
                ?>
                </h1>
            <p>Witaj w swoim dzienniku. Tutaj znajdziesz wszystkie informacje dotyczące Twojej edukacji. Możesz sprawdzić swoje oceny, frekwencję, uwagi, plan lekcji oraz dane nauczycieli. W razie jakichkolwiek problemów, skontaktuj się z administratorem.</p>
            <p>Wszelkie prawa zastrzeżone &copy; 2024</p>
        </section>
    </main>

    <footer>
        
    </footer>
    
</body>
</html>