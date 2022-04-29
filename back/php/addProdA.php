<?php 

include 'bdd.php';

if(isset($_POST["nom"]) and isset($_POST["prix"]) and isset($_POST["description"]) and isset($_POST["categorie"]) and isset($_POST["depot"]) and
    isset($_POST["marque"]) and isset($_POST["ref_fournisseur"]) and isset($_POST["remise"]) and isset($_POST["TVA"]) and isset($_POST["sous_categorie"]) and
    isset($_POST["fournisseur"]) and isset($_POST["modele"]) and isset($_POST["stock"]) and isset($_POST["id_fich_tech"]) and isset($_POST["file-produit"])){

    $target_dir = "../../images/";
    $image_prod = $_FILES['file-produit']['tmp_name'];

    echo "OK produit";

    $q = $db->prepare('INSERT INTO produits (prix, nom, description, categorie, depot, marque, ref_fournisseur, remise, TVA, sous_categorie, fournisseur, modele, date_enter, stock, id_fich_tech) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
    echo $q;
    $add = $q->execute([
        $_POST['prix'],
        $_POST['nom'],
        $_POST['description'],
        $_POST['categorie'],
        $_POST['depot'],
        $_POST['marque'],
        $_POST['ref_fournisseur'],
        $_POST['remise'],
        $_POST['TVA'],
        $_POST['sous_categorie'],
        $_POST['fournisseur'],
        $_POST['modele'],
        date('Y-m-d'),
        $_POST['stock'],
        $_POST['id_fich_tech'],
    ]);

    $UID = $db->lastInsertId();

    // Sauvegarde de l'avatar
    move_uploaded_file($image_prod, $target_dir . 'produit-' . $UID . '.png');

    if($add){
        //header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message= Client enregistré avec succes.');
    }else{
        echo "<p>Echec de l'enregistrement.</p>";
    }
}else{
    echo "Echec de la requete.";
}

?>