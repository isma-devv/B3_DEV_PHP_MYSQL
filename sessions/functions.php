<?php

// Créer une connexion à la base de données
function dbConnect()
{
    $host = 'localhost';
    $user = 'username';
    $password = 'password';
    $dbname = 'database';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }
}

// Définir les contraintes de validation du formulaire d'authentification
function validateLoginForm($formData)
{
    $errors = [];

    if (empty($formData['email'])) {
        $errors[] = 'L\'adresse e-mail est obligatoire';
    }

    if (empty($formData['password'])) {
        $errors[] = 'Le mot de passe est obligatoire';
    }

    return $errors;
}

// Vérifier l'existence d'un administrateur à l'aide de son email
function getAdminByEmail($email)
{
    $pdo = dbConnect();
    $stmt = $pdo->prepare('SELECT * FROM admin WHERE email = :email');
    $stmt->execute(['email' => $email]);
    return $stmt->fetch();
}

// Vérifier l'identifiant et le mot de passe d'un administrateur
function authenticateAdmin($email, $password)
{
    $admin = getAdminByEmail($email);

    if ($admin && password_verify($password, $admin['password'])) {
        return $admin;
    } else {
        return false;
    }
}

// Processus de soumission du formulaire d'authentification
function processLoginForm()
{
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $errors = validateLoginForm($_POST);

        if (empty($errors)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($admin = getAdminByEmail($email)) {
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['user'] = $admin['id'];
                    header('Location: index.php');
                    exit;
                }
            }

            $_SESSION['notice'] = 'Identifiants incorrects';
        } else {
            $_SESSION['notice'] = 'Le formulaire contient des erreurs';
        }

        $_SESSION['errors'] = $errors;
        header('Location: login.php');
        exit;
    }
}

// Processus de soumission du formulaire de contact
function processContactForm()
{
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

        // Valider les données du formulaire
        $errors = validateContactForm($name, $email, $message);

        if (empty($errors)) {
            // Envoyer l'e-mail de contact
            sendContactEmail($name, $email, $message);

            // Ajouter un message de confirmation dans la session
            $_SESSION['notice'] = 'Vous serez contacté dans les plus brefs délais.';

            // Rediriger l'utilisateur vers la page d'accueil
            header('Location: index.php');
            exit;
       
        }

        // Définir les contraintes de validation du formulaire de contact
        function validateContactForm($name, $email, $message)
        {
        $errors = [];
        
        if (empty($name)) {
            $errors[] = 'Le nom est obligatoire';
        }
        
        if (empty($email)) {
            $errors[] = 'L\'adresse e-mail est obligatoire';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'adresse e-mail n\'est pas valide';
        }
        
        if (empty($message)) {
            $errors[] = 'Le message est obligatoire';
        }
        
        return $errors;
    }

    // Envoyer l'e-mail de contact
    function sendContactEmail($name, $email, $message)
    {
    // Code pour envoyer l'e-mail
    }
    
    // Fonction pour récupérer un message flash de la session
    function getSessionFlashMessage($key)
    {
    if (array_key_exists($key, $_SESSION)) {
    $message = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $message;
    } else {
    return null;
    }
    }
}}
?>