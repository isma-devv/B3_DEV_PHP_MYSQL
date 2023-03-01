<?php
require_once '_inc/header.php';
require_once '_inc/nav.php';
require_once '_inc/functions.php';
processContactForm();
?>

<?php

if(isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Récupération de la date de soumission
    $submissionDate = new DateTime();
    $submissionDate->setTimestamp($_SERVER['REQUEST_TIME']);
    $submissionDate = $submissionDate->format('d/m/Y H:i:s');
}
?>

<form method="post">
    <p>
        <label>Email :</label>
        <input type="email" name="email" value="<?= getValues()["email"] ?? null ?>">
    </p>
    <p>
        <label>Subject : </label>
        <input type="text" name="subject">
    </p>
    <p>
        <label>Message :</label><br>
        <textarea name="message"></textarea>
    </p>
    <p>
        <input type="submit" name="submit">
    </p>
</form>

<?php
if(isset($_POST['submit'])) {
    echo "<p>Votre email : " . htmlspecialchars($_POST['email']) . "</p>";
    echo "<p>Objet : " . htmlspecialchars($_POST['subject']) . "</p>";
    echo "<p>Message : " . htmlspecialchars($_POST['message']) . "</p>";
    echo "<p>Date de soumission : " . $submissionDate . "</p>";
}

require_once '_inc/footer.php';
?>
