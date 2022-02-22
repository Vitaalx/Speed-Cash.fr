<?php
session_start();
include "db.php";
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $passwordInsc = sha1($_POST["password"]);
    $age = $_POST["age"];
    $nation = $_POST["nationalite"];
    //$img = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
    //echo $passwordInsc;


    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Comptage du nombre de joueurs avec le même pseudo ou email
        $sql = "SELECT * FROM client WHERE email='" . $email . "'";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nb = $stmt->rowCount();

        //echo $nb;


        if ($nb == 0) {

            $longueurKey = 15;
            $key = "";
            for ($i = 1; $i < $longueurKey; $i++) {
                $key .= mt_rand(0, 9);
            }

            $sql = "INSERT INTO client (nom, prénom, email, motDePasse, age, nationnalité, confirmKey) VALUES ('" . $nom . "','"  . $prenom . "','" . $email . "', '" . $passwordInsc . "','" . $age . "', '" . $nation . "', '" . $key . "')";
            //echo $sql;
            $result = $conn->prepare($sql);
            $result->execute();

            /*$header = "MIME-Version: 1.0\r\n";
            $header .= 'From:"Speed-Cash.com"<support@speed-cash.fr'."\n";
            $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
            $header .= 'Content-Transfer-Encoding: 8bit';*/
            $UID = $conn -> lastInsertId();
            //echo $UID;

            $url = "http://localhost/Website%20PA%20Prod/Website-Test-PA/php/confirmation.php?id=" . $UID . "&key=" . $key;

            $message = "Bonjour M." . $nom . ", Afin de réinitialiser votre mot de passe veuillez cliquer sur ce lien : " . $url;

            //echo $email;
            mail($email, "Confirmation de compte - Speed-Cash", $message);

            echo "success";


        } else {

            echo "doublon";

        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>