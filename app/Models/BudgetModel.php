<?php

class BudgetModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('pgsql:host=localhost;port=5432;dbname=budget', 'postgres', 'kwams20');
    }

    public function getBudgetData($destination, $people, $days, $budgetType, $flightCost) {
        // Variables de base pour les différents types de budgets
        $transportCosts = ['low' => 20, 'medium' => 50, 'high' => 100];
        $accommodationCosts = ['low' => 50, 'medium' => 100, 'high' => 200];
        $foodCosts = ['low' => 10, 'medium' => 25, 'high' => 50];
        $activitiesCosts = ['low' => 5, 'medium' => 20, 'high' => 40];
        $miscellaneousCosts = ['low' => 10, 'medium' => 30, 'high' => 50];
        $subscriptionCost = 30; // Abonnement si le voyage dépasse 14 jours

        // Calcul des coûts totaux
        $transport = $flightCost + ($transportCosts[$budgetType] * $days);
        $accommodation = $accommodationCosts[$budgetType] * $days * $people;
        $food = $foodCosts[$budgetType] * $days * $people;
        $activities = $activitiesCosts[$budgetType] * $days * $people;
        $miscellaneous = $miscellaneousCosts[$budgetType] * $days * $people;
        $subscription = $days > 14 ? $subscriptionCost : 0;

        $total = $transport + $accommodation + $food + $activities + $miscellaneous + $subscription;

        
        $stmt = $this->db->prepare('
            INSERT INTO budgets (destination, people, days, budget_type, flight_cost, transport, accommodation, food, activities, miscellaneous, subscription, total)
            VALUES (:destination, :people, :days, :budgetType, :flightCost, :transport, :accommodation, :food, :activities, :miscellaneous, :subscription, :total)
        ');
        $stmt->execute([
            ':destination' => $destination,
            ':people' => $people,
            ':days' => $days,
            ':budgetType' => $budgetType,
            ':flightCost' => $flightCost,
            ':transport' => $transport,
            ':accommodation' => $accommodation,
            ':food' => $food,
            ':activities' => $activities,
            ':miscellaneous' => $miscellaneous,
            ':subscription' => $subscription,
            ':total' => $total
        ]);

        return [
            'destination' => $destination,
            'people' => $people,
            'days' => $days,
            'budgetType' => $budgetType,
            'flight' => $flightCost,
            'transport' => $transport,
            'accommodation' => $accommodation,
            'food' => $food,
            'activities' => $activities,
            'miscellaneous' => $miscellaneous,
            'subscription' => $subscription,
            'total' => $total
        ];
    }
}