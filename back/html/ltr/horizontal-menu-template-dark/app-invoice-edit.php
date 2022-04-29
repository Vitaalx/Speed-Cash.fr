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
                                                <input type="text" class="form-control pt-25 w-50" value="000756">
                                            </div>
                                            <div class="col-xl-8 col-md-12 px-0 pt-xl-0 pt-1">
                                                <div class="invoice-date-picker d-flex align-items-center justify-content-xl-end flex-wrap">
                                                    <div class="d-flex align-items-center">
                                                        <small class="text-muted mr-75">Date Issue: </small>
                                                        <fieldset class="d-flex">
                                                            <input type="text" class="form-control pickadate mr-2 mb-50 mb-sm-0" value="08/10/2019">
                                                        </fieldset>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <small class="text-muted mr-75">Date Due: </small>
                                                        <fieldset class="d-flex justify-content-end">
                                                            <input type="text" class="form-control pickadate mb-50 mb-sm-0" value="08/10/2019">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- logo and title -->
                                        <div class="row my-2 py-50">
                                            <div class="col-sm-6 col-12 order-2 order-sm-1">
                                                <h4 class="text-primary">ID Commande</h4>
                                                <input type="text" class="form-control" value="1">
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- invoice address and contact -->
                                        <div class="row invoice-info">
                                            <div class="col-lg-6 col-md-12 mt-25">
                                                <h6 class="invoice-to">Facturer</h6>
                                                <fieldset class="invoice-address form-group">
                                                    <input type="text" class="form-control" value="Liam Macquaire">
                                                </fieldset>
                                                <fieldset class="invoice-address form-group">
                                                    <textarea class="form-control" rows="4" placeholder="120 rue du marechal foch 75012"></textarea>
                                                </fieldset>
                                                <fieldset class="invoice-address form-group">
                                                    <input type="email" class="form-control" value="liamdu92@hotmail.fr">
                                                </fieldset>
                                                <fieldset class="invoice-address form-group">
                                                    <input type="number" class="form-control" placeholder="None">
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
                                                        <div class="invoice-item d-flex border rounded mb-1">
                                                            <div class="invoice-item-filed row pt-1 px-1">
                                                                <div class="col-12 col-md-4 form-group">
                                                                    <select class="form-control invoice-item-select">
                                                                        <option value="Frest Admin Template">Souris Razer Basilik</option>
                                                                        <option value="Stack Admin Template">Stack Admin Template</option>
                                                                        <option value="Robust Admin Template">Robust Admin Template</option>
                                                                        <option value="Apex Admin Template">Apex Admin Template</option>
                                                                        <option value="Modern Admin Template">Modern Admin Template</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-12 form-group">
                                                                    <input type="text" class="form-control" value="69">
                                                                </div>
                                                                <div class="col-md-3 col-12 form-group">
                                                                    <input type="text" class="form-control" value="1">
                                                                </div>
                                                                <div class="col-md-2 col-12 form-group">
                                                                    <strong class="text-primary align-middle">$69.00</strong>
                                                                </div>
                                                                <div class="col-md-8 col-12 form-group">
                                                                    <span>Discount: </span><span class="discount-value mr-1">0%</span>
                                                                    <span class="mr-1 tax1">0%</span>
                                                                    <span class="mr-1 tax2">0%</span>
                                                                </div>
                                                            </div>
                                                            <div class="invoice-icon d-flex flex-column justify-content-between border-left p-25">
                                                                <span class="cursor-pointer" data-repeater-delete>
                                                                    <i class="bx bx-x"></i>
                                                                </span>
                                                                <div class="dropdown">
                                                                    <i class="bx bx-cog cursor-pointer dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"></i>
                                                                    <div class="dropdown-menu p-1">
                                                                        <div class="row">
                                                                            <div class="col-12 form-group">
                                                                                <label for="discount">Discount(%)</label>
                                                                                <input type="number" class="form-control" id="discount" placeholder="0">
                                                                            </div>
                                                                            <div class="col-6 form-group">
                                                                                <label for="Tax1">Tax1</label>
                                                                                <fieldset>
                                                                                    <select name="tax1" id="Tax1" class="form-control invoice-tax">
                                                                                        <option value="1%" selected>1%</option>
                                                                                        <option value="10%">10%</option>
                                                                                        <option value="18%">18%</option>
                                                                                        <option value="40%">40%</option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                            <div class="col-6 form-group">
                                                                                <label for="Tax2">Tax2</label>
                                                                                <fieldset>
                                                                                    <select name="tax1" id="Tax2" class="form-control invoice-tax">
                                                                                        <option value="1%" selected>1%</option>
                                                                                        <option value="10%">10%</option>
                                                                                        <option value="18%">18%</option>
                                                                                        <option value="40%">40%</option>
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="d-flex justify-content-between">
                                                                            <button type="button" class="btn btn-primary invoice-apply-btn">
                                                                                <span>Apply</span>
                                                                            </button>
                                                                            <button type="button" class="btn btn-light-primary ml-1">
                                                                                <span>Cancel</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col p-0">
                                                        <button class="btn btn-light-primary btn-sm" data-repeater-create type="button">
                                                            <i class="bx bx-plus"></i>
                                                            <span class="invoice-repeat-btn">Add Item</span>
                                                        </button>
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
                                                            <h6 class="invoice-subtotal-value mb-0">72.00€</h6>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                            <span class="invoice-subtotal-title">Discount</span>
                                                            <h6 class="invoice-subtotal-value mb-0">-  09.60€</h6>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                            <span class="invoice-subtotal-title">Tax</span>
                                                            <h6 class="invoice-subtotal-value mb-0">21%</h6>
                                                        </li>
                                                        <li class="list-group-item py-0 border-0 mt-25">
                                                            <hr>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 py-0">
                                                            <span class="invoice-subtotal-title">Prix Total</span>
                                                            <h6 class="invoice-subtotal-value mb-0"> 61.40€</h6>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                            <span class="invoice-subtotal-title">Paid to date</span>
                                                            <h6 class="invoice-subtotal-value mb-0">- 00.00€</h6>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between border-0 pb-0">
                                                            <span class="invoice-subtotal-title">Balance (USD)</span>
                                                            <h6 class="invoice-subtotal-value mb-0"> 10,953€</h6>
                                                        </li>
                                                        <li class="list-group-item border-0 pb-0">
                                                            <button class="btn btn-primary btn-block subtotal-preview-btn">Preview</button>
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
                                        <button class="btn btn-light-primary btn-block">
                                            <span>Download Facture</span>
                                        </button>
                                    </div>
                                    <div class="invoice-action-btn mb-1 d-flex">
                                        <div class="preview w-50 mr-50">
                                            <button class="btn btn-light-primary btn-block">
                                                <span class="text-nowrap">Preview</span>
                                            </button>
                                        </div>
                                        <div class="save w-50">
                                            <button class="btn btn-light-primary btn-block">
                                                <span class="text-nowrap">Save</span>
                                            </button>
                                        </div>
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