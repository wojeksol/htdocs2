<?php

    $sql = new mysqli('127.0.0.1','root','','filmoteka');
    
    if(isset($_POST["title"]))
    {
        $title = $_POST["title"];
        $gat = $_POST["gat"];
        $rok = $_POST["rok"];
        $rank = $_POST["rank"];

        $sql -> query("INSERT INTO filmy (tytul, rok, gatunki_id, ocena) VALUES ('$title', $rok, $gat, $rank);");

        echo"Skrypt działa!";
        
        $sql -> close();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><br>
    <a href="index.php">Powrót do strony głownej</a>
</body>
</html>