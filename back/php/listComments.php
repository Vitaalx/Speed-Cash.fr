<?php

require 'bdd.php';



try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->query("SELECT * FROM `commentaire` ORDER BY `commentaire`.`date` DESC");
    $responses = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach($responses as $response) {

      $sql = $conn->prepare('SELECT * FROM produits WHERE id = ?');
      $produit = $sql->execute([
          $response['id_produit'],
      ]);
      $results = $sql->fetch(PDO::FETCH_ASSOC);
      echo "<tr>";
      echo "<td>" . $response['id'] . "</td>";
      if ($results["type"] === "produit") {
          echo "<td><img style='width: 45px; height: 45px;' src='../../../../images/produit-". $response['id_produit'].".png'></td>";
      } else if($results["type"] === "prestation") {
          echo "<td><img style='width: 45px; height: 45px;' src='../../../../images/presta-". $response['id_produit'].".png'></td>";
      }
      echo "<td>" . $response['user'] . "</td>";
      echo "<td>" . $response['contenue'] . "</td>";
      echo "<td><span class='badge badge-light-success'>" . $response['date'] . "</span></td>";
      if ($response['signaler'] == 0) {
          echo "<td><span class='badge badge-light-success'>Non-signalé</span></td>";
      } else {
          echo "<td><span class='badge badge-light-danger'>Signalé</span></td>";
      }
      echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-comment-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a><a href="../../../php/deleteComment.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
      echo "</tr>";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>