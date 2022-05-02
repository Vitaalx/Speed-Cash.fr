<?php

include 'bdd.php';

if(isset($_POST["description"]) && isset($_POST["remise"]) && isset($_POST["date_end"]) && isset($_POST["quantity"]) && isset($_POST["id"])){

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->prepare('UPDATE produits SET description = ?, remise = ? , date_end = ? , quantity = ? WHERE id = ?');
    var_dump($q);

    $modif = $q->execute([
        $_POST['description'],
        $_POST['remise'],
        $_POST['date_end'],
        $_POST['quantity'],
        $_POST['id'],
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=La prestation à bien été modifié.');
    }else{
        header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=error');
    }

} else {
    header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=error');
}

?>    