<?php

$langue = 0;
if(isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Website PA</title>
    <link rel="stylesheet" type="text/css" href="./style/styleEntreprise.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>

</head>

<?php include('./php/header.php'); ?>

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
                <strong>Inscrivez-vous pour souscrire à un
                    abonnement Speed Cash</strong>
            </div>
            <form role="form" id="subscriptionForm" enctype="multipart/form-data">
                <div class="field">
                    <i class="uil uil-user"></i>
                    <input type="text" id="nameSubscription" class="nameSubscription" placeholder="Votre nom" required>
                </div>
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" id="emailSubscription" class="emailSubscription" placeholder="Email ID" required>
                </div>

                <p class="info-form-sentance">
                    Remplissez vos coordonnées afin que nous puissions vous envoyer leurs estimations (lors d'un devis, les entreprises ne voient que votre description de poste et votre ville).
                </p>

                <div class="field">
                    <i class="uil uil-phone"></i>
                    <input type="tel" id="phoneSubscription" class="phoneSubscription" placeholder="Votre numéro de téléphone" required>
                </div>
                <div class="field">
                    <i class="uil uil-building"></i>
                    <input type="text" id="companySubscription" class="companySubscription" placeholder="Nom de l'entreprise" required>
                </div>

                <h2 class="where-question">Où ?</h2>

                <div class="field">
                    <i class="uil uil-location-point"></i>
                    <input type="text" id="addressSubscription" class="addressSubscription" placeholder="Adresse postale" required>
                </div>

                <h2 class="when-to-when">De quand à quand ?</h2>

                <div class="field-datetime">
                    <input type="date" id="dateAtSubscription" class="dateAtSubscription" placeholder="JJ/MM/YYYY" required>
                    <input type="time" id="timeAtSubscription"  class="timeAtSubscription" placeholder="HH:MM" required>

                    <span class="word-a">à</span>

                    <input type="date" id="dateToSubscription" class="dateToSubscription" placeholder="JJ/MM/YYYY" required>
                    <input type="time" id="timeToSubscription" class="timeToSubscription" placeholder="HH:MM" required>
                </div>

                <div class="field-choose-subscription">

                    <div class="div-checkbox-monthly">

                        <input type="checkbox" id="monthlySubscription" class="monthlySubscription">
                        <p class="monthlySub-p">Je choisis un abonnement au mois (24.99€ / mois)</p>

                    </div>
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

                <div class="alert-subscription" id="alert-subscription">
                    Vous ne pouvez pas choisir deux abonnement, veuillez faire un choix.
                </div>

                <input type="submit" name="submitSubcription" class="submitSubcription" value="Je m'abonne !">
            </form>
        </div>

        <img src="images/subscription-card.png" class="subscription-card">

    </div>

</div>

<script>

    $("#alert-subscription").hide();
    // SUR VALIDATION DU FORMULAIRE D'INSCRIPTION
    $("#subscriptionForm").submit(function (event) {
        // Annulation du submit auto
        event.preventDefault();
        // Appel de la fonction dédiée
        submitSubscriptionForm();
    });

    function submitSubscriptionForm() {

        $("#alert-subscription").hide();
        // Création d'un formulaire de données
        var fd = new FormData();
        fd.append('nom', $("#nameSubscription").val());
        fd.append('email', $("#emailSubscription").val());
        fd.append('phone', $("#phoneSubscription").val());
        fd.append('company', $("#companySubscription").val());
        fd.append('address', $("#addressSubscription").val());
        fd.append('dateAt', $("#dateAtSubscription").val());
        fd.append('timeAt', $("#timeAtSubscription").val());
        fd.append('dateTo', $("#dateToSubscription").val());
        fd.append('timeTo', $("#timeToSubscription").val());

        if($("#annualSubscription").get(0).checked === true) {
            fd.append('price', 269.99);
        } else {
            fd.append('price', 24.99);
        }
        if($("#annualSubscription").get(0).checked === true && $("#monthlySubscription").get(0).checked === true) {
            $("#alert-subscription").show();
            $("#alert-subscription").html("<span style='color: #C0392B;'>Vous ne pouvez pas choisir deux abonnement, veuillez faire un choix.</span>");
            $("#alert-subscription").fadeOut(4000);
        } else {
            $("#alert-subscription").hide();
            // Appel de la fonction ajax
            $.ajax({
                url: './php/subscription.php',
                type: 'POST',
                data: fd,
                processData: false,
                contentType: false,
                success: function (text) {
                    alert('-' + text + '-');
                    if (text === "success") {
                        //alert("success");
                        $("#alert-subscription").show();
                        $("#alert-subscription").html("<span style='color: white;'>Votre abonnement à bien été pris en compte, nous vous avons envoyé votre facture par mail.</span>");
                        $("#alert-subscription").fadeOut(4000);
                        setTimeout(() => {window.location.href = "./page-entreprise.php"}, 2000);
                    }
                }
            });
        }


    }
</script>

<?php include("./php/footer.php"); ?>

</body>

</html>
