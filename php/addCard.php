<?php

session_start();

include "db.php";

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$number = htmlspecialchars($_POST['number']);
$cvc = htmlspecialchars($_POST['cvc']);
$month_expiry = htmlspecialchars($_POST['month_expiry']);
$year_expiry = htmlspecialchars($_POST['year_expiry']);
$date_expiry = $year_expiry . "-" . $month_expiry;
//echo $date_expiry;

if(!empty($nom) && !empty($prenom) && !empty($number) && !empty($month_expiry) && !empty($year_expiry)){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL
        $sql = "INSERT INTO cards_client (number, expiry_date, client_id, cvc) VALUES ('$number', '$date_expiry', '$_SESSION[id]', '$cvc')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        //echo $sql;

        echo "success";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


