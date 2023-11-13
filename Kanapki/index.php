<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>

</header>

<main>
<?php 
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "kanapki"; 
    $table = "rodzaje"; 

    $connection = new  mysqli($servername, $username, $password, $database); 

    if($connection -> connect_error){ 
        die("Connection failed: " . $connection -> connect_error); 
    } 

    $sql = "SELECT * FROM " . $table; $result = $connection->query($sql); 

    if(!$result){ 
        die("Invalid query: " . $connection -> error); 
    } 

    while($row = $result->fetch_assoc()){ 
        echo "
            <div class='kanapka' >
            <center><img src=". $row["Ikona"] ." alt='pobrane.jpg' height='150'></center>
            <a>". $row["Nazwa"] ."</a><br>
            <a>". $row["Opis"] ."</a><br>
            <a>". $row["Cena"] ."</a><br>
            <a>". $row["Ocena"] ."</a>
            </div>";
    }
?>
</main>
    
<footer>
    
</footer>

</body>
</html>