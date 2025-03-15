


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
        <form action="register.php" method="post">
                <h1>Create Account</h1><!-- création de compte--> 
                <br>
                <div class="user-type">
                    <div class="role-card" data-role="chauffeur">
                        <i class="fa-solid fa-truck"></i>
                        <p>Chauffeur</p>
                    </div>
                    <div class="role-card" data-role="entreprise">
                        <i class="fa-solid fa-building"></i>
                        <p>Entreprise</p>
                    </div>
                    <div class="role-card" data-role="utilisateur">
                        <i class="fa-solid fa-user"></i>
                        <p>Utilisateur</p>
                    </div>
                </div>

                <input type="hidden" id="role" name="role" value="utilisateur">

                <span class="spane"> Nom</span>
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
                <span class="spane"> Prenom</span>
                <input type="text" id="prenom" name="prenom" placeholder="prenom"required>
                <span class="spane">Numero</span>
                <input type="text" id="telephone" name="telephone" placeholder="telephone"required>
                <span class="spane">Email</span> 
                <input type="email" id="email" name="email" placeholder="Email"required>
                <span class="spane">Mot de passe</span>
                <input type="password" id="passwordd" name="passwordd" placeholder="Password"required>
                <span class="spane">wilaya</span>
                <input type="texte" id="wilaya" name="wilaya" placeholder="wilaya"required>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="conx.php" method="post">
                <h1>Sign In</h1><!-- connexion-->
                <br>
                <div class="user-type">
                    <div class="role-card" data-role="chauffeur">
                        <i class="fa-solid fa-truck"></i>
                        <p>Chauffeur</p>
                    </div>
                    <div class="role-card" data-role="entreprise">
                        <i class="fa-solid fa-building"></i>
                        <p>Entreprise</p>
                    </div>
                    <div class="role-card" data-role="utilisateur">
                        <i class="fa-solid fa-user"></i>
                        <p>Utilisateur</p>
                    </div>
                </div>
                
                <span> Use your email password</span>
                <input type="hidden" id="role" name="role" value="utilisateur">

                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required> 
                <a href="#">Forget Your Password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome, Friend!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}
.container span .spane{
 position: left;
}
body{
    background-color: #c9d6ff;
    background: linear-gradient(to bottom , #ffffff, #c6bfbf);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
}

.container{
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
    height: 500px;
}

.container p{
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
}

.container span{
    font-size: 12px;
    position: left;
}

.container a{
    color: #333;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
}

.container button{
    background-color: rgb(206, 30, 30);
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}

.container button.hidden{
    background-color: transparent;
    border-color: #fff;
}

.container form{
    background-color: #fff;
    display: flex;
    
    flex-direction: column;
    padding: 10% 10%;
    height: auto;
}

.container input{
    background-color: #eee;
    border: none;
    margin: 8px 0;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 8px;
    width: 100%;
    outline: none;
}

.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in{
    transform: translateX(100%);
}

.sign-up{
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up{
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move{
    0%, 49.99%{
        opacity: 0;
        z-index: 1;
    }
    50%, 100%{
        opacity: 1;
        z-index: 5;
    }
}

.social-icons{
    margin: 20px 0;
}

.social-icons a{
    border: 1px solid #ccc;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
}

.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}

.toggle{
    /* background-color: orange; */
    height: 100%;
    background: linear-gradient(to right, rgb(206, 30, 30), rgb(253, 137, 137));
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-left{
    transform: translateX(-200%);
}

.container.active .toggle-left{
    transform: translateX(0);
}

.toggle-right{
    right: 0;
    transform: translateX(0);
    background: linear-gradient(to left, rgb(206, 30, 30), rgb(238, 99, 99));
}

.container.active .toggle-right{
    transform: translateX(200%);
}








.form-container {
    overflow-y: auto;
    max-height: 100%;
    
}




.user-type {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-bottom: 20px;
    margin-top: 3px;
}

.role-card {
    width: 100px;
    height: 100px;
    background: #eee;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.role-card i {
    font-size: 30px;
    color: rgb(100, 100, 100);
    margin-bottom: -10px;
}

.role-card p {
    font-size: 14px;
    font-weight: bold;
    color: rgb(50, 50, 50);
    margin-bottom: -12px;
     
}

.role-card:hover, .role-card.active {
    background: rgb(206, 30, 30);
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.role-card.active i,
.role-card.active p {
    color: white;
}





</style>
    <script >
        const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});










document.addEventListener("DOMContentLoaded", function () {
    const roleCards = document.querySelectorAll(".role-card");
    const form = document.querySelector(".sign-up form");

    roleCards.forEach(card => {
        card.addEventListener("click", function () {
            let role = this.getAttribute("data-role");

            // Supprimer les anciens champs spécifiques
            document.querySelectorAll(".extra-field").forEach(field => field.remove());

            if (role === "chauffeur") {
                addField("Licence", "licence");
                addField("Véhicule", "vehicule");
            } else if (role === "entreprise") {
                addField("Nom de l'entreprise", "nom_entreprise");
                addField("Numéro de registre", "registre");
            }

            // Activer le scroll si le formulaire devient trop grand
            setTimeout(() => {
                form.scrollTop = form.scrollHeight;
            }, 200); 

            // Mettre à jour l'état visuel
            roleCards.forEach(card => card.classList.remove("active"));
            this.classList.add("active");
        });
    });

    function addField(placeholder, name) {
        let input = document.createElement("input");
        input.type = "text";
        input.placeholder = placeholder;
        input.name = name;
        input.classList.add("extra-field");
        form.insertBefore(input, form.querySelector("button"));
    }
});



document.addEventListener("DOMContentLoaded", function () {
    const roleCards = document.querySelectorAll(".role-card");
    const roleInput = document.getElementById("role");

    roleCards.forEach(card => {
        card.addEventListener("click", function () {
            roleInput.value = this.getAttribute("data-role");
            console.log("Rôle sélectionné :", roleInput.value); // Vérification
        });
    });
});





    </script>
</body>

</html>