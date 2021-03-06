
<?php
session_start();
require './panier.class.php';
include './php/calcul_note.php';
include("./php/traduction_en.php");

$langue = 0;
if (isset($_GET['lang'])) $langue = $_GET['lang'];

$cart = new panier();
if (!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toutes les prestations</title>
    <link rel="stylesheet" type="text/css" href="./style/style_client.css">
    <link rel="stylesheet" type="text/css" href="./style/styleFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="./icons/favicon.png">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<?php include('./php/header_client.php') ?>

<body class="body-all-products">

<div class="filter-products-form">
    <div class="filter-products-header">
        <h2 style="color: white;">Filtrer les prestations</h2>
        <div class="filter-products-close">
            <i class="uil uil-tag-alt tag-alt-all-products"></i>
        </div>
    </div>
    <div class="select-filter">

        <!-- Barre de recherche -->
        <input type="text" id="search-on-presta" value="" placeholder="Rechercher une prestation">

        <label style="color: white;">Prix Min</label>
        <input style="width: 50px" type="number" name="order-by-price-min" id="order-by-price-min">
        <label style="color: white;">Prix Max</label>
        <input style="width: 50px" type="number" name="order-by-price-max" id="order-by-price-max">
        <select name="filter-prestas-by-category" id="filter-prestas-by-category">
            <option value="" selected="">Cat??gorie</option>
            <option value="Parc Attraction">Parc Attraction</option>
            <option value="Cin??ma">Cin??ma</option>
            <option value="Restaurant">Restaurant</option>
            <option value="Bar">Bar</option>
            <option value="Salle de sport">Salle de sport</option>
            <option value="Autre">Autre</option>
        </select>
        <button id="filter-products-button">Filtrer</button>
    </div>
</div>

<div class="container-thumbnail" id="container-result-search">
    <?php

    include('./php/db.php');

    try {
// Connexion ?? la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM produits WHERE type='prestation' ORDER BY `produits`.`id` ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nb = $stmt->rowCount();

        if ($nb > 0) {
            $prestas = $stmt->fetchAll();
            //var_dump($prestas);

            for ($i = 1; $i <= $nb; $i++) {
                $remise_on_presta = (1 - $prestas[$i - 1]["remise"]) * 100;
                echo '<div class="thumbnail-presta"> <a class="thumbnail-info-a" href="./produit.php?id=' . $prestas[$i - 1]['id'] . '">';
                echo '<div class="row-left">';
                echo '<img src="images/presta-' . $prestas[$i - 1]["id"] . '.png" class="img-presta-thumbnail"
                 alt="' . $prestas[$i - 1]["nom"] . '">';
                echo '<p class="text-product">' . $prestas[$i - 1]["nom"] . '<span class="span-remise-presta" style="margin-left: 2%">-' . $remise_on_presta .'%</span></p>';
                echo '<p class="price">' . $prestas[$i - 1]["prix"] . '???</p>';
                echo '</a>';
                echo '</div>';
                echo '<div class="row-right">';
                echo '<desc class="desc-product"><i style="color: #dcdcdc;">' . $prestas[$i - 1]["description"] . '</i></desc>';
                echo '<br />';
                echo '<br />';
                echo '<input type="hidden" name="price" value=' . ($prestas[$i - 1]["prix"]*$prestas[$i - 1]["TVA"]) * $prestas[$i - 1]["remise"] . '>';
                echo '<input type="hidden" name="prestas" value="' . $prestas[$i - 1]["id"] .'">';
                echo '<a class="addPanier" href="addpanier.php?id=' . $prestas[$i - 1]["id"] . '&type=prestation"><i class="uil uil-shopping-cart"></i></a>';
                echo '</div>';
                echo '</div>';


            }

            if (isset($_GET["payment"]) and $_GET["payment"] === "success") { echo "<div class='success-notif' id='success-notif' style='display: block;'><span class='close-popup-notif' onclick='closePopUp()' title='Fermer'>&times;</span>Merci d'avoir effectu?? un achat !</div>"; $_SESSION["panier"] = array(); }


        } else {
            die("Aucune prestation n'est disponible !");
        }


    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>
</div>

<script type="text/javascript" src="./js/app.js"></script>
<script type="text/javascript" src="js/modal.js"></script>


<script type="text/javascript">

    $(document).ready(function (){

        $('#search-on-presta').keyup(function () {
            var presta_name = $(this).val();

            if(presta_name !== "") {
                $.ajax({
                    type: 'GET',
                    url: 'php/search-on-presta-name.php',
                    data: 'presta=' + encodeURIComponent(presta_name),
                    success: function(data) {

                        if(data != "") {
                            $(".container-thumbnail").html(data);
                        } else {
                            document.getElementById('container-result-search').innerHTML = "<div style='margin-top: 60.5px;margin-bottom: 99px;'><h3>Aucun r??sultat trouv?? pour cette recherche !</h3></div>";
                        }

                    }

                });
            }


        });


        $("#filter-products-button").on('click', function (){
            var categorie = $("#filter-prestas-by-category").val();
            var priceMin = $("#order-by-price-min").val();
            var priceMax = $("#order-by-price-max").val();
            const page = "all_prestas.php";

            $.ajax({
                url: "/php/filter-products.php",
                type: "POST",
                data: 'categorie=' + categorie + '&priceMin=' + priceMin + '&priceMax=' + priceMax + '&page=' + page,
                beforeSend:function() {
                    $(".container-thumbnail").html("<img src='images/Loading_icon.gif' style='width: 80px; height: 80px;'/>");
                },
                success:function(data) {
                    $(".container-thumbnail").html(data);
                }
            });
        });
    });

</script>

</body>

<?php include('./php/footer.php') ?>

</html>

