<?php

require 'bdd.php';

$q = $db->query('SELECT * FROM facture');
$response = $q->fetchAll(PDO::FETCH_ASSOC);
$nb = $q->rowCount();

$q = $db->query('SELECT * FROM commandes');
$response2 = $q->fetchAll(PDO::FETCH_ASSOC);
$nb2 = $q->rowCount();

$q = $db->query('SELECT * FROM users');
$response3 = $q->fetchAll(PDO::FETCH_ASSOC);
$nb3 = $q->rowCount();


for ($i = 0; $i < $nb; $i++) {
    $fac[$i]["ref_article"] = $response[$i]["ref_article"];
    for ($j = 0; $j < $nb2; $j++) {
        if ($response[$i]["id_commande"] == $response2[$j]["id"]) {
            $fac[$i]["montant"] = $response2[$j]["montant"];
            $fac[$i]["date"] = $response2[$j]["dateCommande"];
        }
    }
    $k = 0;
    for ($j = 0; $j < $nb2; $j++) {
        if ($j < ($nb3 - 1)) {
            $k=$k+1;
        }
        if ($response2[$j]["id_client"] == $response3[$k]["id"]) {
            $fac[$i]["nom"] = $response3[$k]["nom"];
            $fac[$i]["id_client"] = $response3[$k]["id"];
        }
    }
}



foreach($fac as $f) {

    echo "<td></td><td></td>";
    echo '<td><a href="#">'. $f["ref_article"] .'</a></td>';
    echo '<td><span class="invoice-amount">'. $f["montant"] .'€</span></td>';
    echo '<td><small class="text-muted">'. $f["date"] .'</small></td>';
    echo '<td><span class="invoice-customer">'. $f["nom"] .'</span></td>';
    echo '<td><span class="bullet bullet-success bullet-sm"></span><small class="text-muted">'. $f["id_client"] .'</small></td>';
    echo '<td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>';
    echo '
    <td>
            <div class="invoice-action">
                <a href="app-invoice.html" class="invoice-action-view mr-1">
                    <i class="bx bx-show-alt"></i>
                </a>
                <a href="app-invoice-edit.php?ref='. $f["ref_article"] .'" class="invoice-action-edit cursor-pointer">
                    <i class="bx bx-edit"></i>
                </a>
            </div>
        </td>
    </tr>
    ';
 $i++;
}


?>