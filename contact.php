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
        $subject = $_POST['subject'];
        $message = htmlspecialchars($_POST['message']);

        $to = 'angamancedrick@gmail.com';

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'angamancedrick@gmail.com';
            $mail->Password   = 'vedp wnno mswt dino';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;


            $mail->setFrom($email, $nom);
            $mail->addAddress($to);


            $mail->isHTML(true);
            $mail->Subject = $subject;

            $mail->Body = "
                <html>
                    <head>
                        <title>$subject</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                line-height: 1.6;
                                color: #333;
                            }
                            .container {
                                max-width: 600px;
                                margin: 0 auto;
                            }
                            h1 {
                                color: #0066cc;
                            }
                            img {
                                max-width: 100px;
                                height: auto;
                                margin-bottom: 20px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <h1>Message envoyé depuis la page Contact de GroupeLaroche.com</h1>
                            <p>
                                <b>Nom :</b> $nom<br>
                                <b>Email :</b> $email<br>
                                <b>Message :</b> $message
                            </p>
                            <hr>
                            <img src='URL_DU_LOGO' alt='Logo de l\'entreprise'>
                            <p>
                                Cordialement,<br>
                                $nom
                            </p>
                        </div>
                    </body>
                </html>";
            $mail->addReplyTo($email, $nom);
            $mail->AddEmbeddedImage('images/service/11.png', 'logo');
            $mail->Body = str_replace('URL_DU_LOGO', 'cid:logo', $mail->Body);

            $mail->send();
            echo json_encode(['success' => true, 'message' => 'Votre message a été envoyé avec succès.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'envoi du message.', 'error' => $mail->ErrorInfo]);
        }
    }
}
?>
