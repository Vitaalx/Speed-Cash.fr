<?php

session_start();
//var_dump($_SESSION);

$langue = 0;
if(isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');

if (!isset($_SESSION["email"])) {
    header("Location: ./index.php");
}


?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Website PA</title>
    <link rel="stylesheet" type="text/css" href="./style/styleEntreprise.css">
    <link rel="stylesheet" type="text/css" href="./style/style_client.css">
    <link rel="stylesheet" type="text/css" href="./style/styleFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<?php include('./php/header_client.php'); ?>

<body class="company-body">

<div class="company-container">
    <div class="marketing-header">
        <h2 class="marketing-content-trust">Speed <text style="color: white;">Cash</text> - Le commercant de confiance</h2>
        <h2 class="marketing-content-partner"><i>Services disponible sur le site de Speed Cash et ces partenaires</i></h2>
    </div>
    <div class="marketing-content-info">
        <p>
            <text style="color: #15CF74;">Lorem Ipsum</text> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown <text style="color: #15CF74;">printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap</text> into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <text style="color: #15CF74;">// TODO</text>
            <br />
            <br />
            <text style="color: #15CF74;">Lorem Ipsum</text> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release <text style="color: #15CF74;">of Letraset sheets</text> containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <text style="color: #15CF74;">// TODO</text>

        </p>
    </div>
    <div class="ellipse-1">
    </div>

    <div class="offers-info">
        <div class="header-offers-info">
            <h1 class="form-insc-offers">Speed <text style="color: white;">Cash</text> Company - Formulaire d'inscription</h1>
            <h3 class="info-about-speed">Speed Cash Company à tavers nos offres le meilleur service d’achat et de location au monde. etc blblblblblblbllbl
                blmblbllblblblbllblblblbllblblblllbblbllblblblblblbllblblblblbllblblblblblbllblblblblblblbllblblblblblbllblblbllbl <text style="color: #15CF74;">// TODO</text></h3>
        </div>
        <div class="content-offers-info">
            <img src="./icons/double-coat.png" class="icon-coat">
            <div class="more-info-about-speed-offers">
                <h2>Info supplémentaire sur les offres de Speed Cash</h2>
                <h4 class="info-app-offers"><i>Speed Cash ouvrira ca nouvelle l'application pour les clients le 31 août 2022.</i></h4>
                <div class="button-more-info">Détails supp.</div>
            </div>
            <div class="benefits-offers-info">
                <img src="./icons/first-point.png" class="first-bubble">
                <p class="sentance-first-bubble">
                    <text style="color: #15CF74;">-10% sur tout nos produits :</text> Pour toutes soucrption à un offre d’abonnment sur la plateforme. Vous bénéficier 1an de reduction sur nos produits. (produit parteniare non compris)
                </p>
                <img src="./icons/second-point.png" class="second-bubble">
                <p class="sentance-second-bubble">
                    <text style="color: #15CF74;">Paiment en 10x Possible :</text> Avec l’offre premium vous pouvez étaler vos paiement en 10x et sur une période 1 an.
                </p>
                <img src="./icons/third-point.png" class="third-bubble">
                <p class="sentance-third-bubble">
                    <text style="color: #15CF74;">Bla bla bla Connerie :</text> Je sais plus quoi proposer donc je mes ca ala place pour que ca fasse jolie. je m’en bat les steacks XD.  <text style="color: #15CF74;">// TODO</text>
                </p>
            </div>
        </div>
        <div class="footer-form-offers-info">
            <div class="info-conditions">
                <h1 class="info-conditions-title">Conditions</h1>
                <p class="conditons-first-p">
                    •   Posséder un compte Speed cash verifier pendant 3 mois ou plus.  <text style="color: #15CF74;">// TODO</text>
                </p>
                <p class="conditons-second-p">
                    •   Dépensez au moins 100,00 € sur la plateforme Speed Cash avant le moment de la demande d'abonnement.  <text style="color: #15CF74;">// TODO</text>
                </p>
            </div>
            <div class="info-procedure">
                <h1 class="info-procedure-title">Procédure</h1>
                <p class="procedure-first-p">
                    •   Inscrivez-vous en ligne via le site officiel de Speed Cash  <text style="color: #15CF74;">// TODO</text>
                </p>
                <p class="procedure-second-p">
                    •   Inscrivez-vous également chez nos partenaires marchands disponibles sur notre plateforme  <text style="color: #15CF74;">// TODO</text>
                </p>
            </div>
        </div>

        <div class="form-container-subscription">
            <div class="form-title">
                <strong>Devenir Entreprise pour souscrire à un
                    abonnement Speed Cash</strong>
            </div>
            <form role="form" id="subscriptionForm" action="paymentSubscription.php" method="post">
                <div class="field">
                    <i class="uil uil-dialpad-alt"></i>
                    <input type="text" id="siretSubscription" name="nb_siret" class="siretSubscription" placeholder="Votre siret" required>
                </div>
                <div class="field">
                    <i class="uil uil-university"></i>
                    <!-- SELECT avec différent type status juridique d'une entreprise -->
                    <select class="company-type" name="company_type" id="company-type">
                        <option value="0">Type de société</option>
                        <option value="SARL">SARL</option>
                        <option value="SAS">SAS</option>
                        <option value="SA">SA</option>
                        <option value="EURL">EURL</option>
                        <option value="SNC">SNC</option>
                        <option value="SICAV">SICAV</option>
                        <option value="SIP">SIP</option>
                        <option value="SASU">SASU</option>
                        <option value="EURL">EURL</option>
                    </select>
                </div>

                <p class="info-form-sentance">
                    Remplissez vos coordonnées afin que nous puissions vous envoyer leurs estimations (lors d'un devis, les entreprises ne voient que votre description de poste et votre ville).
                </p>

                <div class="field">
                    <i class="uil uil-phone"></i>
                    <input type="tel" id="phoneSubscription" name="tel_company" class="phoneSubscription" placeholder="Numéro de l'entreprise" required>
                </div>
                <div class="field">
                    <i class="uil uil-building"></i>
                    <input type="text" id="companySubscription" name="company_name" class="companySubscription" placeholder="Nom de l'entreprise" required>
                </div>

                <h2 class="where-question">Où ?</h2>

                <div class="field">
                    <i class="uil uil-location-point"></i>
                    <input type="text" id="addressSubscription" name="company_location" class="addressSubscription" placeholder="Adresse postale de l'entreprise" required>
                </div>
                <div class="field">
                    <input type="number" id="caCompany" name="caCompany" class="caCompany" placeholder="Chiffre d'affaire de l'entreprise" required>
                    <i class="uil uil-euro-circle" style="margin-left: 1%;"></i>
                </div>

                <div class="field-choose-subscription">

                    <div class="div-checkbox-annual">

                        <input type="checkbox" id="annualSubscription" class="annualSubscription">
                        <p class="annualSub-p">Je choisis un abonnement à l'année (269.99€ / an)</p>

                    </div>

                </div>

                <p class="more-info-subscription">
                    1.  The maximum limit is up to 10 million VND, the loan term is up to 6 months.  <text style="color: #15CF74;">// TODO</text> <br />
                    2.  Require income from only 3 million VND, no need to prove financial or mortgage assets.  <text style="color: #15CF74;">// TODO</text> <br />
                    3.  The loan is disbursed by SHB Finance - a reputable financial company with an establishment and operation license since 2017 issued by the State Bank of Vietnam.  <text style="color: #15CF74;">// TODO</text> <br />
                </p>

                <!-- CheckBox pour acceptation des conditions générales du contrat  -->
                <div class="field-checkbox-subscription">
                    <input type="checkbox" id="checkboxSubscription" class="checkboxSubscription">
                    <p class="checkboxSub-p">J'accepte les <a style="color: #16e581;" href="#" target="_blank">conditions générales du contrat</a></p>
                </div>

                <input type="submit" name="submitSubcription" class="submitSubcription">
            </form>
        </div>

        <img src="images/subscription-card.png" class="subscription-card">

    </div>

</div>

<script>

    $("#checkboxSubscription").click(function () {
        $("#checkboxSubscription").attr("disabled", true);
    });

</script>

<?php include("./php/footer.php"); ?>

</body>

</html>
