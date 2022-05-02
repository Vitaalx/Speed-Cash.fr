<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" xmlns="http://www.w3.org/1999/html">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Ajout de produit - Speed-Cash.fr</title>
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
    <script src="../../../../js/jquery-3.3.1.min.js"></script>
    <script src="../../../../js/popper.min.js"></script>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

    <?php include '../../../php/includes/header.php'; ?>

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
                                        <form role="form" method="post" action="../../../php/addUser.php" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">

                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Nom</label>
                                                            <input type="text" class="form-control" name="nom" placeholder="Ex: Macquaire" required data-validation-required-message="Nom requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Prénom</label>
                                                            <input type="text" class="form-control form-label-group" name="prenom" placeholder="Ex: Liam" required data-validation-required-message="Prénom requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>E-mail</label>
                                                            <input type="text" class="form-control email-action" name="email" placeholder="Ex: lmacquaire@myges.fr" required data-validation-required-message="E-mail requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Mot de passe</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Ex: **** (root)" required data-validation-required-message="Password requis">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Âge</label>
                                                            <input type="number" class="form-control" name="age" placeholder="Ex: 20 (ans)" required data-validation-required-message="Âge requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Nationalité</label>
                                                            <input type="text" class="form-control" name="nationality" placeholder="Ex: FR (française)" required data-validation-required-message="Nationalité requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status du compte</label>
                                                        <select class="form-control" id="status_compte" name="status_compte">
                                                            <option value="1">Activé</option>
                                                            <option value="0">Non-confirmé</option>
                                                            <option value="2">Désactivé</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Point de fidélité</label>
                                                            <input type="number" class="form-control" name="point_fidelite" placeholder="Ex: 10 000" required data-validation-required-message="Point de fidélité requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Rôle</label>
                                                        <select class="form-control" id="role" name="role">
                                                            <option value="client">Client</option>
                                                            <option value="administrateur">Admin</option>
                                                            <option value="entreprise">Entreprise</option>
                                                            <option value="partenaire">Partenaire</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-success glow mb-1 mb-sm-0 mr-0 mr-sm-1">Ajouter</button>
                                                    <button type="reset" class="btn btn-danger">Annuler</button>
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

    <?php include '../../../php/includes/footer.php'; ?>

    <!-- BEGIN: MyCode-->

    <script>

        var imgPreviewProduit = $("#previewImgProduit");
        // SUR CHANGE SUR INPUT FILE
        imgPreviewProduit.hide();
        $("#imgProduit").change(function (e) { //e correspond à l'événement
            var fileName = e.target.files[0].name;
            var fileType = e.target.files[0].type;
            var fileSize = e.target.files[0].size;
            // Vérification type et taille de l'image
            if (((fileType == 'image/png') || (fileType == 'image/jpg')) && (fileSize <= 2048000)) {
                // Affichage du preview
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#previewImgProduit").attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
                // Bandeau alerte masqué
                $("#alert-inscription").hide();
                $("#previewImgProduit").show();
            } else {
                $("#imgProduit").val('');
                $("#previewImgProduit").attr('src', '');
            }
        });
    </script>

    <!-- END: MyCode-->

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