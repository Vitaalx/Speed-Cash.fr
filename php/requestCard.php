<?php

session_start();

include "db.php";

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$code = htmlspecialchars($_POST['code']);
$date_expiry = date('Y-m-d', strtotime('+5 year'));

$cvc = "";
for ($i = 1; $i <= 3; $i++) {
    $cvc .= mt_rand(0, 9);
}

// Génération d'un numéro de carte bleu
$num_carte = "";
for ($i = 1; $i < 16; $i++) {
    $num_carte .= mt_rand(0, 9);
    if($i % 4 == 0) {
        $num_carte .= " ";
    }
}


    if(!empty($nom) && !empty($prenom) && !empty($code)){

        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL
            $sql = "INSERT INTO request_card (client_id, nom, prénom, code, cvc, date_expiry, card_number) VALUES (" . $_SESSION['id'] . ", '$nom', '$prenom', $code, '$cvc', '$date_expiry', '$num_carte')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            //echo $sql;

            echo "success";

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}

?>
