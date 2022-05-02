<?php

include 'bdd.php';

if(isset($_POST["code_name"]) && isset($_POST["reduction"]) && isset($_POST["date_expiry"]) && isset($_POST["id"])){

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $reduction = 1-($_POST["reduction"]/100);

    $q = $conn->prepare('UPDATE code_promo SET code_name = ?, reduction = ?,date_expiry = ? WHERE id = ?');
    //var_dump($q);
    $modif = $q->execute([
        $_POST['code_name'],
        $reduction,
        $_POST['date_expiry'],
        $_POST['id'],
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=Le Code promo à bien été modifié.');
    }else{
        header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=error');
    }

} else {
    header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=error');
}

?>    