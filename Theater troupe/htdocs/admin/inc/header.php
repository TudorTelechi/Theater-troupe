<?php
session_start();
include  "admin-functions.php";

if (!isLogged()){
  die('Nu esti autentificat');
}

// Includem fisierul de conexiune la baza de date
require ('../conexiune.php');
?>

<html>

<head>
  <title>Carte de oaspeti</title>
  <style type="text/css">
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }

    .navigation {
      margin-bottom: 20px;
    }

    .navigation a {
      display: inline-block;
      margin-right: 10px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    .welcome {
      text-align: right;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="welcome">
    <?php printf('Welcome <b>%s</b> | <a href="index.php?comanda=logout">Logout</a>', getLoggedUser()); ?>
  </div>

  <div class="navigation">
    <a href="program.php">Editeaza Program</a>
    <a href="repertoriu.php">Editeaza Repertoriu</a>
    <a href="membri.php">Editeaza Membrii</a>
    <a href="../index.php">Home</a>
  </div>
