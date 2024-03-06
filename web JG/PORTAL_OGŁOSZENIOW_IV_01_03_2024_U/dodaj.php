<?php

$sql = new mysqli('127.0.0.1', 'root', '', 'portal ogłoszeniowy');

    if(!empty($_POST['kat']) && !empty($_POST['pod']) && !empty($_POST['title']) && !empty($_POST['tresc'])) {

        $kat = $_POST['kat'];
        $pod = $_POST['pod'];
        $title = $_POST['title'];
        $tresc = $_POST['tresc'];
        
        $kw = "INSERT INTO ogloszenie VALUES (NULL, 1, $kat, $pod, '$title', '$tresc')";

        mysqli_query($sql, $kw);

    }

mysqli_close($sql);

?>

