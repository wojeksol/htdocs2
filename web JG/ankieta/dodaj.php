<?php 

$sql = new mysqli('localhost', 'root', '', 'ankieta');

if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}



?>