





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Actif - Déménagement</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f8f8;
        }
 h1, p {
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #d9181e;
    padding: 10px 20px;
    position: sticky;
    top: 0;
    z-index: 1000;
    color: #fff;
}

.navbar .logo {
    font-size: 1.5rem;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    text-decoration: none;
    color: #fff;
    font-size: 1rem;
    font-weight: 500;
    transition: color 0.3s;
}

.nav-links a:hover {
    color: #f8f8f8;
    font-weight: bold;
}

.auth-buttons button {
    background-color: #fff;
    color: #d9181e;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: 0.3s;
    margin-left: 10px;
}

.auth-buttons button:hover {
    background-color: #f8f8f8;
}

.burger {
    display: none;
    cursor: pointer;
}

.burger div {
    width: 25px;
    height: 3px;
    background-color: white;
    margin: 5px;
    transition: all 0.3s ease;
}

/* Responsive Navbar */
@media (max-width: 760px) {
    .nav-links {
        display: none;
        flex-direction: column;
        background-color: #d9181e;
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        padding: 20px;
        border-radius: 0 0 10px 10px;
    }

    .nav-links.active {
        display: flex;
    }

    .burger {
        display: block;
    }
}

        /* Slider Container */
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .slides {
            display: flex;
            transition: transform 0.6s ease-in-out;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
            position: relative;
            background-size: cover;
            background-position: center;
            height: 500px; /* Hauteur par défaut */
            color: #fff;
        }

        .slide-content {
            position: absolute;
            bottom: 20%;
            left: 5%;
            max-width: 500px;
        }

        .slide h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #d9181e;
        }

        .slide p {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            margin: 10px 10px 0 0;
            padding: 10px 20px;
            color: #fff;
            background-color: #d9181e;
            text-decoration: none;
            border: 2px solid #d9181e;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: transparent;
            color: #d9181e;
        }

        /* Navigation Buttons */
        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .navigation button {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        .navigation button:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Dots */
        .dots {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .dot {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #d9181e;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .slide {
                height: 300px; /* Réduction de la hauteur */
            }

            .slide h2 {
                font-size: 1.5rem; /* Texte plus petit */
            }

            .slide p {
                font-size: 0.9rem;
            }

            .btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
        /* Section pricing */
    .pricing {
      text-align: center;
      background-color: #f7f7f7;
      padding: 40px 20px;
    }

    .pricing h1 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #333;
    }

    .cards {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    /* Carte 3D */
    .card {
      width: 350px;
      height: 400px;
      perspective: 1000px;
      margin: 10px;
      cursor: pointer; /* Ajout du curseur pointer pour indiquer que c'est cliquable */
    }

    .card-inner {
      width: 100%;
      height: 100%;
      position: relative;
      transform-style: preserve-3d;
      transition: transform 0.8s;
    }

    .card.flipped .card-inner {
      transform: rotateY(180deg); /* La carte est retournée lorsqu'elle a la classe 'flipped' */
    }

    .card-front,
    .card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: white;
      text-align: center;
      pointer-events: none; /* Désactive les clics par défaut */
    }

    .card-front {
      pointer-events: auto; /* Active les clics uniquement pour la face avant */
    }

    .card-front h3,
    .card-back h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #333;
    }
    .features {
    text-align: left;
    padding: 0;
    list-style: none;
    font-size: 14px;
    line-height: 1.8;
}

.features li {
    margin: 5px 0;
    padding: 5px 10px;
    background: #f4f4f4;
    border-radius: 5px;
    display: flex;
    align-items: center;
}

.features li::before {
    content: "•"; 
    color: #ff5733; 
    font-weight: bold;
    margin-right: 10px;
}


    .card-front .prix {
      font-size: 1.2rem;
      font-weight: bold;
      color: #af0c0c;
    }

    .card-back ul {
      list-style: none;
      padding: 0;
    }

    .card-back ul li {
      font-size: 0.9rem;
      color: #333;
      margin: 5px 0;
    }

    .card-back {
      transform: rotateY(180deg);
      
    }
    .card-front .btnn,
.card-back .btnn {
    margin-bottom: 20px; /* Ajuste cette valeur pour contrôler la position */
}

















    /* Bouton */
    .btnn {
      display: inline-block;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #af0c0cc4;
      color: white;
      font-size: 1rem;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btnn:hover {
      background-color: #c40808;
    }
        /* Section Services */
.service {
    padding: 50px 20px;
    background-color: #f8f8f8;
    
    text-align: center;
    max-width: 1000px; /* Limiter la largeur maximale */
    margin: 0 auto; /* Centrer la section */
}

.section-title {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #d9181e;
}

.services-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.service-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}





/* Banner */
.service-banner {
    position: absolute;
    top: 0;
    left: 0;
    background: #d9181e;
    color: #fff;
    padding: 10px 20px;
    font-size: 1.1rem;
    font-weight: bold;
    clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);
    z-index: 1;
}



