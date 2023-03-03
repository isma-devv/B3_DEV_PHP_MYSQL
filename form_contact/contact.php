<?php
require_once '_inc/header.php';
require_once '_inc/nav.php';

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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="subject">Subject :</label>
                    <input type="text" name="subject" class="form-control" id="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea name="message" class="form-control" id="message"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])) {
    echo "<div class='container mt-5'>";
    echo "<div class='row justify-content-center'>";
    echo "<div class='col-md-6'>";
    echo "<p>Votre email : " . htmlspecialchars($_POST['email']) . "</p>";
    echo "<p>Objet : " . htmlspecialchars($_POST['subject']) . "</p>";
    echo "<p>Message : " . htmlspecialchars($_POST['message']) . "</p>";
    echo "<p>Date de soumission : " . $submissionDate . "</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

require_once '_inc/footer.php';
?>
