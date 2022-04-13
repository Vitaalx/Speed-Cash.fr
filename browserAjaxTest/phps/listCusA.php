<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}
$q = $db->query('SELECT * FROM clients ORDER BY ID');
$response = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($response as $response) {
  echo "<div>";
  echo "<h5> id : " . $response['id'] . " nom : " . $response["nom"] . " prenom : " . $response['prenom'] . "</h5>";
  echo "<p> email : " . $response['email'] . "</p>";
  echo "<p> nationalité : " . $response['nationalite'] . "</p>";
  echo "<p> age : " . $response['age'] . "</p>";
  echo "<p> compte actif : " . $response['compteActif'] . "</p>";
  echo "<p> role : " . $response['role'] . "</p>";
  echo "</div>";
}

?>
