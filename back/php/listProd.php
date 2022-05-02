<?php

require 'bdd.php';



try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->query("SELECT * FROM `produits` WHERE type='produit' ORDER BY `produits`.`date_enter` DESC");
    $responses = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach($responses as $response) {
      echo "<tr>";
      echo "<td>" . $response['ref_fournisseur'] . "</td>";
      echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-prod-edit.php?id='.$response['id'].'">' . $response['nom'] . '</a></td>';
      echo "<td>" . $response['depot'] . "</td>";
      echo "<td>" . $response['categorie'] . "</td>";
      echo "<td>" . $response['prix'] . "€</td>";
      echo "<td>" . $response['id_fich_tech'] . "</td>";
      if ($response['stock'] == 0) {
        echo '<td><span class="badge badge-light-danger">'. $response['stock'] .'</span></td>';
      }
      if ($response['stock'] > 0 ) {
        if ($response['stock']  < 100) {
          echo '<td><span class="badge badge-light-danger">'. $response['stock'] .'</span></td>';
        } else if ($response['stock']  < 250) {
            echo '<td><span class="badge badge-light-warning">'. $response['stock'] .'</span></td>';
        } else {
            echo '<td><span class="badge badge-light-success">'. $response['stock'] .'</span></td>';
        }
      }

      echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-prod-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a><a href="../../../php/deleteProd.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a><a href="../../../html/ltr/horizontal-menu-template-dark/page-changeDepotProd-edit.php?id='.$response['id'].'"><i class="bx bx-package"></i></a></td>';
      echo "</tr>";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>