<?php 
    include('../php/session.php');
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona Główna</title>
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
            <a href="oceny.html"><img src="../img/oceny.jpg" alt=""></a>
            <a href="frekwencja.html"><img src="../img/frek.jpg" alt=""></a>
            <a href="uwagi.html"><img src="../img/uwagi.jpg" alt=""></a>
            <a href="plan.html">Plan</a>
            <a href="nauczyciele.html">Nauczyciele</a>
            <a href="profile.html">Profil</a>
        </nav>

    </header>

    <main>
        <section>
            <h1>Witaj w swoim dzienniku <?php echo $login_session; ?></h1>
            <p>Witaj w swoim dzienniku. Tutaj znajdziesz wszystkie informacje dotyczące Twojej edukacji. Możesz sprawdzić swoje oceny, frekwencję, uwagi, plan lekcji oraz dane nauczycieli. W razie jakichkolwiek problemów, skontaktuj się z administratorem.</p>
        </section>
    </main>

    <footer>
        <p>Wszelkie prawa zastrzeżone &copy; 2020</p>
    </footer>
    
</body>
</html>