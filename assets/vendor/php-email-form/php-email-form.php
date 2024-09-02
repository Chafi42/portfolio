<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Valider les données du formulaire
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Veuillez remplir tous les champs du formulaire.";
        exit;
    }

    // Configurer les paramètres de l'e-mail
    $to = "chafiaadssi42@gmail.com";
    $headers = "From: $name <$email>";
    $body = "Nom: $name\n\nEmail: $email\n\nSujet: $subject\n\nMessage:\n$message";

    // Envoyer l'e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Votre e-mail a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de l'e-mail. Veuillez réessayer.";
    }
}