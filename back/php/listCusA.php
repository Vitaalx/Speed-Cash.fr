<?php

include 'bdd.php';

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$q = $conn->query('SELECT * FROM users ORDER BY ID');
$responses = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($responses as $response) {
  echo "<tr>";
  echo "<td>" . $response['id'] . "</td>";
  echo '<td><a href="page-users-edit.php?id=' . $response['id'] . '">' . $response['prénom'] . " " . $response['nom'] . '</a></td>';
  echo "<td>" . $response['email'] . "</td>";
  echo "<td>" . $response['nationalité'] . "</td>";
  echo "<td>" . $response['age'] . "</td>";
  if ($response['compteActif'] == 1) {
    echo '<td><span class="badge badge-light-success">Confirmé</span></td>';
  }
  if ($response['compteActif'] == 0) {
    echo '<td><span class="badge badge-light-warning">Non-confirmé</span></td>';
  }
  if ($response['compteActif'] == 2) {
    echo '<td><span class="badge badge-light-danger">Désactivé</span></td>';
  }
  if ($response['role'] == "administrateur") {
    echo '<td><span class="badge badge-light-danger">Administrateur</span></td>';
  }
  if ($response['role'] == "client") {
    echo '<td><span class="badge badge-light-dark">Client</span></td>';
  }
  if ($response['role'] == "partenaire") {
    echo '<td><span class="badge badge-circle-light-info">Partenaire</span></td>';
  }
  if ($response['role'] == "entreprise") {
    echo '<td><span class="badge badge-circle-dark">Entreprise</span></td>';
  }

  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-users-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a><a href="../../../php/delete_user.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
  echo "</tr>";
}

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
