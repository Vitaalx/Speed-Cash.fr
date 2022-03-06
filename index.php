<?php
session_start();

require('./php/config-google.php');
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Website PA</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<header>

    <div class="bar-top">
        <div class="btns">
            <img class="logoSpeedCash" src="./icons/logo-speed-cash.gif" alt="Speed Cash">
            <div class="btn-entreprise">
                Entreprise
            </div>
            <div class="btn-client" onclick="afficheModal()" id="openModal">
                Client
            </div>
        </div>

        <div class="social-icon">
            <img class="discord-icon" src="./icons/Discord-icon.png" alt="Discord">
            <img class="instagram-icon" src="./icons/Instagram-icon.svg" alt="Instagram">
            <img class="github-icon" src="./icons/GitHub-icon.svg" alt="GitHub">
            <img class="tiktok-icon" src="icons/TikTok-icon.svg" alt="TikTok">
        </div>

    </div>

</header>

<body>

<div class="modal-container">
    <div class="modal-popUp">
        <div class="form-container sign-in-form">
            <div class="form-box sign-in-box">
                <span class="close-modal" onclick="closeModal()" title="Fermer">&times;</span>
                <h2>Connexion</h2>
                <form role="form" id="connexionForm" enctype="multipart/form-data">
                    <div class="field">
                        <i class="uil uil-at"></i>
                        <input type="email" id="emailConn" placeholder="Email ID" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-lock-alt"></i>
                        <input class="password-input" type="password" id="passwordConn" placeholder="Mot de passe"
                               required>
                        <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                    </div>
                    <div class="forgot-link">
                        <a href="./recuperation_mdp.php">Mot de passe oublié ?</a>
                    </div>
                    <div class="alert-connexion" id="alert-connexion">

                    </div>
                    <input class="submit-btn" type="submit" name="submit" value="Connexion">
                </form>
                <div class="login-options">
                    <p class="text">Ou, se connecter avec...</p>
                    <div class="other-login">

                        <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/userinfo.email&access_type=online&redirect_uri=<?= urlencode('http://localhost:8000/conn-google.php') ?>&response_type=code&client_id=<?= GOOGLE_ID ?>"><img src="./images/google.png" alt="Se connecter avec Google"></a>

                        <a href="./conn-discord.php"><img src="./images/discord.png"
                                                          alt="Se connecter avec Discord"></a>
                    </div>
                </div>
            </div>
            <div class="imgBox sign-in-imgBox">
                <div class="sliding-link">
                    <p>Je n'ai pas de compte ?</p>
                    <span class="sign-up-btn">Créer un compte</span>
                </div>
                <img src="./images/signin-img.png" alt="Image de connexion..">
            </div>
        </div>

        <div class="form-container sign-up-form">
            <div class="imgBox sign-up-imgBox">
                <div class="sliding-link">
                    <p>Déjà inscrit ?</p>
                    <span class="sign-in-btn">Se connecter</span>
                </div>
                <img src="./images/signup-img.png" alt="Image d'inscription..">
            </div>
            <div class="form-box sign-up-box">
                <span class="close-modal-insc" onclick="closeModal()" title="Fermer">&times;</span>
                <h2>Inscription</h2>
                <div class="login-options">
                    <div class="other-login">

                        <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/userinfo.email&access_type=online&redirect_uri=<?= urlencode('http://localhost:8000/conn-google.php') ?>&response_type=code&client_id=<?= GOOGLE_ID ?>"><img src="./images/google.png" alt="Se connecter avec Google"></a>

                        <a href="./conn-discord.php"><img src="./images/discord.png"
                                                          alt="Se connecter avec Discord"></a>
                    </div>
                    <p class="text">Ou, s'inscrire avec une e-mail...</p>
                </div>
                <form role="form" id="inscriptionForm" enctype="multipart/form-data">
                    <div class="field">
                        <i class="uil uil-user"></i>
                        <input type="text" placeholder="Nom" id="name" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-user-square"></i>
                        <input type="text" placeholder="Prénom" id="surname" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-at"></i>
                        <input type="email" placeholder="Email ID" id="email" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-lock-alt"></i>
                        <input type="password" placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="Doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre."
                               id="password" required>
                    </div>
                    <p style="font-size: 0.65em; margin-bottom: 5%; color: #2DA771;">* Votre mot de passe doit contenir
                        au moins 8 caractères, une minuscule, une majuscule et un chiffre !</p>
                    <div class="field">
                        <i class="uil uil-lock-access"></i>
                        <input type="password" placeholder="Confirmer mot de passe"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="Doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre."
                               id="confirmpass" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-lock-alt"></i>
                        <input type="number" placeholder="Âge" id="age" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-map-pin"></i>
                        <?php include "./php/nationalite.php"; ?>
                    </div>
                    <h5>Choisir une image :</h5>
                    <input type="file" id="imgInscription" class="fileInscription" accept="image/jpeg" required>
                    <div class="alert" id="alert">

                    </div>
                    <input class="submit-btn" type="submit" name="submit" value="S'inscrire">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="text-row">
        <h1 class="slogan">Achetez grâce à nous, vous y gagnerez</h1>
        <p class="marketing-phrase">
            <i>Avec une intégration et un portefeuille numérique bien construit, contrôlez votre propre carte et
                répertoriez tous vos paiements à payer.
                Définissez votre propre clé de code pour effectuer tous les paiements en une seule action
                d'approbation.</i>
        </p>
        <h5 class="details-wallet">
            <strong>Trouver plus de détails et en savoir plus sur le portefeuille numérique <a
                        href="https://fr.wikipedia.org/wiki/Porte-monnaie_%C3%A9lectronique">içi</a></strong>
        </h5>

        <h5 class="approuved-byUser">
            <i>Approuvé par plus de 40 millions d'utilisateurs</i>
        </h5>

        <figure class="appstore-icon"></figure>
        <figure class="playstore-icon"></figure>
    </div>

    <div class="row-left">
        <div class="ellipse">

        </div>
        <div class="loyalty-card">

            <h8 class="number-card">3416 9945 3580 2130</h8>
            <h8 class="owner-card">Nom du propriétaire</h8>
            <h8 class="expiry-card">Expire dans</h8>
            <h8 class="cvv-card">CVV</h8>
            <h7 class="ownerName-card">Macquaire Liam</h7>
            <h7 class="date-card">10/27</h7>
            <h7 class="number-cvv">239</h7>

        </div>
    </div>
