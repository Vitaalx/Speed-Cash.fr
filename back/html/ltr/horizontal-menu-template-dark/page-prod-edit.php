<?php
include '../../../php/bdd.php';

$q = $db->query("SELECT * FROM produits WHERE id = '".$_GET['id']."'");
$response = $q->fetchAll(PDO::FETCH_ASSOC);
$size = count($response);

if ($size > 1) {
  echo "<p>Erreur, plusieurs produits ont l'id ".$_GET['id']."</p>";
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
    <title>Users Edit</title>
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
                                        <form novalidate id="form-modif-info-1">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Name of product</label>
                                                            <input type="text" id="name_user" class="form-control" placeholder="<?php if ($response[0]['nom'] == null) {echo 'None';} else {echo $response[0]['nom'];} ?>" required data-validation-required-message="This username field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Mark</label>
                                                            <input type="text" id="second_name_user" class="form-control" placeholder="<?php if ($response[0]['marque'] == null) {echo 'None';} else {echo $response[0]['marque'];} ?>" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Model</label>
                                                            <input type="text" id="email" class="form-control" placeholder="<?php if ($response[0]['modele'] == null) {echo 'None';} else {echo $response[0]['modele'];} ?>" required data-validation-required-message="This email field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Price</label>
                                                            <input type="number" id="email" class="form-control" placeholder="<?php if ($response[0]['prix'] == null) {echo 'None';} else {echo $response[0]['prix'];} ?>€" required data-validation-required-message="This email field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <select class="form-control" id="select1">
                                                            <option value="informatique" <?php if($response[0]['categorie'] == 4) { echo 'selected';} ?>>informatique</option>
                                                            <option value="jardin" <?php if($response[0]['categorie'] == 3) { echo 'selected';} ?>>Jardin</option>
                                                            <option value="mobilier" <?php if($response[0]['categorie'] == 2) { echo 'selected';} ?>>Mobiler</option>
                                                            <option value="soins" <?php if($response[0]['categorie'] == 1) { echo 'selected';} ?>>Soins</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" id="select2">
                                                            <option value="1" <?php if($response[0]['statut_cpt'] == 1) { echo 'selected';} ?>>Active</option>
                                                            <option value="2" <?php if($response[0]['statut_cpt'] == 2) { echo 'selected';} ?>>Banned</option>
                                                            <?php if ($response[0]['statut_cpt'] != 1 AND $response[0]['statut_cpt'] != 2) {?><option value="3" <?php if($response[0]['statut_cpt'] == 3) { echo 'selected';} ?>>Non-Actif</option> <?php } ?>
                                                        </select>
                                                    </div>
                                                    <?php if ($responseEnterprise != null) { ?>
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <input type="text" class="form-control" placeholder="<?php if ($responseEnterprise[0]['nom_entreprise'] == null) {echo 'None';} else {echo $responseEnterprise[0]['nom_entreprise'];} ?>">
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <!--
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table mt-1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Module Permission</th>
                                                                    <th>Read</th>
                                                                    <th>Write</th>
                                                                    <th>Create</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Users</td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox1" class="checkbox-input" checked>
                                                                            <label for="users-checkbox1"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox2" class="checkbox-input"><label for="users-checkbox2"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox3" class="checkbox-input"><label for="users-checkbox3"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox4" class="checkbox-input" checked>
                                                                            <label for="users-checkbox4"></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Articles</td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox5" class="checkbox-input"><label for="users-checkbox5"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox6" class="checkbox-input" checked>
                                                                            <label for="users-checkbox6"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox7" class="checkbox-input"><label for="users-checkbox7"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox8" class="checkbox-input" checked>
                                                                            <label for="users-checkbox8"></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Staff</td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox9" class="checkbox-input" checked>
                                                                            <label for="users-checkbox9"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox10" class="checkbox-input" checked>
                                                                            <label for="users-checkbox10"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox11" class="checkbox-input"><label for="users-checkbox11"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="checkbox"><input type="checkbox" id="users-checkbox12" class="checkbox-input"><label for="users-checkbox12"></label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> 
                                                -->
                                                <script src="../../../js/script.js"></script>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1" onClick="modif()">Save
                                                        changes</button>
                                                    <script>
                                                        function getSelectValue(selectID) {
                                                            var e = document.getElementById(selectID);
                                                            var strUser = e.options[e.selectedIndex].value;
                                                            return strUser;
                                                        }
                                                        
                                                        function modif() {
                                                            const id = <?php echo $_GET['id']; ?>;

                                                            const name = document.forms['form-modif-info-1'].name_user.value;
                                                            if (!name.replace(/\s+/,'').length) {
                                                                
                                                            } else {
                                                                const q1 = new XMLHttpRequest();
                                                                q1.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                        document.getElementById('name_user').innerHTML = this.responseText;
                                                                    }
                                                                };
                                                                q1.open("POST", "../../../php/modif_user.php");
                                                                q1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                                q1.send(`name=${name}&id=${id}`);
                                                            }

                                                            if(getSelectValue("select1") == <?php echo $response[0]['categorie']; ?>) {
                                                                console.log("ok");
                                                            } else {
                                                                const role = getSelectValue("select1");
                                                                const q2 = new XMLHttpRequest();
                                                                q2.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                        
                                                                    }
                                                                };
                                                                q2.open("POST", "../../../php/modif_user.php");
                                                                q2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                                q2.send(`role=${role}&id=${id}`);
                                                            }

                                                            if(getSelectValue("select2") == <?php echo $response[0]['statut_cpt']; ?>) {
                                                                console.log("ok2");
                                                            } else {
                                                                const statut = getSelectValue("select2");
                                                                const q3 = new XMLHttpRequest();
                                                                q3.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                        
                                                                    }
                                                                };
                                                                q3.open("POST", "../../../php/modif_user.php");
                                                                q3.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                                q3.send(`statut=${statut}&id=${id}`);
                                                            }

                                                            
                                                            if(getSelectValue("select3") == "<?php echo $response[0]['nationalite']; ?>") {
                                                                console.log("ok3");
                                                            } else {
                                                                const statut = getSelectValue("select3");
                                                                const q4 = new XMLHttpRequest();
                                                                q4.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                        
                                                                    }
                                                                };
                                                                q4.open("POST", "../../../php/modif_user.php");
                                                                q4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                                q4.send(`pays=${statut}&id=${id}`);
                                                            }

                                                            var tel = document.forms['form-modif-info-2'].tel.value;
                                                            console.log(tel);
                                                            if (!tel.replace(/\s+/,'').length) {
                                                                
                                                            } else {
                                                                const q5 = new XMLHttpRequest();
                                                                q5.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                        document.getElementById('tel').innerHTML = this.responseText;
                                                                    }
                                                                };
                                                                q5.open("POST", "../../../php/modif_user.php");
                                                                q5.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                                q5.send(`tel=${tel}&id=${id}`);
                                                            }
                                                        }

                                                        function redirectListUser(){
                                                            console.log('redirectListUser');
                                                            document.location.href = "http://localhost:8888/spdCsh-PA/Speed-Cash-Website/back/html/ltr/horizontal-menu-template-dark/page-users-list.html";
                                                        }
                                                    </script>
                                                    <button type="reset" class="btn btn-light-danger" onClick="redirectListUser()">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    <div class="tab-pane fade show" id="information" aria-labelledby="information-tab" role="tabpanel">
                                        <!-- users edit Info form start -->
                                        <form novalidate id="form-modif-info-2">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                                    <h5 class="mb-1"><i class="bx bx-user mr-25"></i>Personal Info</h5>
                                                    <div class="form-group">
                                                        <div class="controls position-relative">
                                                            <label>Birth date</label>
                                                            <input type="text" class="form-control birthdate-picker" required placeholder="Birth date" data-validation-required-message="This birthdate field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control" id="select3">
                                                            <option value="US" <?php if($response[0]['nationalite'] == 'US') { echo 'selected';} ?>>USA</option>
                                                            <option value="IND" <?php if($response[0]['nationalite'] == 'IND') { echo 'selected';} ?>>India</option>
                                                            <option value="CND" <?php if($response[0]['nationalite'] == 'CND') { echo 'selected';} ?>>Canada</option>
                                                            <option value="AUS" <?php if($response[0]['nationalite'] == 'AUS') { echo 'selected';} ?>>Australia</option>
                                                            <option value="FR" <?php if($response[0]['nationalite'] == 'FR') { echo 'selected';} ?>>France</option>
                                                            <option value="GE" <?php if($response[0]['nationalite'] == 'GE') { echo 'selected';} ?>>Germany</option>
                                                            <option value="ESP" <?php if($response[0]['nationalite'] == 'ESP') { echo 'selected';} ?>>Espagne</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Languages</label>
                                                        <select class="form-control" id="users-language-select2" multiple="multiple">
                                                            <option value="English" selected>English</option>
                                                            <option value="Spanish">Spanish</option>
                                                            <option value="French">French</option>
                                                            <option value="Russian">Russian</option>
                                                            <option value="German">German</option>
                                                            <option value="Arabic" selected>Arabic</option>
                                                            <option value="Sanskrit">Sanskrit</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Phone</label>
                                                            <input type="text" id="tel" class="form-control" required placeholder="<?php echo $response[0]['tel'] ?>" data-validation-required-message="This phone number field is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" placeholder="Address" data-validation-required-message="This Address field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Website</label>
                                                        <input type="text" class="form-control" placeholder="Website address">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Favourite Music</label>
                                                        <select class="form-control" id="users-music-select2" multiple="multiple">
                                                            <option value="Rock">Rock</option>
                                                            <option value="Jazz" selected>Jazz</option>
                                                            <option value="Disco">Disco</option>
                                                            <option value="Pop">Pop</option>
                                                            <option value="Techno">Techno</option>
                                                            <option value="Folk" selected>Folk</option>
                                                            <option value="Hip hop">Hip hop</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Favourite movies</label>
                                                        <select class="form-control" id="users-movies-select2" multiple="multiple">
                                                            <option value="The Dark Knight" selected>The Dark Knight
                                                            </option>
                                                            <option value="Harry Potter" selected>Harry Potter</option>
                                                            <option value="Airplane!">Airplane!</option>
                                                            <option value="Perl Harbour">Perl Harbour</option>
                                                            <option value="Spider Man">Spider Man</option>
                                                            <option value="Iron Man" selected>Iron Man</option>
                                                            <option value="Avatar">Avatar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button onClick="modif()" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-light-danger">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit Info form ends -->  
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