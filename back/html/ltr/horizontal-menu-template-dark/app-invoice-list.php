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
    <title>List Facture</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css">
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
<script>

function listFac(){
    const q3 = new XMLHttpRequest();
    q3.onreadystatechange = function(){
        if(q3.readyState === 4){
            const response3 = q3.responseText;
            const list = document.getElementById('productsList');
            list.innerHTML = response3;
        }
    }
    q3.open("GET", "../../../php/listFac.php");
    q3.send();
}

</script>

<!-- BEGIN: Body-->

<body onload= "listFac()" class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

<?php include '../../../php/includes/header.php'; ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- invoice list -->
                <section class="invoice-list-wrapper">
                    <!-- create invoice button-->
                    <div class="table-responsive">
                        <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <span class="align-middle">ref facture#</span>
                                    </th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="productsList">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00956</a>
                                    </td>
                                    <td><span class="invoice-amount">$459.30</span></td>
                                    <td><small class="text-muted">12-08-19</small></td>
                                    <td><span class="invoice-customer">Pixinvent PVT. LTD</span></td>
                                    <td>
                                        <span class="bullet bullet-success bullet-sm"></span>
                                        <small class="text-muted">Technology</small>
                                    </td>
                                    <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00349</a>
                                    </td>
                                    <td><span class="invoice-amount">$125.00</span></td>
                                    <td><small class="text-muted">08-08-19</small></td>
                                    <td><span class="invoice-customer">Volkswagen</span></td>
                                    <td>
                                        <span class="bullet bullet-primary bullet-sm"></span>
                                        <small class="text-muted">Car</small>
                                    </td>
                                    <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00853</a>
                                    </td>
                                    <td><span class="invoice-amount">$10,503</span></td>
                                    <td><small class="text-muted">02-08-19</small></td>
                                    <td><span class="invoice-customer">Chevron Corporation</span></td>
                                    <td>
                                        <span class="bullet bullet-dark bullet-sm"></span>
                                        <small class="text-muted">Corporation</small>
                                    </td>
                                    <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00452</a>
                                    </td>
                                    <td><span class="invoice-amount">$90</span></td>
                                    <td><small class="text-muted">28-07-19</small></td>
                                    <td><span class="invoice-customer">Alphabet</span></td>
                                    <td>
                                        <span class="bullet bullet-info bullet-sm"></span>
                                        <small class="text-muted">Electronic</small>
                                    </td>
                                    <td><span class="badge badge-light-warning badge-pill">Partially Paid</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00123</a>
                                    </td>
                                    <td><span class="invoice-amount">$15,900</span></td>
                                    <td><small class="text-muted">23-07-19</small></td>
                                    <td><span class="invoice-customer">Toyota Motor</span></td>
                                    <td>
                                        <span class="bullet bullet-primary bullet-sm"></span>
                                        <small class="text-muted">Car</small>
                                    </td>
                                    <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00853</a>
                                    </td>
                                    <td><span class="invoice-amount">$115.06</span></td>
                                    <td><small class="text-muted">24-06-19</small></td>
                                    <td><span class="invoice-customer">Samsung Electronics</span></td>
                                    <td>
                                        <span class="bullet bullet-info bullet-sm"></span>
                                        <small class="text-muted">Electronic</small>
                                    </td>
                                    <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00153</a>
                                    </td>
                                    <td><span class="invoice-amount">$1,090</span></td>
                                    <td><small class="text-muted">23-05-19</small></td>
                                    <td><span class="invoice-customer">Pixinvent PVT. LTD</span></td>
                                    <td>
                                        <span class="bullet bullet-dark bullet-sm"></span>
                                        <small class="text-muted">Corporation</small>
                                    </td>
                                    <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00788</a>
                                    </td>
                                    <td><span class="invoice-amount">$555.50</span></td>
                                    <td><small class="text-muted">10-06-19</small></td>
                                    <td><span class="invoice-customer">ExxonMobil</span></td>
                                    <td>
                                        <span class="bullet bullet-warning bullet-sm"></span>
                                        <small class="text-muted">Mobile</small>
                                    </td>
                                    <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00326</a>
                                    </td>
                                    <td><span class="invoice-amount">$8,563</span></td>
                                    <td><small class="text-muted">06-01-19</small></td>
                                    <td><span class="invoice-customer">Wells Fargo</span></td>
                                    <td>
                                        <span class="bullet bullet-danger bullet-sm"></span>
                                        <small class="text-muted">Food</small>
                                    </td>
                                    <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00759</a>
                                    </td>
                                    <td><span class="invoice-amount">$10,960.20</span></td>
                                    <td><small class="text-muted">22-05-19</small></td>
                                    <td><span class="invoice-customer">Ping An Insurance</span></td>
                                    <td>
                                        <span class="bullet bullet-dark bullet-sm"></span>
                                        <small class="text-muted">Corporation</small>
                                    </td>
                                    <td><span class="badge badge-light-warning badge-pill">Partially Paid</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00999</a>
                                    </td>
                                    <td><span class="invoice-amount">$886.90</span></td>
                                    <td><small class="text-muted">12-05-19</small></td>
                                    <td><span class="invoice-customer">Apple</span></td>
                                    <td>
                                        <span class="bullet bullet-success bullet-sm"></span>
                                        <small class="text-muted">Electronic</small>
                                    </td>
                                    <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="app-invoice.html">INV-00223</a>
                                    </td>
                                    <td><span class="invoice-amount">$459.30</span></td>
                                    <td><small class="text-muted">28-04-19</small></td>
                                    <td><span class="invoice-customer">Communications</span></td>
                                    <td>
                                        <span class="bullet bullet-success bullet-sm"></span>
                                        <small class="text-muted">Technology</small>
                                    </td>
                                    <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice.html" class="invoice-action-view mr-1">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                            <a href="app-invoice-edit.html" class="invoice-action-edit cursor-pointer">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include '../../../php/includes/footer.php';?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>
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