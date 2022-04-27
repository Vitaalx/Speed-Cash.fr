<?php
session_start();
require 'panier.class.php';
include("./php/traduction_en.php");
$cart = new panier();
//var_dump($_SESSION);

$langue = 0;
if (isset($_GET['lang'])) $langue = $_GET['lang'];


?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Votre panier Speed-Cash</title>
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

<style>
    * {
        color: whitesmoke;
    }
</style>

<?php include('./php/header_client.php') ?>

<br />

<body class="cart-body">

<div class="cart-container">
    <table class="cart-table">
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

        if (empty($ids)) {
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
                        echo '<td><img src="images/produit-' . $product->id . '.png" class="img-product"
                 alt="' . $product->nom . '" style="width: 70px; height: 70px;"></td>';
                        echo '<td>' . $product->nom . '</td>';
                        $priceTVA = $product->prix / 1.2;
                        $priceTVA = round($priceTVA, 1);
                        echo '<td class="price">' . $priceTVA . ' €</td>';
                        echo '<td>' . $_SESSION['panier'][$product->id] . '</td>';
                        echo '<td>' . $product->prix . ' €</td>';
                        echo '<td><a class="delete-to-card" href="panier.php?delPanier=' . $product->id . '"><i style="color:whitesmoke;" class="uil uil-trash-alt"></i></a></td>';
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
    <br />
        <div class="cart-footer">
            <div class="elements-number">Nombre d'éléments :  <?php $elements = $cart->count(); echo $elements; ?></div>
            <div class="rowtotal">Grand Total : <span class="total"><?php $total = $cart->total(); echo $total; ?> €</span></div>
            <form role="form" action="paymentCart.php" method="post">

                <input type="hidden" name="price" value="<?= $total; ?>">
                <input type="hidden" name="products" value="<?php echo implode(",", $ids) ?>">

            <button type="submit" class="button-payment">Payer</button>
            </form>
        </div>
    </div>






<!--form method="post" id="paymentForm" enctype="multipart/form-data"-->



        <!--/form-->



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<!--script>

    // SUR VALIDATION DU FORMULAIRE D'INSCRIPTION
    $("#paymentForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        // Appel de la fonction dédiée
        submitPaymentForm();
    });

    function submitPaymentForm() {

        // Création d'un formulaire de données
        var fd = new FormData();
        // Ajout des données du formulaire
        const price = $('input[name=price]').val();
        fd.append('price', price);
        alert("-" + price + "-" );

        // Appel de la fonction ajax
        $.ajax({
            url: 'paymentCart.php',
            type: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            beforeSend:function() {
                $(".cart-container").html("<img src='images/Loading_icon.gif' style='width: 45px; height: 45px; margin-left: 50%;'/>");
            },
            success: function (data) {
                // Redirection vers la page paymentCart.php
                window.location.href = "paymentCart.php";
            }
        });


    }

</script-->
</body>

<?php include('./php/footer.php') ?>

</html>
