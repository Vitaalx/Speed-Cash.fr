<?php
include '../../../php/bdd.php';

try {
// Connexion à la BDD
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$q = $conn->query("SELECT * FROM users WHERE id = '".$_GET['id']."'");
$response = $q->fetchAll(PDO::FETCH_ASSOC);
$size = count($response);

if ($size > 1) {
  echo "<p>Erreur, plusieurs utilisateurs ont l'id ".$_GET['id']."</p>";
}

$reqEnterprise = $conn->query("SELECT * FROM entreprise WHERE id_client = '".$_GET['id']."'");
$responseEnterprise = $reqEnterprise->fetchAll(PDO::FETCH_ASSOC);
$sizeEntreprise = count($responseEnterprise);

if ($sizeEntreprise > 1) {
  echo "<p>Erreur, plusieurs entreprises ont l'id ".$_GET['id']."</p>";
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
    <title>Modification utilisateur - Speed-Cash.fr</title>
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
    <?php include '../../../php/includes/header.php'?>
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
                                <ul class="nav nav-tabs mb-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <div class="media mb-2">
                                            <a class="mr-2" href="#">
                                                <img src="../../../../images/avatar/AVATAR-<?php echo $_GET["id"]; ?>.jpeg" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php if ($response[0]['prénom'] == null) {echo 'None';} else {echo $response[0]['nom']." ".$response[0]["prénom"];} ?></h4>
                                                <div class="col-12 px-0 d-flex">
                                                    <a href="#" class="btn btn-sm btn-primary mr-25">Changer</a>
                                                    <a href="#" class="btn btn-sm btn-light-secondary">Réinitialiser</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form role="form" method="post" action="../../../php/modifUser.php" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>E-mail</label>
                                                            <input type="text" name="email" class="form-control" placeholder="<?php if ($response[0]['email'] == null) {echo 'None';} else {echo $response[0]['email'];} ?>" required data-validation-required-message="E-mail requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Point de fidélité</label>
                                                            <input type="number" name="point_fidelite" class="form-control" placeholder="<?php if ($response[0]['point_fidelite'] == null) {echo 'None';} else {echo $response[0]['point_fidelite'];} ?>" required data-validation-required-message="Requis">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Rôle</label>
                                                        <select class="form-control" id="role" name="role">
                                                            <option value="client" <?php if($response[0]['role'] == "client") { echo 'selected';} ?>>Client</option>
                                                            <option value="administrateur" <?php if($response[0]['role'] == "administrateur") { echo 'selected';} ?>>Admin</option>
                                                            <option value="entreprise" <?php if($response[0]['role'] == "entreprise") { echo 'selected';} ?>>Entreprise</option>
                                                            <option value="partenaire" <?php if($response[0]['role'] == "partenaire") { echo 'selected';} ?>>Partenaire</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status du compte</label>
                                                        <select class="form-control" id="status_compte" name="status_compte">
                                                            <option value="1" <?php if($response[0]['compteActif'] == "1") { echo 'selected';} ?>>Activé</option>
                                                            <option value="0" <?php if($response[0]['compteActif'] == "0") { echo 'selected';} ?>>Non-confirmé</option>
                                                            <option value="2" <?php if($response[0]['compteActif'] == "2") { echo 'selected';} ?>>Désactivé</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                                                    <?php if ($responseEnterprise != null) { ?>
                                                    <div class="form-group">
                                                        <label>Entreprise</label>
                                                        <input type="text" class="form-control" name="company_user" placeholder="<?php if ($responseEnterprise[0]['nom_entreprise'] == null) {echo 'None';} else {echo $responseEnterprise[0]['nom_entreprise'];} ?>">
                                                    </div>
                                                    <?php } ?>

                                                </div>
                                                <script src="../../../js/script.js"></script>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1" >Modifier</button>
                                                    <button type="reset" class="btn btn-light-danger" >Annuler</button>
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