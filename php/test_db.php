<?php

if (isset($_POST['id']) AND !empty($_POST['id'])) {

    $id = $_POST['id'];

    $db = new PDO('mysql:host=localhost:3306;dbname=speed-cash;charset=utf8', 'root', 'root');

    $q = $db->query('SELECT * FROM request_card WHERE id = '. $id.'');
    $nb = $q->rowCount();
    $r = $q->fetch();

    echo $r["code"] ."-". $r["card_number"] . "-" . $r["date_expiry"] . "-" . $r["cvc"] . "-" . $r["nom"] . "-" . $r["prénom"];


}

?>