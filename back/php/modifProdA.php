<?php

if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST['id']) && !empty($_POST['id'])) {
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
  $q = $db->prepare('UPDATE products SET nom = ? WHERE id_products = ?');
  $response = $q->execute([
    $_POST["name"],
    $_POST["id"]
  ]);
  if($response) {
    echo "succes";
  } else {
    echo "erreur";
  }

}else if(isset($_POST['cat']) && !empty($_POST['cat']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE products SET categorie = ? WHERE id_products = ?');
    $response = $q->execute([
      $_POST["cat"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}else if(isset($_POST['brand']) && !empty($_POST['brand']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE products SET marque = ? WHERE id_products = ?');
    $response = $q->execute([
      $_POST["brand"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}else if(isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE products SET prix = ? WHERE id_products = ?');
    $response = $q->execute([
      $_POST["price"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}
?>    