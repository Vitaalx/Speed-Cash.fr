<?php

include 'bdd.php';

if(isset($_POST["id"]) && isset($_POST["signaler_comment"])){

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->prepare('UPDATE commentaire SET signaler = ? WHERE id = ?');
    //var_dump($q);
    $modif = $q->execute([
        $_POST['signaler_comment'],
        $_POST['id'],
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-comments-list.php?message=Le commentaire à bien été modifié.');
    }else{
        header('location: ../html/ltr/horizontal-menu-template-dark/page-comments-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-comments-list.php?message=error');
    }

} else {
    header('location: ../html/ltr/horizontal-menu-template-dark/page-comments-list.php?message=error');
}

?>    