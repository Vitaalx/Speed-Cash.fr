<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}

$langue = 0;
if (isset($_GET['lang'])) $langue = $_GET['lang'];
include("./php/traduction_en.php");

$id_product = htmlspecialchars($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page produit n°<?php echo $id_product ?></title>
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

<body class="body-product_id">

<div class="container-product">

<?php

include "./php/db.php";

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération des données du produit via l'ID
    $sql = "SELECT * FROM produits WHERE id = " . $id_product ."";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    if($nb == 0) {
        echo "<h1>Produit introuvable</h1>";
    } else {
        $produit = $stmt->fetchAll();
        //var_dump($produit);

        // <!-- Page d'affichage d'un produit avec informations plus complémentaire sur l'article -->
        echo '<div class="product-card">';
        echo '<div class="row align-items-center">';
        echo '<div class="col-6 left-column">';
        echo '<div class="product-image">';
        if($produit[0]['type'] != "produit") {
            echo '<img src="images/presta-' . $produit[0]["id"] .'.png" width="400" height="400" alt="image produit">';
        } else {
            echo '<img src="images/produit-' . $produit[0]["id"] .'.png" width="400" height="400" alt="image produit">';
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="col-6 right-column">';
        echo '<div class="product-title">';
        echo ' <h1>' . $produit[0]["nom"] .'</h1>';
        echo '</div>';
        echo '<div class="product-description">';
        echo '<p>' . $produit[0]["description"] . '</p>';
        echo '</div>';
        echo '<div class="product-price">';
        echo '<p>'. $produit[0]["prix"] .' €</p>';
        echo '</div>';
        echo '<div class="rate-stars">';
        for($i = 0; $i < $produit[0]["note"]; $i++) {
            echo '<i class="las la-star"></i>';
        }
        echo '</div>';
        if($produit[0]["stock"] > 0) {echo '<span class="badge rounded-pill bg-success stock-badge">En stock</span><br />';} else {echo '<span class="badge rounded-pill bg-danger stock-badge">En rupture de stock</span><br />';}
        echo '<div class="product-quantity">';
        echo '<p>Quantité :</p>';
        echo '<form role="form" method="post" action="">';
        echo '<input type="number" name="quantity" value="1" min="1" max="10">';
        echo '<button type="submit" class="confirm-quantity">Confirmer</button>';
        echo '</form>';
        if(isset($_POST["quantity"])) {
            $quantity = $_POST["quantity"];
            if($quantity > $produit[0]["stock"]) {
                echo '<p class="error-quantity">Quantité indisponible</p>';
            } else {
                echo '<p class="success-quantity">Quantité choisis : ' . $_POST["quantity"] .'</p>';
            }
        }
        echo '</div>';
        $url_add_panier = "addpanier.php?id=". $produit[0]["id"];
        if(isset($_POST["quantity"])) {
            $quantity = $_POST["quantity"];
            $url_add_panier = $url_add_panier . "&quantity=" . $quantity;
        } else {

        }
        echo '<div class="product-add-to-cart">';
        echo '<a class="addPanier"  href="' . $url_add_panier .'"><button class="add-to-card-product" type="submit">Ajouter au panier</button></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<table class="table-product-details">';
        echo '<tbody>';
        echo '<tr>';
        echo '<th scope="row">Marque</th>';
        echo '<td>' . $produit[0]["marque"] .'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th scope="row">Catégorie</th>';
        echo '<td>' . $produit[0]["categorie"] .'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th scope="row">Modèle</th>';
        echo '<td>' . $produit[0]["modele"] .'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th scope="row">Type de connecteur</th>';
        echo '<td>Souris Wireless (Sans-fil)</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';

    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

    <!-- Rédaction de commentaire possible pour le client -->
    <div class="post-comments">
        <div class="row">
            <div class="col-12">
                <h2>Rédiger un commentaire</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Votre commentaire :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire"></textarea>
                    </div>
                    <button type="submit" class="btn-send-comment">Envoyer</button>
                </form>
            </div>
        </div>

    <!-- Page d'affichage des commentaires du produit -->
    <div class="product-comments">
        <h2>Commentaires</h2>
        <div class="comment-container">
            <div class="comment-card">
                <div class="comment-image">
                    <i class="uil uil-user"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                </div>
                <div class="comment-content">
                    <p>Ce produit est très bien, je le recommande vivement !</p>
                </div>
            </div>
            <div class="comment-card">
                <div class="comment-image">
                    <i class="uil uil-user"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                </div>
                <div class="comment-content">
                    <p>J'ai changé mon ancienne souris avec celle-ci et voilà que je suis super content !</p>
                </div>
            </div>
            <div class="comment-card">
                <div class="comment-image">
                    <i class="uil uil-user"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                </div>
                <div class="comment-content">
                    <p>Lorem ispum ser content for the third slide et voilà que je suis super content </p>
                </div>
            </div>
        </div>

</div>
</div>
</div>


<script type="text/javascript" src="./js/app.js"></script>
</body>

<?php include('./php/footer.php') ?>

</html>
