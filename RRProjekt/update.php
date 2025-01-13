<?php 
    include 'session.php';
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="900;url='logout.php'" />
    <title>Aktułalizuj Rekordy</title>
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
        </nav>
    </header>

    <main>
        <section class="container d-flex flex-column">
        <form method="post" class="w-90">
            <div class="form-group d-flex justify-content-center flex-column">
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
                <div class="d-flex justify-content-center">
                    <button class="btn btn-dark" name="submit">NEXT</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $table = $_POST['table'];
            $sql = "SELECT * FROM $table";
            $result = $conn->query($sql);

            echo "<table class='table'><thead><tr>";
            while ($field = $result->fetch_field()) {
                echo "<th>{$field->name}</th>";
            }
            echo "<th>Działania</th></tr></thead><tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "<td>
                        <a href='edit.php?table=$table&id={$row['id']}' class='btn btn-primary'>Edit</a>
                        <a href='delete.php?table=$table&id={$row['id']}' class='btn btn-danger'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
        ?>
        </section>
    </main>
    
</body>
</html>