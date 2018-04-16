<?php
include('connexionBDD.php');
session_start();

if(isset($_POST['DeletePanier']) and isset($_POST['idProduit'])){
    $sql ='DELETE FROM PANIER WHERE ID_utilisateur='.$_SESSION['id'].' AND ID_produit='.$_POST['idProduit'];
    $bdd->exec($sql);
}

header('Location: ../boutique.php');
exit;
?>
