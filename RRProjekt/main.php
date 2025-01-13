<?php 
    include('session.php');
    include 'config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="900;url='logout.php'" />
    <title>Strona Głowna</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

<header style="height: 8vh;">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" href="main.php">Sneekers</a>
                    </li>
                   <li class="nav-item">
                      <a class="nav-link" href="update.php">Aktułalizacja</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="add.php">Dodawanie</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  </ul>
            </div>
        </nav>
    </header>

<main>
    <section class="container mt-5">
        <h1 class="mb-4">Witaj w Sneekers Admin Panel</h1>
        <div class="row">
            <?php
            $sql = "SHOW TABLES";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $table = $row['Tables_in_rrprojekt'];
                $count_sql = "SELECT COUNT(*) as count FROM $table";
                $count_result = $conn->query($count_sql);
                $count_row = $count_result->fetch_assoc();
                $count = $count_row['count'];
                echo "
                <div class='col-md-4'>
                    <div class='card mb-4'>
                        <div class='card-body'>
                            <h5 class='card-title'>$table</h5>
                            <p class='card-text'>Liczba Rekordów: $count</p>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </section>
</main>
    
</body>
</html>