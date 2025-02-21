<?php
    require "connect.php";
    $conn = new connect("portal");
    session_start();


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
        <form action="register_two.php" method="post">
            <div class="mb-5">
                <label for="brith_year" class="block text-gray-900 text-sm font-medium dark:text-white">Twój Rok Urodzenie
                    <input type="number" name="brith_year" placeholder="Wpisz swój rok urodzenia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <div class="mb-5">
                <label for="hobby" class="block text-gray-900 text-sm font-medium dark:text-white">Twoje Hobby
                    <input type="text" name="hobby" placeholder="Wpisz swoje hobby" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <div class="mb-5">
                <label for="foto" class="block text-gray-900 text-sm font-medium dark:text-white">Twoje Zdjęcie
                    <input type="text" name="foto" placeholder="Wpisz swoje zdjęcie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </label>
            </div>
            <button type="submit" class="bg-blue-500 text-white text-sm font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 mb-5">Zarejestruj</button>
            <div class="mb-1 text-center">
                <p class="text-red-500 text-sm font-medium" id="error"><?php ?></p>
            </div>
        </form>
    </section>


    </body>
</html>