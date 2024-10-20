<?php
require_once '../vendor/autoload.php';
require_once '../app/Controllers/BudgetController.php';
require_once '../app/Controllers/NewsletterController.php';
require_once '../app/Models/BudgetModel.php';
require_once '../app/Models/NewsletterModel.php';
require_once '../app/Router.php';

// Lancer le routeur
Router::route($_SERVER['REQUEST_URI']);