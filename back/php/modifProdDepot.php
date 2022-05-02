<?php

include 'bdd.php';

if(isset($_POST['id']) && isset($_POST["depot"])) {
    $id = $_POST['id'];

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $q = $conn->prepare('UPDATE produits SET depot = ? WHERE id = ?');
  $response = $q->execute([
    $_POST["depot"],
    $id,
  ]);
  if($response) {
    echo "succes";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php');
  } else {
    echo "erreur";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message=error');
  }

} catch (PDOException $e) {
    echo $e->getMessage();
    header('location: ../html/ltr/horizontal-menu-template-dark/page-prod-list.php?message=error');
}

} else {
  echo "-1";
}
?>
