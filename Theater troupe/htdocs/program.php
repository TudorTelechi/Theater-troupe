
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

<head>
    <title>Membri</title>
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
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        nav {
            text-align: center;
            margin-bottom: 20px;
        }

        nav a {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        nav a:hover {
			background-color: red;
			color: #fff;
		}
    </style>
</head>

<body>
    <h2>Optiuni</h2>

    <nav>
        <a href="index.php">Home</a>
        <a href="repertoriu.php">Repertoriu</a>
        <a href="membri.php">Echipa</a>
        <a href="galerie.php">Galerie</a>
        <a href="contact.php">Contact</a>
        <a href="admin">Login</a>
    </nav>
<?php

include 'conexiune.php';

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




// Afisam butoanele si datele din baza de date
$sql = "SELECT * FROM program";
$result = mysqli_query($conn, $sql);
?>

<h2>program</h2>

<?php
// Verificăm dacă avem date în baza de date
if (mysqli_num_rows($result) > 0) {
    // Afisam tabelul cu datele din baza de date
    echo "<table>";
    echo "<tr><th>ID</th><th>nume</th><th>data</th><th>ora</th><th>locatie</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nume'] . "</td><td>" . $row['data'] . "</td><td>" . $row['ora'] . "</td><td>" . $row['locatie'] . "</td>";
        echo "<td>
              </td></tr>";
    }
    echo "</table>";
} else {
    // Dacă nu avem date, afișăm un mesaj corespunzător
    echo "Nu avem program disponibil.";
}
?>
</body>

</html>
