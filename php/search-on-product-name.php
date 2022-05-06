<?php
    session_start();
    include "db.php";

    if (isset($_GET["product"])) {

        $product_name = (String) trim($_GET["product"]);

        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // Récupération des produits correspondants au nom de produit
            $stmt = $conn->prepare("SELECT * FROM produits WHERE nom LIKE '%$product_name%' and type='produit' OR marque LIKE '$product_name%' and type='produit'");
            $stmt->execute();
            $nb = $stmt->rowCount();
            $products = $stmt->fetchAll();

            // Si aucun résultat
            if (count($products) == 0) {
                echo "<div style='margin-top: 60.5px;margin-bottom: 99px;'><h3>Aucun résultat trouvé pour cette recherche !</h3></div>";
            } else {

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
                    echo '<br />';
                    echo '</div>';
                    echo '</div>';


                }

            }



        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }