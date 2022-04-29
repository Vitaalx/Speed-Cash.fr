<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=speed-cash', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}
$q = $db->query('SELECT * FROM products');
$response = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($response as $response) {
  echo "<div>";
  echo "<h5>nom : " . $response['nom'] . " id: " . $response["id"] . "</h5>";
  echo "<p>" . $response['categorie'] . "</p>";
  echo "<p>" . $response['marque'] . "</p>";
  echo "<p>" . $response['prix'] . "</p>";
  echo "</div>";
}

?>