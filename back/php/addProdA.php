<?php 

include 'bdd.php';


if(isset($_POST["nom"]) && isset($_POST["prix"]) && isset($_POST["description"]) && isset($_POST["categorie"]) && isset($_POST["depot"]) &&
    isset($_POST["marque"]) && isset($_POST["ref_fournisseur"]) && isset($_POST["remise"]) && isset($_POST["TVA"]) && isset($_POST["sous_categorie"]) &&
    isset($_POST["fournisseur"]) && isset($_POST["modele"]) && isset($_POST["stock"]) && isset($_POST["id_fich_tech"]) && isset($_FILES["file-produit"])){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $target_dir = "../../images/";
    $image_prod = $_FILES['file-produit']['tmp_name'];

    $type = "produit";

    $q = $conn->prepare('INSERT INTO produits (prix, nom, description, categorie, depot, marque, ref_fournisseur, remise, TVA, sous_categorie, fournisseur, modele, date_enter, stock, id_fich_tech, type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
    var_dump($q);
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
        $type,
    ]);

    $UID = $conn->lastInsertId();

    // Sauvegarde de l'avatar
    move_uploaded_file($image_prod, $target_dir . 'produit-' . $UID . '.png');

    if($add){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message=Produit ajouté avec succès.');
    }else{
        echo "<p>Echec de l'enregistrement.</p>";
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    echo "Echec de la requête.";
}

?>