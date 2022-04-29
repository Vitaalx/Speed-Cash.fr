<?php

include 'bdd.php';

if (isset($_POST['id']) AND !empty($_POST['id'])) {
    $id = $_POST['id'];

    $q = $db->prepare('DELETE FROM users WHERE id = ?');
    $response = $q->execute([
        $id
    ]);
    if($response) {
        echo "succes";
    } else {
        echo "erreur";
    }

}