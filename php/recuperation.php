<?php

$langue = 0;
if(isset($_GET['lang'])) $langue = $_GET['lang'];

include('./php/traduction_en.php');

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title_head[$langue]; ?></title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/style_client.css">
    <link rel="stylesheet" type="text/css" href="../style/styleFooter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
</head>

<?php include('header_client.php'); ?>


<body class="body-recup">

<main class="container-fluid recup">
    <article class="article-recup">
        <h3 class="titre-recup"><?php echo $title_recup[$langue]; ?></h3>
        <?php if ($section == "code") { ?>
        <i><?php echo $verif_code[$langue]; ?></i>
            <form method="post" class="form-recup">
                <input type="text" placeholder="<?php echo $verif_code_input[$langue]; ?>" class="code-changemdp" name="verif_code"/><br/>
                <input type="submit" value="<?php echo $validate_button[$langue]; ?>" class="submit-recup" class="submit-chamgemdp" name="verif_submit"/>
            </form>
        <?php } elseif ($section == "changemdp") { ?>
            <?php echo $new_pass_recup[$langue]; ?>
            <form method="post" class="form-recup">
                <br>
                <input type="password" placeholder="<?php echo $new_pass_recup_input[$langue]; ?>" class="password1-changemdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre." name="change_mdp"/><br/>
                <br>
                <input type="password" placeholder="<?php echo $confirm_pass_recup_input[$langue]; ?>" class="password2-changemdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre." name="change_mdpc"/><br/>
                <br>
                <input type="submit" value="<?php echo $validate_button[$langue]; ?>" class="submit-recup" class="submit2-changemdp" name="change_submit"/>
            </form>
        <?php } else { ?>
            <form method="post" class="form-recup">
                <input type="email" placeholder="<?php echo $mail_recup_input[$langue]; ?>" class="email-changemdp" name="recup_mail"/><br/>
                <input type="submit" value="<?php echo $validate_button[$langue]; ?>" class="submit-recup" class="submit3-changemdp" name="submit_recup"/>
            </form>
        <?php } ?>
        <?php if (isset($error)) {
            echo '<span style="color:indianred">' . $error . '</span>';
        } else {
            echo '';
        } ?>
    </article>
</main>


<?php include('footer.php') ?>

</body>
</html>
