<?php
session_start();

include "bdd.php";

$email = $_POST["email_login"];
$passwordConn = sha1($_POST["pass_login"]);

//echo $email.$passwordConn;

try {

    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Comptage du nombre de joueurs avec le même pseudo ou email
    $sql = "SELECT * FROM users WHERE email='" . $email . "' AND motDePasse='" . $passwordConn ."'";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    echo $nb;

    if($nb == 0) {

        echo "noninscrit";
        header('Location: ../html/ltr/horizontal-menu-template-dark/auth-login.php');

    } else {
        $enreg = $stmt->fetch();
        //var_dump($enreg);
        //echo $enreg["compteActif"];
        if ($enreg["role"] == "administrateur") {

            $_SESSION['user']["email"] = $email;
            $_SESSION['user']["id"] = $enreg["id"];
            $_SESSION['user']["auth"] = 1;
            $_SESSION['user']["img_profile"] = $enreg["path_image_profile"];
            $_SESSION['user']["name"] = $enreg["nom"];
            $_SESSION['user']["path"] = "../../../app-assets/images/portrait/small/admin.jpg";
            $_SESSION['user']["role"] = $enreg["role"];

            echo "success";
            header('Location: ../html/ltr/horizontal-menu-template-dark/index.php');

        } else {
            echo "pasactif";
        }
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
