<?php
require 'panier.class.php';
include "./php/db.php";
$cart = new panier();
$json = array('error' => true);
if(isset($_GET["id"])) {

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id FROM produits WHERE id='" . $_GET["id"] . "'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        //echo $sql;
        $products = $stmt->fetchAll(PDO::FETCH_OBJ);
        //var_dump($products);
        if (empty($products)) {
            $json['message'] = "Ce produit n'existe pas !";
        }
        $cart->add($products[0]->id);
        $json['error'] = false;
        $json['message'] = "Le produit a bien été ajouté à votre panier !"; // permet de retourner un cran en arrière

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

} else {
    $json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier !";
}

echo json_encode($json);

