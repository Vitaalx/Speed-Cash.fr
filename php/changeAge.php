<?php
session_start();

include "db.php";

$changeAge = htmlspecialchars($_POST['age']);
//echo $changeAge;

if (isset($_SESSION['id'])) {

    try {
// Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET age = '$changeAge' WHERE id = '$_SESSION[id]'";
//echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        echo "success";


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

