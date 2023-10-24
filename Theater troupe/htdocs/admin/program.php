<!DOCTYPE html>
<html>

<head>
    <title>Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form h3 {
            margin-bottom: 10px;
            color: #333;
        }

        form label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form input[type="submit"] {
        margin-top: 1px;
        padding: 8px 12px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 40px;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: red;
    }

        p {
            color: #333;
        }

        p.error-message {
            color: red;
        }

        p.success-message {
            color: green;
        }
    </style>
</head>
<body>

<?php
// Includem fisierul de conexiune la baza de date
require './inc/header.php';

$id = "";
$nume = "";
$data = "";
$ora = "";
$locatie = "";


if (isset($_POST['selecteaza'])) {
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM program where id='" . mysqli_escape_string($conn, $id) . "'");
    $row = mysqli_fetch_assoc($query);

    $nume = $row['nume'];
    $data = $row['data'];
    $ora = $row['ora'];
    $locatie = $row['locatie'];
}

// Verificam daca s-a trimis un formular de adaugare
if (isset($_POST['adauga'])) {

    // Validam datele din formular
    $id = $_POST["id"];
    $nume = $_POST['nume'];
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $locatie = $_POST['locatie'];

    // Verificam daca toate campurile sunt completate
    if (empty($nume) || empty($data) || empty($ora) || empty($locatie)) {
        $eroare = "Toate campurile sunt obligatorii!";
    } elseif (strlen($nume) < 2) {
        $eroare = "Numele piesei trebuie să aibă minim 2 caractere!";
    } elseif (strlen($locatie) < 4) {
        $eroare = "Locatia trebuie să aibă minim 4 caractere!";
    } elseif (strtotime($data) === false) {
        $eroare = "Data introdusa nu sunt valida!";
    } elseif (strtotime($ora) === false) {
        $eroare = "Ora introdusa nu sunt valida!";    
                } else {


        // Adaugam programul in baza de date
        if  (isset($id) && $id != "") {
            $sql = "UPDATE program SET nume='$nume', data='$data', ora='$ora', locatie='$locatie' WHERE id='$id'";
        } else {
            $sql = "INSERT INTO program (nume, data, ora, locatie) VALUES ('$nume', '$data', '$ora', '$locatie')";
        }

        if (mysqli_query($conn, $sql)) {
            $mesaj = "Programul a fost adaugat cu succes!";
        } else {
            $eroare = "A aparut o eroare la adaugarea programului: " . mysqli_error($conn);
        }
    }
}
    

if (isset($_POST['sterge'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM program WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        $mesaj = "Programul a fost sters cu succes!";
    } else {
        $eroare = "A aparut o eroare la stergerea programului: " . mysqli_error($conn);
    }
}


// Afisam butoanele si datele din baza de date

$sql = "SELECT * FROM program";
$result = mysqli_query($conn, $sql);
?>

<h2>Program</h2>

<?php
// Verificăm dacă avem date în baza de date
if (mysqli_num_rows($result) > 0) {
    // Afisam tabelul cu datele din baza de date
    echo "<table>";
    echo "<tr><th>ID</th><th>Nume</th><th>Data</th><th>Ora</th><th>Locatie</th><th>Actiuni</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nume'] . "</td><td>" . $row['data'] . "</td><td>" . $row['ora'] . "</td><td>" . $row['locatie'] . "</td>";
        echo "<td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='submit' name='sterge' value='Sterge' class='delete-button'>
                    <input type='submit' name='selecteaza' value='Selecteaza Pentru Modificare'>
                </form>
              </td></tr>";
    }
    echo "</table>";
} else {
    // Dacă nu avem date, afișăm un mesaj corespunzător
    echo "Nu avem program disponibil.";
}
?>

<form method="POST" action="">
  <h3>Adaugă program</h3>
  <?php if (isset($eroare)) {
    echo "<p class='error-message'>" . $eroare . "</p>";
  } ?>
  <?php if (isset($mesaj)) {
    echo "<p class='success-message'>" . $mesaj . "</p>";
  } ?>
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <label for="nume">Nume:</label><br>
  <input type="text" name="nume" value="<?php echo $nume; ?>"><br>
  <label for="data">Data: aaaa/ll/zz</label><br>
  <input type="text" name="data" value="<?php echo $data; ?>"><br>
  <label for="ora">Ora:</label><br>
  <input type="text" name="ora" value="<?php echo $ora; ?>"><br>
  <label for="locatie">Locatie:</label><br>
  <textarea name="locatie"><?php echo $locatie; ?></textarea><br>
  <input type="submit" name="adauga" value="Adaugă / Modifică">
</form>
</body>

<?php
require './inc/footer.php';
?>