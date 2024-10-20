<?php

use Dompdf\Dompdf;

class BudgetController {
    
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Affiche la page d'accueil (index)
    public function index() {
        require_once '../app/Views/budget/index.php';
    }

    // Méthode pour afficher le résultat du budget
    public function result() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $destination = $_POST['destination'];
            $people = $_POST['people'];
            $days = $_POST['days'];
            $budgetType = $_POST['budget'];
            $flightCost = $_POST['flight'];

            if (!empty($destination) && !empty($people) && !empty($days) && !empty($budgetType) && !empty($flightCost)) {
                $model = new BudgetModel();
                $budgetData = $model->getBudgetData($destination, $people, $days, $budgetType, $flightCost);

                require_once '../app/Views/budget/result.php';
            } else {
                echo "Veuillez remplir tous les champs du formulaire.";
            }
        } else {
            echo "La requête doit être de type POST.";
        }
    }

    // Méthode pour générer et télécharger un PDF
    public function savepdf() {
        if (isset($_POST['budgetData'])) {
            $budgetData = unserialize($_POST['budgetData']);
            
            // Initialisation de Dompdf
            $dompdf = new Dompdf();
            ob_start();
            require_once '../app/Views/budget/pdf_template.php'; // Template du PDF
            $html = ob_get_clean();
    
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            
            // Génération du PDF
            $dompdf->stream("budget_" . $budgetData['destination'] . ".pdf", ["Attachment" => true]);
    
            // Arrêter l'exécution pour éviter de rediriger après téléchargement
            exit(); // Assure que rien d'autre n'est exécuté après le téléchargement
        } else {
            echo "Aucune donnée pour générer le PDF.";
        }
    }
}