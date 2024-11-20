<?php 
    include('../php/config.php');
    session_start();
    $error = '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = mysqli_real_escape_string($conn, $_POST['login']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $kw = "SELECT * FROM admin WHERE login = '$login' AND pass = '$pass';";

        $result = mysqli_query($conn, $kw);
        $row = mysqli_num_rows($result);
        $count = mysqli_num_rows($result);
        if($count == 1){
            $_SESSION['login'] = $login;
            header("location: main.php");
        }else{
            $error = "Nieprawidłowy login lub hasło";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>

    <header>
        <nav class="h-left">
            <img src="../img/logo.png" alt="logo">
        </nav>
        <nav class="h-right"></nav>
    </header>
    

    <main>
      
        <div class="login">
            <form name="f1" action="" method="POST">
                <h3>Login</h1>
                <input type="text" name="login" id="login" size="37"><br><br>
                <h3>Hasło</h3>
                <input type="password" name="pass" id="pass" size="37"><br><br>
                <input type="submit" name="submit" value="Login" ><br>
                <p id="p"><?php echo $error; ?></p>
            </form>
        </div>
        
    </main>




    <footer>
        <p>Wszelkie ludzkie prawa zastrzeżone oraz chęć do życia &copy; 2024</p>
    </footer>

</body>
</html>
