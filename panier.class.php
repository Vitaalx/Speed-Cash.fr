<?php
class panier{

    public function __construct(){
        if(!isset($_SESSION)) {
            session_start();
        }
        if(!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        if(isset($_GET["delPanier"])) {
            $this->del($_GET["delPanier"]);
        }
    }

    public function count() {
        return array_sum($_SESSION['panier']);
    }

    public function total() {
        include "./php/db.php";
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)) {
            $products = array();
        } else {
            try {
                // Connexion à la BDD
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT id, prix, remise FROM produits WHERE id IN (" . implode(",", $ids) . ")";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_OBJ);

                foreach ( $products as $product ) {
                    if($product->remise > 0) {
                        $total += ($product->prix * $product->remise) * $_SESSION['panier'][$product->id];
                    } else {
                        $total += $product->prix * $_SESSION['panier'][$product->id];
                    }
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $total;
    }

    public function add($product_id) {
        include "./php/db.php";
        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT stock FROM produits WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $product_id,
            ]);
            $stock = $stmt->fetch();

                if ($_SESSION['panier'][$product_id] < $stock['stock']) {

                    if (isset($_SESSION['panier'][$product_id])) {
                        if ($_SESSION['panier'][$product_id] == 10) {

                        } else {
                            $_SESSION['panier'][$product_id]++;
                        }
                    } else {
                        $_SESSION['panier'][$product_id] = 1;
                    }
                } else {

                }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function del($product_id) {
        unset($_SESSION['panier'][$product_id]);
    }
}
