<?php

include "db.php";

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // select produit_id,AVG(note) from note_produits group by produit_id;
    $sql = "SELECT produit_id,AVG(note) FROM note_produits GROUP BY produit_id";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();
    //echo $nb;
    if ($nb > 0) {

        for($i=1; $i <= $nb; $i++) {

            $enreg = $stmt->fetch();
            //var_dump($enreg);
            //echo "ok".$enreg["AVG(note)"];
            //echo "op".$enreg["produit_id"];
            $sql = "UPDATE produits SET note = '" . $enreg["AVG(note)"] ."' WHERE id='" . $enreg["produit_id"] ."'";
            //echo $sql;
            $stmt2 = $conn->prepare($sql);
            $stmt2->execute();

        }

        //echo "success";

    } else {
        //echo "Mise à jour déjà effectuée !";
    }




} catch (PDOException $e) {
    echo $e->getMessage();
}