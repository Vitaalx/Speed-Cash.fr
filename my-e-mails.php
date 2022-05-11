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

<div class="e-mail-container">

<?php include("./php/navigation-bar-profile.php"); ?>

    <div class="e-mail-card">
        <div class="e-mail-card-header">
            <h1>E-mail</h1>
        </div>
        <div class="e-mail-card-body">
            <h2>Changer votre adresse mail</h2>
            <form role="form" id="changeMailForm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="old-email">Ancienne adresse mail</label>
                    <input type="email" class="old-e-mail-input" id="old-e-mail" placeholder="Ancien e-mail" required>
                </div>
                <div class="form-group">
                    <label for="new-email">Nouveau E-mail</label>
                    <input type="email" class="new-e-mail-input" id="new-e-mail" placeholder="Nouveau E-mail" required>
                </div>
                <div class="form-group">
                    <label for="new-email">Confirmez votre E-mail</label>
                    <input type="email" class="confirm-mail-input" id="confirm-mail" placeholder="Confirmez votre E-mail" required>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour mon e-mail</button>
            </form>
            <div class="alert-changeMail" id="alert-changeMail">

                <strong>Succès!</strong> Votre adresse mail à bien été changés.

            </div>
        </div>

    </div>

</div>


<script>

    $("#alert-changeMail").hide();
    $("#changeMailForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        newMail = $("#new-e-mail").val();
        confirmMail = $("#confirm-mail").val();
        console.log(newMail + confirmMail);
        // Appel de la fonction dédiée
        submitChangeMDPForm();
    });

    function submitChangeMDPForm() {
        if (newMail !== confirmMail) {
            $("#alert-changeMail").show();
            $("#alert-changeMail").html("<center><strong>La confirmation de votre E-mail est incorrect !</strong></center>");
            $("#alert-changeMail").css('color', 'red');
            $("#confirm-mail").val('');
            $("#confirm-mail").focus();
            $("#alert-changeMail").fadeOut(4000);
        } else {
            $("#alert-changeMail").hide();
            // Création d'un formulaire de données
            var fd = new FormData();

            fd.append('old_mail', $("#old-e-mail").val());
            fd.append('new_mail', $("#new-e-mail").val());

            //Post du formulaire via AJAX
            $.ajax({
                type: "POST",
                url: "php/changeMail.php",
                contentType: false,
                processData: false,
                data: fd,
                success: function (text) {
                    alert("-" + text + "-");
                    if (text == "success") {
                        //alert("success");
                        $("#alert-changeMail").show();
                        $("#alert-changeMail").html("<center>Votre adresse mail à bien été changé !</center>");
                        $("#alert-changeMail").css('color', 'whitesmoke');
                        $("#alert-changeMail").fadeOut(4000);

                    } else {
                        //alert("fail");
                        $("#old-e-mail").val('');
                        $("#old-e-mail").focus();
                        $("#alert-changeMail").show();
                        $("#alert-changeMail").html("<center><strong>Votre adresse mail est incorrect !</strong></center>");
                        $("#alert-changeMail").css('color', 'red');
                        $("#alert-changeMail").fadeOut(4000);
                    }
                }
            });
        }
    }

</script>

</body>

<?php include('./php/footer.php') ?>

</html>
