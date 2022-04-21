<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=lesTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}

$q = $db->prepare('SELECT sales FROM warehouse WHERE name_prod = ?');
$response = $q->execute([$_POST['nameprod']]);
$response = $q->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($response);

?>