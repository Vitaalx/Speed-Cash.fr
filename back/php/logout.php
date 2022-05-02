<?php

session_start();

$_SESSION['user'] = array();
header("Location: ../html/ltr/horizontal-menu-template-dark/auth-login.php?erreur=Vous êtes déconnecté");

?>