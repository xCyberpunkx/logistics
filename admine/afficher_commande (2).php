<?php
// afficher_reservations.php
require('../config/config.php');



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valider_id"])) {
    $id = $_POST["valider_id"];

    try {
        $stmt = $pdo->prepare("UPDATE reservation SET status = 'validée' WHERE id = ?");
        if ($stmt->execute([$id])) {
            // Rafraîchir la page après validation
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    } catch (PDOException $e) {
        echo "<script>alert('Erreur lors de la validation.');</script>";
    }
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
          <li class="mb-4"><a href="dashboard (2).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">dashboard</span><span class="ml-2">Tableau de bord</span></a></li>
          <li class="mb-4"><a href="commandes.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">assignment</span><span class="ml-2">Commandes</span></a></li>
          <li class="mb-4"><a href="entreprisee.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">business</span><span class="ml-2">Entreprise</span></a></li>
          <li class="mb-4"><a href="chauffeurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_shipping</span><span class="ml-2">Chauffeurs</span></a></li>
          <li class="mb-4"><a href="messagerie.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">chat</span><span class="ml-2">Messagerie</span></a></li>
          <li class="mb-4"><a href="commentaire (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">comment</span><span class="ml-2">Commentaires</span></a></li>
          <li class="mb-4"><a href="offre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">local_offer</span><span class="ml-2">Offres</span></a></li>
          <li class="mb-4"><a href="user.php" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md"><span class="material-icons">person</span><span class="ml-2">Utilisateurs</span></a></li>
          <li class="mb-4"><a href="parametre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md"><span class="material-icons">settings</span><span class="ml-2">Paramètres</span></a></li>
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <?php
// afficher_reservations.php
require('../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valider_id"])) {
    $id = $_POST["valider_id"];

    try {
        $stmt = $pdo->prepare("UPDATE reservation SET status = 'validée' WHERE id = ?");
        if ($stmt->execute([$id])) {
            echo "<script>window.location.href = window.location.href;</script>";
            exit();
        }
    } catch (PDOException $e) {
        echo "<script>alert('Erreur lors de la validation.');</script>";
    }
}

try {
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
    <div class="flex flex-col md:flex-row">
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

                        <p><strong>Statut :</strong> 
                            <span class="<?php echo ($res['status'] == 'validée') ? 'text-green-500' : 'text-red-500'; ?>">
                                <?php echo isset($res['status']) ? htmlspecialchars($res['status']) : 'en attente'; ?>
                            </span>
                        </p>

                        <?php if ($res['status'] != 'validée'): ?>
                            <form method="POST" onsubmit="return confirm('Confirmez-vous la validation ?');">
                                <input type="hidden" name="valider_id" value="<?php echo $res['id']; ?>">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    Valider
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>




</main> 

  </div>
</body>
</html>