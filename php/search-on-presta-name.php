<?php
    session_start();
    include "db.php";

    if (isset($_GET["presta"])) {

        $presta_name = (String) trim($_GET["presta"]);

        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            // Récupération des produits correspondants au nom de produit
            $stmt = $conn->prepare("SELECT * FROM produits WHERE nom LIKE '%$presta_name%' AND type='prestation' OR categorie LIKE '$presta_name%' AND type='prestation'");
            $stmt->execute();
            $nb = $stmt->rowCount();
            $prestas = $stmt->fetchAll();

            // Si aucun résultat
            if (count($prestas) == 0) {
                echo "<div style='margin-top: 60.5px;margin-bottom: 99px;'><h3>Aucun résultat trouvé pour cette recherche !</h3></div>";
            } else {

                for ($i = 1; $i <= $nb; $i++) {
                    $remise_on_presta = (1 - $prestas[$i - 1]["remise"]) * 100;
                    echo '<div class="thumbnail-presta"> <a class="thumbnail-info-a" href="./produit.php?id=' . $prestas[$i - 1]['id'] . '">';
                    echo '<div class="row-left">';
                    echo '<img src="images/presta-' . $prestas[$i - 1]["id"] . '.png" class="img-presta-thumbnail"
                 alt="' . $prestas[$i - 1]["nom"] . '">';
                    echo '<p class="text-product">' . $prestas[$i - 1]["nom"] . '<span class="span-remise-presta" style="margin-left: 2%">-' . $remise_on_presta .'%</span></p>';
                    echo '<p class="price">' . $prestas[$i - 1]["prix"] . '€</p>';
                    echo '</a>';
                    echo '</div>';
                    echo '<div class="row-right">';
                    echo '<desc class="desc-product"><i style="color: #dcdcdc;">' . $prestas[$i - 1]["description"] . '</i></desc>';
                    echo '<br />';
                    echo '<br />';
                    echo '<input type="hidden" name="price" value=' . ($prestas[$i - 1]["prix"]*$prestas[$i - 1]["TVA"]) * $prestas[$i - 1]["remise"] . '>';
                    echo '<input type="hidden" name="prestas" value="' . $prestas[$i - 1]["id"] .'">';
                    echo '<a class="addPanier" href="addpanier.php?id=' . $prestas[$i - 1]["id"] . '&type=prestation"><i class="uil uil-shopping-cart"></i></a>';
                    echo '</div>';
                    echo '</div>';


                }

            }



        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }