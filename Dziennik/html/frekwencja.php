<?php 
    include("../php/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style1.css">
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
        <?php 
        
            $conn = new mysqli('localhost', 'root', '', 'dziennik');

            if(!$conn){
                die("błąd połączenia: " . mysqli_connect_error());
            }

           $kw1 = "SELECT u.id ,u.imie, u.nazwisko FROM uczen u JOIN admin a ON u.id=a.id_uczen WHERE a.login='$login_session';";

           $result1 = mysqli_query($conn, $kw1);

           while($row = mysqli_fetch_array($result1)){
                $IdStudent = $row[0];
                $StudentName = $row[1];
                $StudentSecondName = $row[2];
           }

           $kw2 = "SELECT f.Data, f.Godzina_lekcyjna, f.typ from frekwencja f WHERE f.id_uczen='$IdStudent';";

           $result2 = mysqli_query($conn, $kw2);

           while($row1 = mysqli_fetch_array($result2)){
                
                $NumRows = mysqli_num_rows($result2);
                $Data[] = $row1['Data'];
                $GodzinaLekcyjna[] = $row1['Godzina_lekcyjna'];
                $Typ[] = $row1[2];
           }

           echo "<table>
                    <tr>
                        <td>Data</td>
                        <td>Godzina Lekcjyna</td>
                        <td>Typ Nieobecności</td>
                    </tr>";
                     for($i = 0; $i < mysqli_num_rows($result2); $i++){

                        echo "<tr>
                                <td>$Data[$i]</td>
                                <td>$GodzinaLekcyjna[$i]</td>
                                <td>$Typ[$i]</td>
                            </tr>";
                    } 
                echo "</table>";

                function like($str, $searchTerm) {
                    $searchTerm = strtolower($searchTerm);
                    $str = strtolower($str);
                    $pos = strpos($str, $searchTerm);
                    if ($pos === false)
                        return false;
                    else
                        return true;
                }
                $found = like($login_session, 'n');

                $kw4 ="SELECT n.id FROM nauczyciel n JOIN admin a ON n.id=a.id_nauczyciel WHERE a.login='$login_session';";

                $result4 = mysqli_query($conn, $kw4);

                while($row2 = mysqli_fetch_array($result4)){
                    $IdTeacher = $row2[0];
                }
                

                if($NumRows == 0){
                    echo "<h1>Brak danych</h1>";
                }else if($found == true){
                    echo "<form method='POST'>
                            <input type='date' name='date' required>
                            <input type='text' name='hour' required>
                            <select name='type' required>
                                <option value='nieobecnosc'>nieobecnosc</option>
                                <option value='spoznienie'>spoznienie</option>
                                <option value='usprawiedliwione'>usprawiedliwione</option>
                                <option value='zwolnienie'>zwolnienie</option>
                            </select>
                            <input type='text' name='Studentname' required>
                            <input type='text' name='StudentSecondName' required>
                            <input type='submit' name='submit' value='Dodaj'>
                        </form>";

                    $Date1 = $_POST['date'];
                    $Hour = $_POST['hour'];
                    $Type = $_POST['type'];
                    $StudentName = $_POST['Studentname'];
                    $StudentSecondName = $_POST['StudentSecondName'];

                    $kw5 ="SELECT u.id FROM uczen u WHERE u.imie='$StudentName' AND u.nazwisko='$StudentSecondName';";

                    $result5 = mysqli_query($conn, $kw5);

                    while($row3 = mysqli_fetch_array($result5)){
                        $IdStudent1 = $row3[0];
                    }
                    $kw6 =  "INSERT INTO `frekwencja` (`Data`, `id_nauczyciel`, `id_uczen`, `Godzina_lekcyjna`, `typ`) VALUES ('$Date1', '$IdTeacher', '$IdStudent1', '$Hour', '$Type');";
                    
                    
                }


                
        ?>

    </main>


    
</body>
</html>