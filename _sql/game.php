<?php
// Inclusion des fichiers nécessaires
require_once('functions.php');
require_once('_inc/header.php');
require_once('_inc/nav.php');

// Récupération de l'identifiant du jeu vidéo depuis l'URL
$id = $_GET['id'];

// Récupération des informations du jeu vidéo
$game = getGameById($id);

// Affichage des informations du jeu vidéo
echo '<div class="container">';
echo '<h1>' . $game['title'] . '</h1>';
echo '<img src="' . $game['poster'] . '" alt="' . $game['title'] . '">';
echo '<p><strong>Description :</strong> ' . $game['description'] . '</p>';
echo '<p><strong>Date de sortie :</strong> ' . date_format(date_create($game['release_date']), 'd/m/Y') . '</p>';
echo '<p><strong>Prix :</strong> ' . $game['price'] . ' €</p>';
echo '<a href="#" class="btn btn-primary">Ajouter au panier</a>';
echo '</div>';

// Inclusion du footer
require_once('_inc/footer.php');
?>
