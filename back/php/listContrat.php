<?php

include 'bdd.php';

date_default_timezone_set('UTC');

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$date = date("Y-m-d H:i:s");

$q = $conn->query('SELECT * FROM contrat ORDER BY ID');
$responses = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($responses as $response) {
  echo "<tr>";
  echo "<td>" . $response['id'] . "</td>";
  echo '<td>' . $response['id_entreprise_part'] . '</td>';
  echo "<td>" . $response['date_crea'] . "</td>";
  if($response['date_fin'] < $date) {
    echo "<td><span class='badge badge-light-danger'>" . $response['date_fin'] . "</span></td>";
  } else {
    echo "<td><span class='badge badge-light-success'>" . $response['date_fin'] . "</span></td>";
  }
  echo "<td>" . $response['type'] . "</td>";
  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-contrat-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a><a href="../../../php/deleteContrat.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
  echo "</tr>";
}

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
