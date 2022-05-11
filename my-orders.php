<?php

session_start();

$langue = 0;
if (isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');
include "./php/db.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}
//var_dump($_SESSION);
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

<div class="my-orders-container">

    <?php include("./php/navigation-bar-profile.php"); ?>

    <div class="my-orders-card">
        <table class="table-my-orders">
            <tr>
                <th>ID</th>
                <th>Heure de commande</th>
                <th>Date de commande</th>
                <th>Montant de la commande</th>
                <th>Produit commandé(s)</th>
            </tr>

            <?php

            try {
// Connexion à la BDD
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $products_ids = "";

// Récupération des commandes de l'utilisateur
                $sql = ("SELECT * FROM commandes WHERE id_client = " . $_SESSION["id"] . " ORDER BY id DESC");
//echo $sql;
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $nb = $stmt->rowCount();
//echo $nb;

                if ($nb > 0) {
                    $commandes = $stmt->fetchAll();
                    //var_dump($commandes);
                    for ($i = 1; $i <= $nb; $i++) {
                        $sql = ("SELECT * FROM produits_commandes WHERE commande_id = " . $commandes[$i - 1]['id']);
                        //echo $sql;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $nb_products_orderer = $stmt->rowCount();
                        //echo $sql." nb: ".$nb_products_orderer;
                        //echo ", ";
                        //echo "<br>";
                        echo '<tr>';
                        echo '<td>' . $commandes[$i - 1]["id"] . '</td>';
                        echo '<td>' . $commandes[$i - 1]["heureCommande"] . '</td>';
                        echo '<td>' . $commandes[$i - 1]["dateCommande"] . '</td>';
                        echo '<td>' . $commandes[$i - 1]["montant"] . '€</td>';
                        echo '<td>';

                        for ($j = 1; $j <= $nb_products_orderer; $j++) {
                            $products_ids = $stmt->fetch()['produit_id'];
                            echo '<a href="produit.php?id=' . $products_ids . '" class="produit-command-a">'. $products_ids .'</a>';
                            if($j < $nb_products_orderer){
                                echo ", ";
                            } else {
                                echo ".";
                            }
                        }

                        echo '</td>';
                        echo '</tr>';
                        //$sql = "SELECT * FROM produits WHERE id = " . $produits_commandes[$i - 1]['produit_id'];
                        //echo $sql;
                        //$stmt = $conn->prepare($sql);
                        //$stmt->execute();
                        //$produits = $stmt->fetch();
                        //var_dump($produits);
                    }
                } else {
                    $commandes = null;
                    $produits = null;
                    $client = null;
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            ?>

        </table>
    </div>

</div>

</body>

<?php include('./php/footer.php') ?>

</html>
