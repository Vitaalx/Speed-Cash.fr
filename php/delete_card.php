<?php

include "db.php";

if(isset($_GET["id"])) {
    $id = $_GET["id"];

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL
    $sql = "DELETE FROM cards_client WHERE id = $id";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    header("Location: ../my-own-cards.php?delete=success");

} catch (PDOException $e) {
    echo $e->getMessage();
}

}

?>
