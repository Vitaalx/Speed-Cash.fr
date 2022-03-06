<?php
session_start();
require './panier.class.php';
include './php/calcul_note.php';

$cart = new panier();
if(!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}
var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page client</title>
    <link rel="stylesheet" type="text/css" href="./style/style_client.css">
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

<header>

    <div class="bar-top">
        <img class="logoSpeedCash" src="./icons/logo-speed-cash.gif" alt="Speed Cash">
        <div class="btn-type-client">
        <a class="btn-deconnexion" href="./php/deconnexion.php"><span>Déconnexion</span></a>
        <a class="cart" href="./panier.php"><i class="uil uil-shopping-bag"></i></a>
        </div>

    </div>

</header>

<body class="body-client">

<main class="container-thumbnail">

<?php

include ('./php/db.php');

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

        for ($i = 1; $i <= $nb ; $i++) {
            echo '<div class="thumbnail">';
            echo '<div class="row-left">';
            echo '<img src="images/produit-'.$products[$i-1]["id"].'.jpg" class="img-product"
                 alt="' . $products[$i-1]["nom"] . '">';
            echo '<p class="text-product">' . $products[$i-1]["nom"] .'</p>';
            echo '<div class="stars">';
            if ($products[$i-1]["note"] > 0) {
                for ($j = 1; $j <= 5; $j++) {
                    if ($j <= $products[$i-1]["note"]) {
                        echo '<i class="las la-star"></i>';
                    } else {
                        echo '<i class="lar la-star"></i>';
                    }
                }
            } else  {
                for ($y = 1; $y != 5; $y++) {
                    echo '<i class="lar la-star"></i>';
                }
            }
            echo '</div>';
            echo '<p class="price">' . $products[$i-1]["prix"] . '€</p>';
            echo '<button class="add-to-card"><a class="addPanier" href="addpanier.php?id=' . $products[$i-1]["id"] .'">Ajouter au panier</a></button>';
            echo '</div>';
            echo '<div class="row-right">';
            echo '<desc class="desc-product"><i>' . $products[$i-1]["description"] .'</i></desc>';
            echo '<br>';
            echo '<form action="php/rating.php" method="post" id="ratingForm">';
            echo '<span><strong>Ma note est de :</strong></span>';
            echo '<div class="stars-form">';
            echo '<i class="lar la-star star-form" data-value="1"></i>';
            echo '<i class="lar la-star star-form" data-value="2"></i>';
            echo '<i class="lar la-star star-form" data-value="3"></i>';
            echo '<i class="lar la-star star-form" data-value="4"></i>';
            echo '<i class="lar la-star star-form" data-value="5"></i>';
            echo '</div>';
            echo '<input type="hidden" id="rate" name="note" value="0">';
            echo '<input type="hidden" id="product_id" name="produit_id" value="' . $products[$i-1]["id"] . '">';
            echo '<button class="rate-form" type="submit">Évaluer le produit</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';


        }

        if (isset($_GET["success"])) echo "<script>alert('Merci d\'avoir noté notre produit !');</script>";
        if(isset($_GET["error"])) echo "<script>alert('Vous ne pouvez pas noter deux fois le même produit !');</script>";

    } else {
        die("Aucun produit n'est en stock !");
    }


} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
</main>

<script type="text/javascript" src="./js/app.js"></script>
<script type="text/javascript" src="js/modal.js"></script>


<script src="./js/rating.js"></script>

</body>

<footer>
    © | Speed-Cash | Tous droit réservés |<?php date("Y"); ?>
</footer>

</html>
