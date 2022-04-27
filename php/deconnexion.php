<?php

// On démarre la session
session_start();

if (isset($_SESSION["auth"])) { // Si tu es connecté on te déconnecte et on te redirige vers une page.

    // Supression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    header('Location: ../index.php?deco=1');

}else{ // Dans le cas contraire on t'empêche d'accéder à cette page en te redirigeant vers l'index.

    header('Location: ../index.php');

}
