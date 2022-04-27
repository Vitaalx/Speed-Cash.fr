<?php


    session_start();

    include "db.php";

    $new_pass = sha1(htmlspecialchars($_POST["new_password"]));
    $old_pass = sha1(htmlspecialchars($_POST["old_password"]));
    $id_client = $_SESSION["id"];

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM users WHERE id='$id_client' AND motDePasse='$old_pass'";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nb = $stmt->rowCount();

        if ($nb > 0) {
            $sql = "UPDATE users SET motDePasse='$new_pass' WHERE id='$id_client'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "success";
        } else {
            echo "error";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
