<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merryweather Car dealer</title>
    <link rel="stylesheet" href="./CSS/styles.css"> <!-- Verwijzing naar de CSS -->
</head>

<body>

    <!-- Header sectie -->
    <header class="header">
        <h1>Merryweather</h1>
    </header>

    <?php include './php/navbar.php' ?>
    <!-- Hoofdsectie -->
    <section class="hero">
        <p>Welkom bij Merryweather - We beschermen je tegen slechte deals</p>
    </section>

    <!-- Lijst van auto's -->
    <section class="container">
        <div class="car-list">
            <div class="car-card">
                <img src="./Cars/ae4eed840ecdc8f58591720ed2b82fe99cad5c8d.jpg" alt="Auto ">
                <div class="car-info">
                    <h3>Truffade </h3>
                    <p>€5.000.000</p>
                    <a href="#" class="btn">Meer details</a>
                </div>
            </div>
            <div class="car-card">
                <img src="./Cars/06a0fa-4.jpg" alt="Auto 2">
                <div class="car-info">
                    <h3>Sultan RS</h3>
                    <p>€63.000</p>
                    <a href="" class="btn">Meer details</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Car Dealer. Alle rechten voorbehouden.</p>
    </footer>

</body>

</html>