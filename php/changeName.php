<?php
session_start();

include "db.php";

$nom = htmlspecialchars($_POST["nom"]);
$prénom = htmlspecialchars($_POST["prénom"]);

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL
    $sql = "SELECT * from users where id='".$_SESSION["id"]."'";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    if ($nb == 1) {
        $info_user = $stmt->fetch();
        if($nom == $info_user["nom"] || $prénom == $info_user["prénom"]) {
            echo "identique";
        } else {
            $sql = "UPDATE users SET nom='$nom', prénom='$prénom' WHERE id='".$_SESSION["id"]."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "success";
        }
    }  else {
        echo "nonenregistré";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>