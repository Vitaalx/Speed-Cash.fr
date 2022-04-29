<?php

session_start();

$_SESSION = array();
session_destroy();
header("Location: ../html/ltr/horizontal-menu-template-dark/auth-login.php?erreur=Vous êtes déconnecté");

?>