</div>

<script src="./js/animation.js"></script>
<script src="./js/modal.js"></script>

<script>


    $("#alert").hide();
    // SUR VALIDATION DU FORMULAIRE D'INSCRIPTION
    $("#inscriptionForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        passwordInsc = $("#password").val();
        confirmpassInsc = $("#confirmpass").val();
        console.log(passwordInsc + confirmpassInsc);
        // Appel de la fonction dédiée
        submitInscriptionForm();
    });

    // SUR VALIDATION DU FORMULAIRE DE CONNEXION
    $("#connexionForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        // Appel de la fonction dédiée
        connexionVerif();
    });

    // Fonction submit connexion

    function connexionVerif() {

        $("#alert-connexion").hide();
        // Création d'un formulaire de données
        var fd = new FormData();
        fd.append('email', $("#emailConn").val());
        fd.append('password', $("#passwordConn").val());

        //Post du formulaire via AJAX
        $.ajax({
            type: "POST",
            url: "php/connexion.php",
            contentType: false,
            processData: false,
            data: fd,
            success: function (text) {
                alert('-' + text + '-');
                if (text == "success") {
                    //alert("success");
                    $("#alert-connexion").show();
                    $("#alert-connexion").html("<span style='color: #2DA771;'><strong>Connexion établie avec succès !</strong></span>");
                    window.location.href = './client.php';

                } else if (text == "noninscrit") {
                    //alert("doublon");
                    $("#alert-connexion").show();
                    $("#alert-connexion").html("<span style='color: indianred;'><strong>Compte inconnu, veuillez vous créer un compte !</strong></span>");
                } else if (text == "pasactif") {
                    //alert("pasactif");
                    $("#alert-connexion").show();
                    $("#alert-connexion").html("<span style='color: indianred;'><strong>Veuillez consulter vos mails et activer votre compte.</strong></span>");
                }
            }
        });
    }

    // Fonction submit dédiée
    function submitInscriptionForm() {
        if (passwordInsc != confirmpassInsc) {
            $("#alert").show();
            $("#alert").html("<center class='alert-class'><strong>La confirmation du mot de passe est incorrecte !</strong></center>");
            $("#alert").css('color', 'indianred');
            $("#alert").css('font-size', '1em');
            $("#confirmpassInsc").val('');
            $("#confirmpassInsc").focus();
        } else {
            $("#alert").hide();
            // Création d'un formulaire de données
            var fd = new FormData();
            var file = $('#imgInscription')[0].files[0];
            fd.append('nom', $("#name").val());
            fd.append('prenom', $("#surname").val());
            fd.append('email', $("#email").val());
            fd.append('password', $("#password").val());
            fd.append('age', $("#age").val());
            fd.append('nationalite', $("#nation").val());
            //fd.append('image', file);
            //alert(file);

            //Post du formulaire via AJAX
            $.ajax({
                type: "POST",
                url: "php/inscription.php",
                contentType: false,
                processData: false,
                data: fd,
                success: function (text) {
                    alert("-" + text + "-");
                    if (text == "success") {
                        //alert("success");
                        $("#alert").show();
                        $("#alert").html("<center class='alert-class'><strong>Votre compte a été créé avec succès ! </strong>" +
                            "<br><i>Afin de valider votre compte veuillez suivre les instructions envoyées sur votre mail.</i></center>");
                        $("#alert").css('color', '#06E775');
                        $("#alert").css('font-size', '1em');

                    } else if (text == "doublon") {
                        //alert("doublon");
                        $("#alert").show();
                        $("#alert").html("<center class='alert-class'><strong>Un compte existe déjà avec cette adresse mail !</strong></center>");
                        $("#alert").css('color', 'indianred');
                        $("#alert").css('font-size', '1em');
                    }
                }
            });
        }
    }

</script>


</body>

<footer>
    © | Speed-Cash | Tous droit réservés |<?php date("Y"); ?>
</footer>

</html>