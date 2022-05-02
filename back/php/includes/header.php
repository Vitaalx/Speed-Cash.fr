<?php session_start(); 
//var_dump($_SESSION);
if ($_SESSION['user']["role"] != 'administrateur') {header('Location: ../../../php/logout.php');}
?>

<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-static-top bg-primary navbar-brand-center" style="background-color: #15cf74 !important; border-color: #15cf75 !important;">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template-dark/index.php">
                        <div class="brand-logo"><img class="logo" src="../../../app-assets/images/logo/icon-front.png" width="300%" height="300%"></div>
                        <h2 class="brand-text mb-0">Speed Cash</h2>
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
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon bx bx-envelope"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon bx bx-chat"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon bx bx-check-circle"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon bx bx-calendar-alt"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right d-flex align-items-center">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
                                </li>
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
                <li class="dropdown nav-item" data-menu="dropdown" style="background-color: #303030 !important"><a class="dropdown-toggle nav-link" href="index.php" data-toggle="dropdown" style="background-color: #303030 !important"><i class="menu-livicon" data-icon="desktop" style="background-color: #303030 !important"></i><span style="color: white">Dashboard</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li class="active" data-menu=""><a class="dropdown-item align-items-center" href="dashboard-ecommerce.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>eCommerce</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="dashboard-analytics.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-email.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Email</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-chat.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Chat</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-todo.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Todo</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-calendar.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Calendar</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-kanban.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Kanban</a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice-list.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Invoice List</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Invoice</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice-edit.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Invoice Edit</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice-add.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Invoice Add</a>
                                </li>
                            </ul>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-file-manager.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>File Manager</a>
                        </li>
                    </ul>
                </li>
