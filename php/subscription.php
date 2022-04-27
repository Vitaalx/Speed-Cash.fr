<?php

session_start();

$langue = 0;
if(isset($_GET['lang'])) $langue = $_GET['lang'];

include('./traduction_en.php');

if (!isset($_SESSION["email"])) {
    header("Location: ../index.php");
}

$nb_siret = htmlspecialchars($_POST["nb_siret"]);
$society_type = htmlspecialchars($_POST["society_type"]);
$phone = htmlspecialchars($_POST["phone"]);
$company = htmlspecialchars($_POST["company"]);
$address = htmlspecialchars($_POST["address"]);
$price = htmlspecialchars($_POST["price"]);

echo "success";

?>
