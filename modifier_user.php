<?php
// Inclure la connexion à la base de données
include('config.php');

// Vérifier si l'ID et le type sont passés en paramètre
if (!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['type']) || empty($_GET['type'])) {
    die("❌ Erreur : Identifiant ou type non fourni.");
}

$id = intval($_GET['id']);
$type = htmlspecialchars($_GET['type']);

// Vérifier si le type est valide
$types_valides = ['utilisateur', 'entreprise', 'chauffeur'];
if (!in_array($type, $types_valides)) {
    die("⚠️ Erreur : Type invalide.");
}

// Récupérer les données de l'utilisateur selon le type
$sql = "SELECT * FROM $type WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("⚠️ Erreur : Utilisateur introuvable.");
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['Nom']);
    $prenom = isset($_POST['Prenom']) ? htmlspecialchars($_POST['Prenom']) : null;
    $email = htmlspecialchars($_POST['Email']);
    $numero = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : null;
    $mot_de_passe = isset($_POST['passwordd']) ? password_hash($_POST['passwordd'], PASSWORD_DEFAULT) : null;
    $licence = isset($_POST['licence']) ? htmlspecialchars($_POST['licence']) : null;
    $vehicule = isset($_POST['vehicule']) ? htmlspecialchars($_POST['vehicule']) : null;
    $nom_entreprise = isset($_POST['nom_entreprise']) ? htmlspecialchars($_POST['nom_entreprise']) : null;
    $registre = isset($_POST['registre']) ? htmlspecialchars($_POST['registre']) : null;

    // Mise à jour en fonction du type
    $update_sql = "UPDATE $type SET nom = :nom, email = :email";
    
    if ($type == "chauffeur") {
        $update_sql .= ", prenom = :prenom, telephone = :telephone, passwordd = :passwordd, licence = :licence, vehicule = :vehicule";
    } elseif ($type == "entreprise") {
        $update_sql .= ", prenom = :prenom, telephone = :telephone, passwordd = :passwordd, nom_entreprise = :nom_entreprise, registre = :registre";
    }
    
    $update_sql .= " WHERE id = :id";
    
    $update_stmt = $pdo->prepare($update_sql);
    
    $params = [
        'nom' => $nom,
        'email' => $email,
        'id' => $id
    ];

    if ($type == "chauffeur") {
        $params['prenom'] = $prenom;
        $params['telephone'] = $numero;
        $params['passwordd'] = $mot_de_passe;
        $params['licence'] = $licence;
        $params['vehicule'] = $vehicule;
    } elseif ($type == "entreprise") {
        $params['prenom'] = $prenom;
        $params['telephone'] = $numero;
        $params['passwordd'] = $mot_de_passe;
        $params['nom_entreprise'] = $nom_entreprise;
        $params['registre'] = $registre;
    }

    $update_stmt->execute($params);

    echo "<script>alert('✔️ Modification réussie !'); window.location.href='user.php';</script>";
    exit;
}
?>






<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier Utilisateur - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale commune -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Pro</h2>
      <nav>
        <ul>
          <li class="mb-4"><a href="dashboard.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">dashboard</span><span class="ml-2">Tableau de bord</span></a></li>
          <li class="mb-4"><a href="commandes.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">assignment</span><span class="ml-2">Commandes</span></a></li>
          <li class="mb-4"><a href="entreprisee.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">business</span><span class="ml-2">Entreprise</span></a></li>
          <li class="mb-4"><a href="chauffeurs.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_shipping</span><span class="ml-2">Chauffeurs</span></a></li>
          
          <li class="mb-4"><a href="commentaire.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">comment</span><span class="ml-2">Commentaires</span></a></li>
          <li class="mb-4"><a href="offre.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_offer</span><span class="ml-2">Offres</span></a></li>
          <li class="mb-4"><a href="user.html" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Utilisateurs</span></a></li>
          <li class="mb-4"><a href="parametre.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètres</span></a></li>
        </ul>
      </nav>
    </aside>
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-6">Modifier l'Utilisateur</h1>
      <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nom :</label>
                <input type="text" name="Nom" value="<?= htmlspecialchars($user['Nom']) ?>" class="w-full p-2 border rounded">
            </div>
            
            <?php if ($type != "utilisateur") : ?>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Prénom :</label>
                <input type="text" name="Prenom" value="<?= htmlspecialchars($user['Prenom'] ?? '') ?>" class="w-full p-2 border rounded">
            </div>
            <?php endif; ?>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Email :</label>
                <input type="email" name="Email" value="<?= htmlspecialchars($user['Email']) ?>" class="w-full p-2 border rounded">
            </div>

            <?php if ($type != "utilisateur") : ?>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Numéro :</label>
                <input type="text" name="telephone" value="<?= htmlspecialchars($user['telephone'] ?? '') ?>" class="w-full p-2 border rounded">
            </div>
            <?php endif; ?>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Mot de passe :</label>
                <input type="password" name="passwordd" class="w-full p-2 border rounded">
            </div>

            <?php if ($type == "chauffeur") : ?>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Licence :</label>
                <input type="text" name="licence" value="<?= htmlspecialchars($user['licence'] ?? '') ?>" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Véhicule :</label>
                <input type="text" name="vehicule" value="<?= htmlspecialchars($user['vehicule'] ?? '') ?>" class="w-full p-2 border rounded">
            </div>
            <?php endif; ?>

            <?php if ($type == "entreprise") : ?>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nom de l'Entreprise :</label>
                <input type="text" name="nom_entreprise" value="<?= htmlspecialchars($user['nom_entreprise'] ?? '') ?>" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Numéro de registre :</label>
                <input type="text" name="registre" value="<?= htmlspecialchars($user['registre'] ?? '') ?>" class="w-full p-2 border rounded">
            </div>
            <?php endif; ?>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
            <a href="user.php" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Annuler</a>
        </form>
    </main>
  </div>
</body>
</html>
