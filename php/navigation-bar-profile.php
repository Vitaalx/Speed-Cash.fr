<div class="navigation-bar">
    <div class="navigation-bar-container">
        <h3 style="color: white;"><center>Profile de <?php echo $_SESSION["prénom"]; ?></center></h3>
        <div class="navigation-bar-container-left">
            <ul class="ul-profile-container">
                <li>
                    <a class="private-data-li-a li-a" href="my-account.php"><i class="uil uil-keyhole-square"></i><span class="span-account spans">Compte</span></a>
                </li>
                <div class="access-to-label">
                    <br />
                    <label style="color: #15CF74; text-transform: uppercase"><strong>Accéder à</strong></label>
                </div>
                <li>
                    <a class="private-data-li-a li-a" href="my-private-data.php"><i class="uil uil-keyhole-square"></i><span class="span-privacy spans">Mes informations personnelles</span></a>
                </li>
                <li>
                    <a class="orders-li-a li-a" href="my-orders.php"><i class="uil uil-truck"></i><span class="span-orders spans">Mes commandes</span></a>
                </li>
                <li>
                    <a class="cards-li-a li-a" href="my-speed-cash-card.php"><i class="uil uil-postcard"></i><span class="span-card spans">Ma carte Speed-Cash</span></a>
                </li>
                <li>
                    <a class="cards-li-a li-a" href="my-own-cards.php"><i class="uil uil-postcard"></i><span class="span-own-cards spans">Mes cartes de paiments</span></a>
                </li>
                <div class="access-to-label">
                    <br />
                    <label style="color: #15CF74; text-transform: uppercase"><strong>Sécurité</strong></label>
                </div>
                <li>
                    <a class="cards-li-a li-a" href="my-password.php"><i class="uil uil-postcard"></i><span class="span-password spans">Mot de passe</span></a>
                </li>
                <li>
                    <a class="other-li-a li-a" href="./my-e-mails.php"><i class="uil uil-envelope"></i><span class="span-e-mails spans">E-mails</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!--script>

        const li_a = document.querySelectorAll(".li-a");
        const spans = document.querySelectorAll(".spans");


        for($li_a of $li_as){
            $li_a.addEventListener("click", function(){
                for($span of $spans){
                    $span.style.color = "#15CF74";
                }
                span.style.color = "white";
            });
        }


    </script-->

</div>
