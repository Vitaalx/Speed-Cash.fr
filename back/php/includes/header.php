<?php session_start(); 
//var_dump($_SESSION);
if ($_SESSION['user']["role"] != 'administrateur') {header('Location: ../../../php/logout.php');}
?>

<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-static-top bg-primary navbar-brand-center" style="background-color: #15cf74 !important; border-color: #15cf75 !important;">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template-dark/index.php">
                        <div class="brand-logo"><img class="logo" src="../../../../icons/logo-speed-cash.gif" width="250" height="170" style="text-align: center;"></div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu mr-auto"><a class="nav-link nav-menu-main menu-toggle" href="#"><i class="bx bx-menu"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right d-flex align-items-center">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="d-flex justify-content-between read-notification cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New Message</span> received</h6><small class="notification-text">You have 18 unread messages</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center py-0">
                                            <div class="media-left pr-0"><img class="mr-1" src="../../../app-assets/images/icon/sketch-mac-icon.png" alt="avatar" height="39" width="39"></div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Updates Available</span></h6><small class="notification-text">Sketch 50.2 is currently newly added</small>
                                            </div>
                                            <div class="media-right pl-0">
                                                <div class="row border-left text-center">
                                                    <div class="col-12 px-50 py-75 border-bottom">
                                                        <h6 class="media-heading text-bold-500 mb-0">Update</h6>
                                                    </div>
                                                    <div class="col-12 px-50 py-75">
                                                        <h6 class="media-heading mb-0">Close</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">LD</span></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New customer</span> is registered</h6><small class="notification-text">1 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cursor-pointer">
                                        <div class="media d-flex align-items-center justify-content-between">
                                            <div class="media-left pr-0">
                                                <div class="media-body">
                                                    <h6 class="media-heading">New Offers</h6>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <div class="custom-control custom-switch">
                                                    <input class="custom-control-input" type="checkbox" checked id="notificationSwtich">
                                                    <label class="custom-control-label" for="notificationSwtich"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content"><i class="bx bxs-heart text-danger"></i></span></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Application</span> has been approved</h6><small class="notification-text">6 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between read-notification cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New file</span> has been uploaded</h6><small class="notification-text">4 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar bg-rgba-danger m-0 mr-1 p-25">
                                                    <div class="avatar-content"><i class="bx bx-detail text-danger"></i></div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">Finance report</span> has been generated</h6><small class="notification-text">25 hrs ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between cursor-pointer">
                                        <div class="media d-flex align-items-center border-0">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"><span class="text-bold-500">New customer</span> comment recieved</h6><small class="notification-text">2 days ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-lg-flex d-none"><span class="user-name"><?php echo $_SESSION['user']['name']; ?></span><span class="user-status">Available</span></div><span><img class="round" src="<?php echo $_SESSION['user']["path"];?>" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href="#">
                                <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="../../../php/logout.php"><i class="bx bx-power-off mr-50"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-sticky navbar-dark navbar-without-dd-arrow" role="navigation" data-menu="menu-wrapper" style="background-color: #303030 !important">
        <div class="navbar-header d-xl-none d-block">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php">
                        <div class="brand-logo"><img class="logo" src="../../../app-assets/images/logo/logo.png" /></div>
                        <h2 class="brand-text mb-0">Frest</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
                <!-- PARTENAIRE -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="briefcase"></i><span style="color: white">Partenaires</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-partenaire-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Contrat</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-contrat-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- CLIENT -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="users"></i><span style="color: white">Clients et Entreprises</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Entreprises</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-entreprise-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                </li>
                                <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="page-abo_ent-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Abonnement</a>
                                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-subscription-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Clients</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-users-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-add-user.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Ajout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Code promo</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-cpromo-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-add-cpromo.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Ajout</a>
                                </li>
                            </ul>
                        </li>
                        <!--
                        <li data-menu=""><a class="dropdown-item align-items-center" href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/documentation" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Documentation</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="https://pixinvent.ticksy.com/" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Raise Support</a>
                        </li>
                        -->
                    </ul>
                </li>
                <!-- DEPOT -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="shoppingcart"></i><span style="color: white">Produits et Prestations</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Produits</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-prod-list.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Liste</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-add-prod.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Ajouter</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Prestations</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-presta-list.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Liste</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-add-presta.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Ajouter</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Facture -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="notebook"></i><span style="color: white">Facture</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-facture-list.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Liste</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-add-facture.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Ajouter</a>
                                </li>
                    </ul>
                </li>
                <!-- Cartes clients -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="credit-card-in"></i><span style="color: white">Cartes</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-cards-list.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Liste</a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="page-abo_ent-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Demandes de cartes</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-request-card-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="comments"></i><span style="color: white">Commentaires</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-comments-list.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Liste</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>