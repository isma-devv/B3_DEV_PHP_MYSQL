<?php

function checkAuthentication() {
    // Vérifier si la clé "user" existe en session
    if (!array_key_exists("user", $_SESSION)) {
        // Si la clé "user" n'existe pas, créer une entrée "notice" dans la session contenant le message "Accès refusé"
        $_SESSION["notice"] = "Accès refusé";
        // Rediriger vers la page index.php
        header("Location: index.php");
        // Arrêter l'exécution du script
        exit();
    }
}
