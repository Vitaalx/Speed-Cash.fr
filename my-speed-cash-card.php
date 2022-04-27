<?php

session_start();

$langue = 0;
if(isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');
include ('./php/db.php');

if (!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération des cartes
    $sql = "SELECT * FROM cards_client WHERE client_id = '".$_SESSION["id"]."'";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    if ($nb > 0) {

        $cards = $stmt->fetchAll();
        //var_dump($cards);

    } else {

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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<?php include('./php/header_client.php'); ?>

<body>

<div class="my-speed-cash-card-container">

<?php include("./php/navigation-bar-profile.php"); ?>

    <div class="my-speed-cash-card-card">

        <form role="form" action="" id="requestCardForm" enctype="multipart/form-data">
            <h2>Demande de carte</h2>
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="name-ask-card-input" id="name-ask-card" placeholder="Votre nom" required>
            </div>
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" class="firstname-ask-card-input" id="firstname-ask-card" placeholder="Votre prénom" required>
            </div>
            <div class="form-group">
                <label for="code-card">Votre code à 4 chiffres</label>
                <input type="text" pattern="[0-9]{4}" title="Votre code peut contenir uniquement 4 chiffres." class="code-ask-card-input" id="code-ask-card" placeholder="Votre code" required>
            </div>
            <button type="submit" class="btn btn-primary">Demande de carte</button>
        </form>
        <div class="alert-requestCard" id="alert-requestCard">

            <strong>Succès!</strong> Votre demande de carte à bien été prise en compte.

        </div>

        <div class="your-card">
            <h2>Vos/votre carte</h2>
            <div class="card-container">

                <?php

                for ($i = 1; $i <=$nb; $i++) {

                    echo '<div class="card-front">';
                    echo '<div class="card-front-logo">';
                    echo '<img src="./images/" alt="Carte de fidélité Speed-Cash">';
                    echo '</div>';
                    echo '<div class="card-front-code">';
                    echo '<p>Votre code : <span id="code-card-front">' . $cards[$i - 1]["number"] . '</span></p>';
                    echo '<p>Date d\'expiration : <span id="date-card-front">' . $cards[$i - 1]["expiry_date"] .'</span></p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="card-back">';
                    echo '<div class="card-back-logo">';
                    echo '<img src="./images/" alt="Carte de fidélité Speed-Cash">';
                    echo '</div>';
                    echo '<div class="card-back-code">';
                    echo '<p>Votre code CVC : <span id="code-card-back">' . $cards[$i - 1]["cvc"] . '</span></p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="separator-cards"></div>';
                }

                if ($nb == 0) echo '<p>Vous n\'avez pas encore enregistré de carte sur notre site.</p>';

                ?>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

<script>

    $("#alert-requestCard").hide();
    // SUR VALIDATION DU FORMULAIRE D'INSCRIPTION
    $("#requestCardForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        // Appel de la fonction dédiée
        submitRequestCardForm();
    });

    function submitRequestCardForm() {

        $("#alert-requestCard").hide();
        // Création d'un formulaire de données
        var fd = new FormData();
        fd.append('nom', $("#name-ask-card").val());
        fd.append('prenom', $("#firstname-ask-card").val());
        fd.append('code', $("#code-ask-card").val());

        //Post du formulaire via AJAX
        $.ajax({
            type: "POST",
            url: "./php/requestCard.php",
            contentType: false,
            processData: false,
            data: fd,
            beforeSend:function() {
                $(".my-speed-cash-card-container").html("<img src='images/Loading_icon.gif' style='width: 80px; height: 80px;'/>");
            },
            success: function (text) {
                alert("-" + text + "-");
                if (text == "success") {
                    //alert("success");
                    $("#alert-requestCard").show();
                    $("#alert-requestCard").html("<strong>Succès!</strong> Votre demande de carte à bien été prise en compte.");
                    $("#alert-requestCard").css('color', 'whitesmoke');
                    $("#alert-requestCard").fadeOut(4000);

                } else {
                    //alert("fail");
                    $("#alert-requestCard").show();
                    $("#alert-requestCard").html("<strong>Erreur!</strong> Votre demande de carte n'a pas pu être prise en compte.");
                    $("#alert-requestCard").css('color', 'red');
                    $("#alert-requestCard").fadeOut(4000);
                }
            }
        });

    }

</script>

</body>

<?php include('./php/footer.php') ?>

</html>
