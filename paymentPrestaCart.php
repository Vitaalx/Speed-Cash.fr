<?php

session_start();

$price = $_POST["price"];
//echo $price;
$produits_commandes = $_POST["prestas"];
//echo $produits_commandes;



$langue = 0;
if(isset($_GET['lang'])) $langue = 1;

include('./php/traduction_en.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/stylePayment.css">
    <link rel="stylesheet" href="style/style_client.css">
    <link rel="shortcut icon" type="image/png" href="./icons/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

    <title><?php echo $title[$langue]; ?></title>
</head>

<body>
<h6 class="message-remise-presta" id="success-notif">La remise à bien été prise en compte !<span class='close-popup-notif' onclick='closePopUp()' title='Fermer'>&times;</span></h6>
<div class="container">
    <h2 class="my-4 text-center"><?php echo $title_div_form[$langue]; ?></h2>
    <br />
    <a class="a-french-flag" href="./paymentPrestaCart.php" ><img style="margin-bottom: 1%;" class="french-flag" src="images/drapeau-france.png" width="55" height="30" alt="Drapeau Français"></a>
    <a class="a-english-flag" href="./paymentPrestaCart.php?lang=1" ><img style="margin-bottom: 1%;" class="english-flag" src="images/drapeau-anglais.png" width="55" height="30" alt="Drapeau Anglais"></a>
    <form action="/charge.php" method="post" id="payment-form">
        <div class="form-row">
            <input type="hidden" name="ids" value="<?php echo $produits_commandes ?>">
            <input type="hidden" name="price" value="<?php echo $price ?>">
            <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="<?php echo $first_name_payment[$langue]; ?>">
            <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="<?php echo $name_payment[$langue]; ?>">
            <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="<?php echo $mail_payment[$langue]; ?>">
            <div id="card-element" class="form-control">
                <!-- a Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors -->
            <div id="card-errors" role="alert"></div>
        </div>

        <button><?php echo $proceed_payment[$langue]; ?></button>
    </form>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/charge.js"></script>
<script src="./js/modal.js"></script>
</body>

</html>

