<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "expertmove";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$email = $_POST['email'] ?? '';
$passwordd = $_POST['passwordd']??'';

$role = $_POST['role'] ?? ''; // Rôle sélectionné
$wilaya = $_POST['wilaya']??''; // Ajout du champ wilaya

// Vérifier le rôle et insérer les données dans la bonne table
if ($role == "utilisateur") {
    $sql = "INSERT INTO utilisateur (nom, prenom, telephone, email, passwordd,wilaya) VALUES (?,?, ?, ?, ?, ?)";
} elseif ($role == "chauffeur") {
    $licence = $_POST['licence'] ?? '';
    $vehicule = $_POST['vehicule'] ?? '';
    $sql = "INSERT INTO chauffeur (nom, prenom, telephone, email, passwordd, licence, vehicule,wilaya) VALUES (?,?, ?, ?, ?, ?, ?, ?)";
} elseif ($role == "entreprise") {
    $nom_entreprise = $_POST['nom_entreprise'] ?? '';
    $registre = $_POST['registre'] ?? '';
    $sql = "INSERT INTO entreprise (nom_entreprise, telephone, email, passwordd, registre,wilaya) VALUES (?,?, ?, ?, ?, ?)";
} else {
    die("Rôle invalide !");
}

// Exécuter la requête préparée
$stmt = $conn->prepare($sql);
if ($role == "utilisateur") {
    $stmt->bind_param("ssssss", $nom, $prenom, $telephone, $email, $passwordd,$wilaya);
} elseif ($role == "chauffeur") {
    $stmt->bind_param("ssssssss", $nom, $prenom, $telephone, $email, $passwordd, $licence, $vehicule,$wilaya);
} elseif ($role == "entreprise") {
    $stmt->bind_param("ssssss", $nom_entreprise, $telephone, $email, $passwordd, $registre,$wilaya);
}

if ($stmt->execute()) {
    echo "Inscription réussie !";
} else {
    echo "Erreur : " . $stmt->error;
}

$stmt->close();
$conn->close();



?>
