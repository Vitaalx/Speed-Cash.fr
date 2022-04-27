<?php

session_start();

include "db.php";

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$code = htmlspecialchars($_POST['code']);

    if(!empty($nom) && !empty($prenom) && !empty($code)){

        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL
            $sql = "INSERT INTO request_card (client_id, nom, prénom, code) VALUES (" . $_SESSION['id'] . ", '$nom', '$prenom', $code)";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            //echo $sql;

            echo "success";

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}

?>
