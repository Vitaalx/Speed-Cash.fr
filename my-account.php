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

<div class="account-container">

<?php include("./php/navigation-bar-profile.php"); ?>

    <div class="account-card">
        <div class="account-card-header">
            <h1>Compte</h1>
        </div>
        <div class="account-card-body">
            <h2>Changer votre Nom et votre Prénom</h2>
            <form role="form" id="changeNameForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom" required>
                </div>
                <button type="submit" class="btn btn-primary">Changer</button>
            </form>
            <div class="alert-changeName" id="alert-changeName">

                <strong>Succès!</strong> Votre nom et prénom ont bien été changés.

            </div>
            <h2 style="color: indianred">Supprimer le compte</h2>
            <span>Une fois que vous avez supprimé votre compte, il n'y a plus de retour arrière. Soyez-en certains !</span> <br/>
            <?php echo '<a href="php/delete_client.php?prénom=' . $_SESSION["prénom"] . '&id=' . $_SESSION["id"] .'"><button type="button" id="supprCompte" onclick="return confirmDelete()" class="btn btn-danger supprCompte">Supprimer mon compte</button></a>'; ?> <br/>
            <span><i>Toute suppression de compte est définitive !</i></span> <br/>
        </div>

    </div>

</div>

<script>

    $("#alert-changeName").hide();
    // SUR VALIDATION DU FORMULAIRE D'INSCRIPTION
    $("#changeNameForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        // Appel de la fonction dédiée
        submitchangeNameForm();
    });

    function submitchangeNameForm() {

        $("#alert-changeName").hide();
        // Création d'un formulaire de données
        var fd = new FormData();
        fd.append('nom', $("#nom").val());
        fd.append('prénom', $("#prenom").val());

        //Post du formulaire via AJAX
        $.ajax({
            type: "POST",
            url: "php/changeName.php",
            contentType: false,
            processData: false,
            data: fd,
            beforeSend:function() {
                $(".account-container").html("<img src='images/Loading_icon.gif' style='width: 80px; height: 80px;'/>");
            },
            success: function (text) {
                alert('-' + text + '-');
                if (text === "success") {
                    //alert("success");
                    $("#alert-changeName").show();
                    $("#alert-changeName").html("<span style='color: whitesmoke;'>Votre nom et prénom ont bien été changés</span>");
                    $("#alert-changeName").fadeOut(4000);
                } else if(text === "nonenregistré") {
                    $("#alert-changeName").show();
                    $("#alert-changeName").html("<span style='color: #C0392B;'>Une erreur est survenue</span>");
                    $("#alert-changeName").fadeOut(4000);
                } else if (text === "identique") {
                    $("#alert-changeName").show();
                    $("#alert-changeName").html("<span style='color: #C0392B;'>Veuillez entrer un nom/prénom différent de votre ancien.</span>");
                    $("#alert-changeName").fadeOut(4000);
                } else {
                    $("#alert-changeName").show();
                    $("#alert-changeName").html("<span style='color: #C0392B;'>Une erreur est survenue</span>");
                    $("#alert-changeName").fadeOut(4000);
                }
            }
        });
    }

    function confirmDelete() {
        if ( confirm( "Êtes vous sûr de vouloir supprimer votre compte ?" ) ) {
            // Code à éxécuter si le l'utilisateur clique sur "OK"

            location.href = "php/delete_client.php";
            return true;
        } else {
            // Code à éxécuter si l'utilisateur clique sur "Annuler"
            //alert("Suppression annulée");
            location.href = "my-account.php";
            return false;
        }

    }

</script>

</body>

<?php include('./php/footer.php') ?>

</html>