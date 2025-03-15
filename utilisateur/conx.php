<?php
session_start();
require_once __DIR__ . '/../config/config.php'; // Assure-toi que config.php est bien trouvé

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';

    if (!empty($email) && !empty($password) && !empty($role)) {
        try {
            // Déterminer la table en fonction du rôle sélectionné
            $table = '';
            switch ($role) {
                case 'chauffeur':
                    $table = 'chauffeur';
                    break;
                case 'entreprise':
                    $table = 'entreprise';
                    break;
                case 'utilisateur':
                    $table = 'utilisateur';
                    break;
                default:
                    echo "Rôle invalide.";
                    exit;
            }

            // Préparer la requête SQL pour la bonne table
            $stmt = $pdo->prepare("SELECT * FROM $table WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nom'] = $user['nom'];

                // Redirection selon le rôle
                switch ($role) {
                    case 'chauffeur':
                        header('Location: ../chauffeur/dashbord_chauffeur.php');
                        break;
                    case 'entreprise':
                        header('Location: ../entreprise/dachbord_entreprise.php');
                        break;
                    case 'utilisateur':
                        header('Location: ../utilisateur/accueil.php');
                        break;
                }
                exit;
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
} else {
    echo "Requête invalide.";
}
