<?php 

$sql = new mysqli('localhost', 'root', '', 'ankieta');

if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}

 

    $on = $_POST['18'];
    $plec = $_POST['plec'];
    $fiz = $_POST['fiz'];
    $zaw = $_POST['zaw'];
    $spo = $_POST['spo'];
    $hobby = $_POST['hobby'];
    $got = $_POST['got'];
    $komp = $_POST['komp'];
    $zwierz = $_POST['zwierz'];
    $rodz = $_POST['rodz'];

 

    $score1 = 0;
    $score2 = 0;

    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;
    $e = 0;
    $f = 0;
    $g = 0;
    $h = 0;
    $i = 0;
    $j = 0;

    $a2 = 0;
    $b2 = 0;
    $c2 = 0;
    $d2 = 0;
    $e2 = 0;
    $f2 = 0;
    $g2 = 0;
    $h2 = 0;
    $i2 = 0;
    $j2 = 0;


    if($on == "Tak"){
        $a = 1;
    }
    if($on == "Nie"){
        $a2 = 1;
    }

    if($plec == "Tak"){
        $b =1;
    }
    if($plec == "Nie"){
        $b2 = 1;
    }

    if($fiz == "Tak"){
        $c = 1;
    }
    if($fiz == "Nie"){
        $c2 = 1;
    }

    if($zaw == "Tak"){
        $d = 1;
    }
    if($zaw == "Nie"){
        $d2 = 1;
    }

    if($spo == "Tak"){
        $e = 1;
    }
    if($spo == "Nie"){
        $e2 = 1;
    }

    if($hobby == "Tak"){
        $f = 1;
    }
    if($hobby == "Nie"){
        $f2 = 1;
    }

    if($got == "Tak"){
        $g = 1;
    }
    if($got == "Nie"){
        $g2 = 1;
    }

    if($komp == "Tak"){
        $h = 1;
    }
    if($komp == "Nie"){
        $h2 = 1;
    }

    if($zwierz == "Tak"){
        $i = 1;
    }
    if($zwierz == "Nie"){
        $i2 = 1;
    }

    if($rodz == "Tak"){
        $j = 1;
    }
    if($rodz == "Nie"){
        $j2 = 1;
    }

    $score1 = $a + $b + $c + $d + $e + $f + $g + $h + $i + $j;
    $score2 = $a2 + $b2 + $c2 + $d2 + $e2 + $f2 + $g2 + $h2 + $i2 + $j2;

    echo "Liczba odpowiedzi tak: $score1<br>";

    echo "Liczba odpowiedzi nie: $score2<br>";

    $sql -> query("INSERT INTO `pytania` VALUES (NULL, '$on', '$plec', '$fiz', '$zaw', '$spo', '$hobby', '$got', '$komp', '$zwierz', '$rodz')");

 ?>