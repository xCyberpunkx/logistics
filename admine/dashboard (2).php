

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Déménagement</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
  <div class="flex flex-col md:flex-row">
    <!-- Barre latérale -->
    <aside class="w-full md:w-64 bg-white dark:bg-gray-800 h-auto md:h-screen p-5 shadow-md">
      <h2 class="text-2xl font-bold mb-6">Déménagement Professionel</h2>
      <nav>
        <ul>
          <li class="mb-4">
            <a href="dashboard (2).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">dashboard</span>
              <span class="ml-2">Tableau de bord</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="afficher_commande (2).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">assignment</span>
              <span class="ml-2">Commandes</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="entreprisee.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">business</span>
              <span class="ml-2">Entreprise</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="chauffeurs.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">local_shipping</span>
              <span class="ml-2">Chauffeurs</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="messagerie.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">chat</span>
              <span class="ml-2">Messagerie</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="commentaire.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">comment</span>
              <span class="ml-2">Commentaires</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="offre (1).php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">local_offer</span>
              <span class="ml-2">Offres</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="user.php" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">person</span>
              <span class="ml-2">Utilisateurs</span>
            </a>
          </li>
          <li class="mb-4">
            <a href="parametre.html" class="flex items-center p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
              <span class="material-icons">settings</span>
              <span class="ml-2">Paramètres</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>

<!-- Contenu principal -->
<main class="flex-1 p-6">
  <!-- En-tête avec notifications et sélection de langue -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-semibold">Tableau de bord</h1>
    <div class="flex items-center space-x-4">
      <!-- Bouton de sélection de langue -->
      <div class="relative">
        <button id="lang-btn" class="px-4 py-2 bg-white dark:bg-gray-800 rounded-md border hover:bg-gray-200 dark:hover:bg-gray-700">
          Langue <span class="material-icons align-middle">arrow_drop_down</span>
        </button>
        <div id="lang-dropdown" class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
          <ul>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Français</a></li>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">English</a></li>
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">العربية</a></li>
          </ul>
        </div>
      </div>
      <!-- Bouton notifications -->
      <div class="relative">
        <button id="notification-btn" class="p-2 bg-white dark:bg-gray-800 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none">
          <span class="material-icons">notifications</span>
          <span id="notification-count" class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1">3</span>
        </button>
        <div id="notification-dropdown" class="absolute right-0 mt-2 w-64 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg hidden">
          <ul class="p-2">
            <li class="border-b border-gray-200 dark:border-gray-700 py-2">Nouvelle commande reçue</li>
            <li class="border-b border-gray-200 dark:border-gray-700 py-2">Mise à jour du planning</li>
            <li class="py-2">Chauffeur disponible</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

            <!-- Message du jour pour l'admin -->
            <div class="mt-4 p-4 bg-blue-100 dark:bg-blue-900 rounded-md">
              <p class="text-blue-800 dark:text-blue-200"> Bienvenue dans votre espace de travail !!</p>
            </div>

      <!-- Section Filtrage des commandes -->
      <section class="mt-6 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Filtrer les commandes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label for="filter-date" class="block mb-1">Date</label>
            <input type="date" id="filter-date" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
          </div>
          <div>
            <label for="filter-location" class="block mb-1">Wilaya</label>
            <select id="filter-location" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
              <option value="">Toutes les wilayas</option>
              <!-- 48 wilayas historiques -->
              <option value="adrar">Adrar</option>
              <option value="chlef">Chlef</option>
              <option value="laghouat">Laghouat</option>
              <option value="oum-el-bouaghi">Oum El Bouaghi</option>
              <option value="batna">Batna</option>
              <option value="bejaia">Béjaïa</option>
              <option value="biskra">Biskra</option>
              <option value="bechar">Béchar</option>
              <option value="blida">Blida</option>
              <option value="bouira">Bouira</option>
              <option value="tamanrasset">Tamanrasset</option>
              <option value="tebessa">Tébessa</option>
              <option value="tlemcen">Tlemcen</option>
              <option value="tiaret">Tiaret</option>
              <option value="tizi-ouzou">Tizi Ouzou</option>
              <option value="alger">Alger</option>
              <option value="djelfa">Djelfa</option>
              <option value="jijel">Jijel</option>
              <option value="setif">Sétif</option>
              <option value="saida">Saïda</option>
              <option value="skikda">Skikda</option>
              <option value="sidi-bel-abbes">Sidi Bel Abbès</option>
              <option value="annaba">Annaba</option>
              <option value="guelma">Guelma</option>
              <option value="constantine">Constantine</option>
              <option value="medeaa">Médéa</option>
              <option value="mostaganem">Mostaganem</option>
              <option value="msila">M'Sila</option>
              <option value="mascara">Mascara</option>
              <option value="ouargla">Ouargla</option>
              <option value="oran">Oran</option>
              <option value="el-bayadh">El Bayadh</option>
              <option value="illizi">Illizi</option>
              <option value="bordj-bou-arreridj">Bordj Bou Arreridj</option>
              <option value="boumerdes">Boumerdès</option>
              <option value="el-tarf">El Tarf</option>
              <option value="tindouf">Tindouf</option>
              <option value="tissemsilt">Tissemsilt</option>
              <option value="el-oued">El Oued</option>
              <option value="khenchela">Khenchela</option>
              <option value="souk-ahras">Souk Ahras</option>
              <option value="tipaza">Tipaza</option>
              <option value="mila">Mila</option>
              <option value="ain-defla">Aïn Defla</option>
              <option value="naama">Naâma</option>
              <option value="ain-temouchent">Aïn Témouchent</option>
              <option value="ghardaia">Ghardaïa</option>
              <option value="relizane">Relizane</option>
              <!-- 10 nouvelles wilayas -->
              <option value="bordj-emir-abdelkader">Bordj Emir Abdelkader</option>
              <option value="touggourt">Touggourt</option>
              <option value="el-mghair">El M'Ghair</option>
              <option value="in-salah">In Salah</option>
              <option value="in-guezzam">In Guezzam</option>
              <option value="djanet">Djanet</option>
              <option value="ouled-djellal">Ouled Djellal</option>
              <option value="timimoun">Timimoun</option>
              <option value="el-menia">El Menia</option>
              <option value="bordj-baji-mokhtar">Bordj Baji Mokhtar</option>
            </select>
          </div>
          <div>
            <label for="filter-status" class="block mb-1">Statut</label>
            <select id="filter-status" class="w-full p-2 border rounded-md bg-gray-50 dark:bg-gray-700">
              <option value="">Tous les statuts</option>
              <option value="en-attente">En attente</option>
              <option value="en-cours">En cours</option>
              <option value="termine">Terminé</option>
            </select>
          </div>
        </div>
        <button id="filter-btn" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Appliquer</button>
      </section>
