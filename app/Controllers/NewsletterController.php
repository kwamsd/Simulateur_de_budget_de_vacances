<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class NewsletterController {
    public function subscribe() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            // Ajoute l'email dans la base de données
            $model = new NewsletterModel();
            $model->addEmail($email);

            // Envoie un email de confirmation à l'utilisateur
            $this->sendConfirmationEmail($email);

            $this->sendNotificationToAdmin($email);

            // Garde le contenu de la page inchangé
            header('Location: ' . $_SERVER['HTTP_REFERER']); 
            exit();
        }
    }

    // Envoi d'un email de confirmation à l'utilisateur
    private function sendConfirmationEmail($email) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'bangyoy31@gmail.com';
            $mail->Password = 'avdsihaliqglqtbs'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('tonemail@gmail.com', 'Travel Simulator');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Confirmation d\'inscription à la newsletter';
            $mail->Body = 'Merci de vous être inscrit à notre newsletter !';

            $mail->send();
        } catch (Exception $e) {
            echo "L'email de confirmation n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
        }
    }

    // Envoi d'un email de notification à toi-même (l'administrateur)
    private function sendNotificationToAdmin($email) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'bangyoy31@gmail.com';
            $mail->Password = 'avdsihaliqglqtbs'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            
            $mail->setFrom('bangyoy31@gmail.com', 'Travel Simulator');
            $mail->addAddress('bangyoy31@gmail.com'); 
            
            $mail->isHTML(true);
            $mail->Subject = 'Nouvelle inscription à la newsletter';
            $mail->Body = "Un nouvel utilisateur s'est inscrit à la newsletter avec l'email suivant : $email.";

            $mail->send();
        } catch (Exception $e) {
            echo "L'email de notification n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
        }
    }
}