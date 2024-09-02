<?php
/**
 * Nécessite la bibliothèque "PHP Email Form"
 * La bibliothèque "PHP Email Form" est disponible uniquement dans la version pro du modèle
 * La bibliothèque doit être téléchargée à : vendor/php-email-form/php-email-form.php
 * Pour plus d'infos et d'aide : https://bootstrapmade.com/php-email-form/
 */

// Remplacez contact@example.com par votre véritable adresse email de réception
$receiving_email_address = 'chafiaadssi42@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Impossible de charger la bibliothèque "PHP Email Form" !');
}

$contact = new PHP_Email_Form;
$contact->ajax = true; // Utilise le mode AJAX pour envoyer le formulaire

$contact->to = $receiving_email_address; // Adresse email où le message sera envoyé
$contact->from_name = $_POST['name']; // Nom de l'expéditeur
$contact->from_email = $_POST['email']; // Email de l'expéditeur
$contact->subject = $_POST['subject']; // Sujet du message

// Décommentez le code ci-dessous si vous souhaitez utiliser SMTP pour envoyer les emails.
// Vous devez entrer vos informations SMTP correctes.
$contact->smtp = array(
  'host' => 'smtp.gmail.com', // Hôte SMTP (exemple : smtp.gmail.com)
  'username' => 'Chafi Aadssi', // Nom d'utilisateur SMTP
  'password' => 'Chafbossrcm42.', // Mot de passe SMTP
  'port' => '587' // Port SMTP (généralement 587 pour TLS ou 465 pour SSL)
);

$contact->add_message($_POST['name'], 'De'); // Ajoute le nom de l'expéditeur au message
$contact->add_message($_POST['email'], 'Email'); // Ajoute l'email de l'expéditeur au message
$contact->add_message($_POST['message'], 'Message', 10); // Ajoute le contenu du message

echo $contact->send(); // Envoie le message et affiche le résultat
?>
