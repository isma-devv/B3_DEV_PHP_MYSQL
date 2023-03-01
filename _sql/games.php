<?php
// Inclure les fichiers nécessaires
require_once('functions.php');
require_once('_inc/header.php');
require_once('_inc/nav.php');
?>

<div class="container">
    <h1>Nos jeux vidéo</h1>
    <div class="row">
        <?php
        // Récupérer tous les jeux vidéo
        $games = getAllGames();

        // Boucler sur les résultats
        foreach($games as $game) {
        ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="<?php echo $game['poster']; ?>" class="card-img-top" alt="<?php echo $game['title']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $game['title']; ?></h5>
                    <p class="card-text"><?php echo $game['description']; ?></p>
                    <p class="card-text"><strong>Prix :</strong> <?php echo $game['price']; ?> €</p>
                    <a href="game.php?id=<?php echo $game['id']; ?>" class="btn btn-primary">Consulter</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
// Inclure le fichier footer.php
require_once('_inc/footer.php');
?>
