<?php

class NewsletterModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('pgsql:host=localhost;port=5432;dbname=budget', 'postgres', 'kwams20');
    }

    public function addEmail($email) {
        $stmt = $this->db->prepare('INSERT INTO newsletter (email) VALUES (:email)');
        $stmt->execute([':email' => $email]);
    }
}