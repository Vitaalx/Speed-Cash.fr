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
    <title>Tous les produits</title>
    <link rel="stylesheet" type="text/css" href="./style/style_client.css">
    <link rel="stylesheet" type="text/css" href="./style/styleFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<?php include('./php/header_client.php') ?>

<body class="body-all-products">

<div class="filter-products-form">
    <div class="filter-products-header">
        <h2 style="color: white;">Filtrer les produits</h2>
        <div class="filter-products-close">
            <i class="uil uil-tag-alt tag-alt-all-products"></i>
        </div>
    </div>
    <div class="select-filter">
        <select name="filter-products-by-brand" id="filter-products-by-brand">
            <option value="" selected="">Marque</option>
            <option value="Razer">Razer</option>
            <option value="MSI">MSI</option>
            <option value="Logitech">Logitech</option>
            <option value="Asus">Asus</option>
            <option value="Corsair">Corsair</option>
        </select>
        <select name="filter-products-by-category" id="filter-products-by-category">
            <option value="" selected="">Catégorie</option>
            <option value="Gamer">Gamer</option>
            <option value="Bureautique">Bureautique</option>
            <option value="Portable">Portable</option>
        </select>
        <button id="filter-products-button">Filtrer</button>
    </div>
</div>

<div class="container-thumbnail">
    <?php

    include('./php/db.php');

    try {
// Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM produits";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nb = $stmt->rowCount();

        if ($nb > 0) {
            $products = $stmt->fetchAll();
            //var_dump($products);

            for ($i = 1; $i <= $nb; $i++) {
                echo '<div class="thumbnail"> <a class="thumbnail-info-a" href="./produit.php?id=' . $products[$i - 1]['id'] . '">';
                echo '<div class="row-left">';
                echo '<img src="images/produit-' . $products[$i - 1]["id"] . '.png" class="img-product-thumbnail"
                 alt="' . $products[$i - 1]["nom"] . '">';
                echo '<p class="text-product">' . $products[$i - 1]["nom"] . '</p>';
                echo '<div class="stars">';
                if ($products[$i - 1]["note"] >= 0) {
                    for ($j = 1; $j <= 5; $j++) {
                        if ($j <= $products[$i - 1]["note"]) {
                            echo '<i class="las la-star"></i>';
                        } else {
                            echo '<i class="lar la-star"></i>';
                        }
                    }
                } else {
                    for ($y = 1; $y != 5; $y++) {
                        echo '<i class="lar la-star"></i>';
                    }
                }
                echo '</div>';
                echo '<p class="price">' . $products[$i - 1]["prix"] . '€</p>';
                echo '<a class="addPanier" href="addpanier.php?id=' . $products[$i - 1]["id"] . '"><i class="uil uil-shopping-cart"></i></a>';
                echo '</div>';
                echo '<div class="row-right">';
                echo '<desc class="desc-product"><i style="color: #dcdcdc;">' . $products[$i - 1]["description"] . '</i></desc>';
                echo '<br />';
                echo '<br />';
                echo '<form action="php/rating.php" method="post" id="ratingForm">';
                echo '<span style="color: #dcdcdc;">Ma note est de :</span>';
                echo '<div class="stars-form">';
                echo '<i  style="color: #dcdcdc;" class="lar la-star star-form" data-value="1"></i>';
                echo '<i  style="color: #dcdcdc;" class="lar la-star star-form" data-value="2"></i>';
                echo '<i  style="color: #dcdcdc;" class="lar la-star star-form" data-value="3"></i>';
                echo '<i  style="color: #dcdcdc;" class="lar la-star star-form" data-value="4"></i>';
                echo '<i  style="color: #dcdcdc;" class="lar la-star star-form" data-value="5"></i>';
                echo '</div>';
                echo '<input type="hidden" id="rate" name="note" value="0">';
                echo '<input type="hidden" id="product_id" name="produit_id" value="' . $products[$i - 1]["id"] . '">';
                echo '<button class="rate-form" type="submit">Évaluer le produit</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';


            }

            if (isset($_GET["success"]) and $_GET["success"] === "prodnote") echo "<div class='success-notif' id='success-notif' style='display: block;'><span class='close-popup-notif' onclick='closePopUp()' title='Fermer'>&times;</span>Merci d'avoir noté notre produit !</div>";
            if (isset($_GET["error"]) and $_GET["error"] === "dejanote") echo "<div class='success-notif' id='success-notif' style='display: block;'><span class='close-popup-notif' onclick='closePopUp()' title='Fermer'>&times;</span>Vous ne pouvez pas noter deux fois le même produit !</div>";
            if (isset($_GET["payment"]) and $_GET["payment"] === "success") { echo "<div class='success-notif' id='success-notif' style='display: block;'><span class='close-popup-notif' onclick='closePopUp()' title='Fermer'>&times;</span>Merci d'avoir effectué un achat !</div>"; $_SESSION["panier"] = array(); }


        } else {
            die("Aucun produit n'est en stock !");
        }


    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>
</div>

<script type="text/javascript" src="./js/app.js"></script>
<script type="text/javascript" src="js/modal.js"></script>


<script src="./js/rating.js"></script>

<script type="text/javascript">

    $(document).ready(function (){
        $("#filter-products-button").on('click', function (){
            var categorie = $("#filter-products-by-category").val();
            var brand = $("#filter-products-by-brand").val();

            $.ajax({
                url: "/php/filter-products.php",
                type: "POST",
                data: 'categorie=' + categorie + '&brand=' + brand,
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

