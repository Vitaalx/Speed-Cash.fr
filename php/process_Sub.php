<?php

session_start();
//var_dump($_SESSION);

require_once '../vendor/autoload.php';
include "db.php";

// Info importante pour la création d'un abonnement Stripe
$first_name = htmlspecialchars($_POST["first_name"]);
$last_name = htmlspecialchars($_POST["last_name"]);
$email = htmlspecialchars($_POST["email"]);
$token = htmlspecialchars($_POST["stripeToken"]);


// Info important pour l'insertion des données lié à l'entreprise si le paiement est validé (+ changement de rôle du client --> entreprise)
$nb_siret = htmlspecialchars($_POST["nb_siret"]);
$company_type = htmlspecialchars($_POST["company_type"]);
$tel_company = htmlspecialchars($_POST["tel_company"]);
$company_name = htmlspecialchars($_POST["company_name"]);
$company_location = htmlspecialchars($_POST["company_location"]);
$caCompany = htmlspecialchars($_POST["caCompany"]);
$subscription_end = date('Y-m-d', strtotime('+1 year'));

$stripe = new \Stripe\StripeCLient
(
    "sk_test_51KcvUWLvgKkU1KjF8e2Yd7xFnOiPtFa4s3meURUTjJ6kqEwkYaq16nIuZrY5Jgk0hA71xuVeHnzLPmlo1CSYTvO700rSF3nifa"
);

// create customer in stripe
$customer = $stripe->customers->create([
    'name' => $first_name . " " . $last_name,
    'email' => $email,
    'source' => $token,
]);

$customer_id = $customer->id;

// create subscription in stripe
$subscription = $stripe->subscriptions->create([
    'customer' => $customer_id,
    'items' => [
        ['price' => 'price_1KsVPuLvgKkU1KjFAMUZm13p']
    ],
]);

if($subscription->status == 'active') {

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertion des données lié à l'entreprise si le paiement est validé
    $sql = "INSERT INTO entreprise (id_client, nb_siret, type_societe, tel, nom_entreprise, adresse_entreprise, subscription_end,chiffre_affaire) VALUES (" . $_SESSION["id"] .", '" . $nb_siret ."', '" . $company_type ."', '" . $tel_company ."', '" . $company_name ."', '" . $company_location ."', '" . $subscription_end ."', '" . $caCompany ."')";
    //echo $sql;
    $result = $conn->prepare($sql);
    $result->execute();

    $update_status_client_to_entreprise = "UPDATE users SET role = 'entreprise' WHERE id = " . $_SESSION["id"];
    //echo $update_status_client_to_entreprise;
    $result = $conn->prepare($sql);
    $result->execute();

} catch (PDOException $e) {
    echo $e->getMessage();
}


} else {
    echo "Erreur lors de paiement !";
}

?>
