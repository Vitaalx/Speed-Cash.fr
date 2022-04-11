<header>

    <?php $url = $_SERVER["REQUEST_URI"]; ?>
    <?php if($_SERVER["PHP_SELF"] == "/recuperation_mdp.php")  { ?>
    <?php echo '<div style="position: relative;" class="bar-top">';?>
    <?php } else if($_SERVER["PHP_SELF"] == "/index.php") { ?>
    <?php echo '<div class="bar-top">'; }?>
    <div class="bar-top">
        <div class="btns">
            <a href="<?php if($_SERVER["PHP_SELF"] == "/recuperation_mdp.php") echo "./index.php"; elseif($_SERVER["PHP_SELF"] == "/index.php") { echo "./index.php"; }elseif($_SERVER["PHP_SELF"] == "/page-entreprise.php") { echo "./index.php"; } ?>"><img class="logoSpeedCash" src="./icons/logo-speed-cash.gif" alt="Retourner à l'accueil"></a>
            <?php if($_SERVER["PHP_SELF"] == "/index.php") { ?>
            <a href="../page-entreprise.php" style="text-decoration: none;"><div class="btn-entreprise">
                <?php echo $company[$langue]; ?>
            </div></a>
            <div class="btn-client" onclick="afficheModal()" id="openModal">
                <?php echo $customer[$langue]; ?>
            </div>
            <?php } elseif($_SERVER["PHP_SELF"] == "/recuperation_mdp.php") {

            } ?>
        </div>

        <div class="social-icon">
                <a class="a-french-flag" href="<?php $new_url = str_replace(1, 0, $url); echo $new_url; ?>">
                <img class="french-flag" src="images/drapeau-france.png" width="55" height="30" alt="Drapeau Français">
            </a>
            <a class="a-english-flag" href="<?php echo $_SERVER["PHP_SELF"]; ?>?lang=1" >
                <img class="english-flag" src="images/drapeau-anglais.png" width="55" height="30" alt="Drapeau Anglais">
            </a>
            <img class="discord-icon" src="./icons/Discord-icon.png" alt="Discord">
            <img class="instagram-icon" src="./icons/Instagram-icon.svg" alt="Instagram">
            <img class="github-icon" src="./icons/GitHub-icon.svg" alt="GitHub">
            <img class="tiktok-icon" src="icons/TikTok-icon.svg" alt="TikTok">
        </div>

    </div>

</header>