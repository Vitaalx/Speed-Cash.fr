<?php

require 'bdd.php';


if(isset($_POST['depot'])) {

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $depot = htmlspecialchars($_POST['depot']);
        $query = $conn->prepare('SELECT * FROM produits WHERE depot = ? AND type="produit"');
        $query->execute([
            $depot,
        ]);
        $results = $query->fetchAll();

        foreach ($results as $result) {
            echo "<tr>";
            echo "<td>" . $result['ref_fournisseur'] . "</td>";
            echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-prod-edit.php?id=' . $result['id'] . '">' . $result['nom'] . '</a></td>';
            echo "<td>" . $result['depot'] . "</td>";
            echo "<td>" . $result['categorie'] . "</td>";
            echo "<td>" . $result['prix'] . "€</td>";
            echo "<td>" . $result['id_fich_tech'] . "</td>";
            if ($result['stock'] == 0) {
                echo '<td><span class="badge badge-light-danger">' . $result['stock'] . '</span></td>';
            }
            if ($result['stock'] > 0) {
                if ($result['stock'] < 100) {
                    echo '<td><span class="badge badge-light-danger">' . $result['stock'] . '</span></td>';
                } else if ($result['stock'] < 250) {
                    echo '<td><span class="badge badge-light-warning">' . $result['stock'] . '</span></td>';
                } else {
                    echo '<td><span class="badge badge-light-success">' . $result['stock'] . '</span></td>';
                }
            }

            echo '<td><a href="../../../html/ltr/horizontal-menu-template-dark/page-prod-edit.php?id=' . $result['id'] . '"><i class="bx bx-edit-alt"></i></a><a href="../../../php/deleteProd.php?id=' . $result['id'] . '"><i class="bx bxs-trash" onclick="return confirmDelete()"></i></a><a href="../../../html/ltr/horizontal-menu-template-dark/page-changeDepotProd-edit.php?id='.$result['id'].'"><i class="bx bx-package"></i></a></td>';
            echo "</tr>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>