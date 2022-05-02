<?php

include 'bdd.php';

if(isset($_POST["email"]) && isset($_POST["point_fidelite"]) && isset($_POST["role"]) && isset($_POST["status_compte"]) && isset($_POST["id"])){

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->prepare('UPDATE users SET email = ?, compteActif = ?, point_fidelite = ?, role = ? WHERE id = ?');
    var_dump($q);
    //echo $_POST['id_fich_tech'];
    $modif = $q->execute([
        $_POST['email'],
        $_POST['status_compte'],
        $_POST['point_fidelite'],
        $_POST['role'],
        $_POST['id'],
    ]);

    if($modif){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=L\'utilisateur à bien été modifié.');
    }else{
        header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=error');
    }

} else {
    header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=error');
}

?>    