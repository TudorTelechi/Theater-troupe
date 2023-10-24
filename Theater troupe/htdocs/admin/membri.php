<!DOCTYPE html>
<html>

<head>
    <title>Repertoriu</title>
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

include './inc/header.php';

$id = "";
$nume = "";
$functie = "";
$descriere = "";

if (isset($_POST['selecteaza'])) {
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM membrii where id='" . mysqli_escape_string($conn, $id) . "'");
    $row = mysqli_fetch_assoc($query);

    $nume = $row['nume'];
    $functie = $row['functie'];
    $descriere = $row['descriere'];
}

// Verificam daca s-a trimis un formular de adaugare
if (isset($_POST['adauga'])) {

    // Validam datele din formular
    $id = $_POST["id"];
    $nume = $_POST['nume'];
    $functie = $_POST['functie'];
    $descriere = $_POST['descriere'];


    // Verificam daca toate campurile sunt completate
    if (empty($nume) || empty($functie) || empty($descriere)) {
        $eroare = "Toate campurile sunt obligatorii!";
    } elseif (strlen($nume) < 2) {
        $eroare = "Numele trebuie să aibă minim 2 caractere!";
    } elseif (strlen($functie) < 3) {
        $eroare = "Numele functiei trebuie să aibă minim 3 caractere!";
    } elseif (strlen($descriere) < 5) {
        $eroare = "Textul descrieii trebuie să aibă minim 5 caractere!";
    } else {
        // Adaugam membriil in baza de date
        if (isset($id) && $id != "") {
            $sql = "UPDATE membrii SET nume='$nume', functie='$functie', descriere='$descriere' WHERE id='$id'";
        } else {
            $sql = "INSERT INTO membrii (nume, functie, descriere) VALUES ('$nume', '$functie', '$descriere')";
        }

        if (mysqli_query($conn, $sql)) {
            $mesaj = "membriil a fost adaugat cu succes!";
        } else {
            $eroare = "A aparut o eroare la adaugarea membriilui: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['sterge'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM membrii WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        $mesaj = "membriil a fost sters cu succes!";
    } else {
        $eroare = "A aparut o eroare la stergerea membriilui: " . mysqli_error($conn);
    }
}


// Afisam butoanele si datele din baza de date
$sql = "SELECT * FROM membrii";
$result = mysqli_query($conn, $sql);
?>

<h2>Membri</h2>

<?php
// Verificăm dacă avem date în baza de date
if (mysqli_num_rows($result) > 0) {
    // Afisam tabelul cu datele din baza de date
    echo "<table>";
    echo "<tr><th>ID</th><th>Nume</th><th>Functie</th><th>Descriere</th><th>Actiuni</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nume'] . "</td><td>" . $row['functie'] . "</td><td>" .  "</td><td>" . $row['descriere'] . "</td>";
        echo "<td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='submit' name='sterge' value='Sterge'>
                    <input type='submit' name='selecteaza' value='Selecteaza Pentru Modificare'>
                </form>
              </td></tr>";
    }
    echo "</table>";
} else {
    // Dacă nu avem date, afișăm un mesaj corespunzător
    echo "Nu avem membrii disponibil.";
}
?>

<form method="POST" action="">
    <h3>Adaugă membrii</h3>
    <?php if (isset($eroare)) {
        echo "<p style='color:red'>" . $eroare . "</p>";
    } ?>
    <?php if (isset($mesaj)) {
        echo "<p style='color:green'>" . $mesaj . "</p>";
    } ?>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <label for="nume">Nume:</label><br>
    <input type="text" name="nume" value="<?php echo $nume; ?>"><br>
    <label for="functie">Functie:</label><br>
    <input type="text" name="functie" value="<?php echo $functie; ?>"><br>
    <label for="descriere">Descriere:</label><br>
    <textarea name="descriere"><?php echo $descriere; ?></textarea><br>
    <input type="submit" name="adauga" value="Adaugă / Modifică">
</form>

<?php
include './inc/footer.php';
?>