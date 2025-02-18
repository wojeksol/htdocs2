<?php
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = $_POST['table'];
    $fields = $_POST['fields'];

    $columns = implode(", ", array_keys($fields));
    $values = implode("', '", array_values($fields));

    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
        header("Location: main.php");
        exit();
    } else {
        echo "Error adding record: " . $conn->error;
    }

    $conn->close();
}
?>