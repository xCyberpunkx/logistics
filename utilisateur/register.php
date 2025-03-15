<?php
session_start();
require_once __DIR__ . '/../config/config.php'; // Assure-toi que config.php est bien trouvé

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $email = $_POST['email'] ?? '';
    $passwordd = $_POST['password'] ?? '';
    $wilaya = $_POST['wilaya'] ?? '';
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

            // Insérer les données dans la table correspondante
            $stmt = $pdo->prepare("INSERT INTO $table (nom, prenom, telephone, email, passwordd, wilaya) VALUES (:nom, :prenom, :telephone, :email, :passwordd, :wilaya)");
            $stmt->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'telephone' => $telephone,
                'email' => $email,
                'passwordd' => $passwordd, // No password hashing
                'wilaya' => $wilaya
            ]);

            echo "Compte créé avec succès.";
            header('Location: ../utilisateur/accueil.php');
            exit;
        } catch (PDOException $e) {
            die("Erreur lors de l'inscription : " . $e->getMessage());
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
} else {
    echo "Requête invalide.";
}
