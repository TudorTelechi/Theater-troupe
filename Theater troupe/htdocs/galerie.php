<!DOCTYPE html>
<html>

<head>
    <title>Galerie de fotografii</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        div {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        img {
            width: 300px;
            height: auto;
            margin: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        nav {
            text-align: center;
            margin-top: 20px;
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
    <h1>Galerie de fotografii</h1>
    <div>
        <img src="imagini/imagine1.png" alt="Spectacol 1">
        <img src="imagini/imagine2.png" alt="Spectacol 2">
        <img src="imagini/imagine3.png" alt="Spectacol 3">
        <img src="imagini/imagine4.png" alt="Spectacol 4">
        <img src="imagini/imagine5.png" alt="Spectacol 5">
        <img src="imagini/imagine6.png" alt="Spectacol 6">
    </div>
    <nav>
        <a href="index.php">Home</a> |
        <a href="membri.php">Echipa</a> |
        <a href="repertoriu.php">Repertoriu</a> |
        <a href="program.php">Program</a> |
        <a href="contact.php">Contact</a>
    </nav>
</body>

</html>
