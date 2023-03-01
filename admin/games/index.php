<?php

require_once '../_inc/header.php';
require_once '../_inc/nav.php';
require_once '../_inc/functions.php';

// Récupération des jeux vidéo

?>

<main class="container mt-5">
  <h1 class="text-center mb-5">Liste des jeux vidéo</h1>

  <div class="row row-cols-1 row-cols-md-5 g-4">
    <?php foreach ($games as $game) : ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= $game['image'] ?>" class="card-img-top" alt="<?= $game['title'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $game['title'] ?></h5>
            <p class="card-text">Prix : <?= $game['price'] ?> €</p>
            <p class="card-text">Date de sortie : <?= $game['release_date'] ?></p>
          </div>
          <div class="card-footer">
            <a href="edit.php?id=<?= $game['id'] ?>" class="btn btn-primary">Modifier</a>
            <a href="delete.php?id=<?= $game['id'] ?>" class="btn btn-danger">Supprimer</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</main>

<?php

require_once '../_inc/footer.php';

?>
