<?php
session_start();

include "db.php";

$email = htmlspecialchars($_POST["email"]);
$passwordConn = sha1(htmlspecialchars($_POST["password"]));

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

    //echo $nb;

    if($nb == 0) {

        echo "noninscrit";

    } else {
        $enreg = $stmt->fetch();
        //var_dump($enreg);
        //echo $enreg["compteActif"];
        if ($enreg["compteActif"] == "1") {

            $_SESSION["email"] = $email;
            $_SESSION["id"] = $enreg["id"];
            $_SESSION["auth"] = 1;
            $_SESSION["prénom"] = $enreg["prénom"];
            $_SESSION["nom"] = $enreg["nom"];

            echo "success";

        } else {
            echo "pasactif";
        }
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}



