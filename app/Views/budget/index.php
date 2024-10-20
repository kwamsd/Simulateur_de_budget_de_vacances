<?php
// Vérifie si la session n'est pas déjà démarrée avant de l'initialiser
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://kit.fontawesome.com/4625fad12f.js" crossorigin="anonymous"></script>
    <title>Simulateur de Budget de Vacances</title>
</head>

<body>
    <header>
        <nav>
            <!-- <h1>Travel Simulator</h1> -->
            <!-- <div> -->
                <p>Simulateur</p>
                <h1>Travel Simulator</h1>
                <p>Partenaires</p>
            <!-- </div> -->
        </nav>
        <img src="/assets/images/fondecran.png" alt="">
    </header>
    <main>
        <div class="container">
            <form action="/result" method="POST">
                <div class="form-container">
                    <div class="search">
                        <select name="destination" class="search-bar">
                            <option value="">Choisissez votre destination...</option>
                            <option value="Paris">Paris</option>
                            <option value="New York">New York</option>
                            <option value="Tokyo">Tokyo</option>
                            <option value="Londres">Londres</option>
                            <option value="Sydney">Sydney</option>
                            <option value="Berlin">Berlin</option>
                            <option value="Dubai">Dubai</option>
                            <option value="Rome">Rome</option>
                            <option value="Los Angeles">Los Angeles</option>
                            <option value="Moscou">Moscou</option>
                        </select>
                    </div>

                    <!-- Blocs de sélection -->
                    <div class="criteria-container">
                        <div class="criteria-block">
                            <label for="people">Nbre de personnes</label>
                            <input type="number" id="people" name="people" min="1" max="10">
                        </div>
                        <div class="criteria-block">
                            <label for="days">Nbre de jours</label>
                            <input type="number" id="days" name="days" min="1" max="30">
                        </div>
                        <div class="criteria-block">
                            <label for="budget">Type de budget</label>
                            <select id="budget" name="budget">
                                <option value="low">Petit budget</option>
                                <option value="medium">Moyen budget</option>
                                <option value="high">Gros budget</option>
                            </select>
                        </div>
                        <div class="criteria-block">
                            <label for="flight">Prix du billet</label>
                            <input type="number" id="flight" name="flight" placeholder="Prix moyen">
                        </div>
                        <div class="buttonsub">
                            <button type="submit" class="submit-btn"><i class="fa-solid fa-check"></i></button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </main>
    <?php include '../app/Views/budget/footer.php'; ?>
</body>

</html>