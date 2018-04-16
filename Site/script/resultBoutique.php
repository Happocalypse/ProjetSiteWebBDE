<?php
include('connexionBDD.php');
session_start();
    if(isset($_POST['submitPanier']) and isset($_POST['idProduit'])){

        $sql= 'INSERT INTO PANIER (quantite, ID_produit, ID_utilisateur) VALUES (1,'.$_POST['idProduit'].','.$_SESSION['id'].')';
        $bdd->exec($sql);
    }

header('Location: ../boutique.php');
exit;
?>
