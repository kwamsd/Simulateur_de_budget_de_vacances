<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget PDF></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/result.css">
    <style>
        /* Style global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Merriweather Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            height: 100vh;
            background-image: url("/assets/images/fondresult.avif");
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* header{
    border: none;
} */

        nav {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            width: 100%;
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-style: normal;
            color: rgb(2, 100, 219);
            background-color: rgb(255, 255, 255);
            text-align: center;
            padding: 10px;
            align-items: center;
        }

        nav h1 {
            width: 10%;
        }

        main {

            margin: 0;
        }

        /* Première section avec l'image et le H1 */
        .budget-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 300px;
            margin: 20px;
            position: relative;
            border: 1px solid;
        }

        .budget-header h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 36px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .budget-header img {
            width: 70%;
            height: 100%;
            object-fit: cover;
        }

        .budget-header .site-image {
            width: 30%;
            height: 100%;
            background-image: url("/assets/images/fondblock.jpg");
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            text-align: center;
            font-family: "Bebas Neue", sans-serif;
        }

        /* Section des critères sélectionnés */
        .selection-criteria {
            display: flex;
            justify-content: space-around;
            background-image: url("/assets/images/fondblock.jpg");
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }

        .selection-criteria p {
            background-color: rgb(255, 255, 255);
            padding: 15px;
            border-radius: 8px;
            color: rgb(2, 100, 219);
            width: 20%;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Détails du budget */

        .details-titre {
            text-align: center;
            padding: 20px;

        }

        .budget-details {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }

        .budget-details p {
            width: 50%;
            padding: 15px;
            margin: 10px;
            color: rgb(134, 134, 134);
            font-weight: 800;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .budget-details p:hover {
            transform: translateY(-5px);
            color: white;
        }

        /* Couleurs pour chaque critère */
        .transport:hover {
            background-color: #4caf4f2e;
        }

        .hebergement:hover {
            background-color: #2196F32e;
        }

        .restauration:hover {
            background-color: #FFEB3B2e;
            color: black;
        }

        .loisirs:hover {
            background-color: #FF98002e;
        }

        .miscellaneous:hover {
            background-color: #9C27B02e;
        }

        .Abonnement:hover {
            background-color: #E91E632e;
        }

        .budget-details p {
            background-color: rgba(0, 0, 0, 0.154);
        }

        /* Budget total */
        .total-budget {
            text-align: center;
            font-size: 24px;
            margin: 30px;
            font-weight: bold;
            background-color: rgb(2, 100, 219);
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Bouton enregistrer en PDF */
        #save-pdf-btn {
            display: block;
            margin: 30px auto;
            background-color: #FF5722;
            color: white;
            padding: 15px 30px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        #save-pdf-btn:hover {
            background-color: #E64A19;
            transform: scale(1.05);
        }


        .site-footer {
            background-color: rgb(255, 255, 255);
            padding: 45px 0 20px;
            font-size: 15px;
            line-height: 24px;
            color: rgb(2, 100, 219);
        }

        .site-footer .container-footer {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
        }

        .site-footer .footer-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            margin-bottom: 20px;
        }

        .about-section,
        .newsletter-section,
        .social-section {
            width: 30%;
            background-color: rgba(240, 240, 240, 0.9);
            padding: 10px 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .site-footer h3 {
            color: rgb(2, 100, 219);
            font-family: "Bebas Neue", sans-serif;
            margin-bottom: 15px;
        }

        .site-footer input[type="email"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            width: 70%;
        }

        .site-footer button {
            background-color: rgb(2, 100, 219);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .site-footer button:hover {
            background-color: #004d99;
        }

        .social-icons {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .social-icons li {
            display: inline-block;
        }

        .social-icons a {
            background-color: rgb(2, 100, 219);
            color: white;
            font-size: 16px;
            display: inline-block;
            line-height: 44px;
            width: 44px;
            height: 44px;
            text-align: center;
            border-radius: 100%;
            transition: all .2s linear;
        }

        .social-icons a:hover {
            background-color: #004d99;
        }

        .copyright-text {
            margin-top: 20px;
            color: rgb(2, 100, 219);
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 767px) {
            .footer-row {
                flex-direction: column;
                align-items: center;
            }

            .about-section,
            .newsletter-section,
            .social-section {
                width: 100%;
                text-align: center;
                margin-bottom: 20px;
            }
        }
    </style>
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
    </main>
    <?php include '../app/Views/budget/footer.php'; ?>
    <script src="/assets/js/save_pdf.js"></script>
</body>

</html>