<?php
// inclusion du fichier functions.php
require_once('functions.php');

// traitement du formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    processLoginForm();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
</head>
<body>
    <h1>Connexion à l'espace administrateur</h1>

    <form method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>

</body>
</html>
