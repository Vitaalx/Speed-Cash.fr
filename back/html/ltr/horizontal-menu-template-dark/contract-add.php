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
    <title>Add Contract</title>
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

<body style="background-color: #303030 !important" class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

<?php include '../../../php/includes/header.php'; ?>

    <!-- BEGIN: Content-->
    <div class="app-content content" style="background-color: #303030 !important">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- app invoice View Page -->
                <section class="invoice-edit-wrapper">
                    <form action="../../../php/addContrat.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- invoice view page -->
                            <div class="col-xl-9 col-md-8 col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body pb-0 mx-25">
                                                <!-- header section -->
                                                <div class="row mx-0">
                                                    <div class="col-xl-4 col-md-12 d-flex align-items-center pl-0">
                                                        <h6 class="invoice-number mr-75">Contract#</h6>
                                                        <input type="text" class="form-control pt-25 w-50" placeholder="000756" name="ref">
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- logo and title -->
                                                <div class="row my-2 py-50">
                                                    <div class="col-sm-6 col-12 order-2 order-sm-1">
                                                        <h4 class="text-primary">Enterprise</h4>
                                                        <input type="text" class="form-control" placeholder="Name enterprise" name="enterprise">
                                                    </div>
                                                    <div class="col-sm-6 col-12 order-1 order-sm-1 d-flex justify-content-end">
                                                        <img src="../../../../icons/logo-speed-cash.gif" alt="logo" height="46" width="164">
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- invoice address and contact -->
                                                <div class="row invoice-info">
                                                    <div class="col-lg-12 col-md-12 mt-25">
                                                        <h6 class="invoice-to">Content</h6></h6>
                                                        <fieldset class="invoice-address form-group">
                                                            <textarea class="form-control" rows="12" placeholder="Article 1: ......." name="content"></textarea>
                                                        </fieldset>
                                                        <fieldset class="invoice-address form-group">
                                                            <input type="email" class="form-control" placeholder="hello@clevision.com" name="mail">
                                                        </fieldset>
                                                        <fieldset class="invoice-address form-group">
                                                            <input type="text" class="form-control pickadate mr-2 mb-50 mb-sm-0" placeholder="22/11/2025" name="date">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="card-body pt-50">
                                                <!-- invoice subtotal -->
                                                <hr>
                                                <div class="invoice-subtotal pt-50">
                                                    <div class="row">
                                                        <div class="col-md-5 col-12">
                                                        </div>
                                                        <div class="col-lg-5 col-md-7 offset-lg-2 col-12">
                                                            <h6 class="invoice-to">Signature</h6>
                                                            <div style="background-color: white; border-radius: 0.30rem; height: 150px; width: 100%;">

                                                            </div>
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
                                            <button type="submit" class="btn btn-secondary btn-block invoice-send-btn">
                                                <i class="bx bx-send"></i>
                                                <span>Send Contract</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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