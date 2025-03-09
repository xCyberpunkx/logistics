<?php
// afficher_reservations.php
require_once 'config.php'; // Fichier de connexion PDO

try {
    // Récupérer toutes les réservations, triées par date de création (du plus récent au plus ancien)
    $stmt = $pdo->query("SELECT * FROM reservation ORDER BY created_at DESC");
    $reservations = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la récupération des réservations : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Afficher Réservations - Dashboard Déménagement</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Material Icons -->
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
          <li class="mb-4"><a href="messagerie.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">chat</span><span class="ml-2">Messagerie</span></a></li>
          <li class="mb-4"><a href="commentaire.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">comment</span><span class="ml-2">Commentaires</span></a></li>
          <li class="mb-4"><a href="offre.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_offer</span><span class="ml-2">Offres</span></a></li>
          <li class="mb-4"><a href="user.html" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Utilisateurs</span></a></li>
          <li class="mb-4"><a href="parametre.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètres</span></a></li>
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <h1 class="text-3xl font-semibold mb-4">Liste des Réservations</h1>
      
      <?php if(empty($reservations)): ?>
        <p class="text-center">Aucune réservation trouvée.</p>
      <?php else: ?>
        <?php foreach($reservations as $res): ?>
          <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-6">
            <h2 class="text-2xl font-bold mb-4">Réservation #<?php echo htmlspecialchars($res['id']); ?></h2>
            <p><strong>Nom :</strong> <?php echo htmlspecialchars($res['name']); ?></p>
            <p><strong>Email :</strong> <?php echo htmlspecialchars($res['email']); ?></p>
            <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($res['phone']); ?></p>
            <p><strong>Logement actuel :</strong> <?php echo htmlspecialchars($res['currentAddress']); ?></p>
            <p><strong>Nouveau logement :</strong> <?php echo htmlspecialchars($res['newAddress']); ?></p>
            <p><strong>Tarif :</strong> <?php echo htmlspecialchars($res['tarif']); ?></p>
            <p><strong>Date :</strong> <?php echo htmlspecialchars($res['date']); ?></p>
            <p><strong>Heure :</strong> <?php echo htmlspecialchars($res['time']); ?></p>
            <p><strong>Déménagement entreprise :</strong> <?php echo $res['businessMove'] ? 'Oui' : 'Non'; ?></p>
            <p><strong>Précisions :</strong> <?php echo htmlspecialchars($res['details']); ?></p>
            <p><strong>Message :</strong> <?php echo htmlspecialchars($res['message']); ?></p>
            <p><strong>Date d'enregistrement :</strong> <?php echo htmlspecialchars($res['created_at']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <div class="mt-4">
        <a href="dashboard.html" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Retour au tableau de bord</a>
      </div>
    </main>
  </div>
</body>
</html>
