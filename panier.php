<?php
require 'panier.class.php';
$cart = new panier();
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Votre panier Speed-Cash</title>
    <link rel="stylesheet" type="text/css" href="./style/style_client.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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

<?php
$ids = array_keys($_SESSION['panier']);
//var_dump($ids);
unset($_SESSION['panier'][3]);

require "./php/db.php";


try {
// Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM produits WHERE id IN (" . implode(",",$ids) . ")";
    //echo $sql;
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
        die("Vous n'avez aucun produit dans votre panier !");
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>

</body>

<footer>
    © | Speed-Cash | Tous droit réservés |<?php date("Y"); ?>
</footer>
</html>
