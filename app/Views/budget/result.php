<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget pour <?= htmlspecialchars($budgetData['destination']); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/result.css">
</head>

<body>
    <header>
        <nav>
            <p>Simulateur</p>
            <h1>Travel Simulator</h1>
            <p>Partenaires</p>
        </nav>
    </header>


    <div class="budget-header">
        <img src="/assets/images/<?= strtolower($budgetData['destination']); ?>.jpg" alt="Image de <?= htmlspecialchars($budgetData['destination']); ?>">
        <div class="site-image">
            <p>Travel Simulator</p>
        </div>
        <h1>Budget pour <?= htmlspecialchars($budgetData['destination']); ?></h1>
    </div>

    <div class="selection-criteria">
        <p>Nombre de personnes : <?= htmlspecialchars($budgetData['people']); ?></p>
        <p>Nombre de jours : <?= htmlspecialchars($budgetData['days']); ?></p>
        <p>Type de budget : <?= htmlspecialchars($budgetData['budgetType']); ?></p>
        <p>Moyenne billet d'avion : <?= htmlspecialchars($budgetData['flight']); ?> €</p>
    </div>
    <main>
        <h2 class="details-titre">Détails du budget :</h2>
        <div class="budget-details">
            <p class="transport">Transport : <?= htmlspecialchars($budgetData['transport']); ?> €</p>
            <p class="hebergement">Hébergement : <?= htmlspecialchars($budgetData['accommodation']); ?> €</p>
            <p class="restauration">Restauration : <?= htmlspecialchars($budgetData['food']); ?> €</p>
            <p class="loisirs">Activités & Loisirs : <?= htmlspecialchars($budgetData['activities']); ?> €</p>
            <p class="miscellaneous">Achats divers : <?= htmlspecialchars($budgetData['miscellaneous']); ?> €</p>
            <?php if ($budgetData['subscription'] > 0): ?>
                <p class="Abonnement">Abonnement : <?= htmlspecialchars($budgetData['subscription']); ?> €</p>
            <?php endif; ?>
        </div>

        <h2 class="total-budget">Budget total : <?= htmlspecialchars($budgetData['total']); ?> €</h2>

        <form id="pdfForm" method="POST" action="/savepdf">
    <input type="hidden" name="budgetData" value="<?= htmlentities(serialize($budgetData)); ?>">
    <button type="submit" class="submit-btn">Enregistrer en PDF</button>
</form>
    </main>
    <?php include '../app/Views/budget/footer.php'; ?>
    <script src="/assets/js/save_pdf.js"></script>
</body>

</html>