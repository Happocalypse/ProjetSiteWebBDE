<?php
include('connexionBDD.php');
session_start();

if(isset($_POST['validerCommande'])){
//date_default_timezone_set('Europe/Paris');
//        $today = date("Y-m-d H:i:s");
//    $sql ='INSERT INTO commandes date_commande, ID_utilisateur'];
//    $bdd->exec($sql);
}

echo('<script>alert("Votre commande à été envoyé!");</script>');
 echo("<script>window.location = '../boutique.php';</script>");

?>
