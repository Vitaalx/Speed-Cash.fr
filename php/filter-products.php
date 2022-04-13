<?php

include "db.php";

if(isset($_POST['categorie']) || isset($_POST['brand'])){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $category = $_POST['categorie'];
            $brand = $_POST['brand'];
            if (strlen($category) > 0 && strlen($brand) > 0) {
                $sql = "SELECT * FROM produits WHERE categorie = '$category' AND marque = '$brand'";
            } elseif (strlen($category) > 0) {
                $sql = "SELECT * FROM produits WHERE categorie = '$category'";
            } elseif (strlen($brand) > 0) {
                $sql = "SELECT * FROM produits WHERE marque = '$brand'";
            } else {
                $sql = "";
                die("<span style='color: whitesmoke'>Vous n'avez pas sélectionné de filtrage ! <br/><br/><a href='client.php' style='text-decoration: none; color: #15CF74;'>Retour au catalogue</a></span>");
            }
            //echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $nb = $stmt->rowCount();

        if ($nb > 0) {
            $products = $stmt->fetchAll();
            //var_dump($products);

            for ($i = 1; $i <= $nb; $i++) {
                echo '<div class="thumbnail"> <a class="thumbnail-info-a" href="./produit.php?id=' . $products[$i - 1]['id'] . '">';
                echo '<div class="row-left">';
                echo '<img src="images/produit-' . $products[$i - 1]["id"] . '.jpg" class="img-product"
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

            if (isset($_GET["success"])) echo "<script>alert('Merci d\'avoir noté notre produit !');</script>";
            if (isset($_GET["error"])) echo "<script>alert('Vous ne pouvez pas noter deux fois le même produit !');</script>";

        } else {
            die("<span style='color: whitesmoke'>Il n'y a aucun produit dans cette catégorie ou de cette marque ! <br/><br/><a href='client.php' style='text-decoration: none; color: #15CF74;'>Retour au catalogue</a></span>");
        }



    } catch (PDOException $e) {
        echo $e->getMessage();
    }

} else {
    echo "Error";
}


