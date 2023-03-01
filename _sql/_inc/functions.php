<?php

function processContactForm() {
    if(isset($_POST['submit'])) {
        // Récupération des données du formulaire
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Vérification de la validité des données
        if(!isEmail($email)) {
            return "L'adresse email n'est pas valide.";
        }

        if(!isLong($subject) || !isLong($message)) {
            return "Les champs 'Sujet' et 'Message' doivent comporter au moins 10 caractères.";
        }

        // Récupération de la date de soumission
        $submissionDate = new DateTime();
        $submissionDate->setTimestamp($_SERVER['REQUEST_TIME']);
        $submissionDate = $submissionDate->format('d/m/Y H:i:s');

        // Envoi du mail de contact
        $to = "votre-email@example.com";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        $message .= "\r\n\r\nEnvoyé depuis le formulaire de contact le $submissionDate";
        $subject = "Formulaire de contact - $subject";
        mail($to, $subject, $message, $headers);

        return "Votre message a bien été envoyé.";
    }
}

function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function isLong($string) {
    return strlen($string) >= 10;
}

?>
