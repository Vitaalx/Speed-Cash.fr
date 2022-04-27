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
    <title>Page client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style/style_client.css">
    <link rel="stylesheet" type="text/css" href="./style/styleFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.min.js"></script>

</head>

<?php include('./php/header_client.php') ?>

<body class="body-client">

<div class="navigation-bar-client">
    <li style="list-style-type: none; width: 100%; text-align: center;"><a class="presta-a" href="all_prestas.php"><i
                    class="uil uil-bookmark uil-bar-client"></i>Nos prestations</a></li>
    <li style="list-style-type: none; width: 100%; text-align: center;"><a class="produit-a" href="all_products.php"><i
                    class="uil uil-tag-alt uil-bar-client"></i>Nos produits</a></li>
</div>

<div class="container-carrousel">


    <?php

    // On récupère la date du jour soustrait de 7 jours (Pour récupérer les produits de la semaine)
    $date_last_product = date('Y-m-d', strtotime('-7 day'));
    //echo $date;

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM produits WHERE date_enter >= '$date_last_product' AND date_enter <= curdate() ORDER BY date_enter DESC";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nb = $stmt->rowCount();

        //echo $nb;

        if ($nb >= 1) {
            $last_products = $stmt->fetchAll();

            // <!-- Carrousel Dernier Produits -->
            echo '<div id="carouselProducts" class="carousel carousel-dark slide carousel-fade carrousel-products-container" data-bs-ride="carousel1">';
            echo '<div class="carrousel-header-title">';
            echo '<h1 class="carrousel-title">Nos derniers produits</h1>';
            echo '</div>';
            echo '<div class="carousel-indicators">';
            for ($i = 1; $i <= $nb; $i++) {
                if ($i === 1) {
                    echo '<button type="button" data-bs-target="#carouselProducts" data-bs-slide-to="0" class="active"  aria-label="' . $last_products[$i - 1]["nom"] . '" aria-current="true"></button>';
                } else {
                    echo '<button type="button" data-bs-target="#carouselProducts" data-bs-slide-to="' . ($i - 1) . '" aria-label="' . $last_products[$i - 1]["nom"] . '"></button>';
                }
            }
            echo '</div>';
            echo '<div class="carousel-inner carrousel-products">';
            for ($i = 1; $i <= $nb; $i++) {
                if ($i === 1) {
                    echo '<div class="carousel-item active" data-bs-interval="10000">';
                } else {
                    echo '<div class="carousel-item" data-bs-interval="10000">';
                }
                echo '<a href="./produit.php?id=' . $last_products[$i - 1]['id'] . '"><img src="images/produit-' . $last_products[$i - 1]["id"] . '.png" class="img-product" alt="' . $last_products[$i - 1]["nom"] . '"></a>';
                echo '<div class="carousel-caption d-none d-md-block text-caption">';
                echo '<h5 style="color: #e1e1e1;">' . $last_products[$i - 1]["nom"] . '</h5>';
                echo '<p style="color: #e1e1e1;">' . $last_products[$i - 1]["description"] . '</p>';
                echo '</div>';
                echo '</div>';

            }

            echo '</div>';
            echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselProducts" data-bs-slide="prev">';
            echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Previous</span>';
            echo '</button>';
            echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselProducts" data-bs-slide="next">';
            echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            echo '<span class="visually-hidden">Next</span>';
            echo '</button>';
            echo '</div>';
            // <!-- /Carrousel Dernier Produits -->

        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>


    <!-- Carrousel Dernière Prestations -->

    <div id="carouselPresta" class="carousel carousel-dark slide carousel-fade carrousel-presta-container"
         data-bs-ride="carousel3">
        <div class="carrousel-header-title">
            <h1 class="carrousel-title">Nos dernières prestations</h1>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselPresta" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide"></button>
            <button type="button" data-bs-target="#carouselPresta" data-bs-slide-to="1" aria-label="Slide"></button>
            <button type="button" data-bs-target="#carouselPresta" data-bs-slide-to="2" aria-label="Slide"></button>
        </div>
        <div class="carousel-inner carrousel-presta">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="images/produit-3.png" class="img-presta" alt="...">
                <div class="carousel-caption d-none d-md-block text-caption">
                    <h5 style="color: white;">First slide label</h5>
                    <p style="color: white;">Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/produit-4.png" class="img-presta" alt="...">
                <div class="carousel-caption d-none d-md-block text-caption">
                    <h5 style="color: white;">Second slide label</h5>
                    <p style="color: white;">Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/produit-5.png" class="img-presta" alt="...">
                <div class="carousel-caption d-none d-md-block text-caption">
                    <h5 style="color: white;">Third slide label</h5>
                    <p style="color: white;">Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPresta" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPresta" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- /Carrousel Dernière Prestations -->

</div>

<script type="text/javascript" src="./js/app.js"></script>
<script type="text/javascript" src="js/modal.js"></script>


<script src="./js/rating.js"></script>
</body>

<?php include('./php/footer.php') ?>

</html>
