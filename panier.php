<?php
session_start();
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

</head>

<header>

    <div class="bar-top">
        <a href="./client.php"><img class="logoSpeedCash" src="./icons/logo-speed-cash.gif" alt="Speed Cash"></a>
        <div class="btn-type-client">
            <a class="btn-deconnexion" href="./php/deconnexion.php"><span>Déconnexion</span></a>
            <a class="cart" href="./panier.php"><i class="uil uil-shopping-bag"></i></a>
        </div>

    </div>

</header>

<body>

<table>
    <tr>
        <th>Image</th>
        <th>Nom du produit</th>
        <th>Prix sans TVA</th>
        <th>Quantité</th>
        <th>Prix avec TVA</th>
        <th>Actions</th>
    </tr>
<?php
$ids = array_keys($_SESSION['panier']);
//var_dump($ids);

require "./php/db.php";

if(empty($ids)) {
    $products = array();
} else {

    try {
// Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM produits WHERE id IN (" . implode(",", $ids) . ")";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nb = $stmt->rowCount();

        if ($nb > 0) {

            $products = $stmt->fetchAll(PDO::FETCH_OBJ);
            //var_dump($products);

            foreach ($products as $product) {
                echo '<tr>';
                echo '<td><img src="images/produit-'.$product->id.'.jpg" class="img-product"
                 alt="' . $product->nom . '" style="width: 90px; height: 90px;"></td>';
                echo '<td>' . $product->nom . '</td>';
                $priceTVA = $product->prix / 1.2;
                echo '<td class="price">' . $priceTVA . ' €</td>';
                echo '<td>' . $_SESSION['panier'][$product->id] .'</td>';
                echo '<td>' . $product->prix . ' €</td>';
                echo '<td><a class="delete-to-card" href="panier.php?delPanier=' . $product->id .'"><i class="uil uil-trash-alt"></i></a><a href="#"><i class="uil uil-setting"></i></a></td>';
                echo '</tr>';
            }

        } else {
            die("Vous n'avez aucun produit dans votre panier !");
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>
</table>
<div>Nombre d'éléments : <?php $elements = $cart->count(); echo $elements; ?></div>
<div class="rowtotal">Grand Total : <span class="total"><?php $total = $cart->total(); echo $total; ?> €</span></div>
<div class="button-payment"><a href="paymentCart.php?price=<?= $total..0..0?>">Payer</a></div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</body>

<footer>
    © | Speed-Cash | Tous droit réservés |<?php date("Y"); ?>
</footer>
</html>
