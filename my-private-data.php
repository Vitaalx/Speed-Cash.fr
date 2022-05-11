<?php

session_start();

$langue = 0;
if (isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');

if (!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}

include "./php/db.php";

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération des données de l'utilisateur
    $sql = "SELECT * FROM users where id = " . $_SESSION["id"];
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    if ($nb == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //var_dump($row);
        $nom = $row["nom"];
        $prenom = $row["prénom"];
        $email = $row["email"];
        $age = $row["age"];
        $nationalité = $row["nationalité"];


    } else {
        header("Location: ./index.php");
    }


} catch (PDOException $e) {
    echo $e->getMessage();
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

<div class="private-data-container">

    <?php include("./php/navigation-bar-profile.php"); ?>
    <div class="private-data-card">
        <div class="private-data-header-title">
            <h1>Mes informations personnelles</h1>
        </div>
        <div class="private-data-card-body">
            <div class="private-data-card-right">
                <h2>Changer mon image de profile</h2>
                <form role="form" id="changeImageForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="current-img-profil">Image de profil actuelle</label>
                        <img id="current-img-profil" src="./images/avatar/AVATAR-<?php echo $_SESSION["id"]; ?>.jpeg"
                             alt="Image de <?php echo $_SESSION["prénom"]; ?>"
                             style="width: 100%; height: 250px; border-radius: 18px;">
                    </div>
                    <div class="form-group">
                        <input type="file" class="new-img-input" id="new-img-profil" required>
                        <label for="new-img-profil">Nouvelle image de profil</label>
                        <img id="previewInscription" class="img-thumbnail"
                             style="width: 100%; height: 250px; border-radius: 12px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Changer mon image</button>
                </form>
                <div class="alert-private-data" id="alert-private-data">
                    Votre compte a été créer avec succès ! <br/>
                    Afin de valider votre compte veuillez suivre les instructions envoyées sur votre mail.
                </div>
            </div>
            <div class="private-data-card-left">
                <div class="private-data-info">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="name-profil-input" id="name-profil" placeholder="<?php echo $nom ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" class="firstname-profil-input" id="firstname-profil" placeholder="<?php echo $prenom ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="email-profil-input" id="email-profil"
                               placeholder="<?php echo $email ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="age">Âge</label>
                        <form role="form" id="changeAgeForm" enctype="multipart/form-data">
                        <input type="number" class="age-profil-input" id="age-profil" placeholder="<?php echo $age ?>" required>
                        <button type="submit" class="btn btn-primary">Changer mon âge</button>
                        </form>
                        <div class="alert-changeAge" id="alert-changeAge">

                            <strong>Succès!</strong> Votre âge à bien été changé.

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nation">Nationalité</label>
                        <input type="text" class="nation-profil-input" id="nation-profil" placeholder="<?php echo $nationalité ?>" disabled>
                        <form role="form" id="changeNationForm" enctype="multipart/form-data">
                        <?php include "./php/nationalite.php"; ?>
                        <button type="submit" class="btn btn-primary">Changer ma nationalité</button>
                        </form>
                        <div class="alert-changeNation" id="alert-changeNation">

                            <strong>Succès!</strong> Votre nationalité à bien été changée.

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

    <script>

        $("#alert-changeAge").hide();
        $("#alert-changeNation").hide();
        $("#previewInscription").hide();
        $("#alert-private-data").hide();
        $("#new-img-profil").change(function (e) { //e correspond à l'événement
            var fileName = e.target.files[0].name;
            var fileType = e.target.files[0].type;
            var fileSize = e.target.files[0].size;
            // Vérification type et taille de l'image
            if (((fileType == 'image/jpeg') || (fileType == 'image/jpg')) && (fileSize <= 2048000)) {
                // Affichage du preview
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#previewInscription").attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
                // Bandeau alerte masqué
                $("#previewInscription").show();
            } else {
                $("#current-img-profil").val('');
                $("#previewInscription").attr('src', '');
                // Bandeau alerte visible

                $("#alert-private-data").show();
                $("#alert-private-data").html("<center><strong>L'image doit être de type jpeg ou jpg et de taille 2 Mo maximum</strong></center>");
                $("#alert-private-data").fadeOut(10000);


            }
        });

        $("#changeAgeForm").submit(function (e) {
            e.preventDefault();
            var age = $("#age-profil").val();
            $.ajax({
                url: './php/changeAge.php',
                type: 'POST',
                data: {
                    age: age
                },
                beforeSend:function() {
                    $(".private-data-container").html("<img src='images/Loading_icon.gif' style='width: 80px; height: 80px;'/>");
                },
                success: function (text) {
                    alert("-" + text + "-");
                    if (text === "success") {
                        $("#alert-changeAge").show();
                        $("#alert-changeAge").html("<center><strong>Succès!</strong> Votre âge à bien été changé.</center>");
                        $("#alert-changeAge").fadeOut(4000);
                        setTimeout(() => {window.location.href = "./my-private-data.php"}, 4000);
                    } else {
                        $("#alert-changeAge").show();
                        $("#alert-changeAge").html("<center><strong>Erreur!</strong> Votre âge n'a pas été changé, veuillez réessayer.</center>");
                        $("#alert-changeAge").fadeOut(4000);
                    }

                }
            });
        });


        $("#changeImageForm").submit(function (event) {
            // Annulation du submit auto
            event.preventDefault();
            // Appel de la fonction dédiée
            changeImageForm();
        });

        function changeImageForm() {

            // Création d'un formulaire de données
            var fd = new FormData();
            var file = $('#new-img-profil')[0].files[0];
            fd.append('image', file);


            $.ajax({
                type: "POST",
                url: "php/changeImage.php",
                contentType: false,
                processData: false,
                data: fd,
                beforeSend:function() {
                    $(".container-thumbnail").html("<img src='images/Loading_icon.gif' style='width: 80px; height: 80px;'/>");
                },
                success: function (text) {
                    alert("-" + text + "-");
                    if (text == "success") {
                        //alert("success");
                        $("#alert-private-data").show();
                        $("#alert-private-data").html("<center><strong>Succès!</strong> Votre image à bien été changé.</center>");
                        $("#alert-private-data").css('color', 'whitesmoke');
                        $("#alert-private-data").fadeOut(4000);
                        setTimeout(() => {window.location.href = "./my-private-data.php"}, 4000);

                    } else {
                        //alert("fail");
                        $("#alert-private-data").show();
                        $("#alert-private-data").html("<center><strong>Erreur!</strong> Votre image n'a pas été changé, veuillez réessayer.</center>");
                        $("#alert-private-data").css('color', 'red');
                        $("#alert-private-data").fadeOut(4000);
                    }
            }

        });
    }



        $("#changeNationForm").submit(function (e) {
            e.preventDefault();
            var nation = $("#nation").val();
            $.ajax({
                url: './php/changeNation.php',
                type: 'POST',
                data: {
                    nation: nation
                },
                beforeSend:function() {
                    $(".container-thumbnail").html("<img src='images/Loading_icon.gif' style='width: 80px; height: 80px;'/>");
                },
                success: function (text) {
                    alert("-" + text + "-");
                    if (text === "success") {
                        $("#alert-changeNation").show();
                        $("#alert-changeNation").html("<center><strong>Succès!</strong> Votre nationalité à bien été changée.</center>");
                        $("#alert-changeNation").fadeOut(4000);
                        setTimeout(() => {window.location.href = "./my-private-data.php"}, 4000);
                    } else {
                        $("#alert-changeNation").show();
                        $("#alert-changeNation").html("<center><strong>Erreur!</strong> Votre nationalité n'a pas été changée, veuillez réessayer.</center>");
                        $("#alert-changeNation").fadeOut(4000);
                    }

                }
            });
        });

    </script>

</body>

<?php include('./php/footer.php') ?>

</html>

