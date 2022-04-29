<?php

if ($_GET['id'] AND $_GET['table']) {
    $table = htmlspecialchars($_GET['table']);
    $id = intval($_GET['id']);

    //include('../../../config.php');

    try{
        $db = new PDO('mysql:host=localhost;dbname=webBrowerTest', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage()); 
    } 

    $req = $db->prepare('DELETE FROM '.$table.' WHERE id = ?');
    $req->execute([$id]);

} else {
    echo "delete is failed";
}

