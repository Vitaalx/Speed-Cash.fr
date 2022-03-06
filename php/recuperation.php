<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Récupération de votre mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
</head>

<header>

    <div class="bar-top-changemdp">
        <div class="btns">
        <img class="logoSpeedCash" src="./icons/logo-speed-cash.gif" alt="Speed Cash">
        <div class="btn-entreprise">
            Entreprise
        </div>
        <div class="btn-client" onclick="afficheModal()" id="openModal">
            Client
        </div>
        </div>

        <div class="social-icon">
            <img class="discord-icon" src="./icons/Discord-icon.png" alt="Discord">
            <img class="instagram-icon" src="./icons/Instagram-icon.svg" alt="Instagram">
            <img class="github-icon" src="./icons/GitHub-icon.svg" alt="GitHub">
            <img class="tiktok-icon" src="icons/TikTok-icon.svg" alt="TikTok">
        </div>

    </div>

</header>

<body class="body-recup">

<main class="container-fluid recup">
    <article class="article-recup">
        <h3 class="titre-recup">Récupération de mot de passe :</h3>
        <?php if ($section == "code") { ?>
        <i>Un code de vérification vous a été envoyé par mail.</i>
            <form method="post" class="form-recup">
                <input type="text" placeholder="Code de vérification" class="code-changemdp" name="verif_code"/><br/>
                <input type="submit" value="Valider" class="submit-recup" class="submit-chamgemdp" name="verif_submit"/>
            </form>
        <?php } elseif ($section == "changemdp") { ?>
            Nouveau mot de passe :
            <form method="post" class="form-recup">
                <br>
                <input type="password" placeholder="Nouveau mot de passe" class="password1-changemdp" name="change_mdp"/><br/>
                <br>
                <input type="password" placeholder="Confirmation du mot de passe" class="password2-changemdp" name="change_mdpc"/><br/>
                <br>
                <input type="submit" value="Valider" class="submit-recup" class="submit2-changemdp" name="change_submit"/>
            </form>
        <?php } else { ?>
            <form method="post" class="form-recup">
                <input type="email" placeholder="Votre adresse mail" class="email-changemdp" name="recup_mail"/><br/>
                <input type="submit" value="Valider" class="submit-recup" class="submit3-changemdp" name="submit_recup"/>
            </form>
        <?php } ?>
        <?php if (isset($error)) {
            echo '<span style="color:indianred">' . $error . '</span>';
        } else {
            echo '';
        } ?>
    </article>
</main>


<footer>
    <h7>© | Speed-Cash | <?= date('Y'); ?> | Tous droit réservés</h7>
</footer>

</body>
</html>
