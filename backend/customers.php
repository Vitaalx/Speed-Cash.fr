<?php
  require_once('../config/dbPayment.php');
  require_once('../lib/pdo_db.php');
  require_once('../models/Customer.php');

  // Instantiate Customer
  $customer = new Customer();

  // Get Customer
  $customers = $customer->getCustomers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Voir les clients</title>
</head>
<body>
  <div class="container mt-4">
    <div class="btn-group" role="group">
      <a href="customers.php" class="btn btn-primary">Clients</a>
      <a href="transactions.php" class="btn btn-secondary">Transactions</a>
    </div>
    <hr>
    <h2>Clients</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Customer ID</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($customers as $c): ?>
          <tr>
            <td><?php echo $c->id; ?></td>
            <td><?php echo $c->first_name; ?> <?php echo $c->last_name; ?></td>
            <td><?php echo $c->email; ?></td>
            <td><?php echo $c->created_at; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    <p><a href="../paymentCart.php">Page de paiement</a></p>
  </div>
</body>
</html>