<br><br>
      <!-- Statistiques cliquables -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="commandes.html?filter=new" class="block p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-700">
          <h3 class="text-lg font-semibold">Nouvelles demandes</h3>
          <p class="text-2xl">124</p>
        </a>
        <a href="commandes.html?filter=in-progress" class="block p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-700">
          <h3 class="text-lg font-semibold">Déménagements en cours</h3>
          <p class="text-2xl">58</p>
        </a>
      </div>
      <canvas id="chart" width="400" height="200"></canvas>
      <div class="mt-8 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <canvas id="chart"></canvas>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('chart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Commandes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3  // Ajoute un effet lissé aux lignes
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: 'white'  // Pour mode sombre
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: 'white'  // Pour mode sombre
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'white'  // Pour mode sombre
                            }
                        }
                    }
                }
            });
        });
    </script>
    
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <!-- Graphique des commandes -->
      <div class="mt-8 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <canvas id="chart"></canvas>
      </div>
    </main>
  </div>

  <script>
    // Initialisation du graphique avec Chart.js
    const ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
        datasets: [{
          label: 'Commandes',
          data: [12, 19, 3, 5, 2, 3],
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2,
          fill: false
        }]
      }
    });

    // Gestion du dropdown langue
    const langBtn = document.getElementById('lang-btn');
    const langDropdown = document.getElementById('lang-dropdown');
    langBtn.addEventListener('click', () => {
      langDropdown.classList.toggle('hidden');
    });

    // Notifications dropdown
    const notificationBtn = document.getElementById('notification-btn');
    const notificationDropdown = document.getElementById('notification-dropdown');
    notificationBtn.addEventListener('click', () => {
      notificationDropdown.classList.toggle('hidden');
    });

    // Filtrage des commandes
    document.getElementById('filter-btn').addEventListener('click', () => {
      const date = document.getElementById('filter-date').value;
      const location = document.getElementById('filter-location').value;
      const status = document.getElementById('filter-status').value;
      console.log(`Filtrage par date: ${date}, wilaya: ${location}, statut: ${status}`);
      alert(`Filtrage appliqué:\nDate: ${date}\nWilaya: ${location}\nStatut: ${status}`);
    });
  </script>
</body>
</html>