/* Image */
.service-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.service-card:hover .service-image img {
    transform: scale(1.1);
}

/* Content */
.service-content {
    padding: 20px;
}

.service-content p {
    font-size: 1rem;
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

.service-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.service-buttons .btn {
    text-decoration: none;
    color: #fff;
    background: #d9181e;
    padding: 10px 20px;
    border-radius: 5px;
    transition: all 0.3s;
}

.service-buttons .btn:hover {
    background: transparent;
    color: #d9181e;
    border: 2px solid #d9181e;
}

/* Styles généraux */
footer {
    background-color: #f4f4f4;
    padding: 20px 110px;
    
    font-family: 'Arial', sans-serif;
    
}

.footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    position: relative;
    left: 100px;
    
}

.footer-section {
    flex: 1;
    min-width: 250px;
    
}

.footer-section h3 {
    font-size: 18px;
    color: #333;
    margin-bottom: 10px;
    position: relative;
}

.footer-section h3::after {
    content: "";
    width: 50%;
    height: 2px;
    background-color: #d9181e;
    position: absolute;
    bottom: -5px;
    left: 0;
}

/* Transition de lien */
.footer-section a {
    display: block;
    color: #333;
    text-decoration: none;
    margin: 5px 0;
    padding-left: 0;
    transition: padding-left 0.3s ease, color 0.3s ease;
}

.footer-section a:hover {
    color: #d9181e;
    padding-left: 10px; /* Ajout de l'effet de décalage */
}

.phone-number {
    font-weight: bold;
    color: #d9181e;
    font-size: 20px;
    transition: transform 0.5s ease-in;
}

.phone-number:hover {
    transform:scaleY(1.2);
}

/* Bottom footer */
.footer-bottom {
    text-align: center;
    margin-top: 40px;
    font-size: 14px;
    color: #666;
}

/* Responsive */
@media screen and (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }
    .footer-section {
        min-width: 100%;
        text-align: center;
    }
    .footer-bottom {
        margin-top: 20px;
    }
}

 /* Bouton Go to Top */
 #goToTopBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: none;
  background-color: #d9181e;
  color: white;
  border: none;
  padding: 10px 15px;
  border-radius: 50%;
  font-size: 18px;
  cursor: pointer;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  transition: opacity 0.3s, transform 0.3s;
}

#goToTopBtn:hover {
  background-color: #a51416;
  transform: scale(1.1);
}



.profile-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

/* Image de profil */
.profile-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    transition: 0.3s;
}

/* Menu déroulant */
.dropdown-menu {
    position: absolute;
    top: 60px;
    right: 0;
    display: none;
    background: white;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    min-width: 180px;
    padding: 10px 0;
}

/* Affichage du menu si actif */
.dropdown-menu.show {
    display: block;
}

/* Style des liens */
.dropdown-menu a {
    display: block;
    padding: 10px 15px;
    color: black;
    text-decoration: none;
}

.dropdown-menu a:hover {
    background: #f0f0f0;
}




    </style>
</head>
<body>
    <!-- Barre de navigation -->
<nav class="navbar">
    <div class="logo"><img src="" alt=""></div>
    <ul class="nav-links">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="entreprise.php">Entreprise</a></li>
        <li><a href="a propos.php">À propos</a></li>
        <li><a href="#">Contact</a></li>
    </ul>

<body>

<div class="profile-container" onclick="toggleMenu()">
        
        <img id="profile-img" src="default.png" class="profile-img" alt="Profil">
        
        <div id="dropdown-menu" class="dropdown-menu">
            <a href="#">Paramètres</a>
            <a href="logout.php">Se déconnecter</a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const profileImg = document.getElementById("profile-img");
            const dropdownMenu = document.getElementById("dropdown-menu");
            const logoutBtn = document.getElementById("logout");

            // Vérifier si l'utilisateur est connecté
            let isConnected = sessionStorage.getItem("connected");

            if (isConnected) {
                profileImg.src = "user-avatar.png"; // Image après connexion
                profileImg.style.border = "2px solid green"; // Bordure verte pour montrer la connexion
            } else {
                profileImg.onclick = function () {
                    window.location.href = "LOGIN1_R.php"; // Redirige vers la connexion
                };
            }

            // Gérer l'affichage du menu déroulant
            profileImg.addEventListener("click", function (event) {
                if (isConnected) {
                    dropdownMenu.classList.toggle("show");
                }
                event.stopPropagation(); // Empêche la fermeture immédiate
            });

            // Cacher le menu si on clique ailleurs
            document.addEventListener("click", function (event) {
                if (!profileImg.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove("show");
                }
            });

            // Déconnexion
            logoutBtn.addEventListener("click", function () {
                sessionStorage.removeItem("connected"); // Supprime la session
                window.location.reload(); // Recharge la page
            });
        });
    </script>















