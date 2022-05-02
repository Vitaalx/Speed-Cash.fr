<?php

include "./php/db.php";

$caCompany = htmlspecialchars($_POST['caCompany']);


/*
echo $nb_siret;
echo $company_type;
echo $tel_company;
echo $company_name;
echo $company_location;
*/

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

    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/stylePayment.css">
    <link rel="stylesheet" href="style/style_client.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

    <title>Abonnement - Speed-Cash.fr</title>
</head>

<body>
<div class="container">
    <h2 class="my-4 text-center">Abonnement annuel <?php echo $price_to_paid; ?>€ / an</h2>
    <a class="a-french-flag" href="./paymentSubscription.php" ><img style="margin-bottom: 1%;" class="french-flag" src="../images/drapeau-france.png" width="55" height="30" alt="Drapeau Français"></a>
    <a class="a-english-flag" href="./paymentSubscription.php?lang=1" ><img style="margin-bottom: 1%;" class="english-flag" src="../images/drapeau-anglais.png" width="55" height="30" alt="Drapeau Anglais"></a>
    <form action="./php/process_Re-Sub.php" method="post" id="payment-form">
        <div class="form-row">
            <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Votre prénom">
            <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Votre nom">
            <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Votre email">
            <!-- Info importante lié à l'entreprise qui s'abonne -->
            <input type="hidden" name="caCompany" value="<?php echo $caCompany; ?>">
            <!-- Info importante lié à l'entreprise qui s'abonne -->
            <div id="card-element" class="form-control">
                <!-- a Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors -->
            <div id="card-errors" role="alert"></div>
        </div>

        <button>Procéder au paiement</button>
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/charge.js"></script>
</body>

</html>
