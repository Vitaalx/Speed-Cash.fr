<?php 

include 'bdd.php';


if(isset($_POST["nom_presta"]) && isset($_POST["description_presta"]) && isset($_POST["prix_presta"]) && isset($_POST["categorie_presta"]) && isset($_POST["remise_presta"]) &&
    isset($_POST["tva_presta"]) && isset($_POST["date_end"]) && isset($_POST["id_part"]) && isset($_POST["quantity_presta"]) && isset($_FILES["file-presta"])){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $date_enter = date("Y-m-d");
    $target_dir = "../../images/";
    $image_prod = $_FILES['file-presta']['tmp_name'];

    $remise = 1 - ($_POST["remise_presta"]/100);

    $q = $conn->prepare('INSERT INTO produits (prix, nom, description, categorie, remise, TVA, date_enter, stock, date_end, id_part, type) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    //var_dump($q);
    $add = $q->execute([
        $_POST['prix_presta'],
        $_POST['nom_presta'],
        $_POST['description_presta'],
        $_POST['categorie_presta'],
        $remise,
        $_POST['tva_presta'],
        $date_enter,
        $_POST['quantity_presta'],
        $_POST["date_end"],
        $_POST["id_part"],
        "prestation",
    ]);

    $UID = $conn->lastInsertId();

    // Sauvegarde de l'avatar
    move_uploaded_file($image_prod, $target_dir . 'presta-' . $UID . '.png');

    if($add){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=Prestation ajoutée avec succès.');
    }else{
        echo "<p>Echec de l'enregistrement.</p>";
        //header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        //header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=error');
    }
}else{
    echo "Echec de la requête.";
    //header('location: ../html/ltr/horizontal-menu-template-dark/page-presta-list.php?message=error');
}

?>