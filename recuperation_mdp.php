
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
        if(filter_var($recup_mail, FILTER_VALIDATE_EMAIL)){
            try {
                // Connexion à la BDD
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                /*$sql = "SELECT compteActif FROM client WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array($recup_mail));
                $compteActif =$stmt->fetch();
                //var_dump($compteActif);

                if ($compteActif == False) {

                    $error = "Votre compte n'est pas été activé ou bien il est inexistant.";

                } else {*/

                    $sql = "SELECT id, nom FROM client WHERE email = ?";
                    //echo $sql;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(array($recup_mail));
                    $nb = $stmt->rowCount();
                    if ($nb == 1) {
                        $nom = $stmt->fetch();
                        $nom = $nom["nom"];
                        //var_dump($nom);
                        $_SESSION['recup_mail'] = $recup_mail;
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

                        $url = $_SERVER["HTTP_ORIGIN"] . $_SERVER["REQUEST_URI"];
                        //var_dump($url);
                        $message = "Bonjour M.$nom, Afin de réinitialiser votre mot de passe veuillez cliquer sur ce lien : \n$url?section=code&code='" . $recup_code . "',\n VOTRE CODE EST : '" . $recup_code . "'";

                        mail($recup_mail, "Récupération de mot de passe - Speed-Cash.fr", $message);
                        header("Location: $url?section=code");
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
            //var_dump($_SESSION["recup_mail"]);
            $stmt->execute(array($_SESSION["recup_mail"], $verif_code));
            $nb = $stmt->rowCount();
            //echo $nb;
            if ($nb == 1){
                $update = "UPDATE recuperation SET confirme = 1 WHERE mail = ?";
                $stmt = $conn->prepare($update);
                $stmt->execute(array($_SESSION["recup_mail"]));
                header("Location: $url?section=changemdp");
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
            $stmt->execute(array($_SESSION["recup_mail"]));
            $verif_confirm = $stmt->fetch();
            //var_dump($verif_confirm);
            $verif_confirm = $verif_confirm["confirme"];
            if ($verif_confirm == 1) {

                $mdp = sha1(htmlspecialchars($_POST["change_mdp"]));
                $mdpc = sha1(htmlspecialchars($_POST["change_mdpc"]));
                if (!empty($mdp) and !empty($mdpc)) {
                    if ($mdp == $mdpc) {
                        $sql = "UPDATE client SET motDePasse = ? WHERE email = ?";
                        //echo $sql;
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array($mdp, $_SESSION["recup_mail"]));

                        $sql = "DELETE FROM recuperation WHERE mail = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(array($_SESSION["recup_mail"]));
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
