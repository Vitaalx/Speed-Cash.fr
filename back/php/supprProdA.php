<?php
if(isset($_POST['id'])) {
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
  $q = $db->prepare('DELETE FROM products WHERE id_products = ?');
  $response = $q->execute([
    $_POST['id']  
  ]);
  if($response) {
    echo "succes";
  } else {
    echo "erreur";
  }

} else {
  echo "-1";
}
?>
