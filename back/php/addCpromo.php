<?php 

include 'bdd.php';


if(isset($_POST["code_name"]) && isset($_POST["reduction"]) && isset($_POST["date_expiry"]) && $_POST["date_expiry"] > date('Y-m-d')){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $reduction = 1-($_POST["reduction"]/100);

    $q = $conn->prepare('INSERT INTO code_promo (code_name, reduction, date_expiry) VALUES (?,?,?)');
    //var_dump($q);
    $add = $q->execute([
        $_POST['code_name'],
        $reduction,
        $_POST['date_expiry'],
    ]);

    if($add){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=Code promo ajouté avec succès.');
    }else{
        echo "<p>Echec de l'enregistrement.</p>";
        header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=Code promo ajouté avec succès.');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=Code promo ajouté avec succès.');
    }
}else{
    echo "Echec de la requête.";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=Code promo ajouté avec succès.');
}

?>