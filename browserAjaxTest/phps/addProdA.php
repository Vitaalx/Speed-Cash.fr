<?php 

if(isset($_POST['pname']) && !empty($_POST['pname']) && isset($_POST['cat']) && !empty($_POST['cat']) 
&& isset($_POST['brand']) && !empty($_POST['brand']) && isset($_POST['price']) && !empty($_POST['price']) ){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('INSERT INTO products (nom, categorie, marque, prix) VALUES (?,?,?,?)');
    $add = $q->execute([
        $_POST['pname'],
        $_POST['cat'],
        $_POST['brand'],
        $_POST['price'],
    ]);
    if($add){
        header('location: ../admin.php?message= Client enregistré avec succes.');
    }else{
        echo "<p>Echec de l'enregistrement.</p>";
    }
}else{
    echo "Echec de la requete.";
}

?>