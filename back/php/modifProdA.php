<?php

include 'bdd.php';

if(isset($_POST["prix"]) && isset($_POST["description"]) && isset($_POST["remise"]) && isset($_POST["sous_categorie"]) && isset($_POST["stock"]) && isset($_POST["id_fich_tech"])){

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->prepare('UPDATE produits SET prix = ?, description = ?,remise = ?,sous_categorie = ?,stock = ? WHERE id_fich_tech = ?');
    //var_dump($q);
    //echo $_POST['id_fich_tech'];
    $modif = $q->execute([
        $_POST['prix'],
        $_POST['description'],
        $_POST['remise'],
        $_POST['sous_categorie'],
        $_POST['stock'],
        $_POST["id_fich_tech"],
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message=Le Produit à bien été modifié.');
    }else{
        echo "<p>Echec de d'update.</p>";
        header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message=error');
    }

} else {
    echo "Echec de la requête.";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message=error');
}

?>    