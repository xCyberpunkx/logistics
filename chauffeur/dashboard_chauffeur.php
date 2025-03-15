<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Chauffeur - Déménagement Pro</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Chauffeur Pro</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard_chauffeur.html" class="flex items-center p-2 bg-gray-200 dark:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="demandes_chauffeur.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Mes Demandes</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="profil_chauffeur.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Mon Profil</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametres_chauffeur.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètres</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <!-- Contenu principal -->
    <main class="flex-1 p-6">
      <!-- En-tête avec notifications -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold">Tableau de bord Chauffeur</h1>
        <div class="relative">
          <button id="notification-btn" class="p-2 bg-white dark:bg-gray-800 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none">
            <span class="material-icons">notifications</span>
            <span id="notification-count" class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1">1</span>
          </button>
          <div id="notification-dropdown" class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
            <ul class="p-2">
              <li class="py-2">Nouvelle demande assignée</li>
            </ul>
          </div>
        </div>
      </div>
      
      <!-- Bloc Statistiques : uniquement Nouvelles Demandes -->
      <div class="grid grid-cols-1 gap-6">
        <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow cursor-pointer" onclick="window.location.href='demandes_chauffeur.html?filter=new'">
          <h3 class="text-xl font-semibold">Nouvelles Demandes</h3>
          <p class="text-2xl">5</p>
        </div>
      </div>
      
      <!-- Graphique d'activité -->
      <div class="mt-8 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <canvas id="chart"></canvas>
      </div>
    </main>
  </div>
  <script>
    // Dropdown notifications
    const notificationBtn = document.getElementById('notification-btn');
    const notificationDropdown = document.getElementById('notification-dropdown');
    notificationBtn.addEventListener('click', () => {
      notificationDropdown.classList.toggle('hidden');
    });
    // Exemple de graphique avec Chart.js
    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
        datasets: [{
          label: 'Demandes traitées',
          data: [3, 5, 2, 4, 3, 6, 1],
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: { responsive: true }
    });
  </script>
</body>
</html>
