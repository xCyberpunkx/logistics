<?php
// offres.php
require 'config.php'; // Fichier de connexion PDO

try {
    // Récupération des offres depuis la table "offre", incluant le champ "contenu"
    $stmt = $pdo->query("SELECT id, titre, description, prix, contenu FROM offres");
    $offres = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offres - Dashboard Déménagement</title>
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
          <li class="mb-4"><a href="dashboard.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">dashboard</span>
            <span class="ml-2">Tableau de bord</span>
          </a></li>
          <li class="mb-4"><a href="commandes.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">assignment</span>
            <span class="ml-2">Commandes</span>
          </a></li>
          <li class="mb-4"><a href="entreprisee.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">business</span>
            <span class="ml-2">Entreprise</span>
          </a></li>
          <li class="mb-4"><a href="chauffeurs.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">local_shipping</span>
            <span class="ml-2">Chauffeurs</span>
          </a></li>
          <li class="mb-4"><a href="messagerie.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">chat</span>
            <span class="ml-2">Messagerie</span>
          </a></li>
          <li class="mb-4"><a href="commentaire.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">comment</span>
            <span class="ml-2">Commentaires</span>
          </a></li>
          <li class="mb-4"><a href="offres.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
            <span class="material-icons">local_offer</span>
            <span class="ml-2">Offres</span>
          </a></li>
          <li class="mb-4"><a href="user.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">person</span>
            <span class="ml-2">Utilisateurs</span>
          </a></li>
          <li class="mb-4"><a href="parametre.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <span class="material-icons">settings</span>
            <span class="ml-2">Paramètres</span>
          </a></li>
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-semibold">Offres</h1>
        <a href="creer_offre.php" class="bg-green-500 text-white px-4 py-2 rounded">Créer une nouvelle offre</a>
      </div>
      <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <thead class="bg-gray-200 dark:bg-gray-700">
          <tr>
            <th class="px-4 py-2 text-left">ID</th>
            <th class="px-4 py-2 text-left">Nom de l'Offre</th>
            <th class="px-4 py-2 text-left">Description</th>
            <th class="px-4 py-2 text-left">Prix</th>
            <th class="px-4 py-2 text-left">Contenu</th>
            <th class="px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          <?php if (!empty($offres)): ?>
            <?php foreach ($offres as $offre): ?>
              <tr>
                <td class="px-4 py-2"><?= htmlspecialchars($offre['id']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($offre['titre']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($offre['description']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($offre['prix']) ?> $</td>
                <td class="px-4 py-2"><?= htmlspecialchars($offre['contenu']) ?></td>
                <td class="px-4 py-2 space-x-2">
                  <a href="afficher_offre.php?id=<?= $offre['id'] ?>" class="bg-blue-500 text-white px-3 py-1 rounded">Afficher</a>
                  <a href="modifier_offre.php?id=<?= $offre['id'] ?>" class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</a>
                  <a href="supprimer_offre.php?id=<?= $offre['id'] ?>" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">Supprimer</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="px-4 py-2 text-center">Aucune offre trouvée.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
