<?php

class Router {
    public static function route($uri) {
        $uri = trim($uri, '/');
        if ($uri == '') {
            (new BudgetController())->index();
        } elseif ($uri == 'result') {
            (new BudgetController())->result();
        } elseif ($uri == 'savepdf') {
            (new BudgetController())->savepdf();
        } elseif ($uri == 'newsletter') {
            (new NewsletterController())->subscribe(); 
        } elseif ($uri == 'thanks') {
            require_once '../app/Views/budget/thanks.php';
        } else {
            echo "404 - Page non trouvée";
        }
    }
}