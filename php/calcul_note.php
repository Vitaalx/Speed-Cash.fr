<?php

include "db.php";

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // select produit_id,AVG(note) from note_produits group by produit_id;
    $sql = "SELECT note FROM note_produits";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    if ($nb > 0) {
        $rates = $stmt->fetchAll(PDO::FETCH_COLUMN);
        //var_dump($rates);
        $len = count($rates);
        //echo $len;
        $result = 0;
        for($i = 0; $i < $len; $i++) {
            $result += $rates[$i];
        }
        $result = $result / $len;

        //echo "La moyenne est de $result";
        //echo "success";

    } else {
        echo "erreur";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}