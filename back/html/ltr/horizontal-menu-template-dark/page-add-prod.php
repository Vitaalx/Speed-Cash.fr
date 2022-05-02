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
                                        <form role="form" method="post" action="../../../php/addProdA.php" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Nom du produit</label>
                                                            <input type="text" class="form-control" placeholder="Ex: Souris Razer Balistik" name="nom" required data-validation-required-message="Nom du produit requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Description</label>
                                                                <textarea type="text" class="form-control form-label-group char-textarea" name="description" placeholder="Ex: Avec ce produit..." required data-validation-required-message="Description requise"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Prix avec TVA</label>
                                                            <input type="number" class="form-control touchspin data-bts-decimals" name="prix" placeholder="0,00€" required data-validation-required-message="Prix requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Catégorie</label>
                                                            <select class="form-control" name="categorie">
                                                                <option>Informatique</option>
                                                                <option>Vetements</option>
                                                                <option>Sport</option>
                                                                <option>Autre</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Dépôt</label>
                                                            <input type="text" class="form-control" name="depot" placeholder="Dépôt" required data-validation-required-message="Dépôt requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Marque</label>
                                                            <input type="text" class="form-control" name="marque" placeholder="Ex: Asus" required data-validation-required-message="Marque requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Référence fournisseur</label>
                                                            <input type="text" class="form-control" name="ref_fournisseur" placeholder="Ex: #RFCFRD000000" required data-validation-required-message="Référence requise">
                                                            <div class="text-right">
                                                            <small>#RF(C:catégorie)(FR:pays)(D:dépôt)(ID_Produit)</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Remise</label>
                                                            <input type="text" class="form-control" name="remise" placeholder="Ex: 10%" required data-validation-required-message="Remise requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>TVA</label>
                                                            <input type="text" class="form-control" name="TVA" placeholder="Ex: 5,5%" required data-validation-required-message="TVA requise">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Sous-catégorie</label>
                                                            <input type="text" class="form-control" name="sous_categorie" placeholder="Ex: Souris" required data-validation-required-message="Sous-catégorie requise">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Fournisseur</label>
                                                            <input type="text" class="form-control" name="fournisseur" placeholder="Ex: Intermarché" required data-validation-required-message="Fournisseur requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Modéle</label>
                                                            <input type="text" class="form-control" name="modele" placeholder="Ex: Balistik v3" required data-validation-required-message="Modèle requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Stock disponible</label>
                                                            <input type="number" class="form-control" name="stock" placeholder="Ex: 10" required data-validation-required-message="Stock requis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>ID fiche technique</label>
                                                            <input type="number" class="form-control" name="id_fich_tech" placeholder="Ex: 100" required data-validation-required-message="ID fiche tecnique requis">
                                                        </div>
                                                    </div>
                                                    <div id="file-uploader">
                                                        <input type="file" name="file-produit" id="imgProduit" multiple />
                                                        <div class="fallback">
                                                            <img id="previewImgProduit" class="img-thumbnail" style="width: 400px; height: 400px; border-radius: 12px;">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-success glow mb-1 mb-sm-0 mr-0 mr-sm-1">Ajouter le produit</button>
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