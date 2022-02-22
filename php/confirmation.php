<?php

include "db.php";

if (isset($_GET['id'], $_GET['key']) AND !empty($_GET['id']) AND !empty($_GET['key'])) {
    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = htmlspecialchars(urldecode($_GET['id']));
        $key = htmlspecialchars($_GET['key']);
        $requser = $conn->prepare("SELECT * FROM client WHERE id = ? AND confirmKey = ?");
        $requser->execute(array($id, $key));
        $userexist = $requser->rowCount();

        if($userexist == 1) {

            $user = $requser->fetch();
            if($user['confirme'] == 0) {
                $updateuser = $conn->prepare("UPDATE client SET compteActif = 1 WHERE id = ? AND confirmKey = ?");
                $updateuser->execute(array($id, $key));
                echo "Votre compte a bien été confirmé !";
                header("Location: ../index.php");
            } else {
                echo "Votre compte a déjà été confirmé !";
            }

        } else {
            echo "L'utilisateur n'existe pas !";
        }


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
