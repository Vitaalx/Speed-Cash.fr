<?php

require 'bdd.php';

try {
// Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $conn->query('SELECT * FROM facture');
    $response = $q->fetchAll(PDO::FETCH_ASSOC);
    $nb = $q->rowCount();

    $q = $conn->query('SELECT * FROM commandes');
    $response2 = $q->fetchAll(PDO::FETCH_ASSOC);
    $nb2 = $q->rowCount();

    $q = $conn->query('SELECT * FROM users');
    $response3 = $q->fetchAll(PDO::FETCH_ASSOC);
    $nb3 = $q->rowCount();
//var_dump($response);
//var_dump($response2);
//var_dump($response3);

    for ($i = 0; $i < $nb; $i++) {
        $fac[$i]['ref_facture'] = $response[$i]['ref_article'];
        for ($j = 0; $j < $nb2; $j++) {
            if ($response[$i]["id_commande"] == $response2[$j]["id"]) {
                $fac[$i]["date"] = $response2[$j]["dateCommande"];
                $fac[$i]["montant"] = $response2[$j]["montant"];
                $fac[$i]["id_client"] = $response2[$j]["id_client"];
            }
        }

        $k = 0;
        for ($j = 0; $j < $nb2; $j++) {
            for ($k = 0; $k < $nb3; $k++) {
                if ($response3[$k]["id"] == $fac[$i]["id_client"]) {
                    $fac[$i]["nom"] = $response3[$k]["nom"];
                    $fac[$i]["prenom"] = $response3[$k]["prénom"];
                    $fac[$i]["role"] = $response3[$k]["role"];
                }
            }
        }

    }


    //var_dump($fac);


    for($i = 0; $i <= count($fac); $i++) {
        //var_dump($fac[$i]);

            echo "<tr>";
            echo '<td><a href="#">'. $fac[$i]["ref_facture"] .'</a></td>';
            echo '<td><span class="invoice-amount">'. $fac[$i]["montant"] .'€</span></td>';
            echo '<td><small class="text-muted">'. $fac[$i]["date"] .'</small></td>';
            echo '<td><span class="invoice-customer">'. $fac[$i]["nom"] . " " . $fac[$i]["prenom"] .'</span></td>';
            echo '<td><span class="bullet bullet-success bullet-sm"></span> <small class="text-muted">'. $fac[$i]["id_client"] .'</small></td>';
            if ($fac[$i]['role'] == "client") {
                echo '<td><span class="badge badge-light-dark">Client</span></td>';
            }
            if ($fac[$i]['role'] == "partenaire") {
                echo '<td><span class="badge badge-circle-light-info">Partenaire</span></td>';
            }
            if ($fac[$i]['role'] == "entreprise") {
                echo '<td><span class="badge badge-circle-dark">Entreprise</span></td>';
            }
            echo '<td><span class="badge badge-light-success badge-pill">PAID</span></td>';
            echo '<td>';
            echo '<div class="invoice-action">';
            echo '<a href="app-invoice.html" class="invoice-action-view mr-1">';
            echo '<i class="bx bx-show-alt"></i>';
            echo '</a>';
            echo '<a href="app-invoice-edit.php?ref='. $fac[$i]["ref_facture"] .'" class="invoice-action-edit cursor-pointer">';
            echo '<i class="bx bx-edit"></i>';
            echo '</a>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
            $i++;
        }


} catch (PDOException $e) {
    echo $e->getMessage();
}
