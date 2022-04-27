<?php

session_start();

$clientToDelete = htmlspecialchars($_GET["prénom"]);
$idClient = htmlspecialchars($_GET["id"]);
echo $clientToDelete;
echo $idClient;

// Paramétres BDD
include "db.php";

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_GET["prénom"]) && !empty($_GET["prénom"]) && $_GET["prénom"] === $_SESSION["prénom"] && isset($_GET["id"]) && !empty($_GET["id"]) && $_GET["id"] === $_SESSION["id"]) {
        $sql = "DELETE FROM users WHERE id = ".$idClient;
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        session_destroy();
        header("Location: ../index.php?suppr=success");
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
