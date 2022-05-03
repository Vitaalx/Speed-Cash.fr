<?php

include 'bdd.php';

date_default_timezone_set('UTC');

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$date = date("Y-m-d");

$q = $conn->query('SELECT * FROM request_card ORDER BY ID');
$request_cards = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($request_cards as $request_card) {
  echo "<tr>";
  echo "<td>" . $request_card['id'] . "</td>";
  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-users-edit.php?id='.$request_card['client_id'].'">' . $request_card['client_id'] . '</a></td>';
  echo '<td>' . $request_card['nom'] . '</td>';
  echo "<td>" . $request_card['prénom'] . "</td>";
  if($request_card['date_expiry'] < $date) {
    echo "<td><span class='badge badge-light-danger'>" . $request_card['date_expiry'] . "</span></td>";
  } else {
    echo "<td><span class='badge badge-light-success'>" . $request_card['date_expiry'] . "</span></td>";
  }
  if ($request_card['status'] == 0) {
    echo "<td><span class='badge badge-light-warning'>En attente</span></td>";
  } else {
    echo "<td><span class='badge badge-light-success'>Validé</span></td>";
  }
  echo '<td><a href="../../../php/acceptRequestCard.php?id=' . $request_card['id'] . '"><i class="bx bx-check"></i></a><a href="../../../php/rejectRequestCard.php?id=' . $request_card['id'] . '"><i class="bx bx-block" onclick="return confirmDelete()"></i></a></td>';
  echo "</tr>";
}

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
