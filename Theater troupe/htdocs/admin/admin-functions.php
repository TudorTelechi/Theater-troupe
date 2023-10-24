<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
$id_conexiune = mysqli_connect($servername, $username, $password, $dbname);

if (!$id_conexiune) {
  die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}

/**
 * Verifica detaliile de autentificare transmise ca parametru.
 * In caz de succes stocheaza in sesiune proprietatile:
 *  'user' - userul logat
 *  'logat' - cu valoarea TRUE
 */
function doLogin($user, $password)
{
  global $id_conexiune;
  $logat = FALSE;
  if (isLogged())
    doLogout();

  //$sql = "SELECT * FROM admin WHERE nume='$user' AND parola= md5('$password')";//Gresit! Permite SQL Injection
  $sql = sprintf(
    "SELECT * FROM admin WHERE nume='%s' AND parola= md5('%s')",
    mysqli_real_escape_string($id_conexiune, $user),
    mysqli_real_escape_string($id_conexiune, $password)
  );
  //echo "Query: $sql <br>";
  if (!($result = mysqli_query($id_conexiune, $sql))) {
    echo ('Error: ' . mysqli_error($id_conexiune));
  }
  if ($row = mysqli_fetch_array($result)) {
    $logat = TRUE;
    $_SESSION['user'] = $user;
    $_SESSION['logat'] = TRUE;
  }
  return $logat;
}

/**
 * Sterge din sesiune variabilele stocate la autentificare.
 */
function doLogout()
{
  unset($_SESSION['user']);
  unset($_SESSION['logat']);
}

/**
 * Verifica daca userul este logat sau nu.
 */
function isLogged()
{
  return isset($_SESSION['logat']) && $_SESSION['logat'] == TRUE;
}

/**
 * Extrage din sesiune numele userului logat.
 */
function getLoggedUser()
{
  return isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
}
