<?php 

include 'bdd.php';


if(isset($_POST["ref"]) && isset($_POST["enterprise"]) && isset($_POST["content"]) && isset($_POST["mail"])){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $q2 = $conn->prepare('SELECT * FROM entreprise_part WHERE nom = ?');
        $q2->execute([$_POST["enterprise"]]);
        $result = $q2->fetch();

        $q = $conn->prepare('INSERT INTO contrat (ref, id_entreprise_part, content, mail, date_crea, date_fin) VALUES (?,?,?,?, ?, ?)');
        //var_dump($q);
        $add = $q->execute([
            $_POST['ref'],
            intval($result['id']),
            $_POST['content'],
            $_POST['mail'],
            date("Y-m-d"),
            $_POST["date"],
        ]);

        $url = "http://" . $_SERVER['HTTP_HOST'] . "/back/php/acceptContrat.php" . "?ref=" . $_POST['ref'];


        $message = "
            <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
            <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xml:lang=\"fr\" lang=\"fr\">
            <head>
              <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
              <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0\"/>
              <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
              <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
              <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins&display=swap\" rel=\"stylesheet\">
              <link rel=\"stylesheet\" href=\"https://unicons.iconscout.com/release/v4.0.0/css/line.css\">
            </head>
            
            <body leftmargin=\"0\" topmargin=\"0\" marginheight=\"0\" marginwidth=\"0\">


            <!-- Header -->
            <table style=\"background: linear-gradient(199deg, #2DA771 34.18%, #06E775 70.49%);\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            
              <tbody>
            
                <tr>
            
                  <td>
            
                    <div>
                      <table align=\"center\" width=\"590\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <tbody>
                        <tr>
                          <td align=\"center\" height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                        </tr>
                        <tr>
                          <td style=\"text-align: center;\">
                              <a href=\"http://localhost:8000/\">
                                <img src=\"https://i.imgur.com/d7ix86Q.gif\" width=\"424\" border=\"0\" alt=\"Logo Speed-Cash.fr\">
                              </a>
                          </td>
                        </tr>
                        <tr>
                          <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                        </tr>
                        <tr>
                          <td align=\"center\" style=\"text-align: center; font-size:38px; color: #fff; mso-line-height-rule: exactly; line-height: 28px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 700;\">
                                Merci de votre confiance !
                          </td>
                        </tr>
                        <tr>
                          <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                        </tr>
            
                        <tr>
                          <td align=\"center\" style=\"text-align: center; color: #ececec; mso-line-height-rule: exactly; line-height: 30px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 400;\">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, urna eu tincidunt consectetur, nisl nunc consequat nunc, eu tincidunt nisl nunc euismod nunc. Sed euismod, urna eu tincidunt consectetur, nisl nunc consequat nunc, eu tincidunt nisl nunc euismod nunc.
                          </td>
                        </tr>
            
                        <tr>
                          <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                        </tr>
            
                        <tr>
                          <td align=\"center\">
                            <table align=\"center\" width=\"240\" cellspacing=\"0\" cellpadding=\"0\">
                              <tbody>
                              <tr>
                                <td>
            
                              <tr>
                                <td style=\"font-size: 18px; font-family: 'Poppins', Helvetica, sans-serif; color: #FFF; text-align: center;\">
                                  <div style=\"padding: 10%; border-radius: 25%; background: linear-gradient(199deg, #289362 40.18%, #07af57 60.49%);;\">
                                  <a href=\"$url\" style=\"font-size: 18px; font-family: 'Poppins', Helvetica, sans-serif; color: #FFF; text-align: center; text-decoration: none;\">
                                Signer le contrat
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
                          <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
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
            
            <table style=\"background: linear-gradient(199deg, #313131 34.18%, #4d4d4d 80.49%);\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">

              <tbody>
              <tr>
                <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\"> &nbsp; </td>
              </tr>
              <tr>
                  <td>
                    <table align=\"center\" width=\"590\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                        <tr>
                          <td align=\"center\" style=\"text-align: center; font-size:20px; font-style: italic; color: #fff; mso-line-height-rule: exactly; line-height: 28px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 700;\">
                                Achetez grâce à nous, vous y gagnerez !
                          </td>
                        </tr>
                      <tr>
                        <td height=\"15\" style=\"font-size: 15px; line-height: 15px;\"> &nbsp; </td>
                      </tr>
                      <tr>
                        <td align=\"center\">
                          <table align=\"center\" width=\"24\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#00ff7e\">
                              <tbody>
                              <tr>
                                <td height=\"4\" style=\"font-size: 4px; line-height: 4px;\"> &nbsp; </td>
                              </tr>
                              </tbody>
                          </table>
                        </td>
                      </tr>

                      <tr>
                        <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                      </tr>

                      <tr>

                        <td>

                          <table width=\"170\" align=\"left\" cellspacing=\"0\" cellpadding=\"0\">
                            <tbody>
                            <tr>
                              <td align=\"center\">
                                  <i class=\"uil uil-user\" style=\"font-size: 40px; color: #d7d7d7; width: 40px;\"></i>
                              </td>
                            </tr>

                            <tr>
                              <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                            </tr>

                            <tr>
                              <td align=\"center\" style=\"text-align: center; font-size:18px; color: 	#0FA25B; mso-line-height-rule: exactly; line-height: 22px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 700;\">
                                Nos services
                            </td>
                            </tr>

                            <tr>
                              <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\"> &nbsp; </td>
                            </tr>

                            <tr>
                              <td align=\"center\" style=\"text-align: center; font-size:14px; color: #e1e1e1; mso-line-height-rule: exactly; line-height: 24px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 300;\">
                                <ul style=\"list-style-type: none; padding-left: 0;\">
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\">Livraison</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\">Retour</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\">Assistance</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\">Garantie</a></li>
                                </ul>
                              </td>
                            </tr>
                            </tbody>
                          </table>

                          <!-- Space 40px -->
                          <table align=\"left\" width=\"40\" cellspacing=\"0\" cellpadding=\"0\">
                            <tbody>
                            <tr>
                              <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                            </tr>

                            </tbody>
                          </table>
                          <!-- /Space 40px -->

                          <table width=\"170\" align=\"left\" cellspacing=\"0\" cellpadding=\"0\">
                            <tbody>
                            <tr>
                              <td align=\"center\">
                                <i class=\"uil uil-user\" style=\"font-size: 40px; color: #d7d7d7; width: 40px;\"></i>
                              </td>
                            </tr>

                            <tr>
                              <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                            </tr>

                            <tr>
                              <td align=\"center\" style=\"text-align: center; font-size:18px; color: 	#0FA25B; mso-line-height-rule: exactly; line-height: 22px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 700;\">
                                Restons en contact
                            </td>
                            </tr>

                            <tr>
                              <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\"> &nbsp; </td>
                            </tr>

                            <tr>
                              <td align=\"center\" style=\"text-align: center; font-size:14px; color: #e1e1e1; mso-line-height-rule: exactly; line-height: 24px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 300;\">
                                <ul style=\"list-style-type: none; padding-left: 0;\">
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"tel:+330782249412\">55-55-55-55-55</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"mailto:contact@speed-cash.fr\">contact@speed-cash.fr</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"https://www.google.com/maps?ll=48.849167,2.389734&z=15&t=m&hl=en&gl=FR&mapclient=embed&cid=6382120561375786439\" target=\"_blank\">6 rue de l'Invention, Paris VII, 75007</a></li>
                                </ul>
                              </td>
                            </tr>
                            </tbody>
                          </table>
            
                          <!-- Space 40px -->
                          <table align=\"left\" width=\"40\" cellspacing=\"0\" cellpadding=\"0\">
                            <tbody>
                            <tr>
                              <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                            </tr>
                            </tbody>
                          </table>
                          <!-- /Space 40px -->
            
                          <table width=\"170\" align=\"left\" cellspacing=\"0\" cellpadding=\"0\">
                            <tbody>
                            <tr>
                              <td align=\"center\">
                                <i class=\"uil uil-user\" style=\"font-size: 40px; color: #d7d7d7; width: 40px;\"></i>
                              </td>
                            </tr>
            
                            <tr>
                              <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                            </tr>
            
                            <tr>
                              <td align=\"center\" style=\"text-align: center; font-size:18px; color: 	#0FA25B; mso-line-height-rule: exactly; line-height: 22px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 700;\">
                                Nos réseaux
                              </td>
                            </tr>
            
                            <tr>
                              <td height=\"20\" style=\"font-size: 20px; line-height: 20px;\"> &nbsp; </td>
                            </tr>
            
                            <tr>
                              <td align=\"center\" style=\"text-align: center; font-size:14px; color: #e1e1e1; mso-line-height-rule: exactly; line-height: 24px; font-family: 'Poppins', Helvetica, sans-serif; font-weight: 300;\">
                                <ul style=\"list-style-type: none; padding-left: 0;\">
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\"><img src=\"https://i.imgur.com/CvyzWAo.jpeg\" style=\"width: 20px; border-radius: 100%;\" alt=\"Icon GitHub\" class=\"footer-icon-github\">GitHub</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\"><img src=\"https://i.imgur.com/5dsGnYH.jpeg\" style=\"width: 20px; border-radius: 100%;\" alt=\"Icon Discord\" class=\"footer-icon-discord\">Discord</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\"><img src=\"https://i.imgur.com/lN4jcKD.jpeg\" style=\"width: 20px; border-radius: 20%;\" alt=\"Icon Instagram\" class=\"footer-icon-instagram\">Instagram</a></li>
                                  <li><a style=\"text-decoration:none; color: white;\" href=\"#\"><img src=\"https://i.imgur.com/RIBroo3.jpeg\" style=\"width: 20px; border-radius: 20%;\" alt=\"Icon TikTok\" class=\"footer-icon-tiktok\">TikTok</a></li>
                                </ul>
                              </td>
                            </tr>
                            </tbody>
                          </table>
            
                        </td>
            
                      </tr>
            
                      <tr>
                        <td height=\"30\" style=\"font-size: 30px; line-height: 30px;\"> &nbsp; </td>
                      </tr>
            
                    </table>
                  </td>
              </tr>
              </tbody>
            
            </table>
            
            <!-- /Bloc 3 -->
            
            </body>
            </html>
   ";


        if (mail($_POST['mail'], "Validation de votre Contrat - Speed-Cash", $message)) {
            echo $message;
            echo "success";
        } else {
            echo "mailerror";
        }

        header('location: ../html/ltr/horizontal-menu-template-dark/page-contrat-list.php');

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/contract-add.php?message=error1');
    }
}else{
    echo "Echec de la requête.";
    header('location: ../html/ltr/horizontal-menu-template-dark/contract-add.php?message=error');
}

?>