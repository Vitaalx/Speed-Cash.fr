<?php
session_start();
include "db.php";

$rate = $_POST["note"];
$produit_id = $_POST["produit_id"];
$user_id = $_POST["user_id"];

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Comptage du nombre de joueurs avec le même pseudo ou email
    $sql = "SELECT * FROM note_produits WHERE user_id='" . $user_id ."' AND produit_id='" . $produit_id ."'";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    if ($nb == 0) {

        $sql = "INSERT INTO note_produits (user_id, produit_id, note) VALUES ('" . $user_id ."', '" . $produit_id . "', '" . $rate . "')";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        echo "success";

    } else {
        echo "doublon";
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }