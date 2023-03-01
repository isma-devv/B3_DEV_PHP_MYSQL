<?php
require_once('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ma page d'accueil</title>
</head>
<body>
	<h1>Bienvenue sur ma page d'accueil</h1>

	<div class="games-list">
		<?php foreach($games as $game): ?>
			<div class="game">
				<h2><?php echo $game['title']; ?></h2>
				<img src="<?php echo $game['poster']; ?>" alt="Poster du jeu <?php echo $game['title']; ?>">
				<p>Prix : <?php echo $game['price']; ?> €</p>
				<a href="game.php?id=<?php echo $game['id']; ?>">Consulter</a>
			</div>
		<?php endforeach; ?>
	</div>
	
</body>
</html>
