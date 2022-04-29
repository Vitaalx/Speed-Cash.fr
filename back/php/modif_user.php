<?php
include 'bdd.php';

if (isset($_POST['name']) AND !empty($_POST['name']) AND isset($_POST['id']) AND !empty($_POST['id'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];

    $q = $db->prepare('UPDATE users SET prenom = ? WHERE id = ?');
    $response = $q->execute([
        $name,
        $id
    ]);
    if($response) {
        echo "succes";
    } else {
        echo "erreur";
    }

}

if (isset($_POST['role']) AND !empty($_POST['role']) AND isset($_POST['id']) AND !empty($_POST['id'])) {
    $role = intval($_POST['role']);
    $id = $_POST['id'];

    $q = $db->prepare('UPDATE users SET role = ? WHERE id = ?');
    $response = $q->execute([
        $role,
        $id
    ]);
    if($response) {
        echo "succes";
    } else {
        echo "erreur";
    }

}

if (isset($_POST['statut']) AND !empty($_POST['statut']) AND isset($_POST['id']) AND !empty($_POST['id'])) {
    $statut = intval($_POST['statut']);
    $id = $_POST['id'];

    $q = $db->prepare('UPDATE users SET statut_cpt = ? WHERE id = ?');
    $response = $q->execute([
        $statut,
        $id
    ]);
    if($response) {
        echo "yolo";
    } else {
        echo "erreur";
    }

}

if (isset($_POST['pays']) AND !empty($_POST['pays']) AND isset($_POST['id']) AND !empty($_POST['id'])) {
    $pays = $_POST['pays'];
    $id = $_POST['id'];

    $q = $db->prepare('UPDATE users SET nationalite = ? WHERE id = ?');
    $response = $q->execute([
        $pays,
        $id
    ]);
    if($response) {
        echo "yolo";
    } else {
        echo "erreur";
    }

}

if (isset($_POST['tel']) AND !empty($_POST['tel']) AND isset($_POST['id']) AND !empty($_POST['id'])) {
    $tel = htmlspecialchars($_POST['tel']);
    $id = $_POST['id'];
    

    $q = $db->prepare('UPDATE users SET tel = ? WHERE id = ?');
    $response = $q->execute([
        $tel,
        $id
    ]);
    if($response) {
        echo "yolo";
    } else {
        echo "erreur";
    }

}

?>