<?php 

if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['sname']) && !empty($_POST['sname']) 
&& isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['nat']) && !empty($_POST['nat']) 
&& isset($_POST['age']) && !empty($_POST['age']) && isset($_POST['role'])){
    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    }
    $q = $db->prepare('INSERT INTO clients (nom, prenom, email, motDePasse, nationalite, age, confirmKey, compteActif, role) VALUES (?,?,?,?,?,?,?,?,?)');
    $add = $q->execute([
        $_POST['name'],
        $_POST['sname'],
        $_POST['mail'],
        "defaultpwd",
        $_POST['nat'],
        $_POST['age'],
        "nokey",
        0,
        $_POST['role']
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