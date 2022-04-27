<header>

    <div class="bar-top">
        <div class="left-elements">
        <a href="./client.php"><img class="logoSpeedCash" src="./icons/logo-speed-cash.gif" alt="Speed Cash"></a>
        <a href="../page-entreprise.php" style="text-decoration: none;"><div class="btn-entreprise">
                <?php echo $company[$langue]; ?>
            </div></a>
        </div>
        <div class="btn-type-client">
            <a class="profile-client" href="../my-account.php"><img class="img-profil-client" src="../images/avatar/AVATAR-<?php echo $_SESSION["id"]; ?>.jpeg" alt="<?php echo $_SESSION["prénom"]; ?>"></a>
            <a class="cart" href="./panier.php"><i class="uil uil-shopping-bag"></i></a>
            <a class="btn-deconnexion" href="./php/deconnexion.php"><span>Déconnexion</span></a>
        </div>

    </div>

</header>
