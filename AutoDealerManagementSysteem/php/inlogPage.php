<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merryweather Car dealer</title>
    <link rel="stylesheet" href="../CSS/login.css"> <!-- Verwijzing naar de CSS -->
</head>

<body>

    <!-- Header sectie -->
    <header class="header">
        <h1>Merryweather</h1>
    </header>
    <!-- Hoofdsectie -->
    <section class="hero">
        <form action="../backEnd/AdminFunctions.php" method="POST">
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" placeholder="Gebruikersnaam hier" id="gebruikersnaam" name="username" required>
            <br>
            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" placeholder="Wachtwoord hier" id="wachtwoord" name="password" required>
            <br>
            <input type="submit" value="verzend">
        </form>
    </section>
</body>

</html>