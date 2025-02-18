<?php 
    include("session.php");
    include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="900;url='logout.php'" />
    <title>Dodawanie rekordów</title>
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
        <section class="container d-flex flex-column mt-5">
        <form method="post" class="w-90">
            <div class="form-group">
                <label for="table">Wybierz tabelę</label>
                <?php 
                        $sql = "SHOW TABLES";
                        $result = $conn->query($sql);
                        echo "<select name='table' class='form-control'>";
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['Tables_in_rrprojekt']."'>".$row['Tables_in_rrprojekt']."</option>";
                        }
                        echo "</select>";
                    ?>
                    <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-dark" name="submit">NEXT</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $table = $_POST['table'];
            $sql = "DESCRIBE $table";
            $result = $conn->query($sql);

            echo "<form method='post' action='insert.php' class='w-90 mt-3'>";
            echo "<input type='hidden' name='table' value='$table'>";
            echo "<div class='form-group'>";
            while ($row = $result->fetch_assoc()) {
                $field = $row['Field'];
                echo "<label for='$field'>$field</label>";
                echo "<input type='text' name='fields[$field]' class='form-control'>";
            }
            echo "</div>";
            echo "<div class='d-flex justify-content-center mt-3'>";
            echo "<button class='btn btn-dark' name='submit'>Add Record</button>";
            echo "</div>";
            echo "</form>";
        }
        ?>
        </section>
    </main>
    
</body>
</html>