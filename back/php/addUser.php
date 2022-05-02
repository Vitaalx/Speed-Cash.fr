<?php 

include 'bdd.php';


if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"])
    && isset($_POST["age"]) && isset($_POST["nationality"]) && isset($_POST["status_compte"]) && isset($_POST["point_fidelite"]) && isset($_POST["role"])
){

    try {
        // Connexion à la BDD
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $longueurKey = 15;
        $key = "";
        for ($i = 1; $i < $longueurKey; $i++) {
            $key .= mt_rand(0, 9);
        }
        $password = sha1(htmlspecialchars($_POST['password']));

    $q = $conn->prepare('INSERT INTO users (nom, prénom, email, motDePasse, age, nationalité, confirmKey, compteActif, point_fidelite, role) VALUES (?,?,?,?,?,?,?,?,?,?)');
    //var_dump($q);
    $add = $q->execute([
        htmlspecialchars($_POST['nom']),
        htmlspecialchars($_POST['prenom']),
        htmlspecialchars($_POST['email']),
        $password,
        htmlspecialchars($_POST['age']),
        htmlspecialchars($_POST['nationality']),
        $key,
        htmlspecialchars($_POST['status_compte']),
        htmlspecialchars($_POST['point_fidelite']),
        htmlspecialchars($_POST['role']),
    ]);

    if($add){
        header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=Utilisateur ajouté avec succès.');
    }else{
        echo "<p>Echec de l'enregistrement.</p>";
        header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=error');
    }

    } catch (PDOException $e) {
        echo $e->getMessage();
        header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=error');
    }
}else{
    echo "Echec de la requête.";
    header('location: ../html/ltr/horizontal-menu-template-dark/page-users-list.php?message=error');
}

?>