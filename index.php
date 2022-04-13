<?php
session_start();

require('./php/config-google.php');
//var_dump($_SESSION);

$langue = 0;
if(isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Website PA</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="./style/styleFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<?php include('./php/header.php');

?>


<body>

<div class="modal-container">
    <div class="modal-popUp">
        <div class="form-container sign-in-form">
            <div class="form-box sign-in-box">
                <span class="close-modal" onclick="closeModal()" title="Fermer">&times;</span>
                <h2><?php echo $connexion_word[$langue]; ?></h2>
                <form role="form" id="connexionForm" enctype="multipart/form-data">
                    <div class="field">
                        <i class="uil uil-at"></i>
                        <input type="email" id="emailConn" placeholder="Email ID" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-lock-alt"></i>
                        <input class="password-input" type="password" id="passwordConn" placeholder="<?php echo $pass_input[$langue]; ?>"
                               required>
                        <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                    </div>
                    <div class="forgot-link">
                        <a href="./recuperation_mdp.php"><?php echo $forget_pass[$langue]; ?></a>
                    </div>
                    <div class="alert-connexion" id="alert-connexion">
                        Veuillez consulter vos mails et activer votre compte.
                    </div>
                    <input class="submit-btn" type="submit" name="submit" value="<?php echo $connexion_button[$langue]; ?>">
                </form>
                <div class="login-options">
                    <p class="text"><?php echo $other_connexion[$langue]; ?></p>
                    <div class="other-login">

                        <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/userinfo.email&access_type=online&redirect_uri=<?= urlencode('http://localhost:8000/conn-google.php') ?>&response_type=code&client_id=<?= GOOGLE_ID ?>"><img src="./images/google.png" alt="Se connecter avec Google"></a>

                        <a href="./conn-discord.php"><img src="./images/discord.png"
                                                          alt="Se connecter avec Discord"></a>
                    </div>
                </div>
            </div>
            <div class="imgBox sign-in-imgBox">
                <div class="sliding-link">
                    <p><?php echo $no_account[$langue]; ?></p>
                    <span class="sign-up-btn"><?php echo $create_account[$langue]; ?></span>
                </div>
                <img src="./images/signin-img.png" alt="Image de connexion..">
            </div>
        </div>

        <div class="form-container sign-up-form">
            <div class="imgBox sign-up-imgBox">
                <div class="sliding-link">
                    <p><?php echo $already_signin[$langue]; ?></p>
                    <span class="sign-in-btn"><?php echo $get_connect[$langue]; ?></span>
                </div>
                <img src="./images/signup-img.png" alt="Image d'inscription..">
            </div>
            <div class="form-box sign-up-box">
                <span class="close-modal-insc" onclick="closeModal()" title="Fermer">&times;</span>
                <h2><?php echo $inscription_word[$langue]; ?></h2>
                <div class="login-options">
                    <div class="other-login">

                        <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/userinfo.email&access_type=online&redirect_uri=<?= urlencode('http://localhost:8000/conn-google.php') ?>&response_type=code&client_id=<?= GOOGLE_ID ?>"><img src="./images/google.png" alt="Se connecter avec Google"></a>

                        <a href="./conn-discord.php"><img src="./images/discord.png"
                                                          alt="Se connecter avec Discord"></a>
                    </div>
                    <p class="text"><?php echo $other_registration[$langue]; ?></p>
                </div>
                <form role="form" id="inscriptionForm" enctype="multipart/form-data">
                    <div class="field">
                        <i class="uil uil-user"></i>
                        <input type="text" placeholder="<?php echo $registration_name[$langue]; ?>" id="name" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-user-square"></i>
                        <input type="text" placeholder="<?php echo $registration_first_name[$langue]; ?>" id="surname" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-at"></i>
                        <input type="email" placeholder="Email ID" id="email" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-lock-alt"></i>
                        <input type="password" placeholder="<?php echo $registration_pass[$langue]; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="<?php echo $must_contain[$langue]; ?>"
                               id="password" required>
                    </div>
                    <p style="font-size: 0.65em; margin-bottom: 5%; color: #2DA771;"><?php echo $contain_number[$langue]; ?></p>
                    <div class="field">
                        <i class="uil uil-lock-access"></i>
                        <input type="password" placeholder="<?php echo $confirm_pass[$langue]; ?>"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="<?php echo $must_contain[$langue]; ?>"
                               id="confirmpass" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-lock-alt"></i>
                        <input type="number" placeholder="<?php echo $registration_age[$langue]; ?>" id="age" required>
                    </div>
                    <div class="field">
                        <i class="uil uil-map-pin"></i>
                        <?php include "./php/nationalite.php"; ?>
                    </div>
                    <h5><?php echo $registration_image[$langue]; ?></h5>
                    <input type="file" id="imgInscription" class="fileInscription" accept="image/jpeg" required>
                    <div class="alert-inscription" id="alert-inscription">
                        Votre compte a été créer avec succès ! <br />
                        Afin de valider votre compte veuillez suivre les instructions envoyées sur votre mail.
                    </div>
                    <input class="submit-btn-insc" type="submit" name="submit" value="<?php echo $register_button[$langue]; ?>">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="text-row">
        <h1 class="slogan"><?php echo $slogan[$langue]; ?></h1>
        <p class="marketing-phrase">
            <i><?php echo $marketing_sentance[$langue]; ?></i>
        </p>

        <h5 class="approuved-byUser">
            <i><?php echo $approuved[$langue]; ?></i>
        </h5>

        <figure class="appstore-icon"></figure>
        <figure class="playstore-icon"></figure>
    </div>

    <div class="row-left">
        <div class="ellipse">

        </div>
        <div class="loyalty-card">

            <h8 class="number-card">3416 9945 3580 2130</h8>
            <h8 class="owner-card"><?php echo $owner_card[$langue]; ?></h8>
            <h8 class="expiry-card"><?php echo $expiry_card[$langue]; ?></h8>
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


    $("#alert-inscription").hide();
    $("#alert-connexion").hide();
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
                if (text === "success") {
                    //alert("success");
                    $("#alert-connexion").show();
                    $("#alert-connexion").html("<span style='color: whitesmoke;'>Connexion établie avec succès !</span>");
                    $("#alert-connexion").fadeOut(4000);
                    setTimeout(function () {
                        window.location.href = "index.php";
                    }, 3000);
                    setTimeout(() => {window.location.href = "./client.php"}, 1200);
                } else if (text === "noninscrit") {
                    //alert("doublon");
                    $("#alert-connexion").show();
                    $("#alert-connexion").html("<span style='color:  #C0392B;'>Compte inconnu, veuillez vous créer un compte !</span>");
                    $("#alert-connexion").fadeOut(4000);
                } else if (text === "pasactif") {
                    //alert("pasactif");
                    $("#alert-connexion").show();
                    $("#alert-connexion").html("<span style='color:  #C0392B;'>Veuillez consulter vos mails et activer votre compte.</span>");
                    $("#alert-connexion").fadeOut(4000);
                }
            }
        });
    }

    // Fonction submit dédiée
    function submitInscriptionForm() {
        if (passwordInsc != confirmpassInsc) {
            $("#alert-inscription").show();
            $("#alert-inscription").html("<center class='alert-class'><strong>La confirmation du mot de passe est incorrecte !</strong></center>");
            $("#alert-inscription").css('color', '#C0392B');
            $("#confirmpassInsc").val('');
            $("#confirmpassInsc").focus();
        } else {
            $("#alert-inscription").hide();
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
                        $("#alert-inscription").show();
                        $("#alert-inscription").html("<center class='alert-class'><strong>Votre compte a été créé avec succès ! </strong>" +
                            "<br><i>Afin de valider votre compte veuillez suivre les instructions envoyées sur votre mail.</i></center>");
                        $("#alert-inscription").css('color', 'whitesmoke');
                        $("#alert-inscription").fadeOut(4000);

                    } else if (text == "doublon") {
                        //alert("doublon");
                        $("#alert-inscription").show();
                        $("#alert-inscription").html("<center class='alert-class'><strong>Un compte existe déjà avec cette adresse mail !</strong></center>");
                        $("#alert-inscription").css('color', '#C0392B');
                        $("#alert-inscription").fadeOut(4000);
                    }
                }
            });
        }
    }

</script>


</body>

<?php include('./php/footer.php') ?>

</html>