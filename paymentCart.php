<?php    $price = $_GET["price"];

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title><?php echo $title[$langue]; ?></title>
</head>

<body>
  <div class="container">
    <h2 class="my-4 text-center"><?php echo $title_div_form[$langue]; ?></h2>
    <a class="a-french-flag" href="./paymentCart.php?price=<?php echo $price;?>" ><img style="margin-bottom: 1%;" class="french-flag" src="images/drapeau-france.png" width="55" height="30" alt="Drapeau Français"></a>
    <a class="a-english-flag" href="./paymentCart.php?price=<?php echo $price;?>&lang=1" ><img style="margin-bottom: 1%;" class="english-flag" src="images/drapeau-anglais.png" width="55" height="30" alt="Drapeau Anglais"></a>
    <form action="/charge.php?price=<?php echo $price;?>" method="post" id="payment-form">
      <div class="form-row">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="./js/charge.js"></script>
</body>

</html>
