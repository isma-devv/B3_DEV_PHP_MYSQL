<?php
// Inclure les fichiers de fonctions
require_once 'functions.php';

// Démarrer la session
session_start();

// Vérifier si l'administrateur est connecté
if (!getSessionData('admin')) {
    // Rediriger l'utilisateur vers la page de connexion
    header('Location: login.php');
    exit;
}

// Récupérer l'administrateur connecté
$admin = getSessionData('admin');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace d'administration - Accueil</title>
</head>
<body>
    <h1>Bienvenue dans l'espace d'administration, <?php echo $admin['name']; ?>!</h1>

    <?php
    // Afficher le message de confirmation s'il existe
    $notice = getSessionFlashMessage('notice');
    if ($notice) {
        echo '<p>' . $notice . '</p>';
    }
    ?>

    <p>Que souhaitez-vous faire aujourd'hui ?</p>
    <ul>
        <li><a href="create-article.php">Créer un nouvel article</a></li>
        <li><a href="edit-article.php">Modifier un article existant</a></li>
        <li><a href="delete-article.php">Supprimer un article existant</a></li>
    </ul>

    <p><a href="logout.php">Déconnexion</a></p>
</body>
</html>
