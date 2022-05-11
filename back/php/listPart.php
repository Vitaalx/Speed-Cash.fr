<?php

include 'bdd.php';


try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$q = $conn->query('SELECT * FROM entreprise_part ORDER BY ID');
$responses = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($responses as $response) {
  echo "<tr>";
  echo "<td>" . $response['id'] . "</td>";
  echo '<td>' . $response['id_user_part'] . '</td>';
  echo "<td>" . $response['nom'] . "</td>";
  echo "<td>" . $response['id_contrat_part'] . "</td>";
  echo '<td><a href="../../../php/deletePart.php?id=' . $response['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a></td>';
  echo "</tr>";
}

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