<!--
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="comments"></i><span>Apps</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-email.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Email</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-chat.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Chat</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-todo.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Todo</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-calendar.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-kanban.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Kanban</a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice-list.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Invoice List</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice-edit.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Invoice Edit</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="app-invoice-add.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Invoice Add</a>
                                </li>
                            </ul>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="app-file-manager.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="briefcase"></i><span>UI</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Content</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="content-grid.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Grid</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="content-typography.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Typography</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="content-text-utilities.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Text Utilities</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="content-syntax-highlighter.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Syntax Highlighter</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="content-helper-classes.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Helper Classes</a>
                                </li>
                            </ul>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="colors.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Colors</a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Icons</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="icons-boxicons.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="icons-livicons.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>LivIcons</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Card</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="card-basic.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Basic</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="card-actions.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Card Actions</a>
                                </li>
                            </ul>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="widgets.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Widgets</a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Components</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-alerts.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-buttons-basic.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Buttons</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-breadcrumbs.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Breadcrumbs</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-carousel.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Carousel</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-collapse.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Collapse</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-dropdowns.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Dropdowns</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-list-group.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>List Group</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-modals.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Modals</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-pagination.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Pagination</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-navbar.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Navbar</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-tabs-component.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Tabs Component</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-pills-component.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Pills Component</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-tooltips.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Tooltips</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-popovers.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Popovers</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-badges.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Badges</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-pill-badges.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Pill Badges</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-progress.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Progress</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-media-objects.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Media Objects</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-spinner.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Spinner</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="component-bs-toast.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Toasts</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Extra Components</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ex-component-avatar.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Avatar</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ex-component-chips.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Chips</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ex-component-divider.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Divider</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Extensions</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-sweet-alerts.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Sweet Alert</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-toastr.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Toastr</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-noui-slider.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>NoUi Slider</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-drag-drop.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Drag &amp; Drop</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-tour.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Tour</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-swiper.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Swiper</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-treeview.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Treeview</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-block-ui.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Block-UI</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-media-player.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Media Player</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-miscellaneous.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Miscellaneous</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="ext-component-i18n.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>i18n</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="thumbnails-big"></i><span>Forms &amp; Tables</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Form Elements</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-inputs.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Input</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-input-groups.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Input Groups</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-number-input.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Number Input</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-select.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Select</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-radio.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Radio</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-checkbox.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Checkbox</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-switch.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Switch</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-textarea.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Textarea</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-quill-editor.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Quill Editor</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-file-uploader.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>File Uploader</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="form-date-time-picker.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Date &amp; Time Picker</a>
                                </li>
                            </ul>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="form-layout.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Form Layout</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="form-wizard.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Form Wizard</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="form-validation.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Form Validation</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="form-repeater.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Form Repeater</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="table.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Table</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="table-extended.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Table extended</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="table-datatable.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Datatable</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="notebook"></i><span>Pages</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-user-profile.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>User Profile</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-faq.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>FAQ</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-knowledge-base.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Knowledge Base</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-search.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Search</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-account-settings.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Account Settings</a>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>User</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-users-list.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>List</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-users-view.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>View</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-users-edit.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Edit</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Starter kit</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="../../../starter-kit/ltr/horizontal-menu-template-dark/sk-layout-1-column.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>1 column</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="../../../starter-kit/ltr/horizontal-menu-template-dark/sk-layout-2-columns.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>2 columns</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="../../../starter-kit/ltr/horizontal-menu-template-dark/sk-layout-fixed-navbar.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Fixed navbar</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="../../../starter-kit/ltr/horizontal-menu-template-dark/sk-layout-fixed.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Fixed layout</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="../../../starter-kit/ltr/horizontal-menu-template-dark/sk-layout-static.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Static layout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Authentication</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="auth-login.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Login</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="auth-register.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Register</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="auth-forgot-password.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="auth-reset-password.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Reset Password</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="auth-lock-screen.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Miscellaneous</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-coming-soon.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Coming Soon</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="error-404.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>404</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="error-500.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>500</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-not-authorized.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Not Authorized</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-maintenance.html" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Maintenance</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="pie-chart"></i><span>Charts &amp; Maps</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="chart-apex.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="chart-chartjs.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="chart-chartist.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Chartist</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="maps-google.html" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Google Maps</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="morph-folder"></i><span>Others</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Menu Levels</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Second Level</a>
                                </li>
                                <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Second Level</a>
                                    <ul class="dropdown-menu">
                                        <li data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Third Level</a>
                                        </li>
                                        <li data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Third Level</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="disabled" data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Disabled Menu</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/documentation" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Documentation</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="https://pixinvent.ticksy.com/" data-toggle="dropdown" target="_blank"><i class="bx bx-right-arrow-alt"></i>Raise Support</a>
                        </li>
                    </ul>
                </li>
-->
                <!-- PARTENAIRE -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="briefcase"></i><span style="color: white">Partenaires</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-contrat-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Contrats</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item align-items-center" href="page-part-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                        </li>
                    </ul>
                </li>
                <!-- CLIENT -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="morph-folder"></i><span style="color: white">Clients et Entreprises</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Entreprises</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-entreprise-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                </li>
                                <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="page-abo_ent-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Abonnement</a>
                                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                                        <li data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>TODO</a>
                                        </li>
                                        <li data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>TODO</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Clients</a>
                            <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-users-list.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>Liste</a>
                                </li>
                                <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item align-items-center dropdown-toggle" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>TODO</a>
                                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                                        <li data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>TODO</a>
                                        </li>
                                        <li data-menu=""><a class="dropdown-item align-items-center" href="#" data-toggle="dropdown"><i class="bx bx-right-arrow-alt" style="color: white"></i>TODO</a>
                                        </li>
                                    </ul>
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
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="thumbnails-big"></i><span style="color: white">Produits et Prestations</span></a>
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
                <!-- Prestation -->
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="menu-livicon" data-icon="thumbnails-small"></i><span style="color: white">Facture</span></a>
                    <ul class="dropdown-menu" style="background-color: #303030 !important">
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-facture-list.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Liste</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item align-items-center" href="page-add-facture.php" data-toggle="dropdown" style="color: white"><i class="bx bx-right-arrow-alt" style="color: white !important"></i>Ajouter</a>
                                </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>