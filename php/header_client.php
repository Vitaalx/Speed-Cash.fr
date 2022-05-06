<header>

    <?php $url = $_SERVER["REQUEST_URI"]; ?>
    <div class="bar-top">
        <div class="left-elements">
        <a href="./client.php"><img class="logoSpeedCash" src="./icons/logo-speed-cash.gif" alt="Speed Cash"></a>
            <?php if($_SERVER["PHP_SELF"] != "/recuperation_mdp.php") { ?>
        <a href="../page-entreprise.php" style="text-decoration: none;"><div class="btn-entreprise">
                <?php echo $company[$langue]; ?>
            </div></a>
        </div>
        <div class="btn-type-client">
            <a class="profile-client" href="../my-account.php"><img class="img-profil-client" src="../images/avatar/AVATAR-<?php echo $_SESSION["id"]; ?>.jpeg" alt="<?php echo $_SESSION["prénom"]; ?>"></a>
            <a class="cart" href="./panier.php"><i class="uil uil-shopping-bag"></i></a>
            <a class="btn-deconnexion" href="./php/deconnexion.php"><span>Déconnexion</span></a>
            <?php } else if ($_SERVER["PHP_SELF"] === "/recuperation_mdp.php") { ?>
            <div class="social-icon">
                <a class="a-french-flag" href="<?php $new_url = str_replace(1, 0, $url); echo $new_url; ?>">
                    <img class="french-flag" src="images/drapeau-france.png" width="55" height="30" alt="Drapeau Français">
                </a>
                <a class="a-english-flag" href="<?php echo $_SERVER["PHP_SELF"]; ?>?lang=1" >
                    <img class="english-flag" src="images/drapeau-anglais.png" width="55" height="30" alt="Drapeau Anglais">
                </a>
            </div>
            <?php } ?>
        </div>

    </div>

</header>
