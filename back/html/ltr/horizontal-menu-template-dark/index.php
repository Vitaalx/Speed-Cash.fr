<?php

include '../../../php/bdd.php';

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
    <title>Dashboard Admin</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/swiper.min.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-ecommerce.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body onload="listCompanyAdmin(); listPartAdmin();" class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout" style="background-color: #303030 !important">

<?php include '../../../php/includes/header.php'; ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row">
                        <!-- Greetings Content Starts -->
                        <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="greeting-text">Bonjour, Admin!</h3>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div class="dashboard-content-right">
                                                <img src="../../../app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        try {
                        // Connexion à la BDD
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $stock_all_products = $conn->prepare('SELECT SUM(stock) FROM produits');
                        $stock_all_products->execute();
                        $stock_all_products = $stock_all_products->fetch();

                        $nb_users = $conn->prepare('SELECT COUNT(*) FROM users');
                        $nb_users->execute();
                        $nb_users = $nb_users->fetch();

                        $benefice = $conn->prepare('SELECT SUM(montant) FROM commandes');
                        $benefice->execute();
                        $benefice = $benefice->fetch();

                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }

                        ?>
                        <div class="col-xl-4 col-12 dashboard-users">
                            <div class="row  ">
                                <!-- Statistics Cards Starts -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-12 dashboard-users-success">
                                            <div class="card text-center">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                            <i class="bx bx-briefcase-alt font-medium-5"></i>
                                                        </div>
                                                        <div class="text-muted line-ellipsis">Stock des produits</div>
                                                        <h3 class="mb-0"><?php echo $stock_all_products[0]."k"; ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 dashboard-users-danger">
                                            <div class="card text-center">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                            <i class="bx bx-user font-medium-5"></i>
                                                        </div>
                                                        <div class="text-muted line-ellipsis">Nombre d'utilisateur (total)</div>
                                                        <h3 class="mb-0"><?php echo $nb_users[0]; ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Revenue Growth Chart Starts -->
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12 dashboard-earning-swiper" id="widget-earnings">
                            <div class="card">
                                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h5 class="card-title"><i class="bx bx-dollar font-medium-5 align-middle"></i> <span class="align-middle">Total gains</span></h5>
                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div class="dashboard-content-right">
                                                <img src="../../../app-assets/images/icon/img-gains.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" />
                                            </div>
                                            <span style="font-size: 22px"><?php echo $benefice[0]." €"; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-wrapper-content">
                                    <div class="wrapper-content" data-earnings="repo-design">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Jerry Lter</h6>
                                                                <span class="font-small-2">Designer</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-info progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="80" aria-valuemax="100" style="width:33%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-warning">- $280</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Pauly uez</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-success progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="80" aria-valuemax="100" style="width:10%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                <span class="font-small-2">Marketing</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-primary progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                <span class="font-small-2">Degigner</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-danger progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="laravel-temp">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Jesus Lter</h6>
                                                                <span class="font-small-2">Designer</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-info progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80" aria-valuemax="100" style="width:28%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-info">- $280</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-10.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-success progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-success">+ $83</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                <span class="font-small-2">Marketing</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-primary progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-danger progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="admin-theme">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-25.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Mera Lter</h6>
                                                                <span class="font-small-2">Designer</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-info progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="52" aria-valuemin="80" aria-valuemax="100" style="width:52%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-info">- $180</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-success progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-success">+ $553</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">jini mara</h6>
                                                                <span class="font-small-2">Marketing</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-primary progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                <span class="font-small-2">UX</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-danger progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-danger">- $150</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="ux-devloper">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Drako Lter</h6>
                                                                <span class="font-small-2">Designer</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-info progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="38" aria-valuemin="80" aria-valuemax="100" style="width:38%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-danger">- $280</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-success progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                <span class="font-small-2">Marketing</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-primary progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lvia Taylor</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-danger progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="80" aria-valuemax="100" style="width:75%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-danger">- $360</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="marketing-guide">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-19.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">yono Lter</h6>
                                                                <span class="font-small-2">Designer</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-info progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80" aria-valuemax="100" style="width:28%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-primary">- $270</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-success progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                <span class="font-small-2">Marketing</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-primary progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-primary">+ $225</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-75">
                                                        <div class="media align-items-center">
                                                            <a class="media-left mr-50" href="#">
                                                                <img src="../../../app-assets/images/portrait/small/avatar-s-25.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                            </a>
                                                            <div class="media-body">
                                                                <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                <span class="font-small-2">Devloper</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-0 w-25">
                                                        <div class="progress progress-bar-danger progress-sm mb-0">
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-light-danger">- $350</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-12 dashboard-order-summary">
                            <div class="card">
                                <div class="row">
                                    <!-- Order Summary Starts -->
                                    <div class="col-md-8 col-12 order-summary border-right pr-md-0">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="card-title">Order Summary</h4>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-sm btn-light-primary mr-1">Month</button>
                                                    <button type="button" class="btn btn-sm btn-primary glow">Week</button>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body p-0">
                                                    <div id="order-summary-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sales History Starts -->
                                    <div class="col-md-4 col-12 pl-md-0">
                                        <div class="card mb-0">
                                            <div class="card-header pb-50">
                                                <h4 class="card-title">Sales History</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body py-1">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <div class="sales-item-name">
                                                            <p class="mb-0">Airpods</p>
                                                            <small class="text-muted">30 min ago</small>
                                                        </div>
                                                        <div class="sales-item-amount">
                                                            <h6 class="mb-0"><span class="text-success">+</span> $50</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <div class="sales-item-name">
                                                            <p class="mb-0">iPhone</p>
                                                            <small class="text-muted">2 hour ago</small>
                                                        </div>
                                                        <div class="sales-item-amount">
                                                            <h6 class="mb-0"><span class="text-danger">-</span> $59</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="sales-item-name">
                                                            <p class="mb-0">Macbook</p>
                                                            <small class="text-muted">1 day ago</small>
                                                        </div>
                                                        <div class="sales-item-amount">
                                                            <h6 class="mb-0"><span class="text-success">+</span> $12</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer border-top pb-0">
                                                    <h5>Total Sales</h5>
                                                    <span class="text-primary text-bold-500">$82,950.96</span>
                                                    <div class="progress progress-bar-primary progress-sm my-50">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="78" style="width:78%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Marketing Campaigns Starts -->
                        <div class="col-xl-8 col-12 dashboard-marketing-campaign">
                            <div class="card marketing-campaigns">
                                <div class="card-header d-flex justify-content-between align-items-center pb-1">
                                    <h4 class="card-title">Entreprise partenaire</h4>
                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="table-responsive">
                                    <!-- table start -->
                                    <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Partenaire_ID</th>
                                                <th>Nom Partenaire</th>
                                                <th>Contrat_ID</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <script src="../../../js/script.js"></script>
                                        <tbody id="partenaireAdminList">
                                        </tbody>
                                    </table>
                                    <!-- table ends -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-12 dashboard-marketing-campaign">
                            <div class="card marketing-campaigns">
                                <div class="card-header d-flex justify-content-between align-items-center pb-1">
                                    <h4 class="card-title">Abonnement</h4>
                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="table-responsive">
                                    <!-- table start -->
                                    <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom Entreprise</th>
                                            <th>Type abonnement</th>
                                            <th>Fin de l'abonnement</th>
                                            <th>Chiffre d'affaire</th>
                                            <th>Montant payé</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <script src="../../../js/script.js"></script>
                                        <tbody id="companyAdminList">
                                        </tbody>
                                    </table>
                                    <!-- table ends -->
                                    <script>
                                        function confirmDelete() {
                                            if ( confirm( "Êtes vous sûr de vouloir supprimer cet entreprise ?" ) ) {
                                                // Code à éxécuter si le l'utilisateur clique sur "OK"

                                                location.href = "deleteCompany.php";
                                                return true;
                                            } else {
                                                // Code à éxécuter si l'utilisateur clique sur "Annuler"
                                                //alert("Suppression annulée");
                                                return false;
                                            }

                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-dark">
        <p class="clearfix mb-0"><span class="float-left d-inline-block">2022 &copy; SPEEDCASH</span><span class="float-right d-sm-inline-block d-none">Crafted with<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase" href="#" target="_blank">ESGI</a></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button" style="background-color: #15cf74 !important"><i class="bx bx-up-arrow-alt" style="color: white"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/swiper.min.js"></script>
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
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>