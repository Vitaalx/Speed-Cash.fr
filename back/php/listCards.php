<?php

include 'bdd.php';

date_default_timezone_set('UTC');

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$date = date("Y-m");

$q = $conn->query('SELECT * FROM cards_client ORDER BY ID');
$cards_clients = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($cards_clients as $cards_client) {
  echo "<tr>";
  echo "<td>" . $cards_client['id'] . "</td>";
  echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-users-edit.php?id='.$cards_client['client_id'].'">' . $cards_client['client_id'] . '</a></td>';
  echo '<td>' . $cards_client['number'] . '</td>';
  echo "<td>" . $cards_client['cvc'] . "</td>";
  if($cards_client['expiry_date'] < $date) {
    echo "<td><span class='badge badge-light-danger'>" . $cards_client['expiry_date'] . "</span></td>";
  } else {
    echo "<td><span class='badge badge-light-success'>" . $cards_client['expiry_date'] . "</span></td>";
  }
  echo '<td><a href="../../../php/deleteCards.php?id=' . $cards_client['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
  echo "</tr>";
}

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
