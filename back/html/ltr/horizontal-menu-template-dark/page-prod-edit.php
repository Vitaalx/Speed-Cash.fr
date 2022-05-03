<?php
include '../../../php/bdd.php';

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$q = $conn->query("SELECT * FROM produits WHERE id = '".$_GET['id']."'");
$responses = $q->fetchAll(PDO::FETCH_ASSOC);
$size = count($responses);

if ($size > 1) {
  echo "<p>Erreur, plusieurs produits ont l'id ".$_GET['id']."</p>";
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
    <title>Modification produit - Speed-Cash.fr</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-users.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">
<script src="../../../js/script.js"></script>
    <!-- BEGIN: Header-->
    <?php include '../../../php/includes/header.php' ?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit account form start -->
                                        <form role="form" method="post" action="../../../php/modifProdA.php" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Nom du produit</label>
                                                            <input type="text" class="form-control" placeholder="<?php if ($responses[0]['nom'] == null) {echo 'None';} else {echo $responses[0]['nom'];} ?>" name="nom">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Description</label><span class="badge badge-light-danger" style="margin-left: 1%; padding: .25rem .50rem; font-size: 12px;">Peut être modifié</span>
                                                            <textarea type="text" class="form-control form-label-group char-textarea" name="description" placeholder="<?php if ($responses[0]['description'] == null) {echo 'None';} else {echo $responses[0]['description'];} ?>" required data-validation-required-message="Description requise"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Prix</label><span class="badge badge-light-danger" style="margin-left: 1%; padding: .25rem .50rem; font-size: 12px;">Peut être modifié</span>
                                                            <input type="number" class="form-control touchspin data-bts-decimals" name="prix" placeholder="<?php if ($responses[0]['prix'] == null) {echo 'None';} else {echo $responses[0]['prix'];} ?>" required data-validation-required-message="Prix requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Catégorie</label>
                                                            <select class="form-control" name="categorie">
                                                                <option value="informatique" <?php if($responses[0]['categorie'] == "Informatique") { echo 'selected';} ?>>informatique</option>
                                                                <option value="Gamer" <?php if($responses[0]['categorie'] == "Gamer") { echo 'selected';} ?>>Gamer</option>
                                                                <option value="Vetements" <?php if($responses[0]['categorie'] == "Vetements") { echo 'selected';} ?>>Vetements</option>
                                                                <option value="Sport" <?php if($responses[0]['categorie'] == "Sport") { echo 'selected';} ?>>Sport</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Dépôt</label>
                                                            <input type="text" class="form-control" name="depot" placeholder="<?php if ($responses[0]['depot'] == null) {echo 'None';} else {echo $responses[0]['depot'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Marque</label>
                                                            <input type="text" class="form-control" name="marque" placeholder="<?php if ($responses[0]['marque'] == null) {echo 'None';} else {echo $responses[0]['marque'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Référence fournisseur</label>
                                                            <input type="text" class="form-control" name="ref_fournisseur" placeholder="<?php if ($responses[0]['ref_fournisseur'] == null) {echo 'None';} else {echo $responses[0]['ref_fournisseur'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Remise</label><span class="badge badge-light-danger" style="margin-left: 1%; padding: .25rem .50rem; font-size: 12px;">Peut être modifié</span>
                                                            <input type="text" class="form-control" name="remise" placeholder="<?php if ($responses[0]['remise'] == null) {echo 'None';} else {echo $responses[0]['remise'];} ?>" required data-validation-required-message="Remise requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>TVA</label>
                                                            <input type="number" class="form-control" name="TVA" placeholder="<?php if ($responses[0]['TVA'] == null) {echo 'None';} else {echo $responses[0]['TVA'];} ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Sous-catégorie</label><span class="badge badge-light-danger" style="margin-left: 1%; padding: .25rem .50rem; font-size: 12px;">Peut être modifié</span>
                                                            <input type="text" class="form-control" name="sous_categorie" placeholder="<?php if ($responses[0]['sous_categorie'] == null) {echo 'None';} else {echo $responses[0]['sous_categorie'];} ?>" required data-validation-required-message="Sous-catégorie requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Fournisseur</label>
                                                            <input type="text" class="form-control" name="fournisseur" placeholder="<?php if ($responses[0]['fournisseur'] == null) {echo 'None';} else {echo $responses[0]['fournisseur'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Modéle</label>
                                                            <input type="text" class="form-control" name="modele" placeholder="<?php if ($responses[0]['modele'] == null) {echo 'None';} else {echo $responses[0]['modele'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Stock disponible</label><span class="badge badge-light-danger" style="margin-left: 1%; padding: .25rem .50rem; font-size: 12px;">Peut être modifié</span>
                                                            <input type="number" class="form-control" name="stock" placeholder="<?php if ($responses[0]['stock'] == null) {echo 'None';} else {echo $responses[0]['stock'];} ?>" required data-validation-required-message="Stock requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>ID fiche technique</label>
                                                            <input type="number" class="form-control" name="id_fich_tech" value="<?php if ($responses[0]['id_fich_tech'] == null) {echo 'None';} else {echo $responses[0]['id_fich_tech'];} ?>" placeholder="<?php if ($responses[0]['id_fich_tech'] == null) {echo 'None';} else {echo $responses[0]['id_fich_tech'];} ?>">
                                                        </div>
                                                    </div>
                                                    <div id="file-uploader">
                                                        <div class="fallback">
                                                            <img src="../../../../images/produit-<?php echo $responses[0]['id']; ?>.png" id="previewImgProduit" class="img-thumbnail" style="width: 300px; height: 300px; border-radius: 12px;margin-top: 2%;">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-success glow mb-1 mb-sm-0 mr-0 mr-sm-1">Modifier le produit</button>
                                                    <button type="reset" class="btn btn-danger">Annuler</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php require '../../../php/includes/footer.php'; ?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
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
    <script src="../../../app-assets/js/scripts/pages/page-users.js"></script>
    <script src="../../../app-assets/js/scripts/navs/navs.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>