<?php

session_start();

$langue = 0;
if(isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');

if (!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Paramétres du compte</title>
    <link rel="stylesheet" type="text/css" href="./style/style_client.css">
    <link rel="stylesheet" type="text/css" href="./style/styleFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="shortcut icon" type="image/png" href="./icons/favicon.png">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<?php include('./php/header_client.php'); ?>

<body>

<div class="password-container">

<?php include("./php/navigation-bar-profile.php"); ?>

    <div class="password-card">
        <div class="password-card-header">
            <h1>Mot de passe</h1>
        </div>
        <div class="password-card-body">
            <h2>Changer votre mot de passe</h2>
            <form role="form" id="changeMDPForm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="old-pass">Ancien mot de passe</label>
                    <input type="password" name="old-pass" class="old-pass-input" id="old-password" placeholder="Ancien mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="new-pass">Nouveau mot de passe</label>
                    <input type="password" name="new-password" class="new-pass-input" id="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre." placeholder="Nouveau mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="new-confirm-pass">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="new-confirm-confirmation" class="new-confirm-pass-input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre." id="new-confirm-password" placeholder="Confirmer le nouveau mot de passe" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Mettre à jour le mot de passe</button><a href="./recuperation_mdp.php">J'ai oublié mon mot de passe</a>

                <div class="alert-changeMDP" id="alert-changeMDP">
                    Veuillez consulter vos mails et activer votre compte.
                </div>

            </form>
        </div>

    </div>

</div>


<script>

    $("#alert-changeMDP").hide();
    $("#changeMDPForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        newPass = $("#new-password").val();
        confirmPass = $("#new-confirm-password").val();
        console.log(newPass + confirmPass);
        // Appel de la fonction dédiée
        submitChangeMDPForm();
    });

    function submitChangeMDPForm() {
        if (newPass !== confirmPass) {
            $("#alert-changeMDP").show();
            $("#alert-changeMDP").html("<center><strong>La confirmation du mot de passe est incorrecte !</strong></center>");
            $("#alert-changeMDP").css('color', 'red');
            $("#new-confirm-password").val('');
            $("#new-confirm-password").focus();
            $("#alert-changeMDP").fadeOut(4000);
        } else {
            $("#alert-changeMDP").hide();
            // Création d'un formulaire de données
            var fd = new FormData();

            fd.append('old_password', $("#old-password").val());
            fd.append('new_password', $("#new-password").val());

            //Post du formulaire via AJAX
            $.ajax({
                type: "POST",
                url: "php/changeMDP.php",
                contentType: false,
                processData: false,
                data: fd,
                success: function (text) {
                    alert("-" + text + "-");
                    if (text == "success") {
                        //alert("success");
                        $("#alert-changeMDP").show();
                        $("#alert-changeMDP").html("<center>Votre mot de passe à bien été changé !</center>");
                        $("#alert-changeMDP").css('color', 'whitesmoke');
                        $("#alert-changeMDP").fadeOut(4000);

                    } else {
                        //alert("fail");
                        $("#old-password").val('');
                        $("#old-password").focus();
                        $("#alert-changeMDP").show();
                        $("#alert-changeMDP").html("<center><strong>Votre mot de passe est incorrect !</strong></center>");
                        $("#alert-changeMDP").css('color', 'red');
                        $("#alert-changeMDP").fadeOut(4000);
                    }
                }
            });
        }
    }

</script>

</body>

<?php include('./php/footer.php') ?>

</html>
