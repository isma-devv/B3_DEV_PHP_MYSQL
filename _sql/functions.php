<?php

// Fonction de connexion à la base de données
function connectToDatabase()
{
    $host = 'localhost';
    $dbname = 'videogames';
    $username = 'root';
    $password = 'root';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    return $pdo;
}

// Fonction pour sélectionner un nombre aléatoire de jeux vidéo
function selectRandomGames($limit = 3)
{
    $pdo = connectToDatabase();
    $stmt = $pdo->prepare('SELECT * FROM game ORDER BY RAND() LIMIT :limit');
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $games = $stmt->fetchAll();
    return $games;
}

// Fonction pour sélectionner tous les jeux vidéo
function selectAllGames()
{
    $pdo = connectToDatabase();
    $stmt = $pdo->query('SELECT * FROM game');
    $games = $stmt->fetchAll();
    return $games;
}

// Fonction pour sélectionner un jeu vidéo par son identifiant
function selectGameById($id)
{
    $pdo = connectToDatabase();
    $stmt = $pdo->prepare('SELECT * FROM game WHERE id = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $game = $stmt->fetch();
    return $game;
}

?>
