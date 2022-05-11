<?php

include '../../../php/bdd.php';

try {
    // Connexion à la BDD
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['ref']) AND !empty($_GET['ref'])) {

        $ref = $_GET['ref'];

        $getid = htmlspecialchars($_GET['ref']);
        $facture = $conn->prepare('SELECT * FROM facture WHERE ref_article = ?');
        $facture->execute(array($getid));
        $factureinfo = $facture->fetch();

        if (isset($factureinfo["id_commande"])) {

            $id_commande = $factureinfo["id_commande"];
            //echo $id_commande;
            $commande = $conn->prepare('SELECT * FROM commandes WHERE id = ?');
            $commande->execute(array($id_commande));
            $commandeinfo = $commande->fetch();

            //var_dump($commandeinfo);

            $id_client = $commandeinfo["id_client"];
            $client = $conn->prepare('SELECT * FROM users WHERE id = ?');
            $client->execute(array($id_client));
            $clientinfo = $client->fetch();

            //var_dump($clientinfo);

            $prod_commande = $conn->prepare('SELECT * FROM produits_commandes WHERE commande_id = ?');
            $prod_commande->execute(array($id_commande));
            $prod_commandeinfo = $prod_commande->fetchAll();
            $nbCommande = $prod_commande->rowCount();

            //echo $nbCommande;
            //var_dump($prod_commandeinfo);

            for ($i = 0; $i < $nbCommande; $i++) {
                $prod = $conn->prepare('SELECT * FROM produits WHERE id = ?');
                $prod->execute(array($prod_commandeinfo[$i]["produit_id"]));
                $prodinfo[$i] = $prod->fetch();
            }

            //var_dump($prodinfo);

            function somme($prodinfo, $nbCommande) {
                $somme = 0;
                for ($i = 0; $i < $nbCommande; $i++) {
                    $somme += $prodinfo[$i]["prix"];
                }
                return $somme;
            }
            function sommeRemise($prodinfo, $nbCommande) {
                $somme = 0.0;
                for ($i = 0; $i < $nbCommande; $i++) {
                    $somme += ($prodinfo[$i]["prix"] * $prodinfo[$i]["remise"]);
                }
                return $somme;
            }
            function TVAprod($prodinfo, $nbCommande) {
                $somme = 0.0;
                for ($i = 0; $i < $nbCommande; $i++) {
                    $somme += $prodinfo[$i]["TVA"];
                }

                $somme = $somme / $nbCommande;

                return $somme;
            }

            $sommetot = somme($prodinfo, $nbCommande);
            $sommetot = $sommetot * TVAprod($prodinfo, $nbCommande);

            $relTVA = (TVAprod($prodinfo, $nbCommande) - 1) * 100;

        }


    } else {
        die('Erreur');
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}



?>

<page backtop="50mm">
	<style type="text/css">
		page{
			max-width: 100%;
		}
		table {
			width: 100%;
			color: #717375;
			font-family: helvetica;
			line-height: 5mm;
			border-collapse: collapse;
		}
		img{
			width: 100%;
		}
		h2 { margin: 0; padding: 0; }
		p { margin: 5px; color: #717375; }
		.border th {
			border: 1px solid #000;
			color: white;
			background: #000;
			padding: 5px;
			font-weight: normal;
			font-size: 14px;
			text-align: center;
		}
		.border td {
			border: 1px solid #CFD1D2;
			padding: 5px 10px;
			text-align: center;
		}
		.no-border {
			border-right: 1px solid #CFD1D2;
			border-left: none;
			border-top: none;
			border-bottom: none;
		}
		.p-10 { width: 10%; } .p-15 { width: 15%; }
		.p-33 { width: 33%; } .p-45 { width: 45%; }
	</style>
    <page_header>
		<table>
			<tr>
				<td>
					<b>SPEED-CASH</b><br /><br /><br />
					<img src="https://i.imgur.com/IvZsNIG.png" width="280" border="0" alt="Logo Speed-Cash.fr">
				</td>
			</tr>
            <tr>
                <td>
					<b>Détails :</b><br />
					Date de facturation : <?php echo $commandeinfo["dateCommande"] ?><br />
					Numéro de facture : <?php echo $ref ?>
				</td>
			</tr>
            <tr>
                <td>
					<b>Facturer :</b><br />
					<?php echo $clientinfo["nom"] . " " . $clientinfo["prénom"] ?><br />
					Adresse mail : <?php echo $clientinfo["email"]; ?>
				</td>
			</tr>
		</table>
    </page_header>
    <page_footer>
        <p>
			SPEED-CASH, SARL<br />
			120 rue du marechal foch 75012<br />
			Matricule 21665747645<br />
			TVA intracommunautaire : FR <?php echo $relTVA ?>%
		</p>
    </page_footer>
    <table>
		<thead>
			<tr>
				<th>
					Produit/Prestation
				</th>
				<th>
					Prix unitaire
				</th>
				<th>
					Prix facturé
				</th>
				<th>
					Quantité
				</th>
				<th>
					Total HT
				</th>
			</tr>
		</thead>
		<tbody>
			<!-- ici on boucle sur les lignes de notre facture -->
            <?php
            for ($i = 0; $i < $nbCommande; $i++) {

            echo '
                <tr>
                    <td>
                    '. $prodinfo[$i]["nom"] .'
                    </td>
                    <td>
                    '. $prodinfo[$i]["prix"] .'
                    </td>
                    <td>
                    '.  ($prodinfo[$i]["prix"] + $prodinfo[$i]["prix"] * ($relTVA/100)) .'
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                    '. ($prodinfo[$i]["prix"] + $prodinfo[$i]["prix"] * ($relTVA/100)) * 1 .'
                    </td>
                </tr>
                ';
            }

            ?>
			<!-- fin de la boucle -->
            <br />
            <tr>
                <td colspan="3" class="no-border">
                    Detail facture:
                </td>
            </tr>
			<tr>
                
				<td colspan="3"></td>
				<td>
					Total HT
				</td>
				<td>
                <?php echo somme($prodinfo, $nbCommande) ?>€
				</td>
			</tr>
			<tr>
                
				<td colspan="3"></td>
				<td>
					TVA (<?php echo $relTVA; ?>%)
				</td>
				<td>
				</td>
			</tr>
			<tr>
                
				<td colspan="3"></td>
				<td>
					Total TTC
				</td>
				<td>
                    <?php echo $sommetot ?>€
				</td>
			</tr>
		</tbody>
	</table>
</page>