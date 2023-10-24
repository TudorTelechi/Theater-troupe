<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
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

        p {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        li {
            margin-bottom: 10px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
    <h1>Contact</h1>
    <p>Pentru informații suplimentare despre trupa noastră și spectacolele noastre, vă rugăm să ne contactați folosind următoarele detalii:</p>
    <ul>
        <li>Adresa: Strada Teatrului nr. 10, București</li>
        <li>Telefon: 0756 123 456</li>
        <li>E-mail: contact@teatrulnostru.ro</li>
    </ul>
	<!--  
    <form>
        <label for="nume">Nume:</label>
        <input type="text" id="nume" name="nume"><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br>

        <label for="mesaj">Mesaj:</label><br>
        <textarea id="mesaj" name="mesaj" rows="5" cols="40"></textarea><br>

        <input type="submit" value="Trimite">
    </form>
	-->
    <nav>
        <a href="index.php">Home</a> |
        <a href="membri.php">Echipa</a> |
        <a href="repertoriu.php">Repertoriu</a> |
        <a href="program.php">Program</a> |
        <a href="galerie.php">Galerie</a>
    </nav>
</body>

</html>
