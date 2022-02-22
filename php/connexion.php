<?php
session_start();

include "db.php";

$email = $_POST["email"];
$passwordConn = sha1($_POST["password"]);

//echo $email.$passwordConn;

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Comptage du nombre de joueurs avec le même pseudo ou email
    $sql = "SELECT * FROM client WHERE email='" . $email . "' AND motDePasse='" . $passwordConn ."'";
    //echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();
    $UID = $conn -> lastInsertId();

    //echo $nb;

    if($nb == 0) {

        echo "noninscrit";

    } else {
        $enreg = $stmt->fetch();
        //var_dump($enreg);
        //echo $enreg["compteActif"];
        if ($enreg["compteActif"] == "1") {

            $_SESSION["emailConn"] = $email;
            $_SESSION["id"] = $UID;
            echo "success";

        } else {
            echo "pasactif";
        }
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>