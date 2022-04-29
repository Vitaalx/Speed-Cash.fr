<?php

include 'bdd.php';

$q = $db->query('SELECT * FROM users ORDER BY ID');
$response = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($response as $response) {
  echo "<tr>";
  echo "<td>" . $response['id'] . "</td>";
  echo '<td><a href="#">' . $response['prénom'] . " " . $response['nom'] . '</a></td>';
  echo "<td>" . $response['email'] . "</td>";
  echo "<td>" . $response['nationalité'] . "</td>";
  echo "<td>" . $response['age'] . "</td>";
  if ($response['statut_cpt'] == 1) {
    echo '<td><span class="badge badge-light-success">Activé</span></td>';
  }
  if ($response['statut_cpt'] == 3) {
    echo '<td><span class="badge badge-light-warning">Non-activé</span></td>';
  }
  if ($response['statut_cpt'] == 2) {
    echo '<td><span class="badge badge-light-danger">Désactivé</span></td>';
  }
  if ($response['role'] == "administrateur") {
    echo '<td><span class="badge badge-light-info">Administrateur</span></td>';
  }
  if ($response['role'] == "client") {
    echo '<td><span class="badge badge-light-success">Client</span></td>';
  }
  if ($response['role'] == "partenaire") {
    echo '<td><span class="badge badge-light-dark">Partenaire</span></td>';
  }
  if ($response['role'] == "entreprise") {
    echo '<td><span class="badge badge-circle-dark">Entreprise</span></td>';
  }

  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-users-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a></td>';
  echo "</tr>";
}

?>
