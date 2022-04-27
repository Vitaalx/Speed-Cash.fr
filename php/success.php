<?php

    if (!empty($_GET['tid'] && !empty($_GET['products'] && !empty($_GET['amount']))) && isset($_GET['tid']) && isset($_GET['products']) && isset($_GET['amount'])) {
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        session_start();
        include "db.php";
        date_default_timezone_set('Europe/Paris');

        $tid = htmlspecialchars($GET['tid']);
        $product = htmlspecialchars($GET['products']);
        $product = array_map('intval', explode(',', $product));
        //var_dump($product);
        $order_time = date('H:i:s');
        $order_date = date('Y-m-d');
        $id_client = $_SESSION['id'];
        $price = $_GET['amount'];

        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Génération d'un numéro de commande en PHP
            $order_number = "RF#".rand(1000000, 9999999);
            //echo $order_number;

            // Ajout de point de fidélisation au client
            $point_client = $price * 5;
            $update_point = "UPDATE users SET point_fidelite = point_fidelite + ". $point_client ." WHERE id =".$_SESSION['id'];
            echo $update_point;
            $result = $conn->prepare($update_point);
            $result->execute();

            // Insertion de la commande
            $sql = "INSERT INTO commandes (heureCommande, dateCommande, montant, id_client, stripe_id, num_commande) VALUES ('" . $order_time . "', '" . $order_date . "', '" . $price . "', '" . $id_client . "', '" . $tid . "', '" . $order_number . "')";
            $conn->exec($sql);
            //echo $sql;
            $commande_id = $conn->lastInsertId();

            // Insertion en fonction du nombre de produit commandé
            for ($i = 0; $i < count($product); $i++) {
                $sql = "INSERT INTO produits_commandes (produit_id, commande_id) VALUES ('" . $product[$i] . "', '" . $commande_id . "')";
                $conn->exec($sql);
            }

            // Envoie facture via mail et info concernant commande.
            //mail();


        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    } else {
        header('Location: ../paymentCart.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Thank You</title>
</head>
<body>
  <div class="container mt-4">
    <h2>Merci pour <?php if(count($product) > 1) { echo "vos"; } else { echo "votre"; } ?> achat !</h2>
    <hr>
    <p>Votre transaction ID est <?php echo $tid; ?></p>
      <p><i>Votre facture vous a été envoyée par mail, ainsi que des informations complémentaires à votre commande.</i></p>
    <p><a href="../client.php?payment=success" class="btn btn-light mt-2">Retourner à l'accueil</a></p>
  </div>
</body>
</html>
