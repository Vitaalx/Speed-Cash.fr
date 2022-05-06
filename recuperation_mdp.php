
<link rel="stylesheet" type="text/css" href="./style/style.css">

<?php
session_start();
// Paramétres BDD
include "./php/db.php";


if(isset($_GET["section"])) {
    $section = htmlspecialchars($_GET["section"]);
} else {
    $section = "";
}

if(isset($_POST["submit_recup"], $_POST["recup_mail"])) {
    if(!empty($_POST['recup_mail'])) {
        $recup_mail = htmlspecialchars($_POST["recup_mail"]);
        $_SESSION['recup_mail'] = $recup_mail;
        if(filter_var($recup_mail, FILTER_VALIDATE_EMAIL)){
            try {
                // Connexion à la BDD
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $sql = "SELECT id, nom FROM users WHERE email = ?";
                    //echo $sql;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(array($recup_mail));
                    $nb = $stmt->rowCount();
                    if ($nb == 1) {
                        $nom = $stmt->fetch();
                        $nom = $nom["nom"];
                        //var_dump($nom);
                        $recup_code = "";
                        for ($i = 0; $i < 8; $i++) {
                            $recup_code .= mt_rand(0, 9);
                        }

                        $sql = "SELECT id FROM recuperation WHERE mail = ?";
                        //echo $sql;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array($recup_mail));
                        $nb = $stmt->rowCount();

                        if ($nb == 1) {
                            $sql = "UPDATE recuperation SET code = ? WHERE mail = ?";
                            //echo $sql;
                            $stmt = $conn->prepare($sql);
                            $stmt->execute(array($recup_code, $recup_mail));
                        } else {
                            $sql = "INSERT INTO recuperation (mail, code) VALUES (?, ?)";
                            //echo $sql;
                            $stmt = $conn->prepare($sql);
                            $stmt->execute(array($recup_mail, $recup_code));
                        }


                        $header = "MIME-Version: 1.0\r\n";
                        $header .= 'From:"Speed-Cash.fr"<support@speed-cash.fr>'."\n";
                        $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
                        $header .= 'Content-Transfer-Encoding: 8bit';
                        //var_dump($url);
                        $message = '
                        
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                                "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns:v="urn:schemas-microsoft-com:vml" xml:lang="fr" lang="fr">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                            <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0"/>
                            <link rel="preconnect" href="https://fonts.googleapis.com">
                            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins&display=swap" rel="stylesheet">
                            <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
                        </head>
                        <body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
                        
                        
                        <!-- Header -->
                        <table style="background: linear-gradient(199deg, #2DA771 34.18%, #06E775 70.49%);" width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                            <tbody>
                        
                            <tr>
                        
                                <td>
                        
                                    <div>
                                        <table align="center" width="590" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td align="center" height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a href="http://localhost:8000/">
                                                        <img src="https://i.imgur.com/d7ix86Q.gif" width="424" border="0" alt="Logo Speed-Cash.fr">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="text-align: center; font-size:38px; color: #fff; mso-line-height-rule: exactly; line-height: 40px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 700;">
                                                    Modification de mot de passe
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                            </tr>
                        
                                            <tr>
                                                <td align="center" style="text-align: left; color: #ececec; mso-line-height-rule: exactly; line-height: 30px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 400;">
                                                    Bonjour, <br />
                        
                        
                                                    Vous avez effectué une demande de récupération de mot de passe pour votre compte Speed-Cash. <br />
                                                    Votre code est le suivant : ' . $recup_code .' (Copiez-le)<br />
                                                    <br />
                                                    Vous avez la possiblité de modifier vous-même votre mot de passe en cliquant sur le bouton ci-dessous :
                                                </td>
                                            </tr>
                        
                                            <tr>
                                                <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                            </tr>
                        
                                            <tr>
                                                <td align="center">
                                                    <table align="center" width="240" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                        
                                                        <tr>
                                                            <td style="font-size: 18px; font-family: \'Poppins\', Helvetica, sans-serif; color: #FFF; text-align: center;">
                                                                <div style="padding: 10%; border-radius: 25%; background: linear-gradient(199deg, #289362 40.18%, #07af57 60.49%); width: 247px; margin-right: 60px">
                                                                    <a href="'. $url .'" style="font-size: 18px; font-family: \'Poppins\', Helvetica, sans-serif; color: #FFF; text-align: center; text-decoration: none;">
                                                                        Modifier mon mot de passe
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                        
                                                        </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                        
                                            <tr>
                                                <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                            </tr>
                        
                                            </tbody>
                                        </table>
                                    </div>
                        
                                    &nbsp;
                                </td>
                        
                            </tr>
                        
                            </tbody>
                        
                        </table>
                        <!-- /Header -->
                        
                        <!-- Bloc 3 -->
                        
                        <table style="background: linear-gradient(199deg, #313131 34.18%, #4d4d4d 80.49%);" width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                            <tbody>
                            <tr>
                                <td height="20" style="font-size: 20px; line-height: 20px;"> &nbsp; </td>
                            </tr>
                            <tr>
                                <td>
                                    <table align="center" width="590" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="text-align: center; font-size:20px; font-style: italic; color: #fff; mso-line-height-rule: exactly; line-height: 28px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 700;">
                                                Achetez grâce à nous, vous y gagnerez !
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="15" style="font-size: 15px; line-height: 15px;"> &nbsp; </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <table align="center" width="24" border="0" cellspacing="0" cellpadding="0" bgcolor="#00ff7e">
                                                    <tbody>
                                                    <tr>
                                                        <td height="4" style="font-size: 4px; line-height: 4px;"> &nbsp; </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                        
                                        <tr>
                                            <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                        </tr>
                        
                                        <tr>
                        
                                            <td>
                        
                                                <table width="170" align="left" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center">
                                                            <i class="uil uil-user" style="font-size: 40px; color: #d7d7d7; width: 40px;"></i>
                                                        </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td align="center" style="text-align: center; font-size:18px; color: 	#0FA25B; mso-line-height-rule: exactly; line-height: 22px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 700;">
                                                            Nos services
                                                        </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td height="20" style="font-size: 20px; line-height: 20px;"> &nbsp; </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td align="center" style="text-align: center; font-size:14px; color: #e1e1e1; mso-line-height-rule: exactly; line-height: 24px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 300;">
                                                            <ul style="list-style-type: none; padding-left: 0;">
                                                                <li><a style="text-decoration:none; color: white;" href="#">Livraison</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="#">Retour</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="#">Assistance</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="#">Garantie</a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                        
                                                <!-- Space 40px -->
                                                <table align="left" width="40" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                                    </tr>
                        
                                                    </tbody>
                                                </table>
                                                <!-- /Space 40px -->
                        
                                                <table width="170" align="left" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center">
                                                            <i class="uil uil-user" style="font-size: 40px; color: #d7d7d7; width: 40px;"></i>
                                                        </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td align="center" style="text-align: center; font-size:18px; color: 	#0FA25B; mso-line-height-rule: exactly; line-height: 22px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 700;">
                                                            Restons en contact
                                                        </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td height="20" style="font-size: 20px; line-height: 20px;"> &nbsp; </td>
                                                    </tr>
                        
                                                    <tr>
                                                        <td align="center" style="text-align: center; font-size:14px; color: #e1e1e1; mso-line-height-rule: exactly; line-height: 24px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 300;">
                                                            <ul style="list-style-type: none; padding-left: 0;">
                                                                <li><a style="text-decoration:none; color: white;" href="tel:+330782249412">55-55-55-55-55</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="mailto:contact@speed-cash.fr">contact@speed-cash.fr</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="https://www.google.com/maps?ll=48.849167,2.389734&z=15&t=m&hl=en&gl=FR&mapclient=embed&cid=6382120561375786439" target="_blank">6 rue de l\'Invention, Paris VII, 75007</a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <!-- Space 40px -->
                                                <table align="left" width="40" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- /Space 40px -->

                                                <table width="170" align="left" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td align="center">
                                                            <i class="uil uil-user" style="font-size: 40px; color: #d7d7d7; width: 40px;"></i>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" style="text-align: center; font-size:18px; color: 	#0FA25B; mso-line-height-rule: exactly; line-height: 22px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 700;">
                                                    Nos réseaux
                                                </td>
                                                    </tr>

                                                    <tr>
                                                        <td height="20" style="font-size: 20px; line-height: 20px;"> &nbsp; </td>
                                                    </tr>

                                                    <tr>
                                                        <td align="center" style="text-align: center; font-size:14px; color: #e1e1e1; mso-line-height-rule: exactly; line-height: 24px; font-family: \'Poppins\', Helvetica, sans-serif; font-weight: 300;">
                                                            <ul style="list-style-type: none; padding-left: 0;">
                                                                <li><a style="text-decoration:none; color: white;" href="#"><img src="https://i.imgur.com/CvyzWAo.jpeg" style="width: 20px; border-radius: 100%;" alt="Icon GitHub" class="footer-icon-github">GitHub</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="#"><img src="https://i.imgur.com/5dsGnYH.jpeg" style="width: 20px; border-radius: 100%;" alt="Icon Discord" class="footer-icon-discord">Discord</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="#"><img src="https://i.imgur.com/lN4jcKD.jpeg" style="width: 20px; border-radius: 20%;" alt="Icon Instagram" class="footer-icon-instagram">Instagram</a></li>
                                                                <li><a style="text-decoration:none; color: white;" href="#"><img src="https://i.imgur.com/RIBroo3.jpeg" style="width: 20px; border-radius: 20%;" alt="Icon TikTok" class="footer-icon-tiktok">TikTok</a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </td>

                                        </tr>

                                        <tr>
                                            <td height="30" style="font-size: 30px; line-height: 30px;"> &nbsp; </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            </tbody>

                        </table>

                        <!-- /Bloc 3 -->

                        </body>
                        </html>

                        ';

                        // Ne veut pas s'envoyer avec le header ne sait pourquoi...
                        mail($recup_mail, "Récupération de mot de passe - Speed-Cash.fr", $message);
                        $url_redirect = $_SERVER["HTTP_ORIGIN"].$_SERVER["REQUEST_URI"];
                        if($_GET["lang"]) {
                            $url_redirect = $url_redirect."&section=code";
                            header("Location: $url_redirect");
                        } else {
                            $new_url_redirect = str_replace("?lang=". $_GET["lang"], "?section=code", $url_redirect);
                            header("Location: $new_url_redirect");
                        }
                        if(!isset($_GET["lang"])) {
                            header("Location: $url_redirect?section=code");
                        }
                        //var_dump($recup_code);
                    } else {
                        $error = "Cette adresse mail n'est pas enregistrée";
                    }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        } else {
            $error = "Adresse mail invalide";
        }
    } else {
        $error = "Veuillez entrer votre adresse mail";
    }
}

if(isset($_POST["verif_submit"], $_POST["verif_code"])) {
    if(!empty($_POST["verif_code"])) {
        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $verif_code = htmlspecialchars($_POST["verif_code"]);
            $sql = "SELECT id FROM recuperation WHERE mail = ? AND code = ?";
            //echo $sql;
            $stmt = $conn->prepare($sql);
            var_dump($_SESSION["recup_mail"]);
            $stmt->execute(array($_SESSION["recup_mail"], $verif_code));
            $nb = $stmt->rowCount();
            //echo $nb;
            if ($nb == 1){
                $update = "UPDATE recuperation SET confirme = 1 WHERE mail = ?";
                $stmt = $conn->prepare($update);
                $url = $_SERVER["HTTP_ORIGIN"].$_SERVER["REQUEST_URI"];
                $stmt->execute(array($_SESSION["recup_mail"]));
                if($_GET["lang"]) {
                    $url .= "&section=changemdp";
                } else {
                    $url .= "&section=changemdp";
                }
                header("Location: $url");
            } else {
                $error = "Code invalide";
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        $error = "Veuillez entrer votre code de confirmation";
    }
}

if (isset($_POST["change_submit"])) {
    if (isset($_POST["change_mdp"], $_POST["change_mdpc"])) {
        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT confirme FROM recuperation WHERE mail = ?";
            //echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($_SESSION["email"]));
            $verif_confirm = $stmt->fetch();
            //var_dump($verif_confirm);
            $verif_confirm = $verif_confirm["confirme"];
            if ($verif_confirm == 1) {

                $mdp = sha1(htmlspecialchars($_POST["change_mdp"]));
                $mdpc = sha1(htmlspecialchars($_POST["change_mdpc"]));
                if (!empty($mdp) and !empty($mdpc)) {
                    if ($mdp == $mdpc) {
                        $sql = "UPDATE users SET motDePasse = ? WHERE email = ?";
                        //echo $sql;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array($mdp, $_SESSION["email"]));

                        $sql = "DELETE FROM recuperation WHERE mail = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array($_SESSION["email"]));
                        header("Location: ./index.php");
                    } else {
                        $error = "Vos mots de passes ne correspondent pas";
                    }
                } else {
                    $error = "Veuillez remplir tous les champs";
                }
            } else {
                $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail.";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }

}



include ('php/recuperation.php');

?>
