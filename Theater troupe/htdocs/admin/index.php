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

session_start();
include  "admin-functions.php";
?>

<h1 align="center">Panou de Administrare</h1>

<?php
$comanda = isset($_REQUEST["comanda"]) ? $_REQUEST["comanda"] : NULL;

if (isset($comanda)) {
  switch ($comanda) {
    case 'login':
      $nume = $_REQUEST["nume"];
      $parola =  $_REQUEST["parola"];
      //TODO: validare parametrii
      if (!doLogin($nume, $parola)) {
        echo "<div class='error'>Autentificare esuata!</div>";
      }
      break;

    case 'logout':
      doLogout();
      header("Location: /admin/");
      break;
  }
}

if (!isLogged()) {
  include "login-form.php";
} else {
  header("Location: repertoriu.php");
}