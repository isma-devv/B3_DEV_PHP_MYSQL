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

function processLoginForm($email, $password) {
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    header('Location: index.php');
    exit();
  } else {
    return 'Invalid email or password';
  }
}

function validateLoginForm($email, $password) {
    $errors = array();

    if (empty($email)) {
        $errors[] = "L'email est obligatoire.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email est invalide.";
    }

    if (empty($password)) {
        $errors[] = "Le mot de passe est obligatoire.";
    }

    return $errors;
}

function adminExists($email) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->rowCount() > 0;
}

function authenticateAdmin($email, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$admin) {
        return false;
    }
    
    return password_verify($password, $admin['password']);
}



?>