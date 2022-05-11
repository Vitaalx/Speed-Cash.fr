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

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Edit Facture</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">
    <?php include '../../../php/includes/header.php';?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- app invoice View Page -->
                <section class="invoice-edit-wrapper">
                    <div class="row">
                        <!-- invoice view page -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body pb-0 mx-25">
                                        <!-- header section -->
                                        <div class="row mx-0">
                                            <div class="col-xl-4 col-md-12 d-flex align-items-center pl-0">
                                                <h6 class="invoice-number mr-75">REF#</h6>
                                                <input type="text" class="form-control pt-25 w-50" value="<?php echo $_GET["ref"]; ?>">
                                            </div>
                                            <div class="col-xl-8 col-md-12 px-0 pt-xl-0 pt-1">
                                                <div class="invoice-date-picker d-flex align-items-center justify-content-xl-end flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <small class="text-muted mr-75">Date: </small>
                                                        <fieldset class="d-flex">
                                                            <input type="text" class="form-control pickadate mr-2 mb-50 mb-sm-0" value="<?php echo $commandeinfo["dateCommande"] ?>">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- logo and title -->
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1">
                                                <h4 class="text-primary">SPEED-CASH</h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- invoice address and contact -->
                                        <div class="row invoice-info">
                                            <div class="col-lg-6 col-md-12 mt-25">
                                                <h6 class="invoice-to">Facturer</h6>
                                                <fieldset class="invoice-address form-group">
                                                    <input type="text" class="form-control" value="<?php echo $clientinfo["nom"] . " " . $clientinfo["prénom"] ?>">
                                                </fieldset>
                                                <fieldset class="invoice-address form-group">
                                                    <textarea class="form-control" rows="4" placeholder="120 rue du marechal foch 75012"></textarea>
                                                </fieldset>
                                                <fieldset class="invoice-address form-group">
                                                    <input type="email" class="form-control" value="<?php echo $clientinfo["email"]; ?>">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="card-body pt-50">
                                        <!-- product details table-->
                                        <div class="invoice-product-details ">
                                            <form class="form invoice-item-repeater">
                                                <div data-repeater-list="group-a">
                                                    <div data-repeater-item>
                                                        <div class="row mb-50">
                                                            <div class="col-3 col-md-4 invoice-item-title">Item</div>
                                                            <div class="col-3 invoice-item-title">Cost</div>
                                                            <div class="col-3 invoice-item-title">Qty</div>
                                                            <div class="col-3 col-md-2 invoice-item-title">Price</div>
                                                        </div>
                                                        <?php

                                                        for ($i = 0; $i < $nbCommande; $i++) {
                                                            echo '
                                                            <div class="invoice-item d-flex border rounded mb-1">
                                                                <div class="invoice-item-filed row pt-1 px-1">
                                                                    <div class="col-12 col-md-4 form-group">
                                                                    <input type="text" class="form-control" value="'. $prodinfo[$i]["nom"] .'">
                                                                    </div>
                                                                    <div class="col-md-3 col-12 form-group">
                                                                        <input type="text" class="form-control" value="'. $prodinfo[$i]["prix"] .'">
                                                                    </div>
                                                                    <div class="col-md-3 col-12 form-group">
                                                                        <input type="text" class="form-control" value="1">
                                                                    </div>
                                                                    <div class="col-md-2 col-12 form-group ">
                                                                        <strong class="text-primary align-middle">'. $prodinfo[$i]["prix"] .'€</strong>
                                                                    </div>
                                                                    <div class="col-md-8 col-12 form-group">
                                                                        <span>Discount: </span><span class="discount-value mr-1">'. $prodinfo[$i]["remise"] .'</span>
                                                                    </div>
                                                                </div>
                                                                <div class="invoice-icon d-flex flex-column justify-content-between border-left p-25">
                                                                    <span class="cursor-pointer" data-repeater-delete>
                                                                        <i class="bx bx-x"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            ';
                                                        }


                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <span class="invoice-subtotal-title">Detail Facture</span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- invoice subtotal -->
                                        <hr>
                                        <div class="invoice-subtotal pt-50">
                                            <div class="row">
                                                <div class="col-md-5 col-12"></div>
                                                <div class="col-lg-5 col-md-7 offset-lg-2 col-12">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                            <span class="invoice-subtotal-title">Subtotal</span>
                                                            <h6 class="invoice-subtotal-value mb-0"><?php echo somme($prodinfo, $nbCommande) ?>€</h6>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                            <span class="invoice-subtotal-title">Discount</span>
                                                            <h6 class="invoice-subtotal-value mb-0">-  <?php echo sommeRemise($prodinfo, $nbCommande) ?>€</h6>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                            <span class="invoice-subtotal-title">Tax</span>
                                                            <h6 class="invoice-subtotal-value mb-0"><?php echo $relTVA ?>%</h6>
                                                        </li>
                                                        <li class="list-group-item py-0 border-0 mt-25">
                                                            <hr>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 py-0">
                                                            <span class="invoice-subtotal-title">Prix Total</span>
                                                            <h6 class="invoice-subtotal-value mb-0"><?php echo $sommetot ?>€</h6>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- invoice action  -->
                        <div class="col-xl-3 col-md-4 col-12">
                            <div class="card invoice-action-wrapper shadow-none border">
                                <div class="card-body">
                                    <div class="invoice-action-btn mb-1">
                                        <button class="btn btn-primary btn-block invoice-send-btn">
                                            <i class="bx bx-send"></i>
                                            <span>Envoyer Facture</span>
                                        </button>
                                    </div>
                                    <div class="invoice-action-btn mb-1">
                                        <a class="btn btn-light-primary btn-block" href="./res.php?ref=<?php echo $_GET["ref"]; ?>">
                                            <span>Download Facture</span>
                                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include '../../../php/includes/footer.php'; ?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/scripts/configs/horizontal-menu.js"></script>
    <script src="../../../app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <script src="../../../app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>