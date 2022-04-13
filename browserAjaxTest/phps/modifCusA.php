<?php

if(isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST['id']) && !empty($_POST['id'])) {
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
  $q = $db->prepare('UPDATE clients SET nom = ? WHERE id = ?');
  $response = $q->execute([
    $_POST["name"],
    $_POST["id"]
  ]);
  if($response) {
    echo "succes";
  } else {
    echo "erreur";
  }

}else if(isset($_POST['sname']) && !empty($_POST['sname']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE clients SET prenom = ? WHERE id = ?');
    $response = $q->execute([
      $_POST["sname"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}else if(isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE clients SET email = ? WHERE id = ?');
    $response = $q->execute([
      $_POST["mail"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}else if(isset($_POST['nat']) && !empty($_POST['nat']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE clients SET nationalite = ? WHERE id = ?');
    $response = $q->execute([
      $_POST["nat"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}else if(isset($_POST['age']) && !empty($_POST['age']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE clients SET age = ? WHERE id = ?');
    $response = $q->execute([
      $_POST["age"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}else if(isset($_POST['role']) && !empty($_POST['role']) && isset($_POST['id']) && !empty($_POST['id'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('UPDATE clients SET role = ? WHERE id = ?');
    $response = $q->execute([
      $_POST["role"],
      $_POST["id"]
    ]);
    if($response) {
      echo "succes";
    } else {
      echo "erreur";
    }
}
?>
