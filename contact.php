<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['message'])) {
        $nom = $_POST['name'];
        $email = $_POST['email'];
        $message = htmlspecialchars($_POST['message']);

        $to = 'angamancedrick@gmail.com';
        $subject = 'Message depuis le formulaire de contact';

        $mail = new PHPMailer(true);

        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'angamancedrick@gmail.com'; // Mettez votre adresse Gmail ici
            $mail->Password   = 'ztzg ixxg zzew bcxw'; // Mettez votre mot de passe Gmail ici
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Destinataire
            $mail->setFrom($email, $nom);
            $mail->addAddress($to);

            // Contenu du message
            $mail->isHTML(true);
            $mail->Subject = $subject;

            // Organisez le corps de l'e-mail avec un en-tête "Reply-To"
            $mail->Body = '<h1>Message envoyé depuis la page Contact de GroupeLaroche.com</h1>
                           <p>
                           <b>Nom : </b>' . $nom . '<br>
                           <b>Email : </b>' . $email . '<br>
                           <b>Message : </b>' . $message . '</p>';

            // Ajoutez un en-tête "Reply-To" avec l'adresse e-mail de l'expéditeur
            $mail->addReplyTo($email, $nom);

            $mail->send();

            // Return a JSON response
            echo json_encode(['success' => true, 'message' => 'Votre message a été envoyé avec succès.']);
        } catch (Exception $e) {
            // Return a JSON response with error details
            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'envoi du message.', 'error' => $mail->ErrorInfo]);
        }
    }
}
?>
