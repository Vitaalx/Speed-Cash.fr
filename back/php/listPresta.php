<?php

require 'bdd.php';



try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->query("SELECT * FROM `produits` WHERE type='prestation' ORDER BY `produits`.`date_enter` DESC");
    $responses = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach($responses as $response) {
      echo "<tr>";
      echo "<td>" . $response['id'] . "</td>";
      echo '<td>' . $response['prix'] . '€</td>';
      echo "<td><a href='../../../html/ltr/horizontal-menu-template-dark/page-prestation-edit.php?id=".$response["id"]."'>" . $response['nom'] . "</a></td>";
      echo "<td><span class='badge badge-light-info'>" . (1 - $response['remise'])*100 . "%</span></td>";
      echo "<td>" . $response['date_enter'] . "</td>";
      if($response['date_end'] < date("Y-m-d")) {
          echo "<td><span class='badge badge-light-danger'>" . $response['date_end'] . "</span></td>";
      } else {
          echo "<td><span class='badge badge-light-success'>" . $response['date_end'] . "</span></td>";
      }
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
        echo "<td><a href='../../../html/ltr/horizontal-menu-template-dark/page-part-list.php'>" . $response['id_part'] . "</a></td>";


      echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-prestation-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a><a href="../../../php/deletePresta.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
      echo "</tr>";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>