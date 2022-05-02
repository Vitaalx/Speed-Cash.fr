<?php

include 'bdd.php';

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$q = $conn->query('SELECT * FROM code_promo ORDER BY ID');
$responses = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($responses as $response) {
  echo "<tr>";
  echo "<td>" . $response['id'] . "</td>";
  echo "<td>" . $response['code_name'] . "</td>";
  echo "<td>" . (1 - $response['reduction'])*100 . "%</td>";
  if($response['date_expiry'] < date('Y-m-d')) {
    echo "<td><span class='badge badge-light-danger'>" . $response['date_expiry'] . "</span></td>";
  } else {
    echo "<td><span class='badge badge-light-success'>" . $response['date_expiry'] . "</span></td>";
  }

  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-cpromo-edit.php?id='.$response['id'].'"><i class="bx bx-edit-alt"></i></a><a href="../../../php/deleteCpromo.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
  echo "</tr>";
}

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
