<?php

session_start();

include "db.php";

if (isset($_POST["comment"])) {

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $content = $_POST["comment"];
        $user = $_SESSION["nom"]. " " .$_SESSION["prénom"];
        $id_produit = $_POST["id_produit"];
        $date = date("Y-m-d H:i:s");

        // Insertion des données dans la BDD
        $sql = "INSERT INTO commentaire (id_produit, contenue, date, user, signaler) VALUES ('$id_produit', '$content', '$date', '$user', 0)";
        $conn->exec($sql);

        header("Location: ../produit.php?id=$id_produit");



    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

