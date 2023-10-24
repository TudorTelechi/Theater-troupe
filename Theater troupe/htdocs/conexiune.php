<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Creare conexiune la baza de date
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificare conexiune
if ($conn->connect_error) {
    die("Conexiunea la baza de date a esuat: " . $conn->connect_error);
}
?>
