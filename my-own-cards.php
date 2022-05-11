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
        //echo "Aucune carte trouvée";
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

<div class="my-own-card-container">

<?php include("./php/navigation-bar-profile.php"); ?>

        <div class="my-own-card-card">
            <div class="your-card">
                <h2>Vos cartes</h2>
                <div class="your-card-list">
                    <?php

                    for($i = 1; $i <= $nb; $i++) {
                        echo '<div class="card-item">';
                        echo '<div class="card-item-fname">';
                        echo '<label>Prénom : </label>';
                        echo '<span>' . $_SESSION["prénom"] .'</span>';
                        echo '</div>';
                        echo '<div class="card-item-name">';
                        echo '<label>Nom : </label>';
                        echo '<span>' . $_SESSION["nom"] .'</span>';
                        echo '</div>';
                        echo '<div class="card-item-number">';
                        echo '<label>Numéro de carte : </label>';
                        echo '<span>' . $cards[$i-1]["number"] .'</span>';
                        echo '</div>';
                        echo '<div class="card-item-date">';
                        echo '<label>Date d\'expiration : </label>';
                        echo '<span>' . $cards[$i-1]["expiry_date"] .'</span>';
                        echo '</div>';
                        echo '<div class="card-item-cvc">';
                        echo '<label>Code de sécurité : </label>';
                        echo '<span>' . $cards[$i-1]["cvc"] .'</span>';
                        echo '</div>';
                        echo '<div class="card-item-delete">';
                        echo '<a onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette carte ?\')" href="/php/delete_card.php?id='.$cards[$i-1]["id"].'">Supprimer</a>';
                        echo '</div>';
                        echo '</div>';
                    }

                    if ($nb == 0) echo '<p>Vous n\'avez pas encore enregistré de carte sur notre site.</p>';

                    if(isset($_GET["delete"])) {
                        if($_GET["delete"] == "success") {
                            echo "<div class='success-notif' id='success-notif' style='display: block;'><span class='close-popup-notif' onclick='closePopUp()' title='Fermer'>&times;</span>Votre carte à bien été supprimée !</div>";
                        }
                    }

                    ?>

                    <script src="./js/modal.js"></script>

            </div>
        </div>

            <div class="form-container-add-card">
            <form role="form" action="" id="addCardForm" enctype="multipart/form-data">
                <div class="form-body-left">
                <h2>Ajouter une carte</h2>
                <div class="form-group">
                    <label for="card-number">Numéro de carte</label>
                    <input type="text" class="card-number-input" pattern="[0-9]{16}" title="Votre code peut contenir uniquement 16 chiffres." id="card-number" placeholder="Votre numéro de carte" required>
                </div>
                <div class="form-group">
                    <label for="card-name">Nom sur la carte</label>
                    <input type="text" class="name-add-card-input" id="add-card-name" placeholder="Votre nom" required>
                </div>
                    <div class="form-group">
                        <label for="card-fname">Prénom sur la carte</label>
                        <input type="text" class="fname-add-card-input" id="add-card-fname" placeholder="Votre prénom" required>
                    </div>
                <div class="form-group">
                    <label for="card-expiry">Date d'expiration</label>
                    <select name="card-month" id="month-select">
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select name="card-year" id="year-select">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                        <option value="2036">2036</option>
                        <option value="2037">2037</option>
                        <option value="2038">2038</option>
                        <option value="2039">2039</option>
                        <option value="2040">2040</option>
                    </select>
                    <div class="form-group">
                        <label for="card-fname">Code de sécurite (CVC) :</label>
                        <input type="text" pattern="[0-9]{3}" title="Votre code peut contenir uniquement 3 chiffres." class="cvc-add-card-input" id="add-card-cvc" placeholder="Votre CVC" required>
                    </div>
                </div>
                    <div class="form-body-right">
                        <img src="images/logo-visa.png" alt="Logo Visa" width="50" height="35">
                        <img src="images/logo-mastercard.png" alt="Logo MasterCard" width="50" height="35">
                        <img src="images/logo-american-express.png" alt="Logo American Express" width="50" height="35">
                        <img src="images/logo-cb.jpg" alt="Logo CB" width="50" height="35">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter une carte</button>
            </form>
                <div class="alert-addCard" id="alert-addCard">

                    <strong>Succès!</strong> Votre carte à bien été ajoutée.

                </div>
            </div>


    </div>
</div>


<script>

    $("#alert-addCard").hide();
    // SUR VALIDATION DU FORMULAIRE D'INSCRIPTION
    $("#addCardForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        // Appel de la fonction dédiée
        submitAddCardForm();
    });

    function submitAddCardForm() {

        $("#alert-addCard").hide();
        // Création d'un formulaire de données
        var fd = new FormData();
        fd.append('nom', $("#add-card-name").val());
        fd.append('prenom', $("#add-card-fname").val());
        fd.append('number', $("#card-number").val());
        fd.append('cvc', $("#add-card-cvc").val());
        fd.append('month_expiry', $("#month-select").val());
        fd.append('year_expiry', $("#year-select").val());

        //Post du formulaire via AJAX
        $.ajax({
            type: "POST",
            url: "./php/addCard.php",
            contentType: false,
            processData: false,
            data: fd,
            beforeSend:function() {
                $(".my-own-card-container").html("<img src='images/Loading_icon.gif' style='width: 80px; height: 80px;'/>");
            },
            success: function (text) {
                alert("-" + text + "-");
                if (text == "success") {
                    //alert("success");
                    $("#alert-addCard").show();
                    $("#alert-addCard").html("<strong>Succès!</strong> Votre ajout de carte à bien été pris en compte.");
                    $("#alert-addCard").css('color', 'whitesmoke');
                    $("#alert-addCard").fadeOut(2000);
                    setTimeout(() => {window.location.href = "./my-own-cards.php"}, 2000);

                } else {
                    //alert("fail");
                    $("#alert-addCard").show();
                    $("#alert-addCard").html("<strong>Erreur!</strong> Votre ajout de carte n'a pas pu être pris en compte.");
                    $("#alert-addCard").css('color', 'red');
                    $("#alert-addCard").fadeOut(2000);
                }
            }
        });

    }

</script>

</body>

<?php include('./php/footer.php') ?>

</html>
