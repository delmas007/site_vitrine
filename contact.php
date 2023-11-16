<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = "smtp.google.com";
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = 'angamancedrick@gmail.com';
    $subject = 'Envoi du formulaire de contact';

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    $success = mail($to, $subject, $message, $headers);

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'envoi de l\'e-mail.']);
    }
} else {
    // Ajoutez une réponse pour les requêtes non POST
    echo json_encode(['success' => false, 'error' => 'Méthode de requête non autorisée.']);
}

