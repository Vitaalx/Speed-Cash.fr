<?php

include 'bdd.php';

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $id = $_GET['id'];

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $q = $conn->prepare('DELETE FROM request_card WHERE id = ?');
    //var_dump($q);
    $modif = $q->execute([
        $id,
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-request-card-list.php?message=La demande de carte à été rejetée.');
    }else{
        header('location: ../html/ltr/horizontal-menu-template-dark/page-request-card-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-request-card-list.php?message=error');
    }

} else {
    header('location: ../html/ltr/horizontal-menu-template-dark/page-request-card-list.php?message=error');
}

?>    