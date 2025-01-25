<?php 
            if(isset($_POST['input_submit_form_two'])){
                
                $marka_name = $_POST['select_marka'];
                $marka_name == 'Audi' ? $marka = 1 : ($marka_name == 'BMW' ? $marka = 2 : ($marka_name == 'Volkswagen' ? $marka = 3 : ($marka_name == 'Opel' ? $marka = 4 : ($marka_name == 'Ford' ? $marka = 5 : ($marka_name == 'Mercedes' ? $marka = 6 : ($marka_name == 'Toyota' ? $marka = 7 : ($marka_name == 'Fiat' ? $marka = 8 : ($marka_name == 'Jeep' ? $marka = 9 : $marka = 0))))))));
                $model = $_POST['input_model'];
                $rocznik = $_POST['input_rocznik'];
                $przebieg = $_POST['input_przebieg'];
                $paliwo = $_POST['select_paliwo'];
                $cena = $_POST['input_cena'];
                $zdjecie = $_POST['select_zdjecie'];
                echo 'cos';
                
                $conn = new mysqli('localhost', 'root', '', 'kupauto');
                $kw7 = "INSERT INTO samochody VALUES (null, $marka, '$model', $rocznik, $przebieg, '$paliwo', $cena, 0, '$zdjecie');";
                mysqli_query($conn, $kw7);

                mysqli_close($conn);
                header("Location: KupAuto.php");

            }