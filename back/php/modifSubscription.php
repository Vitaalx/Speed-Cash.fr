<?php

include 'bdd.php';

if(isset($_POST["type_abonnement"]) && isset($_POST["subscription_end"])  && isset($_POST["id"])){

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->prepare('UPDATE entreprise SET type_abonnement = ?, subscription_end = ? WHERE id = ?');
    var_dump($q);
    $modif = $q->execute([
        $_POST['type_abonnement'],
        $_POST['subscription_end'],
        $_POST['id'],
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-subscription-list.php?message=L\'abonnement à bien été modifié.');
    }else{
        header('location: ../html/ltr/horizontal-menu-template-dark/page-subscription-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-subscription-list.php?message=error');
    }

} else {
    header('location: ../html/ltr/horizontal-menu-template-dark/page-subscription-list.php?message=error');
}

?>    