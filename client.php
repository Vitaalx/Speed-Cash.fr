<?php
session_start();
require 'panier.class.php';
$cart = new panier();
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
        <img class="logoSpeedCash" src="./icons/logo-speed-cash.png" alt="Speed Cash">

        <div class="social-icon">
            <img class="discord-icon" src="./icons/Discord-icon.png" alt="Discord">
            <img class="instagram-icon" src="./icons/Instagram-icon.svg" alt="Instagram">
            <img class="github-icon" src="./icons/GitHub-icon.svg" alt="GitHub">
            <img class="tiktok-icon" src="icons/TikTok-icon.svg" alt="TikTok">
        </div>

    </div>

</header>

<body>

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
            echo '<button class="add-to-card"><a href="addpanier.php?id=' . $products[$i-1]["id"] .'">Ajouter au panier</a></button>';
            echo '</div>';
            echo '<div class="row-right">';
            echo '<desc class="desc-product"><i>' . $products[$i-1]["description"] .'</i></desc>';
            echo '</div>';
            echo '</div>';


        }

    } else {
        die("Aucun produit n'est en stock !");
    }


} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
</main>

<!--main class="container-thumbnail">

    <div class="thumbnail">
        <div class="row-left">
            <img src="https://media.ldlc.com/r1600/ld/products/00/05/53/43/LD0005534357_2.jpg" class="img-souris-razer"
                 alt="Souris Razer">
            <p class="text-product">Souris Razer Balistik V2</p>
            <div class="stars">
                <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star"
                                                                                                       data-value="3"></i><i
                        class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
            </div>
            <input type="hidden" name="rate" id="rate" value="5">
            <p class="price">99€</p>
            <button class="add-to-card">Ajouter au panier</button>
        </div>
        <div class="row-right">
            <desc class="desc-product"><i>Obtenez un avantage définitif sur vos adversaires avec le Razer Basilisk v2. Doté d'un capteur optique
                Razer Focus de 20 000 dpi, il vous offre une précision d'une netteté remarquable pour que vous ne manquiez
                    plus jamais votre cible.</i>
            </desc>

        </div>
    </div>

</main>
<script src="./js/rating.js"></script-->

</body>

<footer>
    © | Speed-Cash | Tous droit réservés |<?php date("Y"); ?>
</footer>

</html>
