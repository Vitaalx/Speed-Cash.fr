<?php

include "db.php";

if (isset($_POST["promo-submit"])) {

    $code_promo = htmlspecialchars($_POST["code_promo"]);
    //echo $code_promo;

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL
        $sql = "SELECT * FROM code_promo WHERE code_name='$code_promo'";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nb = $stmt->rowCount();

        if ($nb == 1) {

            $code_promo = $stmt->fetchAll();
            var_dump($code_promo);

            if ($code_promo[0]["date_expiry"] >= date("Y-m-d")) {
                header("Location: ../panier.php?promo=true&remise=" . $code_promo[0]["reduction"]);
            } else {
                header("Location: ../panier.php?promo=false");
            }

        } else {
            header("Location: ../panier.php?promo=false");
        }


    } catch (PDOException $e) {
        echo $e->getMessage();
    }



}