</nav>
<br><br>
    <!-- Slider Section -->
    <div class="slider-container" id="slider">
        <div class="slides">
            <!-- Slide 1 -->
            <div class="slide" style="background-image: url('slide1.jpg');">
                <div class="slide-content">
                    <h2>Un réseau unique</h2>
                    <p>Nos services sont disponibles dans le monde entier. Notre réseau couvre <strong>147 sites dans 100 pays.</strong></p>
                    <a href="#" class="btn">TROUVER UNE FILIALE</a>
                    <a href="#" class="btn">DEMANDE DE DEVIS</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="slide" style="background-image: url('slide2.jpg');">
                <div class="slide-content">
                    <h2>Déménagement International</h2>
                    <p>Des services de qualité sur mesure pour tous vos déménagements à travers les 5 continents.</p>
                    <a href="#" class="btn">EN SAVOIR PLUS</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="slide" style="background-image: url('slide3.jpg');">
                <div class="slide-content">
                    <h2>Garde-Meubles Sécurisés</h2>
                    <p>Stockage temporaire ou de longue durée, dans des entrepôts modernes et sécurisés.</p>
                    <a href="#" class="btn">RÉSERVER MA PLACE</a>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="navigation">
            <button id="prev">&#10094;</button>
            <button id="next">&#10095;</button>
        </div>

        <!-- Dots -->
        <div class="dots">
            <div class="dot active" data-index="0"></div>
            <div class="dot" data-index="1"></div>
            <div class="dot" data-index="2"></div>
        </div>
    </div>
    <br>
    <section class="service">
        <h2 class="section-title">Nos Services</h2>
        <br>
        <div class="services-container">
            <!-- Card 1 -->
            <div class="service-card" id="particuliers">
                <div class="service-banner">POUR LES PARTICULIERS</div>
                <div class="service-image">
                    <img src="particuliers.jpg" alt="Service pour particuliers">
                </div>
                <div class="service-content">
                    <p>
                        Laissez-nous vous aider à préparer un déménagement réussi. 
                        Que vous déménagiez d'Afrique en Asie ou d'Angleterre aux États-Unis, 
                        nous vous accompagnons du départ à l'arrivée.
                    </p>
                    <div class="service-buttons">
                        <a href="#" class="btn">DÉCOUVRIR NOS SERVICES</a>
                        <a href="#" class="btn">DEMANDEZ UN DEVIS</a>
                    </div>
                </div>
            </div>
    
            <!-- Card 2 -->
            <div class="service-card" id="organisations">
                <div class="service-banner">POUR LES ENTREPRISES</div>
                <div class="service-image">
                    <img src="organisations.jpg" alt="Service pour organisations">
                </div>
                <div class="service-content">
                    <p>
                        Notre expertise unique s'intègre au cœur d’un réseau international 
                        de spécialistes qualifiés proposant des solutions sur mesure.
                    </p>
                    <div class="service-buttons">
                        <a href="#" class="btn">DÉCOUVRIR NOS SOLUTIONS</a>
                        <a href="#" class="btn">NOUS CONTACTER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

    <?php
 include('../config/config.php'); // Connexion à la base de données

