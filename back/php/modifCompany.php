<?php

include 'bdd.php';

if(isset($_POST["type_abonnement"]) && isset($_POST["subscription_end"])  && isset($_POST["id"])){

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->prepare('UPDATE entreprise SET type_abonnement = ?, subscription_end = ? WHERE id = ?');
    var_dump($q);
    //echo $_POST['id_fich_tech'];
    $modif = $q->execute([
        $_POST['type_abonnement'],
        $_POST['subscription_end'],
        $_POST['id'],
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-entreprise-list.php?message=L\'entreprise à bien été modifié.');
    }else{
        header('location: ../html/ltr/horizontal-menu-template-dark/page-entreprise-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-entreprise-list.php?message=error');
    }

} else {
    header('location: ../html/ltr/horizontal-menu-template-dark/page-entreprise-list.php?message=error');
}

?>    