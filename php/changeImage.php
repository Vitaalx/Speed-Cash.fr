<?php
session_start();

include "db.php";

$im = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
$target_dir = "../images/avatar/";

if (isset($_SESSION['id'])) {

        $filePath = "../images/avatar/AVATAR-" . $_SESSION['id'] . ".jpeg";
        unlink($filePath);

        // Sauvegarde de l'avatar
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . 'AVATAR-' . $_SESSION['id'] . '.jpeg');

        echo "success";
}


