<?php 

include 'bdd.php';


if(isset($_POST["ref_article"]) && isset($_POST["commande_id"])){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $q = $conn->prepare('INSERT INTO facture (ref_article, id_commande) VALUES (?,?)');
    //var_dump($q);
    $add = $q->execute([
        $_POST['ref_article'],
        $_POST['commande_id'],
    ]);

    if($add){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-facture-list.php?message=Facture ajoutée avec succès.');
    }else{
        echo "<p>Echec de l'enregistrement.</p>";
        header('location: ../html/ltr/horizontal-menu-template-dark/page-facture-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-facture-list.php?message=error');
    }
}else{
    echo "Echec de la requête.";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-facture-list.php?message=error');
}

?>