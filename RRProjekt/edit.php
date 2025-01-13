<?php 
    include 'session.php';
    include 'config.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $table = $_POST['table'];
        $id = $_POST['id'];
        $fields = $_POST['fields'];

        $updateFields = [];
        foreach ($fields as $field => $value) {
            $updateFields[] = "$field = '$value'";
        }
        $updateFieldsStr = implode(', ', $updateFields);

        $sql = "UPDATE $table SET $updateFieldsStr WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: main.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    } else {
        $table = $_GET['table'];
        $id = $_GET['id'];
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
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
            <form method="post" action="edit.php" class="w-90">
                <input type="hidden" name="table" value="<?php echo $table; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="tabela">tabela: </label>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Column</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($row as $field => $value) {
                                echo "<tr><td>$field</td><td><input type='text' name='fields[$field]' value='$value' class='form-control'></td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-dark" name="submit">Update</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
    
</body>
</html>

<?php
}
?>