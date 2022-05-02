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


// Info important pour update des données lié à l'entreprise si le paiement est validé
$caCompany = htmlspecialchars($_POST["caCompany"]);
$id_client = $_SESSION['id'];
$subscription_end = date('Y-m-d', strtotime('+1 year'));

$stripe = new \Stripe\StripeCLient
(
    "sk_test_51KcvUWLvgKkU1KjF8e2Yd7xFnOiPtFa4s3meURUTjJ6kqEwkYaq16nIuZrY5Jgk0hA71xuVeHnzLPmlo1CSYTvO700rSF3nifa"
);

try {
// Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT pourcentage_cotisation FROM calcul_cotisation WHERE '" . $caCompany . "' >= min AND '" . $caCompany . "' <= max";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nb = $stmt->rowCount();

    if ($nb == 1) {

        $pourcentage_cotisation = $stmt->fetch();
        $price_to_paid = ($caCompany * $pourcentage_cotisation['pourcentage_cotisation']) / 100;

// create customer in stripe
        $customer = $stripe->customers->create([
            'name' => $first_name . " " . $last_name,
            'email' => $email,
            'source' => $token,
        ]);

// create product in stripe
        $product = $stripe->products->create([
            'name' => 'Abonnement annuel - Speed-Cash.fr',

        ]);

        $product_id = $product->id;
        $customer_id = $customer->id;

// create subscription in stripe
        $subscription = $stripe->subscriptions->create(
            [
                'customer' => $customer_id,
                'items' => [
                    [
                        'price_data' => [
                            'unit_amount' => $price_to_paid.+(0).+(0),
                            'currency' => 'eur',
                            'product' => $product_id,
                            'recurring' => ['interval' => 'year'],
                        ],
                    ],
                ],
            ]
        );

        if ($subscription->status == 'active') {

            try {
                // Connexion à la BDD
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    // Update des données lié à l'entreprise si le paiement est validé
                    $sql_update = "UPDATE entreprise SET subscription_end = '" . $subscription_end ."', chiffre_affaire = '" . $caCompany ."', montant_payé = '" . $price_to_paid ."' WHERE id_client = '" . $_SESSION['id'] ."'";
                    //echo $sql_update;
                    $update_company = $conn->prepare($sql_update);
                    $update_company->execute();


                    header("Location: ../page-entreprise.php?re-subscription=success");


            } catch (PDOException $e) {
                echo $e->getMessage();
                header("Location: ../page-entreprise.php?re-subscription=error");
            }


        } else {

            $update_status_entreprise_to_client = "UPDATE users SET role = 'client' WHERE id = " . $_SESSION["id"];
            //echo $update_status_client_to_entreprise;
            $result = $conn->prepare($update_status_entreprise_to_client);
            $result->execute();

            echo "Erreur lors de paiement !";
            header("Location: ../page-entreprise.php?re-subscription=error");
        }

    } else {
        echo "error SQL!";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
