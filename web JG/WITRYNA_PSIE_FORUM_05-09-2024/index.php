<?php
        
        if(isset($_POST["text"])) {
        $conn = new mysqli('localhost', 'root' , '', 'psy');
            $text = $_POST["text"];
            $kw3 = "INSERT INTO odpowiedzi VALUES (NULL, 1, 5, '$text')";
            mysqli_query($conn, $kw3);
        }
    
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header>
        <h1>Forum miłośników psów</h1>
    </header>

    <div class="left">
        <img src="Avatar.png" alt="Użytkownik forum"><br><br>

        <?php 
     
            $sql = new mysqli('localhost', 'root', '', 'psy');

            $kw = "SELECT nick, postow, pytanie FROM konta JOIN pytania ON konta.id=pytania.konta_id WHERE konta.id=1;";

            $h = mysqli_query($sql, $kw);

            while($row = mysqli_fetch_assoc($h)) {
                echo "<b>Użytkownik: " . $row["nick"] . "</b><br><br>" . $row["postow"] . " postów na forum<br><br>" . $row["pytanie"];
            }
    
        ?>

        <video width="320" height="240" autoplay loop controls>
            <source src="video.mp4" type="video/mp4">
        </video>


    </div>


    <div class="right">

        <form method="post">
            <textarea name="text" id="text" style="height: 75px; width: 250px;"></textarea><br>
            <input type="submit" name="sub" style="background-color: #97b498; color: white;" value="Dodaj  odpowiedź">
        </form>

        <h2>Odpowiedzi na pytanie</h2>
<ol><br>
        <?PHP

    $conn = new mysqli('localhost', 'root', '', 'psy');

    $kw = "SELECT * FROM odpowiedzi o JOIN konta k ON o.konta_id=k.id WHERE o.Pytania_id=1;";

    $h = mysqli_query($conn, $kw);

    while($row = mysqli_fetch_assoc($h)) {
        
        echo "<li>" . $row["odpowiedz"] . " <i>" . $row["nick"] ."</i></li>";
        echo"<br><hr><br>";
    }
    
?>

</ol>



       

    </div>

    
    
    <footer>Autor: WS</footer>

</body>
</html>