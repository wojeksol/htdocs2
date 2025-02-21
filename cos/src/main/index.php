<?php
session_start();
    $error = "";
    $error = $_SESSION['error'];
//    echo $error;
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
        <form action="login.php" method="post">
            <div class="mb-5">
                <label for="login" class="block text-gray-900 text-sm font-medium dark:text-white">Twój Login
                    <input type="text" name="login" placeholder="Wpisz swój login" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <div class="mb-5">
                <label for="pass" class="block text-gray-900 text-sm font-medium dark:text-white">Twoje Hasło
                    <input type="password" name="pass" placeholder="Wpisz swoje hasło" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <button type="submit" class="bg-blue-500 text-white text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 mb-5">Zaloguj</button>
            <div class="mb-1 text-center">
                <a href="#" class="text-blue-500 text-sm font-medium" id="register-btn">Zarejestruj się</a>
                <p class="text-red-500 text-xl font-bolda" id="error"><?php echo $error;?></p>
            </div>
        </form>
    </section>
    <section class="max-w-sm mx-auto p-8 bg-white rounded-lg shadow-lg dark:bg-gray-800 w-80 two hidden">
        <form action="register.php" method="post">
            <div class="mb-5">
                <label for="login2" class="block text-gray-900 text-sm font-medium dark:text-white">Twój Login
                    <input type="text" name="login2" placeholder="Wpisz swój login" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <div class="mb-5">
                <label for="pass2" class="block text-gray-900 text-sm font-medium dark:text-white">Twoje Hasło
                    <input type="password" name="pass2" placeholder="Wpisz swoje hasło" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <div class="mb-5">
                <label for="pass3" class="block text-gray-900 text-sm font-medium dark:text-white">Powtórz Swoje Hasło
                    <input type="password" name="pass3" placeholder="Wpisz swoje hasło" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <button type="submit" class="bg-blue-500 text-white text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 mb-5">Zarejestruj</button>
            <div class="mb-1 text-center">
                <a href="#" class="text-blue-500 text-sm font-medium" id="login-btn">Zaloguj</a>
                <p class="text-red-500 text-sm font-medium" id="error"><?php  ?></p>
            </div>
        </form>
    </section>

<script src="index.js"></script>
</body>

</html>