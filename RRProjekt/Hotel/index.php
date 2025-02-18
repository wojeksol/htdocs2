<?php 
    include('config.php');
    session_start();
    $error = '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = mysqli_real_escape_string($conn, $_POST['login']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $kw = "SELECT * FROM admin WHERE login = '$login' AND pass = PASSWORD('$pass');;";

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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    
</head>
<body>



    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Sneekers</a>
                    </li>
                  </ul>
            </div>
        </nav>
    </header>

    <main>
      <section class="container w-50 h-100 d-flex">
        <form name="f1" class="form-horizontal w-100 d-flex align-items-center justify-content-center flex-column" method="post">
          <div class="form-group w-50">
            <label for="login" class="control-label">Login:</label>
            <input type="login" class="form-control" name="login" id="login" size=37 required>
          </div><br>
          <div class="form-group w-50">
            <label for="pwd" class="control-label">Password:</label>
            <input type="password" id="pass" name="pass" class="form-control" size=37 required >
          </div>
          <div class="checkbox">
            <input type="checkbox" onclick="myFunction()">Pokaż hasło
          </div><br>
          <div class="d-flex justify-content-center flex-column w-50 align-items-center">
            <button type="submit" class="btn btn-primary w-50">Submit</button>
            <p id="p" class="mt-3 text-center"><?php echo $error; ?></p>
          </div>
          
    </form>
    </section>
    
      
  </main>
    
</body>
</html>
<script>
  document.getElementById('p').style.color = 'red';

    function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>