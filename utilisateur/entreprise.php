<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entreprise de Déménagement et Partenariats</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f8f8;
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

        header {
            background: url('demee.jpg') no-repeat center center/cover;
            height: 60vh;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            font-size: 3rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        header p {
            font-size: 1.2rem;
            margin-top: 10px;
        }


        .services {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 40px;
            background-color: #fff;
        }

        .service {
            background: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .service img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .service-content {
            padding: 20px;
            text-align: center;
        }

        .service-content h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .service-content p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .service-content a {
            text-decoration: none;
            background-color: #d9181e;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .service-content a:hover {
            background-color: #b01010;
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
            padding-left: 10px;
            /* Ajout de l'effet de décalage */
        }

        .phone-number {
            font-weight: bold;
            color: #d9181e;
            font-size: 20px;
            transition: transform 0.5s ease-in;
        }

        .phone-number:hover {
            transform: scaleY(1.2);
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
    </style>
</head>

<body>
    <!-- Barre de navigation -->
    <nav class="navbar">
        <div class="logo">Déménagement</div>
        <ul class="nav-links">
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="entreprise.php">Entreprise</a></li>
            <li><a href="a propos.php">À propos</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="auth-buttons">
            <button id="login-btn"><i class="fas fa-sign-in-alt"></i> Connexion</button>
            <button id="profile-btn" style="display: none;"><i class="fas fa-user"></i> Profil</button>
        </div>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <header>
        <div>
            <h1>Votre partenaire pour tous vos besoins en déménagement</h1>
            <p>Entreprises de stockage, nettoyage, partenariats logistiques et bien plus encore</p>
        </div>
    </header>

    <section id="services" class="services">
        <div class="service">
            <img src="stockage.jpg" alt="Stockage">
            <div class="service-content">
                <h3>Entreprises de stockage</h3>
                <p>Solutions de stockage sécurisées pour tous vos besoins.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
        </div>
        <div class="service">
            <img src="nettoyage.jpg" alt="Nettoyage">
            <div class="service-content">
                <h3>Entreprises de nettoyage</h3>
                <p>Services de nettoyage professionnels avant et après déménagement.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
        </div>

        <div class="service">
            <img src="Entreprises de manutention.jpeg" alt="Manutention">
            <div class="service-content">
                <h3>Entreprises de manutention</h3>
                <p>Solutions adaptées pour déplacer vos charges lourdes en toute sécurité.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
        </div>
        <div class="service">
            <img src="Emballages.jpg" alt="emballages">
            <div class="service-content">
                <h3>Entreprises d'emballages</h3>
                <p>Solutions adaptées pour emballer vos objets.</p>
                <a href="contact.html">En savoir plus</a>
            </div>
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
    <script>
        const burger = document.querySelector('.burger');
        const navLinks = document.querySelector('.nav-links');
        const loginBtn = document.getElementById('login-btn');
        const profileBtn = document.getElementById('profile-btn');

        // Gestion du menu burger
        burger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            burger.classList.toggle('toggle');
        });

        // Simulation de connexion/déconnexion
        let isLoggedIn = false;

        loginBtn.addEventListener('click', () => {
            isLoggedIn = !isLoggedIn;
            updateAuthButtons();
        });

        function updateAuthButtons() {
            if (isLoggedIn) {
                loginBtn.style.display = 'none';
                profileBtn.style.display = 'inline-block';
            } else {
                loginBtn.style.display = 'inline-block';
                profileBtn.style.display = 'none';
            }
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
    </script>
</body>

</html>