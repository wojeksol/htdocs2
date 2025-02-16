<?php 
    include 'db.php';
    session_start();
    $error = '';
    if(!empty($_POST['login']) && !empty($_POST['pass'])){
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $query = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
        $count = mysqli_num_rows(mysqli_query($conn, $query));
        $row = mysqli_fetch_array(mysqli_query($conn, $query));
        $password = $row['haslo'];
        if ($count == 1) {
            if (sha1($pass) == $password) {
                $_SESSION['login'] = $login;
                header("location: main.php");
            }else {
                $error = "Nieprawidłowe hasło";
            }
        }else {
            $error = "Nieprawidłowy login";
        }
    }
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-screen flex items-center justify-center">
    <section class="max-w-sm mx-auto p-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 w-80 one">
        <form action="#" method="post">
            <div class="mb-5">
                <label for="login" class="block text-gray-900 text-sm font-medium dark:text-white">Twój Login</label>
                <input type="text" name="login" placeholder="Wpisz swój login" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="pass" class="block text-gray-900 text-sm font-medium dark:text-white">Twoje Hasło</label>
                <input type="password" name="pass" placeholder="Wpisz swoje hasło" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <button type="submit" class="bg-blue-500 text-white text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 mb-5">Zaloguj</button>
            <div class="mb-1 text-center">
                <a href="#" class="text-blue-500 text-sm font-medium" onclick="fun(1)">Zarejestruj się</a>
            </div>
        </form>
    </section>
    <section class="max-w-sm mx-auto p-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 w-80 two hidden">
        <div class="mb-5">
            <label for="login2" class="block text-gray-900 text-sm font-medium dark:text-white">Twój Login</label>
            <input type="text" name="login2" placeholder="Wpisz swój login" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label for="pass2" class="block text-gray-900 text-sm font-medium dark:text-white">Twoje Hasło</label>
            <input type="password" name="pass2" placeholder="Wpisz swoje hasło" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label for="pass3" class="block text-gray-900 text-sm font-medium dark:text-white">Powtórz Swoje Hasło</label>
            <input type="password" name="pass3" placeholder="Wpisz swoje hasło" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <button type="submit" class="bg-blue-500 text-white text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 mb-5">Zarejestruj</button>
        <div class="mb-1 text-center">
                <a href="#" class="text-blue-500 text-sm font-medium" onclick="fun(0)">Zaloguj</a>
            </div>
    </section>
</body>
</html>

<script>
    let arr = [document.querySelector('.one'), document.querySelector('.two')];
    function fun(x){
        arr.forEach((el) => {
            el.style.display = 'none';
        });
        arr[x].style.display = 'block';
    }
</script>