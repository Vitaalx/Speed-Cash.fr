<?php

require 'bdd.php';

$q = $db->query('SELECT * FROM produits');
$response = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($response as $response) {
  echo "<tr>";
  echo "<td>" . $response['ref_fournisseur'] . "</td>";
  echo '<td><a href="#">' . $response['nom'] . '</a></td>';
  echo "<td>" . $response['depot'] . "</td>";
  echo "<td>" . $response['categorie'] . "</td>";
  echo "<td>" . $response['prix'] . "€</td>";
  echo "<td>" . $response['id_fich_tech'] . "</td>";
  if ($response['stock'] == 0) {
    echo '<td><span class="badge badge-light-danger">'. $response['stock'] .'</span></td>';
  }
  if ($response['stock'] > 0 ) {
    if ($response['stock']  < 100) {
      echo '<td><span class="badge badge-light-warning">'. $response['stock'] .'</span></td>';
    } else {
      echo '<td><span class="badge badge-light-success">'. $response['stock'] .'</span></td>';
    }
  }

  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-prod-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a></td>';
  echo "</tr>";
}

?>