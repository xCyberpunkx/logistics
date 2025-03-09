<?php
// Inclure la connexion à la base de données
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et sécurisation des données
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $mot_de_passe = password_hash($_POST['passwordd'], PASSWORD_DEFAULT);
    $type = htmlspecialchars($_POST['type']);
    $licence = isset($_POST['licence']) ? htmlspecialchars($_POST['licence']) : null;
    $vehicule = isset($_POST['vehicule']) ? htmlspecialchars($_POST['vehicule']) : null;
    $nom_entreprise = isset($_POST['nom_entreprise']) ? htmlspecialchars($_POST['nom_entreprise']) : null;
    $registre = isset($_POST['registre']) ? htmlspecialchars($_POST['registre']) : null;

    // Insertion selon le type sélectionné
    if ($type === "utilisateur") {
        $sql = "INSERT INTO utilisateur (nom, email, prenom, telephone, passwordd) 
                VALUES (:nom, :email, :prenom, :telephone, :passwordd)";
        $params = [
            'nom' => $nom,
            'email' => $email,
            'prenom' => $prenom,
            'telephone' => $telephone,
            'passwordd' => $mot_de_passe
        ];
    } elseif ($type === "chauffeur") {
        $sql = "INSERT INTO chauffeur (nom, email, prenom, telephone, passwordd, licence, vehicule) 
                VALUES (:nom, :email, :prenom, :telephone, :passwordd, :licence, :vehicule)";
        $params = [
            'nom' => $nom,
            'email' => $email,
            'prenom' => $prenom,
            'telephone' => $telephone,
            'passwordd' => $mot_de_passe,
            'licence' => $licence,
            'vehicule' => $vehicule
        ];
    } elseif ($type === "entreprise") {
        $sql = "INSERT INTO entreprise (nom, email, prenom, telephone, passwordd, nom_entreprise, registre) 
                VALUES (:nom, :email, :prenom, :telephone, :passwordd, :nom_entreprise, :registre)";
        $params = [
            'nom' => $nom,
            'email' => $email,
            'prenom' => $prenom,
            'telephone' => $telephone,
            'passwordd' => $mot_de_passe,
            'nom_entreprise' => $nom_entreprise,
            'registre' => $registre
        ];
    } else {
        die("⚠️ Erreur : Type invalide.");
    }

    // Exécuter la requête SQL
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    echo "<script>alert('✔️ Utilisateur créé avec succès !'); window.location.href='user.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer Utilisateur - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script>
    function updateFormFields() {
        var userType = document.getElementById("user-type").value;
        // Afficher ou masquer les champs spécifiques supplémentaires
        var entrepriseSection = document.getElementById("entreprise-fields");
        var chauffeurSection = document.getElementById("chauffeur-fields");

        // Masquer par défaut
        entrepriseSection.style.display = "none";
        chauffeurSection.style.display = "none";

        if (userType === "entreprise") {
            entrepriseSection.style.display = "block";
        } else if (userType === "chauffeur") {
            chauffeurSection.style.display = "block";
        }
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-800">
  <div class="flex justify-center items-center min-h-screen">
    <form method="POST" action="creer_user.php" class="bg-white p-6 rounded-lg shadow-md w-96">
      <h1 class="text-2xl font-bold mb-4">Créer un Nouveau Utilisateur</h1>
      
      <div class="mb-4">
        <label class="block text-lg font-medium mb-2">Nom</label>
        <input type="text" name="nom" class="w-full p-2 border rounded-md" required>
      </div>
      
      <div class="mb-4">
        <label class="block text-lg font-medium mb-2">Type</label>
        <select id="user-type" name="type" class="w-full p-2 border rounded-md" required onchange="updateFormFields()">
          <option value="utilisateur">Client</option>
          <option value="chauffeur">Chauffeur</option>
          <option value="entreprise">Entreprise</option>
        </select>
      </div>
      
      <div class="mb-4">
        <label class="block text-lg font-medium mb-2">Email</label>
        <input type="email" name="email" class="w-full p-2 border rounded-md" required>
      </div>
      
      <!-- Champs communs à tous les types -->  
      <div class="mb-4">
        <label class="block text-lg font-medium mb-2">Prénom</label>
        <input type="text" name="prenom" class="w-full p-2 border rounded-md" required>
      </div>
      <div class="mb-4">
        <label class="block text-lg font-medium mb-2">Numéro</label>
        <input type="text" name="telephone" class="w-full p-2 border rounded-md" required>
      </div>
      
      <!-- Section spécifique pour Entreprise -->  
      <div id="entreprise-fields" style="display: none;">
        <div class="mb-4">
          <label class="block text-lg font-medium mb-2">Nom de l'Entreprise</label>
          <input type="text" name="nom_entreprise" class="w-full p-2 border rounded-md">
        </div>
        <div class="mb-4">
          <label class="block text-lg font-medium mb-2">Numéro de Registre</label>
          <input type="text" name="registre" class="w-full p-2 border rounded-md">
        </div>
      </div>
      
      <!-- Section spécifique pour Chauffeur -->  
      <div id="chauffeur-fields" style="display: none;">
        <div class="mb-4">
          <label class="block text-lg font-medium mb-2">Licence</label>
          <input type="text" name="licence" class="w-full p-2 border rounded-md">
        </div>
        <div class="mb-4">
          <label class="block text-lg font-medium mb-2">Véhicule</label>
          <input type="text" name="vehicule" class="w-full p-2 border rounded-md">
        </div>
      </div>
      
      <div class="mb-4">
        <label class="block text-lg font-medium mb-2">Mot de passe</label>
        <input type="password" name="passwordd" class="w-full p-2 border rounded-md" required>
      </div>
      
      <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Créer</button>
    </form>
  </div>
</body>
</html>
