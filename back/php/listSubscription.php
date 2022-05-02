<?php

include 'bdd.php';

date_default_timezone_set('UTC');

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$date = date("Y-m-d H:i:s");

$q = $conn->query('SELECT * FROM entreprise ORDER BY ID');
$responses = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($responses as $response) {
  echo "<tr>";
  echo "<td>" . $response['id'] . "</td>";
  echo '<td>' . $response['id_client'] . '</td>';
  echo '<td><a href="page-entreprise-edit.php?id=' . $response['id'] . '">' . $response['nom_entreprise'] . '</a></td>';
  echo '<td>' . $response['montant_payé'] .'€</td>';
  echo "<td><span class='badge badge-light-info'>" . $response['type_abonnement'] . "</span></td>";
  if($response['subscription_end'] < $date) {
    echo "<td><span class='badge badge-light-danger'>" . $response['subscription_end'] . "</span></td>";
  } else {
    echo "<td><span class='badge badge-light-success'>" . $response['subscription_end'] . "</span></td>";
  }
  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-subscription-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a><a href="../../../php/deleteSubscription.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
  echo "</tr>";
}

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