// Récupérer les offres
$sql = "SELECT * FROM offres";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$offres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="pricing">
    <h1>Tarifs compétitifs</h1>
    <div class="cards">
        <?php foreach ($offres as $offre) : ?>
            <div class="card" onmouseover="flipCard(this)" onmouseout="unflipCard(this)" onclick="toggleFlip(this)">
                <div class="card-inner">
                    <!-- Face avant -->
                    <div class="card-front">
                        <h3><?= htmlspecialchars($offre['nom']); ?></h3>
                        <p><?= nl2br(htmlspecialchars($offre['description'])); ?></p>
                        <p class="prix"><?= number_format($offre['prix'], 2); ?> DA</p>
                        <br>
                                         </div>

                    <!-- Face arrière -->
                    <div class="card-back">
                        <h3><?= htmlspecialchars($offre['nom']); ?></h3>
                        <ul class="features">
                            <li><strong>Chargement et déchargement</strong></li>
                            <li> <strong>Transport sécurisé</strong></li>
                            <li><?= $offre['protection_meubles'] ? ' <strong>Protection de base des meubles</strong>' : ' <strong>Pas de protection des meubles</strong>'; ?></li>
                            <li><?= $offre['emballage_fragile'] ? ' <strong>Emballage des objets fragiles</strong>' : ' <strong>Pas d\'emballage des objets fragiles</strong>'; ?></li>
                            <?php if ($offre['emballage_complet']) : ?>
                                <li> <strong>Emballage/déballage complet</strong></li>
                            <?php endif; ?>
                            <?php if ($offre['fourniture_cartons']) : ?>
                                <li> <strong>Fourniture de cartons standards</strong></li>
                            <?php endif; ?>
                            <?php if ($offre['montage_meubles_simples']) : ?>
                                <li> <strong>Démontage/remontage meubles simples</strong></li>
                            <?php endif; ?>
                            <li> <strong>Durée max :</strong> <?= htmlspecialchars($offre['duree_max']); ?></li>
                        </ul>
                        <a href="forme.html" class="btnn"><?= $offre['nom'] === 'Luxe' ? 'Contactez-nous' : 'contactez-nous'; ?></a>
                        </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>










    
    
    
    
    
    
    
    
    
    <!-- Bouton Go to Top -->
    <button id="goToTopBtn" title="Retour en haut">↑</button>

    <!-- footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section contact">
                <h3>CONTACT</h3>
                <p>Pour nous joindre :</p>
                <p class="phone-number">+213 (0) 541 768 051</p>
                <p>Lun - Ven : 8h00 à 19h00</p>
                <p>Sam : 9h00 à 17h00</p>
                <div class="links">
                    <a href="a propos.html">À propos</a>
                    <a href="contact.html">Contactez-nous</a>
                </div>
            </div>
            <div class="footer-section services">
                <h3>SERVICES</h3>
                <ul>
                    <li><a href="#">Aide / FAQ</a></li>
                    <li><a href="a propos.html">Mes guides déménagement</a></li>
                    <li><a href="rntreprise.html">Devenir partenaire</a></li>
                    <li><a href="contact.html">Demandez votre devis déménagement</a></li>
                    <li><a href="#">Espace Déménageur</a></li>
                </ul>
            </div>
            <div class="footer-section mentions">
                <h3>MENTIONS</h3>
                <p><a href="#">Données personnelles</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>EXPERTMOVE.dz - Un site du groupe EXPERTMOVE</p>
        </div>
    </footer>
    
     <!-- partie java script -->
    <script>
    
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');
    const loginBtn = document.getElementById('login-btn');
    const profileBtn = document.getElementById('profile-btn');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        burger.classList.toggle('toggle');
    });

 

    


        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const slider = document.getElementById('slider');

        let currentIndex = 0;
        let autoSlideInterval;

        function updateSlider() {
            document.querySelector('.slides').style.transform = `translateX(-${currentIndex * 100}%)`;
            dots.forEach((dot, index) => dot.classList.toggle('active', index === currentIndex));
        }

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }

        function showPrevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        }

        // Auto-slide function
        function startAutoSlide() {
            autoSlideInterval = setInterval(showNextSlide, 8000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event Listeners
        nextButton.addEventListener('click', showNextSlide);
        prevButton.addEventListener('click', showPrevSlide);

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                currentIndex = parseInt(dot.dataset.index);
                updateSlider();
            });
        });

        slider.addEventListener('mouseenter', stopAutoSlide);
        slider.addEventListener('mouseleave', startAutoSlide);

        // Start auto-slide on page load
        startAutoSlide();
        //section pricing
        function flipCard(card) {
          card.classList.add('flipped'); // Applique l'effet de survol (inversion)
        }
    
        function unflipCard(card) {
          if (!card.classList.contains('flipped')) {
            card.classList.remove('flipped'); // Enlève l'inversion si la carte n'est pas déjà retournée
          }
        }
    
        function toggleFlip(card) {
          card.classList.toggle('flipped'); // Ajoute ou enlève la classe 'flipped' sur le clic
        }
        // buuton go to top
        // Sélectionner le bouton
        const goToTopBtn = document.getElementById('goToTopBtn');

        // Afficher/Masquer le bouton en fonction du scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                goToTopBtn.style.display = 'block';
            } else {
                goToTopBtn.style.display = 'none';
            }
        });

        // Remonter en haut de la page lorsqu'on clique sur le bouton
        goToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Défilement fluide
            });
        });
        








let isConnected = false; // Passe à true quand l'utilisateur est connecté

const userBubble = document.getElementById('userBubble');
const userMenu = document.getElementById('userMenu');

// Fonction de redirection vers la page de connexion
function redirectToLogin() {
    console.log("Redirection vers LOGIN1_R.php");
    window.location.href = 'LOGIN1_R.php';
}

// Gère le clic sur la boule
userBubble.addEventListener('click', function(e) {
  // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
  if (!isConnected) {
    redirectToLogin();
  } else {
    // Si connecté, affiche ou cache le menu déroulant
    if (userMenu.style.display === 'block') {
      userMenu.style.display = 'none';
    } else {
      userMenu.style.display = 'block';
    }
  }
});

// Pour masquer le menu si on clique en dehors
document.addEventListener('click', function(e) {
  if (!userBubble.contains(e.target)) {
    userMenu.style.display = 'none';
  }
});

        
    </script>
</body>
</html>
