<?php
if(isset($_POST['brand'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }

    $q = $db->prepare('SELECT * FROM products WHERE marque = ?');
    $res = $q->execute([
        $_POST['brand']
    ]);
    $response1 = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach($response1 as $response1) {
    echo "<div>";
    echo "<h2>nom : " . $response1['nom'] . " id: " . $response1["id_products"] . "</h2>";
    echo "<p>" . $response1['categorie'] . "</p>";
    echo "<p>" . $response1['marque'] . "</p>";
    echo "<p>" . $response1['prix'] . "</p>";
    echo "</div>";
    }

}else{
    echo "<p>Le produit n'existe pas.</p>";
}

?>