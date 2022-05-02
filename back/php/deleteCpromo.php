<?php

include 'bdd.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $q = $conn->prepare('DELETE FROM code_promo WHERE id = ?');
  $response = $q->execute([
    $id,
  ]);
  if($response) {
    echo "succes";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php');
  } else {
    echo "erreur";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=error');
  }

} catch (PDOException $e) {
    echo $e->getMessage();
    header('location: ../html/ltr/horizontal-menu-template-dark/page-cpromo-list.php?message=error');
}

} else {
  echo "-1";
}
?>
