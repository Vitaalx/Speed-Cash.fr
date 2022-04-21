<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=lesTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}
$q = $db->query('SELECT * FROM warehouse ORDER BY id_crate');
$response = $q->fetchAll(PDO::FETCH_ASSOC);

foreach($response as $response){
    echo "<tr>";
    echo "<th> " . $response['id_crate'] . "</th>";
    echo "<th> " . $response['name_prod'] . "</th>";
    echo "<th> " . $response['month'] . "</th>";
    echo "<th> " . $response['year'] . "</th>";
    echo "<th> " . $response['stock'] . "</th>";
    echo "<th> " . $response['sales'] . "</th>";
    echo "</tr> </br>";
}

?>