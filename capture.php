<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure PHPMailer
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

// Récupération des données (ex: formulaire simple)
$email_user = $_POST['email'] ?? '';

if ($email_user) {

    $mail = new PHPMailer(true);

    try {
        // DEBUG (affiche les erreurs si problème)
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        // CONFIG SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'TON_EMAIL@gmail.com';
        $mail->Password   = 'vlukzvylbqenkhzx'; // ton mot de passe d’application
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Expéditeur / destinataire
        $mail->setFrom('TON_EMAIL@gmail.com', 'Formulaire Test');
        $mail->addAddress('pardogabinemail@gmail.com');

        // Contenu
        $mail->Subject = 'Test formulaire OK';
        $mail->Body    = "Un formulaire a été soumis.\nEmail: $email_user";

        $mail->send();

        echo "Email envoyé avec succès";

    } catch (Exception $e) {
        echo "Erreur: {$mail->ErrorInfo}";
    }
}
?>
